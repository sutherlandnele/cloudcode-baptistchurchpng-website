<?php

namespace Drupal\leaflet_layers\Plugin\LeafletLayerType;

use Drupal\leaflet_layers\LayerTypePluginBase;
use Drupal\leaflet_layers\LayerTypeInterface;

/**
 * Defines a user info widget.
 *
 * @LayerType(
 *   id = "tilelayer",
 *   label = "TileLayer",
 * )
 */
class TileLayer extends LayerTypePluginBase implements LayerTypeInterface {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    return [
      'settings' => [
        'urlTemplate' => [
          '#type' => 'textfield',
          '#title' => t('URL Template'),
          '#maxlength' => 255,
          '#description' => t("Url for tiles, typically with x, y, and z parameters."),
          '#default_value' => '',
          '#weight' => -1,
        ],
        'attribution' => [
          '#type' => 'textfield',
          '#title' => t('Attribution'),
          '#description' => t("Most map layers require attribution."),
          '#default_value' => '',
          '#maxlength' => 255,
        ],
        'minZoom' => [
          '#type' => 'number',
          '#title' => t('Minimum zoom'),
          '#default_value' => 0,
        ],
        'maxZoom' => [
          '#type' => 'number',
          '#title' => t('Maximum zoom'),
          '#default_value' => 18,
        ],
        'opacity' => [
          '#type' => 'number',
          '#title' => t('Opacity'),
          '#default_value' => 1,
          '#step' => 0.1,
        ],
        'subdomains' => [
          '#type' => 'textfield',
          '#title' => t('Subdomains'),
          '#description' => t('Comma separated list of subdomains(e.g. "mt1, mt2, mt3").'),
          '#default_value' => '',
        ],
        'errorTileUrl' => [
          '#type' => 'textfield',
          '#title' => t('Error Tile URL'),
          '#default_value' => '',
        ],
        'zoomOffset' => [
          '#type' => 'number',
          '#title' => t('Zoom Offset'),
          '#default_value' => 0,
        ],
        'tms' => [
          '#type' => 'checkbox',
          '#title' => t('TMS'),
          '#default_value' => FALSE,
        ],
        'zoomReverse' => [
          '#type' => 'checkbox',
          '#title' => t('Reverse Zoom'),
          '#default_value' => FALSE,
        ],
        'detectRetina' => [
          '#type' => 'checkbox',
          '#title' => t('Detect Retina'),
          '#default_value' => FALSE,
        ],
      ],
    ];
  }

}
