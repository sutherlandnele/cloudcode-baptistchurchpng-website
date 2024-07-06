<?php

namespace Drupal\blazy_layout\Plugin\Layout;

use Drupal\blazy_layout\BlazyLayoutDefault as Defaults;
use Drupal\Component\Utility\Crypt;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\SubformStateInterface;
use Drupal\Core\Render\Element;

/**
 * Provides a BlazyLayoutForm class for Layout plugins.
 */
abstract class BlazyLayoutForm extends BlazyLayoutBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return Defaults::layoutSettings() + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state): void {
    parent::validateConfigurationForm($form, $form_state);

    $settings = $form_state->getValue('settings');
    $count = (int) $settings['count'];

    // Yes, stupid, but satisfying stupidity is harmless.
    if ($count < 1) {
      $count = 1;
    }
    $form_state->setValue(['settings', 'count'], $count);

    if (empty($settings['id'])) {
      $id = Crypt::randomBytesBase64(8);
      $form_state->setValue(['settings', 'id'], strtolower($id));
    }

    // The main background styles.
    $this->validateStyles($form_state);

    if ($regions = $form_state->getValue('regions')) {
      foreach ($regions as $name => $region) {
        foreach ($region as $key => $value) {
          if ($key == 'settings') {
            foreach (array_keys($value) as $k) {
              if ($k == 'styles') {
                $this->validateStyles($form_state, ['regions', $name, 'settings', 'styles', 'colors']);
              }
            }
          }
        }
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);

    $regions = [];
    if ($values = $form_state->getValue('regions')) {
      foreach ($values as $name => $region) {
        foreach ($region as $key => $value) {
          if ($key == 'label') {
            $regions[$name][$key] = trim($value);
          }
          else {
            foreach ($value as $sk => $sv) {
              if ($sk == 'styles') {
                foreach (['colors', 'layouts'] as $ssk) {
                  foreach ($sv[$ssk] as $sssk => $sssv) {
                    $regions[$name][$key][$sk][$ssk][$sssk] = $sssv;
                  }
                }
              }
              else {
                $regions[$name][$key][$sk] = $sv;
              }
            }
          }
        }
      }
    }
    $this->configuration['regions'] = $regions;

    if ($settings = $form_state->getValue('settings')) {
      foreach ($settings as $key => $value) {
        if ($key == 'styles') {
          foreach (['colors', 'layouts'] as $sk) {
            foreach ($value[$sk] as $ssk => $ssv) {
              $this->configuration[$key][$sk][$ssk] = $ssv;
            }
          }

        }
        else {
          $this->configuration[$key] = is_string($value) ? trim($value) : $value;
        }
      }
      unset($this->configuration['settings']);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    // This form may be loaded as a subform Layout Builder, etc.
    // More info: #2536646, #2798261, #2774077, #2897557.
    $form_state2 = $form_state instanceof SubformStateInterface
      ? $form_state->getCompleteFormState()
      : $form_state;

    $form       = parent::buildConfigurationForm($form, $form_state2);
    $config     = $this->getConfiguration();
    $definition = $this->pluginDefinition;
    $settings   = [];

    $form['settings'] = [
      '#type'        => 'details',
      '#tree'        => TRUE,
      '#open'        => TRUE,
      '#title'       => $this->t('Global settings'),
      '#description' => $this->t('Use Blazy Image/ Media formatters to have background or even nested grids when creating blocks. Reload the page if some options do not update CSS/preview after saving this modal form.'),
      '#parents'     => ['layout_settings', 'settings'],
      '#attributes'  => ['class' => ['form-wrapper--b-layout']],
    ];

    // The main grid setttings.
    foreach (Defaults::layoutSettings() as $key => $value) {
      if ($key == 'styles') {
        foreach (['colors', 'layouts'] as $sk) {
          foreach ($value[$sk] as $ssk => $ssv) {
            $default = $config[$key][$sk][$ssk] ?? $ssv;
            $settings[$key][$sk][$ssk] = $this->configuration[$key][$sk][$ssk] ?? $default;
          }
        }
      }
      else {
        $default = $config[$key] ?? $value;
        $settings[$key] = $this->configuration[$key] ?? $default;
      }
    }

    // @todo enable:row_classes.
    $excludes = ['regions', 'attributes', 'row_classes'];
    $excludes = array_combine($excludes, $excludes);
    $this->admin->formBase($form['settings'], $settings, $excludes);
    $this->admin->formSettings($form['settings'], $settings, $excludes);
    $this->admin->formStyles($form['settings'], $settings['styles']);

    $arguments = [
      'grid_simple' => TRUE,
      'grid_required' => TRUE,
      'no_grid_header' => TRUE,
      'blazy_layout' => TRUE,
      'settings' => $settings,
    ];

    $grid_form = [];
    $this->admin->gridForm($grid_form, $arguments);

    foreach ($grid_form as $key => $element) {
      $form['settings'][$key] = $element;
      $form['settings'][$key]['#default_value'] = $settings[$key];

      if ($key == 'grid') {
        if (isset($form['settings'][$key]['#description'])) {
          $form['settings'][$key]['#description'] .= $this->admin->nativeGridDescription();
        }
      }
    }

    foreach (Element::children($form['settings']) as $key) {
      if ($key == 'styles') {
        foreach (['colors', 'layouts'] as $sk) {
          if ($subform = $form['settings'][$key][$sk] ?? []) {
            foreach (Element::children($subform) as $ssk) {
              $parents = ['layout_settings', 'settings', $key, $sk];
              $this->admin->themeDescription($form['settings'][$key][$sk][$ssk], $parents);
            }
          }
        }
      }
      else {
        $parents = ['layout_settings', 'settings', $key];
        $this->admin->themeDescription($form['settings'][$key], $parents);

        if (isset($form['settings'][$key]['#weight'])) {
          unset($form['settings'][$key]['#weight']);
        }
      }
    }

    // Region settings.
    $defined = $definition->getRegions();
    $regions = $this->manager->getRegions((int) $settings['count']);

    $subsets = [];
    $form['regions'] = [
      '#type'       => 'container',
      '#tree'       => TRUE,
      '#parents'    => ['layout_settings', 'regions'],
      '#weight'     => 31,
      '#attributes' => ['class' => ['form-wrapper--b-layout']],
    ];

    foreach ($regions as $region => $info) {
      $delta = $info['delta'];
      $subsets = [];

      foreach (Defaults::regionSettings() as $key => $value) {
        if ($key == 'label') {
          $fallback = $defined[$region]['label'] ?? Defaults::regionLabel($delta);
          $default = $config['regions'][$region][$key] ?? $fallback;
          $subsets['regions'][$region][$key] = $default ?: $value;
        }
        else {
          foreach ($value as $sk => $sv) {
            if ($sk == 'styles') {
              foreach (['colors', 'layouts'] as $ssk) {
                foreach ($sv[$ssk] as $sssk => $sssv) {
                  $default = $config['regions'][$region][$key][$sk][$ssk][$sssk] ?? $sssv;
                  $subsets['regions'][$region][$key][$sk][$ssk][$sssk] = $default;
                }
              }
            }
            else {
              $default = $config['regions'][$region][$key][$sk] ?? $sv;
              $subsets['regions'][$region][$key][$sk] = $default;
            }
          }
        }
      }

      $subsets2 = $subsets['regions'][$region];
      $label = $this->t('@label: <em>@name</em>', [
        '@label' => $info['label'],
        '@name'  => $subsets2['label'] ?? $this->t('No name'),
      ]);

      $form['regions'][$region] = [
        '#type'    => 'details',
        '#title'   => $label,
        '#open'    => FALSE,
        '#tree'    => TRUE,
        '#parents' => ['layout_settings', 'regions', $region],
      ];

      $form['regions'][$region]['label'] = [
        '#type'          => 'textfield',
        '#title'         => $this->t('Region name'),
        '#default_value' => $subsets2['label'],
        '#description'   => $this->t('The human-readable region name for theming.'),
      ];

      $form['regions'][$region]['settings'] = [
        '#type'    => 'details',
        '#title'   => $this->t('Settings'),
        '#open'    => TRUE,
        '#tree'    => TRUE,
        '#parents' => ['layout_settings', 'regions', $region, 'settings'],
      ];

      $regform = &$form['regions'][$region]['settings'];
      $subsets3 = $subsets2['settings'];
      $subsets3['rid'] = $region;
      $this->admin->formWrappers($regform, $subsets3, [], FALSE);

      $subsets4 = $subsets3['styles'];
      $subsets4['rid'] = $region;
      $excludes = ['ete', 'gapless', 'max_width'];
      $this->admin->formStyles($regform, $subsets4, $excludes);

      foreach (Element::children($regform) as $key) {
        if ($key == 'styles') {
          foreach (['colors', 'layouts'] as $sk) {
            if ($subform = $regform[$key][$sk] ?? []) {
              foreach (Element::children($subform) as $ssk) {
                $parents = ['layout_settings', 'regions', $region, 'settings', $key, $sk];
                $this->admin->themeDescription($regform[$key][$sk][$ssk], $parents);
              }
            }
          }
        }
        else {
          $parents = ['layout_settings', 'regions', $region, 'settings', $key];
          $this->admin->themeDescription($regform[$key], $parents);
        }
      }
    }

    $form['settings']['#attached']['library'][] = 'blazy_layout/modal';
    return $form;
  }

  /**
   * Validate form styles.
   */
  protected function validateStyles(
    FormStateInterface $form_state,
    array $keys = ['settings', 'styles', 'colors'],
  ): void {
    if ($styles = $form_state->getValue($keys)) {
      foreach ($styles as &$style) {
        if ($style == '#000000' || $style == '1' || $style == '0') {
          $style = '';
        }
      }
      $form_state->setValue($keys, array_filter($styles));
    }
  }

}
