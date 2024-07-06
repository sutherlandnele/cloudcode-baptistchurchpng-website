<?php

namespace Drupal\slick_example\Plugin\slick;

use Drupal\slick\SlickSkinPluginBase;

/**
 * Provides slick example skins.
 *
 * @SlickSkin(
 *   id = "slick_example_skin",
 *   label = @Translation("Slick example skin")
 * )
 */
class SlickExampleSkin extends SlickSkinPluginBase {

  /**
   * Sets the slick skins.
   *
   * @inheritdoc
   */
  protected function setSkins() {
    $path  = $this->getPath('module', 'slick_example');
    $skins = [
      'x_testimonial' => [
        'name' => 'X: Testimonial',
        'description' => $this->t('Testimonial with thumbnail and description with slidesToShow 2.'),
        'group' => 'main',
        'provider' => 'slick_example',
        'css' => [
          'theme' => [
            $path . '/css/slick.theme--x-testimonial.css' => [],
          ],
        ],
      ],
    ];

    return $skins;
  }

}
