<?php

namespace Drupal\leaflet_layers\Plugin\LeafletLayerType;

use Drupal\leaflet_layers\LayerTypeInterface;

/**
 * Defines a user info widget.
 *
 * @LayerType(
 *   id = "wms",
 *   label = "WMS",
 * )
 */
class Wms extends TileLayer implements LayerTypeInterface {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    $parent_fields = parent::getInfo();

    $data = [
      'settings' => [
        'layers' => [
          '#type' => 'textfield',
          '#title' => t('Layers'),
          '#description' => t("Comma-separated list of WMS layers to show."),
          '#default_value' => '',
        ],
        'styles' => [
          '#type' => 'textfield',
          '#title' => t('Styles'),
          '#description' => t("Comma-separated list of WMS styles."),
          '#default_value' => '',
        ],
        'format' => [
          '#type' => 'textfield',
          '#title' => t('Format'),
          '#description' => t("WMS image format (use 'image/png' for layers with transparency)"),
          '#default_value' => 'image/jpeg',
        ],
        'transparent' => [
          '#type' => 'checkbox',
          '#title' => t('Transparent'),
          '#description' => t("If true, the WMS service will return images with transparency."),
          '#default_value' => FALSE,
        ],
        'version' => [
          '#type' => 'textfield',
          '#title' => t('Version'),
          '#description' => t('Version of the WMS service to use.'),
          '#default_value' => '1.1.1',
        ],
        'uppercase' => [
          '#type' => 'checkbox',
          '#title' => t('Uppercase'),
          '#description' => t('If true, WMS request parameter keys will be uppercase.'),
          '#default_value' => FALSE,
        ],
      ],
    ];

    $data['settings'] += $parent_fields['settings'];

    $data['settings']['urlTemplate']['#description'] = t('WMS Url.');

    return $data;
  }

}
