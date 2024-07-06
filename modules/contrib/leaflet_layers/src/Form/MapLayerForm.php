<?php

namespace Drupal\leaflet_layers\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form class for adding custom layer entities.
 */
class MapLayerForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $plugins = $this->loadPlugins();

    /** @var \Drupal\leaflet_layers\Entity\MapLayer $map_layer */
    $map_layer = $this->entity;

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $map_layer->label(),
      '#description' => $this->t("Label for the Map layer."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $map_layer->id(),
      '#machine_name' => [
        'exists' => '\Drupal\leaflet_layers\Entity\MapLayer::load',
      ],
      '#disabled' => !$map_layer->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */
    $form['description'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Description'),
      '#maxlength' => 255,
      '#default_value' => $map_layer->getDescription(),
    ];

    $form['layer_type'] = [
      '#type' => 'select',
      '#title' => $this->t('Layer Type'),
      '#default_value' => $map_layer->getSetting('layer_type', 'base_layer'),
      '#options' => [
        'base' => $this->t('Base Layer'),
        'overlay' => $this->t('Overlay Layer'),
      ],
      '#required' => TRUE,
    ];

    $form['plugin_selector'] = [
      '#type' => 'select',
      '#options' => [],
      '#required' => TRUE,
      '#title' => $this->t('Select map type'),
      '#attributes' => [
        'class' => ['layer-plugin-selector'],
      ],
      '#empty_value' => '',
      '#default_value' => $map_layer->getSetting('plugin_type', ''),
    ];

    $form['plugin_keys'] = [
      '#type' => 'value',
      '#value' => [],
    ];

    foreach ($plugins as $key => $plugin) {
      $form['plugin_keys']['#value'][] = $key;
      $form['plugin_selector']['#options'][$key] = $plugin['label'];
      $fieldset = [
        '#type' => 'fieldset',
        '#title' => $key,
        '#tree' => TRUE,
        'settings' => [
          '#tree' => TRUE,
        ],
        '#states' => [
          'visible' => [
            ':input[class*="layer-plugin-selector"]' => ['value' => $key],
          ],
        ],
      ];

      $fieldset['settings']['plugin_type'] = [
        '#type' => 'value',
        '#value' => $key,
      ];

      foreach ($plugin['data']['settings'] as $field => $settings) {
        $fieldset['settings'][$field] = $settings;
        $fieldset['settings'][$field]['#default_value'] = $map_layer->getSetting($field, $settings['#default_value']);
      }

      $form[$key] = $fieldset;
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Remove button and internal Form API values from submitted values.
    $form_state->cleanValues();
    $this->entity = $this->buildMapEntity($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $status = $this->entity->save();

    \Drupal::cache()->invalidate('leaflet_map_info');

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Map layer.', [
          '%label' => $this->entity->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Map layer.', [
          '%label' => $this->entity->label(),
        ]));
    }
    $form_state->setRedirectUrl($this->entity->toUrl('collection'));
  }

  /**
   * Prepare the entity object.
   */
  public function buildMapEntity(array $form, FormStateInterface $form_state) {
    $entity = clone $this->entity;
    $values = $form_state->getValues();

    $layer_type = $values['layer_type'];

    $plugin_key = $values['plugin_selector'];
    $plugins = $values['plugin_keys'];

    // Store the selected plugin on entity.
    $values[$plugin_key]['settings']['layer_type'] = $layer_type;
    $entity->set('settings', $values[$plugin_key]['settings']);

    unset($values['plugin_selector']);
    unset($values['plugin_keys']);

    foreach ($values as $key => $value) {
      if (in_array($key, $plugins)) {
        // Skip unmodified plugins.
        continue;
      }

      $entity->set($key, $value);
    }

    return $entity;
  }

  /**
   * Load the map type plugins.
   *
   * @return array
   *   Returns an array of map type plugins.
   */
  protected function loadPlugins() {
    $pluginManager = \Drupal::service('plugin.manager.leaflet_layers');
    $defs = $pluginManager->getDefinitions();
    $list = [];

    foreach ($defs as $plugin_name => $info) {
      $widget = $pluginManager->createInstance($plugin_name);

      $list[$plugin_name] = [
        'label' => $info['label'],
        'data' => $widget->getInfo(),
      ];
    }
    return $list;
  }

}
