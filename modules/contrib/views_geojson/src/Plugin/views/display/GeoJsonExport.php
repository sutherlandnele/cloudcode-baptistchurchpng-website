<?php

namespace Drupal\views_geojson\Plugin\views\display;

use Drupal\rest\Plugin\views\display\RestExport;

/**
 * The plugin that handles Data response callbacks for GeoJSON REST resources.
 *
 * @ingroup views_display_plugins
 *
 * @ViewsDisplay(
 *   id = "geojson_export",
 *   title = @Translation("GeoJSON export"),
 *   help = @Translation("Create a GeoJSON export resource."),
 *   uses_route = TRUE,
 *   admin = @Translation("GeoJSON export"),
 *   returns_response = TRUE
 * )
 */
class GeoJsonExport extends RestExport {

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    // Set the default style plugin to 'geojson'.
    $options['style']['contains']['type']['default'] = 'geojson';
    $options['row']['contains']['type']['default'] = 'data_field';

    return $options;
  }

}
