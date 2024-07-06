<?php

namespace Drupal\leaflet_layers\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\leaflet_layers\Entity\MapBundleInterface;
use Drupal\leaflet_layers\Entity\MapLayer;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Form class for adding bundle entities.
 */
class MapBundleForm extends EntityForm {

  /**
   * Number of available layers.
   *
   * @var int
   */
  protected $layerCount = 0;

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    /** @var \Drupal\leaflet_layers\Entity\MapBundle $map_bundle */
    $map_bundle = $this->entity;

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $map_bundle->label(),
      '#description' => $this->t("Label for the Map bundle."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $map_bundle->id(),
      '#machine_name' => [
        'exists' => '\Drupal\leaflet_layers\Entity\MapBundle::load',
      ],
      '#disabled' => !$map_bundle->isNew(),
    ];

    $layers = $this->getData($map_bundle);

    uasort($layers, [$this, 'sortByWeight']);

    $layer_groups = [
      'base' => [],
      'overlay' => [],
    ];

    foreach ($layers as $layer) {
      if ($layer['layer_type'] === 'base') {
        $layer_groups['base'][] = $layer;
      }
      elseif ($layer['layer_type'] === 'overlay') {
        $layer_groups['overlay'][] = $layer;
      }
    }

    $form['layers'] = $this->tableElement($layer_groups['base'], $this->t('Base layers'), 'layers');
    $form['overlays'] = $this->tableElement($layer_groups['overlay'], $this->t('Overlay layers'), 'overlays');

    $form['settings'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Settings'),
      '#description' => $this->t('Configure how the map should be displayed, for more information see @leaflet_documentation', [
        '@leaflet_documentation' => Link::fromTextAndUrl('Leaflet Documentation', Url::fromUri('https://leafletjs.com/reference-1.6.0.html#map-property'))->toString(),
      ]),
      '#tree' => TRUE,
    ];

    $settings = $this->getSettingsKeys();

    foreach ($settings as $key => $info) {
      $form['settings'][$key] = [
        '#type' => 'checkbox',
        '#title' => $info['label'],
        '#description' => $info['description'],
        '#default_value' => $map_bundle->getSetting($key, $info['default']),
      ];
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $map_bundle = $this->entity;
    $map_bundle->removeInactiveLayers();

    $status = $map_bundle->save();

    \Drupal::cache()->invalidate('leaflet_map_info');

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Map bundle.', [
          '%label' => $map_bundle->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Map bundle.', [
          '%label' => $map_bundle->label(),
        ]));
    }
    $form_state->setRedirectUrl($map_bundle->toUrl('collection'));
  }

  /**
   * Helper function to generate tabledrag.
   */
  public function tableElement($layers, $heading, $id) {
    $table = [
      '#type' => 'table',
      '#prefix' => '<h3>' . $heading . '</h3>',
      '#header' => [
        $this->t('Module'),
        $this->t('Label'),
        $this->t('Custom label'),
        $this->t('Enabled'),
        $this->t('On by default'),
        $this->t('Weight'),
      ],
      '#tabledrag' => [
        [
          'action' => 'order',
          'relationship' => 'sibling',
          'group' => 'table-sort-weight',
        ],
      ],
      '#tree' => TRUE,
      '#attributes' => [
        'id' => $id,
      ],
    ];

    if ($id == 'layers') {
      unset($table['#header'][4]);
    }

    foreach ($layers as $layer) {

      $row_id = $layer['id'];
      $table[$row_id] = [
        'module_name' => [
          '#markup' => $layer['module'],
        ],
        'label' => [
          '#markup' => $layer['label'],
        ],
        // Only way to not create extra columns in table is to wrap:
        'label_wrapper' => [
          'custom_label' => [
            '#type' => 'textfield',
            '#title' => 'Custom label',
            '#title_display' => 'invisible',
            '#default_value' => $layer['custom_label'],
          ],
          'data' => [
            '#type' => 'value',
            '#value' => [
              'module' => $layer['module'],
              'key' => $layer['layer_id'],
              'map_bundle' => $layer['map_bundle'],
            ],
          ],
        ],
        'enabled' => [
          '#type' => 'checkbox',
          '#title' => $this->t('Enable'),
          '#title_display' => 'invisible',
          '#default_value' => $layer['enabled'],
        ],
        'on_by_default' => [
          '#type' => 'checkbox',
          '#title' => $this->t('On by default'),
          '#title_display' => 'invisible',
          '#default_value' => $layer['on_by_default'],
        ],
        'weight' => [
          '#type' => 'weight',
          '#title' => $this->t('Weight for @title', ['@title' => $layer['label']]),
          '#title_display' => 'invisible',
          '#default_value' => $layer['weight'],
          '#attributes' => ['class' => ['table-sort-weight']],
        ],
      ];

      if ($id == 'layers') {
        unset($table[$row_id]['on_by_default']);
      }

      $table[$row_id]['#attributes']['class'][] = 'draggable';
      $table[$row_id]['#weight'] = $layer['weight'];
    }

    return $table;
  }

  /**
   * Prepare the layers for table.
   *
   * @param \Drupal\leaflet_layers\Entity\MapBundleInterface $map_bundle
   *   The current map bundle.
   *
   * @return array
   *   Returns array of map layers.
   *
   * @TODO Simplify data here.
   */
  public function getData(MapBundleInterface $map_bundle) {
    $data = [];
    $results = [];
    $this->moduleHandler->invokeAllWith('leaflet_map_info', function (callable $hook, string $module) use (&$results) {
      $results[$module] = $hook();
    });

    $existing_layers = $map_bundle->getLayers();

    foreach ($results as $invokee => $map_info) {
      foreach ($map_info as $key => $source) {
        if (isset($source['leaflet_layers']) && $source['leaflet_layers']) {
          // Skip so we don't read the ones created here.
          continue;
        }

        foreach ($source['layers'] as $name => $layer) {
          // Generate a unique ID since multiple modules can provide layers
          // with the same name.
          $id = $this->machineName($key . '_' . $name);
          $layer_type = isset($layer['layer_type']) ? $layer['layer_type'] : 'base';

          $item = [
            'module' => $invokee,
            'label' => $source['label'] . ' (' . $name . ')',
            'id' => $id,
            'map_bundle' => $key,
            'layer_id' => $name,
            'weight' => isset($existing_layers[$id]) ? isset($existing_layers[$id]['weight']) ? $existing_layers[$id]['weight'] : 0 : 0,
            'layer_type' => $layer_type,
            'enabled' => isset($existing_layers[$id]) ? $existing_layers[$id]['enabled'] : FALSE,
            'on_by_default' => isset($existing_layers[$id]) ? $existing_layers[$id]['on_by_default'] : TRUE,
            'custom_label' => isset($existing_layers[$id]) ? $existing_layers[$id]['label'] : '',
          ];
          $data[] = $item;
          $this->layerCount += 1;
        }
      }
    }

    $custom_layers = MapLayer::loadMultiple();
    foreach ($custom_layers as $layer) {
      $id = $this->machineName('leaflet_layers_' . $layer->id());

      $layer_type = $layer->getSetting('layer_type', 'base');
      $item = [
        'module' => 'leaflet_layers',
        // @TODO May not be needed:
        'map_bundle' => 'leaflet_layers',
        'label' => $layer->label(),
        'id' => $id,
        'layer_id' => $layer->id(),
        'weight' => isset($existing_layers[$id]) ? isset($existing_layers[$id]['weight']) ? $existing_layers[$id]['weight'] : 0 : 0,
        'layer_type' => $layer_type,
        'enabled' => isset($existing_layers[$id]) ? $existing_layers[$id]['enabled'] : FALSE,
        'on_by_default' => isset($existing_layers[$id]) ? $existing_layers[$id]['on_by_default'] : TRUE,
        'custom_label' => isset($existing_layers[$id]) ? $existing_layers[$id]['label'] : '',
      ];

      $data[] = $item;
      $this->layerCount += 1;
    }

    return $data;
  }

  /**
   * Generate a machine name for the layers.
   *
   * @param string $id
   *   The identifier.
   *
   * @return string|string[]|null
   *   Returns the formated string.
   */
  public function machineName($id) {
    $new_value = strtolower($id);
    $new_value = preg_replace('/[^a-z0-9_]+/', '_', $new_value);
    return preg_replace('/_+/', '_', $new_value);
  }

  /**
   * Return all the settings for leaflet layers.
   *
   * @return array
   *   Array of options.
   */
  public function getSettingsKeys() {
    return [
      'dragging' => [
        'label' => $this->t('Enable dragging'),
        'description' => $this->t('Whether the map be draggable with mouse/touch or not.'),
        'default' => TRUE,
      ],
      'touchZoom' => [
        'label' => $this->t('Touch Zoom'),
        'description' => $this->t('Whether the map can be zoomed by touch-dragging with two fingers.'),
        'default' => TRUE,
      ],
      'scrollWheelZoom' => [
        'label' => $this->t('Scroll Wheel Zoom'),
        'description' => $this->t('Whether the map can be zoomed by using the mouse wheel.'),
        'default' => TRUE,
      ],
      'doubleClickZoom' => [
        'label' => $this->t('Double Click Zoom'),
        'description' => $this->t('Whether the map can be zoomed in by double clicking on it and zoomed out by double clicking while holding shift.'),
        'default' => TRUE,
      ],
      'zoomControl' => [
        'label' => $this->t('Zoom Control'),
        'description' => $this->t('Whether a zoom control is added to the map by default.'),
        'default' => TRUE,
      ],
      'attributionControl' => [
        'label' => $this->t('Attribution Control'),
        'description' => $this->t('Whether a attribution control is added to the map by default.'),
        'default' => TRUE,
      ],
      'trackResize' => [
        'label' => $this->t('Track Resize'),
        'description' => $this->t('Whether the map automatically handles browser window resize to update itself (useful when using full screen mode).'),
        'default' => TRUE,
      ],
      'fadeAnimation' => [
        'label' => $this->t('Fade Animation'),
        'description' => $this->t("Whether the tile fade animation is enabled. By default it's enabled in all browsers that support CSS3 Transitions except Android."),
        'default' => TRUE,
      ],
      'zoomAnimation' => [
        'label' => $this->t('Zoom Animation'),
        'description' => $this->t("Whether the map zoom animation is enabled. By default it's enabled in all browsers that support CSS3 Transitions except Android."),
        'default' => TRUE,
      ],
      'closePopupOnClick' => [
        'label' => $this->t('Close Popup on Click'),
        'description' => $this->t("Set it to false if you don't want popups to close when user clicks the map."),
        'default' => TRUE,
      ],
      'layerControl' => [
        'label' => $this->t('Layer Control'),
        'description' => $this->t('Display the layer switcher.'),
        'default' => TRUE,
      ],
    ];
  }

  /**
   * Sorting function so base layers are before overlays.
   *
   * @param array $a
   *   First item.
   * @param array $b
   *   Second item.
   *
   * @return int|\lt
   *   Returns integer.
   */
  public function sortByLayer(array $a, array $b) {
    return strcmp($a['layer_type'], $b['layer_type']);
  }

  /**
   * Sort the list by weight property.
   *
   * @param array $a
   *   First item.
   * @param array $b
   *   Second item.
   *
   * @return int
   *   Returns integer.
   */
  public function sortByWeight(array $a, array $b) {
    $a_weight = is_array($a) && isset($a['weight']) ? $a['weight'] : 0;
    $b_weight = is_array($b) && isset($b['weight']) ? $b['weight'] : 0;
    if ($a_weight == $b_weight) {
      return 0;
    }
    return $a_weight < $b_weight ? -1 : 1;
  }

}
