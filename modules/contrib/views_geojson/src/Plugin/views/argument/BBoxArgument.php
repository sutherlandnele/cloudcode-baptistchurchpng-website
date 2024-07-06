<?php

namespace Drupal\views_geojson\Plugin\views\argument;

use Drupal\views\Plugin\views\join\JoinPluginBase;
use Drupal\views\Plugin\views\argument\StringArgument;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Argument handler for Bounding Boxes.
 *
 * @ingroup views_argument_handlers
 *
 * @ViewsArgument("views_geojson_bbox_argument")
 */
class BBoxArgument extends StringArgument implements ContainerFactoryPluginInterface {

  /**
   * @TODO: Is this correct?
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['round_coordinates'] = ['default' => TRUE];

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    unset($form['case']);
    unset($form['path_case']);
    $form['description']['#markup'] .= $this->t('<br><strong>The format should be: <em>"left,bottom,right,top"</em></strong>.');
    $form['round_coordinates'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Round coordinates'),
      '#default_value' => $this->options['title'],
      '#description' => $this->t('Round coordinates to two decimal places. This can help in caching bounding box queries. For instance, "-0.542,51.344,-0.367,51.368" and "-0.541,51.343,-0.368,51.369" would use the same SQL query.'),
    ];
  }

  /**
   * {@inheritdoc}
   *
   * If we've been passed a bounding box, it's parsable, and the view style
   * has a geofield, then we work out which fields to add to the query and add a
   * where clause.
   */
  public function query($group_by = FALSE) {

    if ($bbox = $this->getParsedBoundingBox()) {
      $geojson_options = $this->view->getStyle()->options;

      $geofield_type = NULL;
      $geofield_name = NULL;
      if (!empty($geojson_options['data_source']['value'])) {
        $geofield_type = $geojson_options['data_source']['value'];
        if (!empty($geojson_options['data_source'][$geofield_type])) {
          $geofield_name = $geojson_options['data_source'][$geofield_type];
        }
      }

      if (empty($geofield_type) || empty($geofield_name)) {
        return;
      }

      // @todo - get geo_table from field definition?
      $geo_table = "node__{$geofield_name}";

      if ($geofield_type == 'geolocation') {
        $geo_table_entity_id_field = 'entity_id';
        $field_lat = "{$geo_table}.field_geolocation_lat";
        $field_lng = "{$geo_table}.field_geolocation_lng";
      }
      elseif ($geofield_type == 'geofield') {
        $geo_table_entity_id_field = 'entity_id';
        $field_lat = "{$geo_table}.{$geofield_name}_lat";
        $field_lng = "{$geo_table}.{$geofield_name}_lon";
      }

      if (!empty($geo_table)) {
        $this->query->ensureTable($geo_table, NULL, new JoinPluginBase([
          'table' => $geo_table,
          'field' => $geo_table_entity_id_field,
          'left_table' => 'node_field_data',
          'left_field' => 'nid',
        ],
          NULL, NULL));
      }

      $this->query->addWhere('bbox', $field_lat, $bbox['bottom'], '>=');
      $this->query->addWhere('bbox', $field_lat, $bbox['top'], '<=');
      $this->query->addWhere('bbox', $field_lng, $bbox['left'], '>=');
      $this->query->addWhere('bbox', $field_lng, $bbox['right'], '<=');
    }
  }

  /**
   * Parses the bounding box argument.
   *
   * Parses the bounding box argument. Returns an array keyed 'top', 'left',
   * 'bottom', 'right' or FALSE if the argument was not parsed succesfully.
   *
   * @return array|bool
   *   The calculated values.
   */
  public function getParsedBoundingBox() {
    static $values;

    if (!isset($values)) {
      $exploded_values = explode(',', $this->getValue());
      if (count($exploded_values) == 4) {
        $values['left'] = (float) $exploded_values[0];
        $values['bottom'] = (float) $exploded_values[1];
        $values['right'] = (float) $exploded_values[2];
        $values['top'] = (float) $exploded_values[3];

        if ($this->options['round_coordinates']) {
          $values['left'] -= 0.005;
          $values['bottom'] -= 0.005;
          $values['right'] += 0.005;
          $values['top'] += 0.005;
          foreach ($values as $k => $v) {
            $values[$k] = round($values[$k], 2);
          }
        }

      }
      else {
        $values = FALSE;
      }
    }
    return $values;
  }

}
