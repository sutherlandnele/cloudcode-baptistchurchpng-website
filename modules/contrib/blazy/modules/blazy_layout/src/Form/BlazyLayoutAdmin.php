<?php

namespace Drupal\blazy_layout\Form;

use Drupal\blazy\Form\BlazyAdminBase;
use Drupal\blazy_layout\BlazyLayoutDefault as Defaults;
use Drupal\blazy_layout\BlazyLayoutManagerInterface;
use Drupal\Component\Utility\Xss;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Extends base form for Blazy layout instance configuration form.
 */
class BlazyLayoutAdmin extends BlazyAdminBase implements BlazyLayoutAdminInterface {

  use StringTranslationTrait;

  /**
   * The blazy layout manager service.
   *
   * @var \Drupal\blazy_layout\BlazyLayoutManagerInterface
   */
  protected $manager;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->setManager($container->get('blazy_layout'));

    return $instance;
  }

  /**
   * Sets manager service.
   */
  public function setManager(BlazyLayoutManagerInterface $manager) {
    $this->manager = $manager;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function formBase(array &$form, array $settings, array $excludes = []): void {
    $elements = [];
    $attrs    = ['class' => ['is-tooltip']];

    $elements['count'] = [
      '#type'        => 'number',
      '#title'       => $this->t('Region count'),
      '#maxlength'   => 255,
      '#description' => $this->t('The amount of regions, normally matches the amount of grids specific for Native Grid.'),
    ];

    $elements['style'] = [
      '#type'        => 'select',
      '#title'       => $this->t('Layout engine'),
      '#options'     => $this->blazyManager->getStyles(),
      '#description' => $this->openingDescriptions()['style'],
    ];

    foreach (array_keys($elements) as $key) {
      if ($excludes && in_array($key, $excludes)) {
        unset($elements[$key]);
        continue;
      }
      $elements[$key]['#default_value'] = $settings[$key] ?? '';
      $elements[$key]['#attributes'] = $attrs;
      $elements[$key]['#required'] = TRUE;
      $elements[$key]['#weight'] = 20;
    }

    $form += $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function formStyles(array &$form, array $settings, array $excludes = []): void {
    $attrs = ['class' => ['is-tooltip']];

    if ($region = $settings['rid'] ?? NULL) {
      $parents = ['layout_settings', 'regions', $region, 'settings', 'styles'];
    }
    else {
      $parents = ['layout_settings', 'settings', 'styles'];
    }

    $form['styles'] = [
      '#type'       => 'details',
      '#tree'       => TRUE,
      '#open'       => FALSE,
      '#title'      => $this->t('Styles'),
      '#parents'    => $parents,
      '#weight'     => 10,
      '#attributes' => [
        'class' => [
          'form-wrapper--b-layout-styles',
        ],
        'data-b-region' => $region ?: 'bg',
      ],
    ];

    // Colors.
    $form['styles']['colors'] = [
      '#type'        => 'details',
      '#tree'        => TRUE,
      '#open'        => TRUE,
      '#title'       => $this->t('Colors'),
      '#parents'     => array_merge($parents, ['colors']),
      '#description' => $this->t('Might conflict against CSS framework classes like Bootstrap, etc. Leave them to default (color #000000/ black, and opacity 1) values to respect framework. Useful if colors are not provided by frameworks. Background and Overlay options require Blazy Image/Media with Use CSS Background enabled to exist in the region. Text with <code>P</code> tag.'),
    ];

    $colors = &$form['styles']['colors'];

    foreach (array_keys(Defaults::styleSettings()) as $key) {
      $type  = strpos($key, '_color') ? 'color' : 'range';
      $title = str_replace('_', ' ', $key);

      $colors[$key] = [
        '#type'  => $type,
        '#title' => $this->t('@title', ['@title' => ucfirst($title)]),
      ];
    }

    foreach ($this->manager->getKeys($colors) as $key) {
      if ($excludes && in_array($key, $excludes)) {
        unset($colors[$key]);
        continue;
      }

      $value = $settings['colors'][$key] ?? '';

      if ($colors[$key]['#type'] == 'range') {
        $colors[$key]['#min'] = 0;
        $colors[$key]['#max'] = 1;
        $colors[$key]['#step'] = 0.1;
        $colors[$key]['#field_suffix'] = $value ?: ' ';
        $attrs['data-b-prop'] = 'opacity';
      }

      if ($colors[$key]['#type'] == 'color') {
        $colors[$key]['#field_suffix'] = $value ?: ' ';

        $bg = strpos($key, 'background') !== FALSE || strpos($key, 'overlay') !== FALSE;
        $attrs['data-b-prop'] = $bg ? 'background-color' : 'color';
      }

      $colors[$key]['#default_value'] = $value;
      $colors[$key]['#attributes'] = $attrs;
    }

    // Layouts.
    $form['styles']['layouts'] = [
      '#type'    => 'details',
      '#tree'    => TRUE,
      '#open'    => TRUE,
      '#title'   => $this->t('Layouts'),
      '#parents' => array_merge($parents, ['layouts']),
    ];

    $layouts = &$form['styles']['layouts'];
    foreach (Defaults::sublayoutSettings() as $key => $value) {
      $type  = is_bool($value) ? 'checkbox' : 'textfield';
      $title = str_replace('_', ' ', $key);

      $description = '';
      if ($key == 'ete') {
        $title = 'Edge to edge';
        $description = $this->t('If enabled, the main background will span edge to edge. Works better with <b>Max width</b> option, and themes with wide content region and without sidebars. Requires parent selectors without <code>overflow: hidden</code> rules, else cropped. Try Bartik if any issues.');
      }
      elseif ($key == 'padding') {
        $description = $this->t('Valid CSS padding value, e.g.: <code>3rem or 15px 30px</code>. Leave empty if using CSS framework like Bootstrap, etc. Input padding as classes in the relevant <b>Classes</b> option instead.');
      }
      elseif ($key == 'max_width') {
        $description = $this->t('The max-width of the <b>b-layout</b> container. Useful to reveal the background image, if padding is cumbersome. Valid CSS max-width value, e.g.: <code>82% or 1270px</code>. To have a mobile up max-width, use a colon-separated media query <small>WINDOW_MIN_WIDTH:LAYOUT_MAX_WIDTH</small> pair with spaces, e.g.: <br><code>0px:98% 768px:90% 1270px:82%</code><br>Affected by parent container widths of this layout wrapper. Try Bartik if any issues.');
      }
      elseif ($key == 'gapless') {
        $description = $this->t('Flexbox and Native grid only. Remove gaps or margins to make it gapless.');
      }

      $layouts[$key] = [
        '#type'        => $type,
        '#title'       => $this->t('@title', ['@title' => ucfirst($title)]),
        '#description' => $description,
      ];
    }

    foreach ($this->manager->getKeys($layouts) as $key) {
      if ($excludes && in_array($key, $excludes)) {
        unset($layouts[$key]);
        continue;
      }

      $attrs['data-b-prop'] = str_replace('_', '', $key);
      $layouts[$key]['#default_value'] = $settings['layouts'][$key] ?? '';
      $layouts[$key]['#attributes'] = $attrs;
    }
  }

  /**
   * {@inheritdoc}
   *
   * @todo refine and merge with self::formWrappers().
   */
  public function formSettings(array &$form, array $settings, array $excludes = []): void {
    $defaults    = Defaults::layoutSettings();
    $admin_css   = $this->blazyManager->config('admin_css', 'blazy.settings');
    $attrs       = ['class' => ['is-tooltip']];
    $bottoms     = ['align_items', 'grid_auto_rows'];
    $elements    = $options = [];
    $description = '';

    foreach ($defaults as $key => $value) {
      if ($excludes && in_array($key, $excludes)) {
        continue;
      }

      switch ($key) {
        case 'wrapper':
          $options = Defaults::mainWrapperOptions();
          $description = '';
          break;

        case 'classes':
          $options = [];
          $description = $this->t('Use space: <code>bg-dark text-white</code>. May use CSS framework classes like Bootstrap, e.g.: <code>p-sm-2 p-md-5</code>');
          break;

        case 'align_items':
          $options = Defaults::aligItems();
          $description = $this->t('Flexbox and Native Grid only. Try <code>start</code> to have floating elements, but might break Blazy CSS background. The CSS align-items property sets the align-self value on all direct children as a group. In Flexbox, it controls the alignment of items on the Cross Axis. In Grid Layout, it controls the alignment of items on the Block Axis within their grid area. <a href="@url">Read more</a>', [
            '@url' => 'https://developer.mozilla.org/en-US/docs/Web/CSS/align-items',
          ]);
          break;

        case 'grid_auto_rows':
          $options = [];
          $description = $this->t('Native Grid only. Accepted values: auto, min-content, max-content, minmax. Spefiic for minmax, it requires additional arguments, e.g.: minmax(80px, auto). Default to use the CSS rule <code>var(--bn-row-height-native)</code> or 80px. <a href="@url">Read more</a>', [
            '@url' => 'https://developer.mozilla.org/en-US/docs/Web/CSS/grid-auto-rows',
          ]);
          break;

        default:
          $options = [];
          $description = '';
          break;
      }

      $type = is_bool($value) ? 'checkbox' : 'textfield';
      if ($options) {
        $type = 'select';
      }

      if ($key == 'id') {
        $type = 'hidden';
      }

      $title = str_replace('_', ' ', $key);

      if ($type !== 'hidden') {
        $elements[$key] = [
          '#title'       => $this->t('@title', ['@title' => ucfirst($title)]),
          '#description' => $description,
          '#attributes'  => $attrs,
          '#required'    => $key == 'wrapper',
        ];

        if ($options) {
          $elements[$key]['#options'] = $options;
          if (empty($elements[$key]['#required'])) {
            $elements[$key]['#empty_option'] = $this->t('- None -');
          }
        }
      }

      $elements[$key]['#type'] = $type;
    }

    // Defines the default values if available.
    foreach ($elements as $name => $element) {
      $type     = $element['#type'];
      $fallback = $type == 'checkbox' ? FALSE : '';
      $value    = $defaults[$name] ?? $fallback;

      if (is_array($value)) {
        continue;
      }

      // Stupid, but in case more stupidity gets in the way.
      if ($type == 'textfield') {
        $value = strip_tags($value);
      }

      $elements[$name]['#default_value'] = $settings[$name] ?? $value;

      if ($type == 'textfield') {
        $elements[$name]['#size'] = 20;
        $elements[$name]['#maxlength'] = 255;
      }

      if ($type !== 'hidden') {
        $elements[$name]['#attributes']['class'][] = 'is-tooltip';

        if ($admin_css) {
          if ($type == 'checkbox') {
            $elements[$name]['#title_display'] = 'before';
          }

          foreach ($bottoms as $key) {
            if (!isset($elements[$key]['#wrapper_attributes'])) {
              $elements[$key]['#wrapper_attributes'] = [];
            }

            $wattrs = &$elements[$key]['#wrapper_attributes'];
            $wattrs['class'][] = 'b-tooltip__bottom';
          }
        }
      }
    }

    $form += $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function formWrappers(
    array &$form,
    array $settings,
    array $excludes = [],
    $root = TRUE,
  ): void {
    $attrs    = ['class' => ['is-tooltip']];
    $elements = [];

    $elements['wrapper'] = [
      '#type'     => 'select',
      '#options'  => $root ? Defaults::mainWrapperOptions() : Defaults::regionWrapperOptions(),
      '#required' => TRUE,
      '#title'    => $this->t('Wrapper'),
    ];

    $elements['attributes'] = [
      '#type'        => 'textfield',
      '#title'       => $this->t('Attributes'),
      '#description' => $this->t('Use comma: role|main,data-key|value'),
      '#access'      => FALSE,
    ];

    $elements['classes'] = [
      '#type'        => 'textfield',
      '#title'       => $this->t('Classes'),
      '#description' => $this->t('Use space: bg-dark text-white. May use CSS framework classes like Bootstrap, e.g.: <code>p-sm-2 p-md-5</code>'),
    ];

    $elements['row_classes'] = [
      '#type'        => 'textfield',
      '#title'       => $this->t('Row classes'),
      '#description' => $this->t('Use space: align-items-stretch no-gutters'),
      '#access'      => FALSE,
    ];

    foreach (array_keys($elements) as $key) {
      if ($excludes && in_array($key, $excludes)) {
        unset($elements[$key]);
        continue;
      }

      $value = $settings[$key] ?? '';
      $elements[$key]['#default_value'] = $value ? Xss::filter($value) : '';
      $elements[$key]['#attributes'] = $attrs;
    }

    $form += $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function formBackground(
    array &$form,
    array $settings,
    array $excludes = [],
    $root = TRUE,
  ): void {
    $attrs    = ['class' => ['is-tooltip']];
    $elements = [];

    $elements['wrapper'] = [
      '#type'     => 'select',
      '#options'  => $root ? Defaults::mainWrapperOptions() : Defaults::regionWrapperOptions(),
      '#required' => TRUE,
      '#title'    => $this->t('Wrapper'),
    ];

    $elements['attributes'] = [
      '#type'        => 'textfield',
      '#title'       => $this->t('Attributes'),
      '#description' => $this->t('Use comma: role|main,data-key|value'),
      '#access'      => FALSE,
    ];

    $elements['classes'] = [
      '#type'        => 'textfield',
      '#title'       => $this->t('Classes'),
      '#description' => $this->t('Use space: bg-dark text-white'),
    ];

    $elements['row_classes'] = [
      '#type'        => 'textfield',
      '#title'       => $this->t('Row classes'),
      '#description' => $this->t('Use space: align-items-stretch no-gutters'),
      '#access'      => FALSE,
    ];

    foreach (array_keys($elements) as $key) {
      if ($excludes && in_array($key, $excludes)) {
        unset($elements[$key]);
        continue;
      }

      $value = $settings[$key] ?? '';
      $elements[$key]['#default_value'] = $value ? Xss::filter($value) : '';
      $elements[$key]['#attributes'] = $attrs;
    }

    $form += $elements;
  }

  /**
   * Checks for valid color excluding black (#000000) by design.
   */
  protected function getColor($key, array $settings) {
    $colors = $settings['styles'];
    return !empty($colors[$key]) && $colors[$key] != '#000000' ? $colors[$key] : FALSE;
  }

}
