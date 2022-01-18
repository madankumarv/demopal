<?php

namespace Drupal\world\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures forms module settings.
 */
class WorldConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'world_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'world.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Form constructor.
    $form = parent::buildForm($form, $form_state);
    
    $config = $this->config('world.settings');
    
    $form['count'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Countries Count'),
      '#default_value' => $config->get('world.count'),
    ];
    
    $form['countries'] = [
      '#type' => 'textarea',
      '#title' => $this->t('List of countries:'),
      '#default_value' => $config->get('world.countries'),
      '#description' => $this->t('Add countries as comma seperated.'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('world.settings')
      ->set('world.count', $form_state->getValue('count'))
      ->set('world.countries', $form_state->getValue('countries'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
