<?php

namespace Drupal\leaflet_layers\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Declare a layer type.
 *
 * Plugin Namespace: Plugin\LeafletLayerType.
 *
 * @see plugin_api
 *
 * @Annotation
 */
class LayerType extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The plugin label.
   *
   * @var string
   */
  public $label;

}
