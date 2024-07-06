<?php

/**
 * @file
 * Hooks related to views_geojson module.
 */

use Drupal\views\ViewExecutable;

/**
 * @addtogroup hooks
 * @{
 */

/**
 * Alter geojson view render array immediately before rendering.
 *
 * @param array $features
 *   The array of features.
 * @param \Drupal\views\ViewExecutable $view
 *   The current view.
 */
function hook_geojson_view_alter(array &$features, ViewExecutable $view) {

}

/**
 * @} End of "addtogroup hooks".
 */
