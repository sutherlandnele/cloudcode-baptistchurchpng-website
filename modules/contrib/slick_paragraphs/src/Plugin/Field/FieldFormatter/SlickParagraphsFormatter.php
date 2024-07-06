<?php

namespace Drupal\slick_paragraphs\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\slick\Plugin\Field\FieldFormatter\SlickMediaFormatter;

/**
 * Plugin implementation of the 'Slick Paragraphs Media' formatter.
 *
 * @FieldFormatter(
 *   id = "slick_paragraphs_media",
 *   label = @Translation("Slick Paragraphs Media"),
 *   description = @Translation("Display the rich paragraph as a Slick Carousel."),
 *   field_types = {
 *     "entity_reference_revisions"
 *   },
 *   quickedit = {
 *     "editor" = "disabled"
 *   }
 * )
 */
class SlickParagraphsFormatter extends SlickMediaFormatter {

  /**
   * {@inheritdoc}
   */
  protected function getPluginScopes(): array {
    $target_type = $this->getFieldSetting('target_type');
    $media       = $this->getFieldOptions(['entity_reference'], $target_type, 'media', FALSE);
    $stages      = ['image', 'entity_reference'];
    $stages      = $this->getFieldOptions($stages, $target_type);

    return [
      'images'   => $stages,
      'overlays' => $stages + $media,
    ] + parent::getPluginScopes();
  }

  /**
   * {@inheritdoc}
   */
  public static function isApplicable(FieldDefinitionInterface $field_definition) {
    $storage = $field_definition->getFieldStorageDefinition();

    // Excludes host, prevents complication with multiple nested paragraphs.
    $paragraph = $storage->getTargetEntityTypeId() === 'paragraph';
    return $paragraph && $storage->isMultiple() && $storage->getSetting('target_type') === 'paragraph';
  }

}
