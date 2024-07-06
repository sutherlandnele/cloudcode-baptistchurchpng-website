<?php

namespace Drupal\geofield_map\Plugin\LeafletTileLayerPlugin;

use Drupal\geofield_map\LeafletTileLayerPluginBase;

/**
 * Provides an OpenMapSurfer_Roads Leaflet TileLayer Plugin.
 *
 * @LeafletTileLayerPlugin(
 *   id = "GoogleMaps_Roads",
 *   label = "GoogleMaps Roads",
 *   url = "https://mt{s}.googleapis.com/vt?x={x}&y={y}&z={z}'",
 *   options = {
 *     "maxZoom" = 20,
 *     "attribution" = "Map data &copy;
 * <a href='https://googlemaps.com'>Google</a>"
 *   }
 * )
 */
class GoogleMapsRoads extends LeafletTileLayerPluginBase {}
