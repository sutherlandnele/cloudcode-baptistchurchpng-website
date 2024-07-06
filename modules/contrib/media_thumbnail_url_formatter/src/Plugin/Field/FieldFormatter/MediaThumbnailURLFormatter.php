<?php

namespace Drupal\media_thumbnail_url_formatter\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\media\Plugin\Field\FieldFormatter\MediaThumbnailFormatter;

/**
 * Plugin implementation of the 'media_thumbnail' formatter.
 *
 * @FieldFormatter(
 *   id = "media_thumbnail_url",
 *   label = @Translation("Thumbnail URL"),
 *   field_types = {
 *     "entity_reference"
 *   }
 * )
 */
class MediaThumbnailURLFormatter extends MediaThumbnailFormatter {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'absolute' => '',
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $element = parent::settingsForm($form, $form_state);

    unset($element['image_link']);

    $element['absolute'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Absolute URL'),
      '#default_value' => $this->getSetting('absolute'),
    ];
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = parent::settingsSummary();
    if ($this->getSetting('absolute')) {
      $summary[] = $this->t('Absolute URL');
    }
    return [$summary[0]];
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    $media_items = $this->getEntitiesToView($items, $langcode);

    // Early opt-out if the field is empty.
    if (empty($media_items)) {
      return $elements;
    }

    $image_style_setting = $this->getSetting('image_style');
    /** @var \Drupal\image\Entity\ImageStyle $image_style */
    $image_style = $this->imageStyleStorage->load($image_style_setting);

    /** @var \Drupal\media\MediaInterface[] $media_items */
    foreach ($media_items as $delta => $media) {
      $thumbnailUri = $media->get('thumbnail')->entity->getFileUri();
      $url = $image_style ? $image_style->buildUrl($thumbnailUri) : $this->fileUrlGenerator->generateAbsoluteString($thumbnailUri);
      $url = $this->getSetting('absolute') == 1 ? $url : $this->fileUrlGenerator->transformRelative($url);
      $elements[$delta] = [
        '#markup' => $url,
      ];

      // Add cacheability of each item in the field.
      $this->renderer->addCacheableDependency($elements[$delta], $media);
    }

    // Add cacheability of the image style setting.
    if ($image_style) {
      $this->renderer->addCacheableDependency($elements, $image_style);
    }

    return $elements;
  }

}
