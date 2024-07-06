<?php

namespace Drupal\blazy_layout\Plugin\Layout;

use Drupal\blazy\Utility\Color;
use Drupal\blazy_layout\BlazyLayoutDefault as Defaults;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Render\Element;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a BlazyLayoutBase class for Layout plugins.
 */
abstract class BlazyLayoutBase extends LayoutDefault implements BlazyLayoutInterface {

  /**
   * The blazy layout admin service.
   *
   * @var \Drupal\blazy_layout\Form\BlazyLayoutAdminInterface
   */
  protected $admin;

  /**
   * The blazy layout service.
   *
   * @var \Drupal\blazy_layout\BlazyLayoutManagerInterface
   */
  protected $manager;

  /**
   * {@inheritdoc}
   */
  protected static $namespace = 'blazy';

  /**
   * {@inheritdoc}
   */
  protected static $itemPrefix = 'blazy';

  /**
   * Provides CSS selectors.
   *
   * @var array
   */
  protected static $selectors;

  /**
   * Provides CSS rules.
   *
   * @var array
   */
  protected static $styles;

  /**
   * Provides region amount.
   *
   * @var int
   */
  protected static $count = 0;

  /**
   * Provides instance ID.
   *
   * @var string
   */
  protected static $instanceId;

  /**
   * {@inheritdoc}
   */
  public static function create(
    ContainerInterface $container,
    array $configuration,
    $plugin_id,
    $plugin_definition,
  ) {
    $instance = new static(
      $configuration,
      $plugin_id,
      $plugin_definition
    );

    $instance->admin = $container->get('blazy_layout.admin');
    $instance->manager = $container->get('blazy_layout');

    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function getRegionConfig($name, $key): string {
    $config = $this->configuration['regions'][$name] ?? [];
    if ($key == 'label') {
      return $config[$key] ?? '';
    }
    return $config['settings'][$key] ?? '';
  }

  /**
   * {@inheritdoc}
   */
  public function setRegionConfig($name, array $values): self {
    $config = $this->configuration['regions'][$name] ?? [];

    $this->configuration['regions'][$name] = $this->manager->merge($values, $config);
    return $this;
  }

  /**
   * Provides attachments and cache common for all blazy-related modules.
   */
  protected function attachments(
    array &$element,
    array $settings,
    array $attachments = [],
  ): void {
    $this->manager->setAttachments(
      $element,
      $settings,
      $attachments
    );

    $element['#attached']['library'][] = 'blazy_layout/layout';
    if ($this->inPreview) {
      $element['#attached']['library'][] = 'blazy_layout/admin';
    }
  }

  /**
   * Initialize dynamic layout regions.
   */
  protected function init() {
    $layout = clone $this->pluginDefinition;
    $settings = $this->getConfiguration();
    $factory_regions = $layout->getRegions();
    $keys = array_values($factory_regions);
    $count = (int) $settings['count'];

    // For some reason, short coalesce always fails.
    if ($id = $settings['id'] ?? NULL) {
      $layout_id = $id;
    }
    else {
      $id = Json::encode($settings);
      $layout_id = substr(md5($id), 0, 11);
    }

    $layout_id = strtolower($layout_id);
    static::$count = $count;
    static::$instanceId = 'b-layout--' . $layout_id;

    $settings['id'] = $layout_id;

    // Add new regions, if any different from factory.
    foreach (range(1, static::$count) as $delta => $value) {
      $key = Defaults::regionId($delta);
      $region = $keys[$delta] ?? $delta;

      if (is_int($region) && $region == $delta) {
        $label = Defaults::regionLabel($delta);
        $factory_regions[$key] = [
          'label' => Defaults::regionTranslatableLabel($label),
        ];
      }
    }

    // A special static BG region.
    $factory_regions['bg'] = [
      'label' => Defaults::regionTranslatableLabel('Background'),
    ];

    $this->setConfiguration($settings);
    $layout->setRegions($factory_regions);
    $this->pluginDefinition = $layout;
    return $layout;
  }

  /**
   * Returns settings.
   */
  protected function settings(): array {
    $settings = $this->getConfiguration();
    return $this->manager->layoutSettings($settings, static::$count);
  }

  /**
   * Modifies regions.
   */
  protected function regions(array &$output, array &$settings): void {
    $blazies = $settings['blazies'];
    $layout = $this->pluginDefinition;
    $factory_regions = $layout->getRegions();
    $dummy_regions = $blazies->get('grid.items', []);
    $default_regions = array_keys($factory_regions);
    $active_regions = array_keys(array_diff_key($dummy_regions, $default_regions));
    $new_regions = [];

    // Add dummy regions to keep layout intact.
    foreach (range(1, static::$count) as $delta => $value) {
      $name = Defaults::regionId($delta);

      if ($subsets = $settings['regions'][$name]['settings'] ?? []) {
        if ($classes = $this->manager->getClasses($subsets)) {
          $settings['regions'][$name]['settings']['classes'] = $classes;
        }
        if (empty($output[$name])) {
          $settings['regions'][$name]['settings']['empty'] = TRUE;
        }
      }

      if (!isset($output[$name]) && $this->inPreview) {
        $output[$name]['dummy']['#markup'] = ' ';
      }
    }

    if (empty($output['bg'])) {
      $settings['regions']['bg']['settings']['empty'] = TRUE;
      $output['bg']['dummy']['#markup'] = ' ';
    }

    // Add or remove regions based on the given settings.count.
    foreach ($this->manager->getKeys($output) as $delta => $name) {
      if (isset($output[$name])) {

        // Provides dummy regions.
        if (array_key_exists($delta, $active_regions)) {
          $label = Defaults::regionLabel($delta);
          $new_regions[$name] = [
            'label' => Defaults::regionTranslatableLabel($label),
          ];
        }
        else {
          // Remove anything beyond grid count, except the special BG region.
          if ($name != 'bg') {
            unset($output[$name]);
          }
        }
      }
    }

    // Add a special bg region.
    $new_regions['bg'] = [
      'label' => Defaults::regionTranslatableLabel('Background'),
    ];

    $this->blocks($output, $settings, $new_regions);

    ksort($new_regions);
    $this->pluginDefinition->setRegions($new_regions);
  }

  /**
   * Modifies blocks.
   */
  protected function blocks(array &$output, array &$settings, array $new_regions): void {
    ksort($new_regions);

    $id      = static::$instanceId;
    $colors  = $settings['styles']['colors'] ?? [];
    $layouts = $settings['styles']['layouts'] ?? [];

    // Move Blazy background to the beginning.
    foreach (array_keys($new_regions) as $name) {
      if (!isset($output[$name])) {
        continue;
      }

      $subsets = $settings;
      $styles  = $subsets['regions'][$name]['settings']['styles'] ?? [];
      $empty   = empty($output[$name]) || isset($output[$name]['dummy']);

      foreach (Element::children($output[$name]) as $uuid) {
        $block = $output[$name][$uuid];
        $formatter = $block['content'][0]['#formatter'] ?? 'x';

        if (!isset($output[$name]['#attributes'])) {
          $output[$name]['#attributes'] = [];
        }

        if ($name == 'bg') {
          $colorsets = $colors;
          $layoutsets = $layouts;
        }
        else {
          $colorsets = $styles['colors'] ?? [];
          $layoutsets = $styles['layouts'] ?? [];
        }

        $use_bg = $block_bg = FALSE;
        $use_overlay = !empty($colorsets['overlay_color']);

        if (strpos($formatter, 'blazy') !== FALSE) {
          if ($fieldsets = $block['content'][0]['#blazy'] ?? []) {
            // Pass the layout settings, not formatter's.
            $blazies = $subsets['blazies']->reset($subsets);
            $subblazies = $fieldsets['blazies'];
            $output[$name][$uuid]['#blazy'] = $subsets;

            $blazies->set('is.preview', $this->inPreview)
              ->set('lb.region', $name);

            $keys = ['entity', 'field', 'image', 'lightbox', 'media'];
            foreach ($keys as $key) {
              $blazies->set($key, $subblazies->get($key));
            }

            if (!empty($fieldsets['background'])) {
              $block_bg = $use_bg = $use_overlay = TRUE;

              $blazies->set('use.bg', TRUE);

              if (isset($output[$name][$uuid]['content'][0][0]['#build'])) {
                $blazy = &$output[$name][$uuid]['content'][0][0]['#build'];

                $blazy['overlay']['blazy_layout'] = [
                  '#theme' => 'container',
                  '#attributes' => [
                    'class' => ['media__overlay'],
                  ],
                ];
              }

              $output[$name][$uuid]['#weight'] = -101;
            }
          }
        }

        $options = ['empty' => $empty, 'block_bg' => $block_bg];
        $this->texts($name, $colorsets, 'text', $options);
        $this->texts($name, $colorsets, 'heading', $options);
        $this->links($name, $colorsets, $options);
        $bgs = $this->backgrounds($name, $colorsets, 'background', $options);
        $this->backgrounds($name, $colorsets, 'overlay', $options);
        $this->layouts($name, $layoutsets, 'padding', $options);

        $use_bg = $use_bg || !empty($bgs['bg']);

        if ($use_bg) {
          if ($name == 'bg' && empty($settings['background'])) {
            $settings['background'] = TRUE;
          }

          $settings['regions'][$name]['settings']['background'] = TRUE;
          $this->setRegionConfig($name, [
            'settings' => [
              'background' => TRUE,
            ],
          ]);
        }
      }

      if ($this->inPreview) {
        if ($selectors = static::$selectors[$id][$name] ?? []) {
          $output[$name]['#attributes']['data-b-selector'] = Json::encode($selectors);
        }
      }
    }
  }

  /**
   * Modifies attributes.
   */
  protected function attributes(array &$output, array $settings): void {
    $id    = $selector = static::$instanceId;
    $style = $settings['style'] ?? '';
    $css   = '';

    foreach (['grid_auto_rows', 'align_items'] as $option) {
      if ($value = $settings[$option] ?? NULL) {
        if ($option == 'grid_auto_rows' && $style != 'nativegrid') {
          continue;
        }
        $key = str_replace('_', '-', $option);
        $value = trim($value);
        $css .= $key . ':' . $value . ';';
      }
    }

    if ($layouts = $settings['styles']['layouts'] ?? []) {
      if ($value = $layouts['padding'] ?? NULL) {
        $css .= 'padding:' . $value . ';';
      }
      if ($value = $layouts['max_width'] ?? NULL) {
        if (strpos($value, ':') === FALSE) {
          $css .= 'max-width:' . $value . ';';
        }
        else {
          $vals = array_map('trim', explode(' ', $value));
          $queries = '';
          foreach ($vals as $val) {
            $keys = array_map('trim', explode(':', $val));
            $queries .= '@media screen and (min-width: ' . $keys[0] . ') {ROOT {max-width: ' . $keys[1] . '}}';
          }
          static::$styles[$id]['max_width'] = $queries;
        }
      }
    }

    if ($css) {
      static::$styles[$id][$selector] = $css;
    }

    $this->manager->parseClasses($output, $settings);

    if (!isset($output['#wrapper_attributes'])) {
      $output['#wrapper_attributes'] = [];
    }

    if ($this->inPreview) {
      $output['#attributes']['id'] = $id;
    }
  }

  /**
   * Provides CSS rules.
   */
  protected function styles(array &$output, array $settings): void {
    $id  = static::$instanceId;
    $css = '';

    // Put this in the head to avoid ugly inline element styles.
    if ($rules = static::$styles[$id] ?? []) {
      $css = $this->manager->toRules($rules, $id);
      $css = preg_replace('/\s+/', ' ', $css);

      $output['#attached']['html_head'][] = [
        [
          '#tag'        => 'style',
          '#value'      => $css,
          '#weight'     => 1,
          '#attributes' => ['id' => $id . '-style'],
        ],
        $id . '-style',
      ];
    }

    if ($this->inPreview) {
      $json = Json::encode([
        'id' => $id,
        'style' => $css,
      ]);

      $output['#attributes']['data-b-layout'] = base64_encode($json);
    }
  }

  /**
   * Provides background styles.
   */
  protected function backgrounds(
    $region,
    array $colors,
    $key = 'background',
    array $options = [],
  ): array {
    $id   = static::$instanceId;
    $rule = 'color';
    $bg   = $alpha = FALSE;
    $hex  = $colors["{$key}_color"] ?? NULL;
    $css  = '';

    if ($value = $colors["{$key}_opacity"] ?? NULL) {
      if ($value != '0' && $value != '1') {
        $rule = 'opacity';
        $alpha = $value;
      }
    }

    $options['rule'] = $rule;
    $selector = $this->manager->selector($key, $region, $options);

    if ($hex) {
      $bg = TRUE;
      $color = Color::hexToRgba($hex, $alpha);
      $css = "background-color: $color;";
    }

    if ($css) {
      static::$styles[$id][$selector] = $css;
    }

    static::$selectors[$id][$region][$key] = $selector;
    return ['css' => $css, 'selector' => $selector, 'bg' => $bg];
  }

  /**
   * Provides text styles.
   */
  protected function texts(
    $region,
    array $colors,
    $key = 'heading',
    array $options = [],
  ): array {
    $id    = static::$instanceId;
    $rule  = 'color';
    $alpha = FALSE;
    $hex   = $colors["{$key}_color"] ?? NULL;
    $css   = '';

    if ($value = $colors["{$key}_opacity"] ?? NULL) {
      if ($value != '0' && $value != '1') {
        $rule = 'opacity';
        $alpha = $value;
      }
    }

    $options['rule'] = $rule;
    $selector = $this->manager->selector($key, $region, $options);

    if ($hex) {
      $color = Color::hexToRgba($hex, $alpha);
      $css = "color: $color;";
    }

    if ($css) {
      static::$styles[$id][$selector] = $css;
    }

    static::$selectors[$id][$region][$key] = $selector;
    return ['css' => $css, 'selector' => $selector];
  }

  /**
   * Provides link styles.
   */
  protected function links(
    $region,
    array $colors,
    array $options = [],
  ): array {
    $id  = static::$instanceId;
    $css = '';

    $selector = $this->manager->selector('link', $region, $options);
    static::$selectors[$id][$region]['link'] = $selector;

    if ($style = $colors["link_color"] ?? NULL) {
      $css = "color: $style;";

      static::$styles[$id][$selector] = $css;
    }

    $selector = $this->manager->selector('link_hover', $region, $options);
    static::$selectors[$id][$region]['link_hover'] = $selector;

    if ($style = $colors['link_hover_color'] ?? NULL) {
      $css = "color: $style;";

      static::$styles[$id][$selector] = $css;
    }

    return ['css' => $css, 'selector' => $selector];
  }

  /**
   * Provides layout styles.
   */
  protected function layouts(
    $region,
    array $settings,
    $key = 'padding',
    array $options = [],
  ): array {
    $id  = static::$instanceId;
    $css = '';

    $selector = $this->manager->selector('padding', $region, $options);
    if ($style = $settings[$key] ?? NULL) {
      $css = "$key: $style;";

      static::$styles[$id][$selector] = $css;
    }

    static::$selectors[$id][$region][$key] = $selector;
    return ['css' => $css, 'selector' => $selector];
  }

}
