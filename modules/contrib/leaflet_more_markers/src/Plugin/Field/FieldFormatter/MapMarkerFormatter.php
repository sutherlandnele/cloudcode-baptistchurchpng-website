<?php

namespace Drupal\leaflet_more_markers\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the Map Marker formatter.
 *
 * @FieldFormatter(
 *   id = "map_marker_formatter",
 *   label = @Translation("Map marker"),
 *   field_types = {
 *     "map_marker"
 *   }
 * )
 */
class MapMarkerFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary[] = $this->t('Icon/emoji and CSS classes.');
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    foreach ($items as $delta => $item) {
      $icon = $this->t('<strong>Icon:</strong> @icon', ['@icon' => $item->icon]);
      $classes = $this->t('<strong>Classes:</strong> @classes', ['@classes' => $item->classes]);
      $elements[$delta] = ['#markup' => "$icon $classes"];
    }
    return $elements;
  }

}
