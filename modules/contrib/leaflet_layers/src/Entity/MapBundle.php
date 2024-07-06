<?php

namespace Drupal\leaflet_layers\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Map bundle entity.
 *
 * @ConfigEntityType(
 *   id = "map_bundle",
 *   label = @Translation("Map bundle"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\leaflet_layers\MapBundleListBuilder",
 *     "form" = {
 *       "add" = "Drupal\leaflet_layers\Form\MapBundleForm",
 *       "edit" = "Drupal\leaflet_layers\Form\MapBundleForm",
 *       "delete" = "Drupal\leaflet_layers\Form\MapBundleDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\leaflet_layers\MapBundleHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "map_bundle",
 *   config_export = {
 *     "id",
 *     "label",
 *     "layers",
 *     "settings",
 *   },
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/leaflet_layers/map_bundle/{map_bundle}",
 *     "add-form" = "/admin/structure/leaflet_layers/map_bundle/add",
 *     "edit-form" = "/admin/structure/leaflet_layers/map_bundle/{map_bundle}/edit",
 *     "delete-form" = "/admin/structure/leaflet_layers/map_bundle/{map_bundle}/delete",
 *     "collection" = "/admin/structure/leaflet_layers/map_bundle"
 *   }
 * )
 */
class MapBundle extends ConfigEntityBase implements MapBundleInterface {

  /**
   * The Map bundle ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Map bundle label.
   *
   * @var string
   */
  protected $label;

  /**
   * The layers.
   *
   * @var array
   */
  protected $layers = [];

  /**
   * The overlay layers.
   *
   * @var array
   */
  protected $overlays = [];

  /**
   * Settings.
   *
   * @var array
   */
  protected $settings = [];

  /**
   * {@inheritdoc}
   */
  public function getLayers() {
    return $this->layers;
  }

  /**
   * Remove inactive layers and fix sorting.
   */
  public function removeInactiveLayers() {
    $this->prepareLayerGroup($this->layers);
    if (is_array($this->overlays)) {
      $this->prepareLayerGroup($this->overlays, TRUE);
    }
    unset($this->overlays);
  }

  /**
   * Sort correctly and remove non-enabled layers.
   *
   * @param array $layers
   *   List of layer objects.
   * @param bool $overlay
   *   Special handling for overlays.
   */
  public function prepareLayerGroup(array $layers, bool $overlay = FALSE) {
    // Normalize weights to keep active items on top.
    $start_weight = 0 - count(array_filter($layers, function ($item) {
      return $item['enabled'];
    }));

    uasort($layers, function ($a, $b) {
      if ($a['weight'] == $b['weight']) {
        return 0;
      }
      return ($a['weight'] < $b['weight']) ? -1 : 1;
    });

    foreach ($layers as $key => $layer) {
      if (!$layer['enabled']) {
        if ($overlay) {
          unset($this->overlays[$key]);
        }
        else {
          unset($this->layers[$key]);
        }
        continue;
      }

      $this->layers[$key]['id'] = $key;
      $this->layers[$key]['label'] = $layer['label_wrapper']['custom_label'];
      $this->layers[$key]['module'] = $layer['label_wrapper']['data']['module'];
      $this->layers[$key]['layer_id'] = $layer['label_wrapper']['data']['key'];
      $this->layers[$key]['map_bundle'] = $layer['label_wrapper']['data']['map_bundle'];
      $this->layers[$key]['enabled'] = TRUE;
      $this->layers[$key]['on_by_default'] = $layer['on_by_default'] ?? TRUE;
      $this->layers[$key]['weight'] = $start_weight;
      $start_weight += 1;

      if (!$overlay) {
        unset($this->layers[$key]['label_wrapper']);
      }
    }
  }

  /**
   * Return a single setting or default.
   */
  public function getSetting($key, $default = '') {
    if (isset($this->settings[$key])) {
      return $this->settings[$key];
    }
    return $default;
  }

  /**
   * Return all settings.
   */
  public function getSettings() {
    $settings = [];

    foreach ($this->settings as $key => $setting) {
      $settings[$key] = $setting ? TRUE : FALSE;
    }

    return $settings;
  }

}
