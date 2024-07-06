<?php

declare(strict_types = 1);

namespace Drupal\views_geojson\Plugin\views\argument_default;

use Drupal\core\form\FormStateInterface;
use Drupal\views\Plugin\views\argument_default\QueryParameter;

/**
 * The BBOX query string argument default handler.
 *
 * @ingroup views_argument_default_plugins
 *
 * @ViewsArgumentDefault(
 *     id="bboxquery",
 *     title=@Translation("BBox Query"),
 * )
 */
class BBoxQuery extends QueryParameter {

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    $form['info'] = [
      '#markup' => '<p class="description">Attempt to pull bounding box info
      directly from the query string, bypassing Drupal\'s normal argument
      handling. If the argument does not exist, all values will be shown.</p>',
    ];
    $form['arg_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Query argument ID'),
      '#size' => 60,
      '#maxlength' => 64,
      '#default_value' => $this->options['arg_id'] ? $this->options['arg_id'] : $this->t('bbox'),
      '#description' => $this->t('The ID of the query argument.<br />For OpenLayers use <em>bbox</em>, (as in "<em>?bbox=left,bottom,right,top</em>".)'),
    ];
  }

  /**
   * Return the default argument.
   */
  public function getArgument() {
    $current_request = $this->view->getRequest();

    if ($current_request->query->has($this->options['arg_id'])) {
      return $current_request->query->get($this->options['arg_id']);
    }
    // TODO: What should be returned if arg not present, and empty result option
    // is set or not ? Otherwise, use the fixed fallback value.
    return $this->options['fallback'];
  }

  /**
   * TODO: Determine if this is being implemented correctly.
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['argument'] = ['default' => ''];
    $options['arg_id'] = ['default' => 'bbox'];

    return $options;
  }

}
