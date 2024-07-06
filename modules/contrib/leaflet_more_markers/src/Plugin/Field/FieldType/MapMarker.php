<?php

namespace Drupal\leaflet_more_markers\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the MapMarker field type.
 *
 * @FieldType(
 *   id = "map_marker",
 *   label = @Translation("Map marker"),
 *   description = @Translation("Stores map marker icon and attributes."),
 *   default_widget = "map_marker_widget",
 *   default_formatter = "map_marker_formatter"
 * )
 */
class MapMarker extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field) {
    return [
      // 'columns' contains the values that the field will store.
      'columns' => [
        // Typically a Unicode character or an emoji.
        'icon' => [
          'type' => 'text',
          'size' => 'tiny',
          'not null' => FALSE,
        ],
        'classes' => [
          'type' => 'text',
          'size' => 'tiny',
          'not null' => FALSE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    return [
      'icon' => DataDefinition::create('string')->setLabel(t('Emoji or Unicode(s)')),
      'classes' => DataDefinition::create('string')->setLabel(t('CSS classes')),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $icon = $this->get('icon')->getValue();
    $classes = $this->get('classes')->getValue();
    return ($icon === NULL || $icon === '') && ($classes === NULL || $classes === '');
  }

}
