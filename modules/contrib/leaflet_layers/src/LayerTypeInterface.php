<?php

namespace Drupal\leaflet_layers;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for a layer type plugin.
 *
 * @see \Drupal\Core\Queue\QueueWorkerBase
 * @see \Drupal\Core\Queue\QueueWorkerManager
 * @see \Drupal\Core\Annotation\QueueWorker
 * @see plugin_api
 */
interface LayerTypeInterface extends PluginInspectionInterface {

  /**
   * Return layer type info.
   */
  public function getInfo();

}
