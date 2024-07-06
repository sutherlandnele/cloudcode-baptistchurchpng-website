<?php

/**
 * @file
 * Post update hooks for Blazy.
 */

/**
 * Removed deprecated settings.
 */
function blazy_post_update_remove_deprecated_settings() {
  $config = \Drupal::configFactory()->getEditable('blazy.settings');
  foreach (['deprecated_class', 'responsive_image', 'use_theme_blazy'] as $key) {
    $config->clear($key);
  }
  $config->save(TRUE);
}
