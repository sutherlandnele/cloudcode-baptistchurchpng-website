<?php

namespace Drupal\blazy_layout\Form;

use Drupal\blazy\Form\BlazyAdminInterface;

/**
 * Defines re-usable services and functions for BlazyLayoutManager forms.
 */
interface BlazyLayoutAdminInterface extends BlazyAdminInterface {

  /**
   * Returns base form elements.
   *
   * @param array $form
   *   The modified form.
   * @param array $settings
   *   The stored settings.
   * @param array $excludes
   *   The optional excluded form elements.
   */
  public function formBase(array &$form, array $settings, array $excludes = []): void;

  /**
   * Returns color form elements.
   *
   * @param array $form
   *   The modified form.
   * @param array $settings
   *   The stored settings.
   * @param array $excludes
   *   The optional excluded form elements.
   */
  public function formStyles(array &$form, array $settings, array $excludes = []): void;

  /**
   * Returns available form elements.
   *
   * @param array $form
   *   The modified form.
   * @param array $settings
   *   The stored settings.
   * @param array $excludes
   *   The optional excluded form elements.
   */
  public function formSettings(array &$form, array $settings, array $excludes = []): void;

  /**
   * Returns wrapper form elements.
   *
   * @param array $form
   *   The modified form.
   * @param array $settings
   *   The stored settings.
   * @param array $excludes
   *   The optional excluded form elements.
   * @param bool $root
   *   Whether applicable to root, or region elements.
   */
  public function formWrappers(
    array &$form,
    array $settings,
    array $excludes = [],
    $root = TRUE,
  ): void;

}
