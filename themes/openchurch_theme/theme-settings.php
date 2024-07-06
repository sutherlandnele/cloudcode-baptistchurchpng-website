<?php

/**
 * @file
 * Theme settings form for OpenChurch Theme theme.
 */

use Drupal\Component\Utility\Color;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function openchurch_theme_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['custom_colors'] = [
    '#type' => 'details',
    '#title' => t('Customize Colors'),
    '#open' => TRUE,
  ];

  $form['custom_colors']['link_color'] = [
    '#type' => 'textfield',
    '#title' => t('Link color'),
    '#default_value' => theme_get_setting('link_color'),
    '#size' => 10,
    '#description' => t('The default link color.'),
    '#attributes' => [
      'style' => 'background-color: ' . theme_get_setting('link_color') . '; color: white;',
    ],
    '#required' => TRUE,
  ];

  $form['custom_colors']['nav_active_color'] = [
    '#type' => 'textfield',
    '#title' => t('Nav active color'),
    '#default_value' => theme_get_setting('nav_active_color'),
    '#size' => 10,
    '#description' => t('The active link color in the navigation.'),
    '#attributes' => [
      'style' => 'background-color: ' . theme_get_setting('nav_active_color') . ';',
    ],
    '#required' => TRUE,
  ];

  $form['custom_colors']['button_color'] = [
    '#type' => 'textfield',
    '#title' => t('Button color'),
    '#default_value' => theme_get_setting('button_color'),
    '#size' => 10,
    '#description' => t('The default button color.'),
    '#attributes' => [
      'style' => 'background-color: ' . theme_get_setting('button_color') . '; color: white;',
    ],
    '#required' => TRUE,
  ];

  $form['custom_colors']['button_border'] = [
    '#type' => 'textfield',
    '#title' => t('Button border'),
    '#default_value' => theme_get_setting('button_border'),
    '#size' => 10,
    '#description' => t('The default button border color.'),
    '#attributes' => [
      'style' => 'background-color: ' . theme_get_setting('button_border') . '; color: black;',
    ],
    '#required' => TRUE,
  ];

  $form['custom_colors']['button_hover'] = [
    '#type' => 'textfield',
    '#title' => t('Button hover'),
    '#default_value' => theme_get_setting('button_hover'),
    '#size' => 10,
    '#description' => t('The default button hover color.'),
    '#attributes' => [
      'style' => 'background-color: ' . theme_get_setting('button_hover') . '; color: white;',
    ],
    '#required' => TRUE,
  ];

  $form['custom_colors']['button_hover_border'] = [
    '#type' => 'textfield',
    '#title' => t('Button hover border'),
    '#default_value' => theme_get_setting('button_hover_border'),
    '#size' => 10,
    '#description' => t('The default button hover border color.'),
    '#attributes' => [
      'style' => 'background-color: ' . theme_get_setting('button_hover_border') . '; color: black;',
    ],
    '#required' => TRUE,
  ];

  $form['custom_colors']['bg_dark_color'] = [
    '#type' => 'textfield',
    '#title' => t('Dark background color'),
    '#default_value' => theme_get_setting('bg_dark_color'),
    '#size' => 10,
    '#description' => t('The default dark background color.'),
    '#attributes' => [
      'style' => 'background-color: ' . theme_get_setting('bg_dark_color') . '; color: white;',
    ],
    '#required' => TRUE,
  ];

  $form['custom_colors']['bg_secondary_color'] = [
    '#type' => 'textfield',
    '#title' => t('Secondary background color'),
    '#default_value' => theme_get_setting('bg_secondary_color'),
    '#size' => 10,
    '#description' => t('The default secondary background color.'),
    '#attributes' => [
      'style' => 'background-color: ' . theme_get_setting('bg_secondary_color') . '; color: white;',
    ],
    '#required' => TRUE,
  ];

  $form['custom_colors']['dropdown_active_color'] = [
    '#type' => 'textfield',
    '#title' => t('Dropdown active background color'),
    '#default_value' => theme_get_setting('dropdown_active_color'),
    '#size' => 10,
    '#description' => t('The color you see for the active item in dropdowns in the main nav.'),
    '#attributes' => [
      'style' => 'background-color: ' . theme_get_setting('dropdown_active_color') . '; color: white;',
    ],
    '#required' => TRUE,
  ];

  $form['cdn_settings'] = [
    '#type' => 'details',
    '#title' => t('Bootstrap CDN Settings'),
    '#open' => FALSE,
  ];

  $form['cdn_settings']['bootstrap_css'] = [
    '#type' => 'textfield',
    '#title' => t('Bootstrap CSS CDN'),
    '#default_value' => theme_get_setting('bootstrap_css'),
    '#description' => t('Bootstrap CSS CDN URL.'),
    '#required' => TRUE,
  ];

  $form['cdn_settings']['bootstrap_js'] = [
    '#type' => 'textfield',
    '#title' => t('Bootstrap JS CDN'),
    '#default_value' => theme_get_setting('bootstrap_js'),
    '#description' => t('Bootstrap JS CDN URL.'),
    '#required' => TRUE,
  ];

  $form['cdn_settings']['popper_js'] = [
    '#type' => 'textfield',
    '#title' => t('Bootstrap Popper JS CDN'),
    '#default_value' => theme_get_setting('popper_js'),
    '#description' => t('Bootstrap Popper JS CDN URL.'),
    '#required' => TRUE,
  ];

  $form['cdn_settings']['icons_css'] = [
    '#type' => 'textfield',
    '#title' => t('Bootstrap Icons CSS CDN'),
    '#default_value' => theme_get_setting('icons_css'),
    '#description' => t('Bootstrap Icons CSS CDN URL.'),
    '#required' => TRUE,
  ];

  $form['path_settings'] = [
    '#type' => 'details',
    '#title' => t('Path Settings'),
    '#open' => FALSE,
  ];

  $form['path_settings']['blog_page_path'] = [
    '#type' => 'textfield',
    '#title' => t('Blog page path'),
    '#default_value' => theme_get_setting('blog_page_path'),
    '#size' => 10,
    '#description' => t('Default page path for article landing page.'),
    '#required' => TRUE,
  ];

  $form['path_settings']['events_page_path'] = [
    '#type' => 'textfield',
    '#title' => t('Events page path'),
    '#default_value' => theme_get_setting('events_page_path'),
    '#size' => 10,
    '#description' => t('Default page path for events landing page.'),
    '#required' => TRUE,
  ];

  // Add a form validate to verify if the elements has valid colors.
  $form['#validate'][] = 'validate_color_elements';
}

/**
 * Validate if is the elements has valid colors.
 */
function validate_color_elements($form, &$form_state) {

  // Define the color fields.
  $color_fields['link_color'] = $form_state->getValue('link_color');
  $color_fields['nav_active_color'] = $form_state->getValue('nav_active_color');
  $color_fields['button_color'] = $form_state->getValue('button_color');
  $color_fields['button_border'] = $form_state->getValue('button_border');
  $color_fields['button_hover'] = $form_state->getValue('button_hover');
  $color_fields['button_hover_border'] = $form_state->getValue('button_hover_border');
  $color_fields['bg_dark_color'] = $form_state->getValue('bg_dark_color');
  $color_fields['bg_secondary_color'] = $form_state->getValue('bg_secondary_color');
  $color_fields['dropdown_active_color'] = $form_state->getValue('dropdown_active_color');

  // Verify if the color fields has valid colors.
  foreach ($color_fields as $field_name => $color_value) {

    // If the color value is "transparent", skip because this is in use.
    if ($color_value == 'transparent') {
      continue;
    }

    // Validate the Hex code.
    $is_valid_color = Color::validateHex($color_value);

    // If the value isn't a valid color, set error on validation.
    if (!$is_valid_color) {
      $error_message = (string) new TranslatableMarkup('Please insert a valid color');
      $form_state->setErrorByName($field_name, $error_message);
    }
  }
}
