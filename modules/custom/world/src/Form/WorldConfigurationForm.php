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
    $config = $this->config('world.settings');
    $form['your_message'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your message'),
      '#default_value' => $config->get('variable_name'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('your_module.settings')
      ->set('variable_name', $form_state->getValue('your_message'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
