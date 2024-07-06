<?php

namespace Drupal\leaflet_more_markers\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the Map Marker widget.
 *
 * @FieldWidget(
 *   id = "map_marker_widget",
 *   label = @Translation("Map marker"),
 *   field_types = {
 *     "map_marker"
 *   }
 * )
 */
class MapMarkerWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    // In D8 a "button" will always come out as type="submit". So we'd
    // normally need to attach some JS to prevents default submit behaviour.
    // However with the emoji picker used this is not an issue.
    $element['trigger-emoji-picker'] = [
      '#type' => 'button',
      '#value' => $this->t('Pick emoji'),
      '#attributes' => ['class' => ['trigger-emoji-picker']],
    ];
    $element['icon'] = [
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->icon) ? $items[$delta]->icon : '',
      '#size' => 3,
      '#maxlength' => 32,
      '#attributes' => ['class' => ['map-marker-icon']],
    ];
    $desc1 = $this->t('If left blank the default blue map pin will be used.');
    $desc2 = $this->t('For a plain circle, enter a space here and type <em>circle-red center</em> in the field below.');
    $element['help_text'] = [
      '#markup' => "<br/>$desc1<br/>$desc2",
    ];
    $intro1 = $this->t("If you don't want an emoji or the default map pin, then enter a <em>font icon code</em>, like <strong>bi bi-shop</strong> (<a href='@url_bi' target='_bi'>Bootstrap Icons</a>) or <strong>fas fa-bed</strong> (<a href='@url_fa' target='_fa'>Font Awesome</a>) or <strong>la la-swimmer</strong> (<a href='@url_la' target='_la'>Line Awesome</a>).", [
      '@url_bi' => 'https://icons.getbootstrap.com',
      '@url_fa' => 'https://fontawesome.com/icons?m=free',
      '@url_la' => 'https://icons8.com/line-awesome#Maps',
    ]);
    $intro2 = $this->t('For both emojis and font-icons you may append attributes to set <strong>size</strong>, <strong>appearance</strong>, <strong>special effect</strong> and <strong>baseline</strong>.');
    $attr1 = $this->t('<strong>Size</strong>: <em>large</em> or <em>medium</em> (default) or <em>small</em>');
    $attr2 = $this->t('<strong>Appearance</strong>: <em>circle-black</em> or <em>circle-white</em> or <em>circle-red</em> or omit (default)');
    $attr3 = $this->t('<strong>Special effects</strong>: <em>pulse, jump, jump-5, flip-1, rock, bumpy-road, somersault, sky-drop</em> or omit (default)');
    $attr4 = $this->t('<strong>Baseline</strong> (vertical offset): <em>center</em> or omit (i.e. <em>ground</em>)');
    $expl = $this->t('The default baseline, <em>ground</em>, is generally good for emojis that have an implied ground level, like a person running, a building etc. However if your icon is a smiley or simply an X to mark the spot, then <em>center</em> may be more appropriate.');

    $example1 = $this->t('Example 1, using an emoji : <strong>large &nbsp;center &nbsp;jump-5</strong>');
    $example2 = $this->t('Example 2, using font icon: <strong>fas fa-bed &nbsp;small &nbsp;circle-black</strong>');

    $element['classes'] = [
      '#title' => $this->t('Optional font icon code and attributes'),
      '#description' => implode('<br/>', [
        $intro1, "<br/>$intro2", $attr1, $attr2, $attr3, $attr4, $expl, $example1, $example2,
      ]),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->classes) ? $items[$delta]->classes : '',
      '#size' => 60,
      '#maxlength' => 60,
      '#attributes' => ['class' => ['map-marker-classes']],
    ];

    $element += [
      '#type' => 'fieldset',
    ];

    return $element;
  }

}
