<?php

namespace Drupal\leaflet_layers;

use Drupal\Component\Plugin\PluginBase;

/**
 * A base class for layer types.
 *
 * @see \Drupal\leaflet_layers\Annotation\LayerType
 * @see \Drupal\leaflet_layers\LayerTypeInterface
 */
abstract class LayerTypePluginBase extends PluginBase implements LayerTypeInterface {
}
