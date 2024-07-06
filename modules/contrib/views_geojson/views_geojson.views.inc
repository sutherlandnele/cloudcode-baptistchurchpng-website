<?php

/**
 * @file
 * Views plugin definition.
 */

declare(strict_types = 1);

/**
 * Implements hook_views_data().
 *
 * Adds bounding box contextual filter.
 */
function views_geojson_views_data() {
  $data = [];

  $data['views']['views_geojson_bbox_argument'] = [
    'group' => t('Views GeoJSON'),
    'real field' => 'bbox_argument',
    'title' => t('Bounding box'),
    'help' => t('Limit the results to those within a geospatial bounding box. Can be used in conjunction with Leaflet.'),
    'argument' => [
      'id' => 'views_geojson_bbox_argument',
      'label' => t('Bounding box'),
      'empty field name' => '- No value -',
    ],
  ];

  return $data;
}
