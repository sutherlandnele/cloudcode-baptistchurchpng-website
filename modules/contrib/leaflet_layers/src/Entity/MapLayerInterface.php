<?php

namespace Drupal\leaflet_layers\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface for defining Map layer entities.
 */
interface MapLayerInterface extends ConfigEntityInterface {

  /**
   * Gets the description.
   *
   * @return string
   *   The description.
   */
  public function getDescription();

  /**
   * Gets the map url.
   *
   * @return string
   *   The url template.
   */
  public function getUrlTemplate();

  /**
   * Get the attribution value.
   *
   * @return mixed
   *   Get the attribution value.
   */
  public function getAttribution();

  /**
   * Get a settings field.
   *
   * @param string $key
   *   A settings key.
   * @param string $default
   *   The default value.
   *
   * @return mixed
   *   Return a setting or a provided default value.
   */
  public function getSetting($key, $default);

  /**
   * Return all settings.
   *
   * @return array
   *   Return all settings.
   */
  public function getSettings();

}
