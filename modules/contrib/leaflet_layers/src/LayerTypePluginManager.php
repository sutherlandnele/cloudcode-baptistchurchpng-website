<?php

namespace Drupal\leaflet_layers;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Defines the queue worker manager.
 *
 * @see \Drupal\Core\Queue\QueueWorkerInterface
 * @see \Drupal\Core\Queue\QueueWorkerBase
 * @see \Drupal\Core\Annotation\QueueWorker
 * @see plugin_api
 */
class LayerTypePluginManager extends DefaultPluginManager {

  /**
   * Constructs a QueueWorkerManager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/LeafletLayerType', $namespaces, $module_handler, 'Drupal\leaflet_layers\LayerTypeInterface', 'Drupal\leaflet_layers\Annotation\LayerType');

    $this->setCacheBackend($cache_backend, 'leaflet_layers_layer_type');
    $this->alterInfo('leaflet_layers_layer_type');
  }

}
