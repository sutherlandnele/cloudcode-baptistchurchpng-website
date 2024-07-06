<?php

namespace Drupal\leaflet;

use Drupal\Component\Serialization\Json;
use Drupal\Component\Utility\Html;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\File\FileUrlGeneratorInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\StreamWrapper\StreamWrapperManagerInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Url;
use Drupal\Core\Utility\LinkGeneratorInterface;
use Drupal\geofield\GeoPHP\GeoPHPInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Provides a  LeafletService class.
 */
class LeafletService {

  use StringTranslationTrait;

  /**
   * Current user service.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * The geoPhpWrapper service.
   *
   * @var \Drupal\geofield\GeoPHP\GeoPHPInterface
   */
  protected $geoPhpWrapper;

  /**
   * The module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * The Link generator Service.
   *
   * @var \Drupal\Core\Utility\LinkGeneratorInterface
   */
  protected $link;

  /**
   * The stream wrapper manager.
   *
   * @var \Drupal\Core\StreamWrapper\StreamWrapperManagerInterface
   */
  protected $streamWrapperManager;

  /**
   * The request stack.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * The cache backend default service.
   *
   * @var \Drupal\Core\Cache\CacheBackendInterface
   */
  protected $cache;

  /**
   * Static cache for icon sizes.
   *
   * @var array
   */
  protected $iconSizes = [];

  /**
   * The file URL generator.
   *
   * @var \Drupal\Core\File\FileUrlGeneratorInterface
   */
  protected $fileUrlGenerator;

  /**
   * LeafletService constructor.
   *
   * @param \Drupal\Core\Session\AccountInterface $current_user
   *   Current user service.
   * @param \Drupal\geofield\GeoPHP\GeoPHPInterface $geophp_wrapper
   *   The geoPhpWrapper.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   * @param \Drupal\Core\Utility\LinkGeneratorInterface $link_generator
   *   The Link Generator service.
   * @param \Drupal\Core\StreamWrapper\StreamWrapperManagerInterface $stream_wrapper_manager
   *   The stream wrapper manager.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The stream wrapper manager.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache
   *   The cache backend default service.
   * @param \Drupal\Core\File\FileUrlGeneratorInterface $file_url_generator
   *   The file URL generator.
   */
  public function __construct(
    AccountInterface $current_user,
    GeoPHPInterface $geophp_wrapper,
    ModuleHandlerInterface $module_handler,
    LinkGeneratorInterface $link_generator,
    StreamWrapperManagerInterface $stream_wrapper_manager,
    RequestStack $request_stack,
    CacheBackendInterface $cache,
    FileUrlGeneratorInterface $file_url_generator
  ) {
    $this->currentUser = $current_user;
    $this->geoPhpWrapper = $geophp_wrapper;
    $this->moduleHandler = $module_handler;
    $this->link = $link_generator;
    $this->streamWrapperManager = $stream_wrapper_manager;
    $this->requestStack = $request_stack;
    $this->cache = $cache;
    $this->fileUrlGenerator = $file_url_generator;
  }

  /**
   * Load all Leaflet required client files and return markup for a map.
   *
   * @param array $map
   *   The map settings array.
   * @param array $features
   *   The features array.
   * @param string $height
   *   The height value string.
   *
   * @return array
   *   The leaflet_map render array.
   */
  public function leafletRenderMap(array $map, array $features = [], $height = '400px') {
    $map_id = $map['id'] ?? Html::getUniqueId('leaflet_map');

    $attached_libraries = ['leaflet/general', 'leaflet/leaflet-drupal'];

    // Check for the definition of a vector type layer
    // and eventually add MapLibre GL Leaflet library.
    $map_layers = $map["layers"] ?? [];
    foreach ($map_layers as $layer) {
      if (isset($layer["type"]) &&  $layer["type"] === 'vector') {
        $attached_libraries[] = 'leaflet/maplibre-gl-leaflet';
        break;
      }
    }

    // Add the intersection_observer library, if lazy load is enabled.
    if (isset($map['settings']['map_lazy_load']) && $map['settings']['map_lazy_load']['lazy_load']) {
      $attached_libraries[] = 'leaflet/intersection_observer';
    }

    // Add the Leaflet Reset View library, if requested.
    if (isset($map['settings']['reset_map']) && $map['settings']['reset_map']['control']) {
      $attached_libraries[] = 'leaflet/leaflet.reset_map_view';
    }

    // Add the Leaflet Locate library, if requested.
    if (isset($map['settings']['locate']) && !empty($map['settings']['locate']['control'])) {
      $attached_libraries[] = 'leaflet/leaflet.locatecontrol';
    }

    // Add the Leaflet Geocoder library and functionalities, if requested,
    // and the user has access to Geocoder Api Enpoints.
    if (!empty($map['settings']['geocoder']['control'])) {
      $this->setGeocoderControlSettings($map['settings']['geocoder'], $attached_libraries);
    }

    // Add the Leaflet Fullscreen library, if requested.
    if (isset($map['settings']['fullscreen']) && $map['settings']['fullscreen']['control']) {
      $attached_libraries[] = 'leaflet/leaflet.fullscreen';
    }

    // Add the Leaflet Gesture Handling library, if requested.
    if (!empty($map['settings']['gestureHandling'])) {
      $attached_libraries[] = 'leaflet/leaflet.gesture_handling';
    }

    // Add the Leaflet Markercluster library and functionalities, if requested.
    if ($this->moduleHandler->moduleExists('leaflet_markercluster') && isset($map['settings']['leaflet_markercluster']) && $map['settings']['leaflet_markercluster']['control']) {
      $attached_libraries[] = 'leaflet_markercluster/leaflet-markercluster';
      $attached_libraries[] = 'leaflet_markercluster/leaflet-markercluster-drupal';
    }

    $settings[$map_id] = [
      'mapid' => $map_id,
      'map' => $map,
      // JS only works with arrays, make sure we have one with numeric keys.
      'features' => array_values($features),
    ];
    return [
      '#theme' => 'leaflet_map',
      '#map_id' => $map_id,
      '#height' => $height,
      '#map' => $map,
      '#attached' => [
        'library' => $attached_libraries,
        'drupalSettings' => [
          'leaflet' => $settings,
        ],
      ],
    ];
  }

  /**
   * Get all available Leaflet map definitions.
   *
   * @param string $map
   *   The specific map definition string.
   *
   * @return array
   *   The leaflet maps definition array.
   */
  public function leafletMapGetInfo($map = NULL) {
    static $drupal_static_fast;
    if (!isset($drupal_static_fast)) {
      $drupal_static_fast['leaflet_map_info'] = &drupal_static(__FUNCTION__);
    }
    $map_info = &$drupal_static_fast['leaflet_map_info'];

    if (empty($map_info)) {
      if ($cached = $this->cache->get('leaflet_map_info')) {
        $map_info = $cached->data;
      }
      else {
        $map_info = $this->moduleHandler->invokeAll('leaflet_map_info');

        // Let other modules alter the map info.
        $this->moduleHandler->alter('leaflet_map_info', $map_info);

        $this->cache->set('leaflet_map_info', $map_info);
      }
    }

    if (empty($map)) {
      return $map_info;
    }
    else {
      return $map_info[$map] ?? [];
    }

  }

  /**
   * Convert a geofield into an array of map points.
   *
   * The map points can then be fed into $this->leafletRenderMap().
   *
   * @param mixed $items
   *   A single value or array of geo values, each as a string in any of the
   *   supported formats or as an array of $item elements, each with an
   *   $item['wkt'] field.
   *
   * @return array
   *   The return array.
   */
  public function leafletProcessGeofield($items = []) {

    if (!is_array($items)) {
      $items = [$items];
    }
    $data = [];
    foreach ($items as $item) {
      // Auto-detect and parse the format (e.g. WKT, JSON etc.).
      /** @var \GeometryCollection $geom */
      if (!($geom = $this->geoPhpWrapper->load($item['wkt'] ?? $item))) {
        continue;
      }
      $data[] = $this->leafletProcessGeometry($geom);

    }
    return $data;
  }

  /**
   * Process the Geometry Collection.
   *
   * @param \Geometry $geom
   *   The Geometry Collection.
   *
   * @return array
   *   The return array.
   */
  private function leafletProcessGeometry(\Geometry $geom) {
    $datum = ['type' => strtolower($geom->geometryType())];

    switch ($datum['type']) {
      case 'point':
        $datum = [
          'type' => 'point',
          'lat' => $geom->getY(),
          'lon' => $geom->getX(),
        ];
        break;

      case 'linestring':
        /** @var \GeometryCollection $geom */
        $components = $geom->getComponents();
        /** @var \Geometry $component */
        foreach ($components as $component) {
          $datum['points'][] = [
            'lat' => $component->getY(),
            'lon' => $component->getX(),
          ];
        }
        break;

      case 'polygon':
        /** @var \GeometryCollection $geom */
        $tmp = $geom->getComponents();
        /** @var \GeometryCollection $geom */
        $geom = $tmp[0];
        $components = $geom->getComponents();
        /** @var \Geometry $component */
        foreach ($components as $component) {
          $datum['points'][] = [
            'lat' => $component->getY(),
            'lon' => $component->getX(),
          ];
        }
        break;

      case 'multipolyline':
      case 'multilinestring':
        if ($datum['type'] == 'multilinestring') {
          $datum['type'] = 'multipolyline';
          $datum['multipolyline'] = TRUE;
        }
        /** @var \GeometryCollection $geom */
        $components = $geom->getComponents();
        /** @var \GeometryCollection $component */
        foreach ($components as $key => $component) {
          $subcomponents = $component->getComponents();
          /** @var \Geometry $subcomponent */
          foreach ($subcomponents as $subcomponent) {
            $datum['component'][$key]['points'][] = [
              'lat' => $subcomponent->getY(),
              'lon' => $subcomponent->getX(),
            ];
          }
          unset($subcomponent);
        }
        break;

      case 'multipolygon':
        $components = [];
        /** @var \GeometryCollection $geom */
        $tmp = $geom->getComponents();
        /** @var \GeometryCollection $polygon */
        foreach ($tmp as $polygon) {
          $polygon_component = $polygon->getComponents();
          foreach ($polygon_component as $linestring) {
            $components[] = $linestring;
          }
        }
        foreach ($components as $key => $component) {
          $subcomponents = $component->getComponents();
          /** @var \Geometry $subcomponent */
          foreach ($subcomponents as $subcomponent) {
            $datum['component'][$key]['points'][] = [
              'lat' => $subcomponent->getY(),
              'lon' => $subcomponent->getX(),
            ];
          }
        }
        break;

      case 'geometrycollection':
      case 'multipoint':
        /** @var \GeometryCollection $geom */
        $components = $geom->getComponents();
        foreach ($components as $key => $component) {
          $datum['component'][$key] = $this->leafletProcessGeometry($component);
        }
        break;

    }
    return $datum;
  }

  /**
   * Leaflet Icon Documentation Link.
   *
   * @return \Drupal\Core\GeneratedLink
   *   The Leaflet Icon Documentation Link.
   */
  public function leafletIconDocumentationLink() {
    return $this->link->generate($this->t('Leaflet Icon Documentation'), Url::fromUri('https://leafletjs.com/reference.html#icon', [
      'absolute' => TRUE,
      'attributes' => ['target' => 'blank'],
    ]));
  }

  /**
   * Set Feature Icon Size & Shadow Size If Empty or Invalid.
   *
   * @param array $feature
   *   The feature.
   */
  public function setFeatureIconSizesIfEmptyOrInvalid(array &$feature) {
    $icon_url = $feature["icon"]["iconUrl"] ?? NULL;
    if (!empty($icon_url) && isset($feature["icon"]["iconSize"])
      && (intval($feature["icon"]["iconSize"]["x"]) === 0 || intval($feature["icon"]["iconSize"]["y"]) === 0)) {

      $icon_url = $this->generateAbsoluteString($icon_url);

      // Use the cached IconSize if present for this Icon Url.
      $leaflet_iconsize_cache = &drupal_static("leaflet_iconsize_cache:$icon_url");
      if (is_array($leaflet_iconsize_cache) && array_key_exists('x', $leaflet_iconsize_cache) && array_key_exists('y', $leaflet_iconsize_cache)) {
        $feature["icon"]["iconSize"]["x"] = $leaflet_iconsize_cache['x'];
        $feature["icon"]["iconSize"]["y"] = $leaflet_iconsize_cache['y'];
      }
      elseif ($this->fileExists($icon_url)) {
        $file_parts = pathinfo($icon_url);
        switch ($file_parts['extension']) {
          case "svg":
            $xml = simplexml_load_file($icon_url);
            $attr = $xml ? $xml->attributes() : NULL;
            $icon_size_x = !is_null($attr) && !empty($attr->width) ? intval($attr->width->__toString()) : 40;
            $icon_size_y = !is_null($attr) && !empty($attr->height) ? intval($attr->height->__toString()) : 40;
            if (empty($feature["icon"]["iconSize"]["x"]) && !empty($feature["icon"]["iconSize"]["y"])) {
              $feature["icon"]["iconSize"]["x"] = intval($feature["icon"]["iconSize"]["y"]) * $icon_size_x / $icon_size_y;
            }
            elseif (!empty($feature["icon"]["iconSize"]["x"]) && empty($feature["icon"]["iconSize"]["y"])) {
              $feature["icon"]["iconSize"]["y"] = intval($feature["icon"]["iconSize"]["x"]) * $icon_size_y / $icon_size_x;
            }
            else {
              $feature["icon"]["iconSize"]["x"] = $icon_size_x;
              $feature["icon"]["iconSize"]["y"] = $icon_size_y;
            }
            break;

          default:
            if ($iconSize = getimagesize($icon_url)) {
              if (empty($feature["icon"]["iconSize"]["x"])  && !empty($feature["icon"]["iconSize"]["y"])) {
                $feature["icon"]["iconSize"]["x"] = intval($feature["icon"]["iconSize"]["y"]) * $iconSize[0] / $iconSize[1];
              }
              elseif (!empty($feature["icon"]["iconSize"]["x"])  && empty($feature["icon"]["iconSize"]["y"])) {
                $feature["icon"]["iconSize"]["y"] = intval($feature["icon"]["iconSize"]["x"]) * $iconSize[1] / $iconSize[0];
              }
              else {
                $feature["icon"]["iconSize"]["x"] = $iconSize[0];
                $feature["icon"]["iconSize"]["y"] = $iconSize[1];
              }
            }
        }
        // Cache the Leaflet IconSize, so we don't fetch the same icon multiple
        // times.
        $leaflet_iconsize_cache = $feature["icon"]["iconSize"];
      }
    }

    $shadow_url = $feature["icon"]["shadowUrl"] ?? NULL;
    if (!empty($shadow_url) && isset($feature["icon"]["shadowSize"])
      && (empty(intval($feature["icon"]["shadowSize"]["x"])) || empty(intval($feature["icon"]["shadowSize"]["y"])))) {

      $shadow_url = $this->generateAbsoluteString($shadow_url);

      // Use the cached ShadowSize if present for this Shadow Url.
      $leaflet_shadowsize_cache = &drupal_static("leaflet_shadowsize_cache:$icon_url", NULL);
      if (is_array($leaflet_shadowsize_cache) && array_key_exists('x', $leaflet_shadowsize_cache) && array_key_exists('y', $leaflet_shadowsize_cache)) {
        $feature["icon"]["iconSize"]["x"] = $leaflet_shadowsize_cache['x'];
        $feature["icon"]["iconSize"]["y"] = $leaflet_shadowsize_cache['y'];
      }
      elseif ($this->fileExists($shadow_url)) {
        $file_parts = pathinfo($shadow_url);
        switch ($file_parts['extension']) {
          case "svg":
            $xml = simplexml_load_file($icon_url);
            $attr = $xml ? $xml->attributes() : NULL;
            $shadow_size_x = !is_null($attr) && !empty($attr->width) ? intval($attr->width->__toString()) : 40;
            $shadow_size_y = !is_null($attr) && !empty($attr->height) ? intval($attr->height->__toString()) : 40;
            if (empty($feature["icon"]["shadowSize"]["x"]) && !empty($feature["icon"]["shadowSize"]["y"])) {
              $feature["icon"]["shadowSize"]["x"] = intval($feature["icon"]["shadowSize"]["y"]) * $shadow_size_x / $shadow_size_y;
            }
            elseif (!empty($feature["icon"]["shadowSize"]["x"]) && empty($feature["icon"]["shadowSize"]["y"])) {
              $feature["icon"]["shadowSize"]["y"] = intval($feature["icon"]["shadowSize"]["x"]) * $shadow_size_y / $shadow_size_x;
            }
            else {
              $feature["icon"]["shadowSize"]["x"] = $shadow_size_x;
              $feature["icon"]["shadowSize"]["y"] = $shadow_size_y;
            }
            break;

          default:
            if ($shadowSize = getimagesize($shadow_url)) {
              if (empty($feature["icon"]["shadowSize"]["x"]) && !empty($feature["icon"]["shadowSize"]["y"])) {
                $feature["icon"]["shadowSize"]["x"] = intval($feature["icon"]["shadowSize"]["y"]) * $shadowSize[0] / $shadowSize[1];
              }
              elseif (!empty($feature["icon"]["shadowSize"]["x"]) && empty($feature["icon"]["shadowSize"]["y"])) {
                $feature["icon"]["shadowSize"]["y"] = intval($feature["icon"]["shadowSize"]["x"]) * $shadowSize[1] / $shadowSize[0];
              }
              else {
                $feature["icon"]["shadowSize"]["x"] = $shadowSize[0];
                $feature["icon"]["shadowSize"]["y"] = $shadowSize[1];
              }
            }
        }
        // Cache the Shadow IconSize, so we don't fetch the same icon multiple
        // times.
        $leaflet_shadowsize_cache = $feature["icon"]["shadowSize"];
      }
    }
  }

  /**
   * Check if a file exists.
   *
   * @param string $fileUrl
   *   The file url.
   *
   * @see https://stackoverflow.com/questions/10444059/file-exists-returns-false-even-if-file-exist-remote-url
   *
   * @return bool
   *   The bool result.
   */
  public function fileExists($fileUrl) {
    $file_headers = @get_headers($fileUrl);
    if (isset($file_headers) && !empty($file_headers[0])
      && (stripos($file_headers[0], "404 Not Found") == 0)
      && (stripos($file_headers[0], "403 Forbidden") == 0)
      && (stripos($file_headers[0], "302 Found") == 0 && !empty($file_headers[7]) && stripos($file_headers[7], "404 Not Found") == 0)) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * Check if an array has all values empty.
   *
   * @param array $array
   *   The array to check.
   *
   * @return bool
   *   The bool result.
   */
  public function multipleEmpty(array $array) {
    foreach ($array as $value) {
      if (empty($value)) {
        continue;
      }
      else {
        return FALSE;
      }
    }
    return TRUE;
  }

  /**
   * Set Geocoder Controls Settings.
   *
   * @param array $geocoder_settings
   *   The geocoder settings.
   * @param array $attached_libraries
   *   The attached libraries.
   */
  public function setGeocoderControlSettings(array &$geocoder_settings, array &$attached_libraries): void {
    if ($this->moduleHandler->moduleExists('geocoder')
      && class_exists('\Drupal\geocoder\Controller\GeocoderApiEnpoints')
      && $geocoder_settings['control']
      && $this->currentUser->hasPermission('access geocoder api endpoints')) {
      $attached_libraries[] = 'leaflet/leaflet.geocoder';

      // Set the geocoder settings ['providers'] as the enabled ones.
      $enabled_providers = [];
      foreach ($geocoder_settings['settings']['providers'] as $plugin_id => $plugin) {
        if (!empty($plugin['checked'])) {
          $enabled_providers[] = $plugin_id;
        }
      }
      $geocoder_settings['settings']['providers'] = $enabled_providers;
      $geocoder_settings['settings']['options'] = [
        'options' => Json::decode($geocoder_settings['settings']['options']) ?? '',
      ];
    }
  }

  /**
   * Creates an absolute web-accessible URL string.
   *
   * This is a wrapper to the Drupal Core (9.3+) FileUrlGeneratorInterface
   * generateAbsoluteString method.
   *
   * @param string $uri
   *   The URI to a file for which we need an external URL, or the path to a
   *   shipped file.
   *
   * @return string
   *   An absolute string containing a URL that may be used to access the
   *   file.
   *
   * @throws \Drupal\Core\File\Exception\InvalidStreamWrapperException
   *   If a stream wrapper could not be found to generate an external URL.
   */
  public function generateAbsoluteString(string $uri): string {
    return $this->fileUrlGenerator->generateAbsoluteString($uri);
  }

}
