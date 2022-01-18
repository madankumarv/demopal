<?php

namespace Drupal\world\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\world\Controller\WorldController;
/**
 * Implements an example form.
 */
class WorldForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'world_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['country'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enter a country to find'),
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addStatus($form_state->getValue('country'));
    if (ctype_alpha($form_state->getValue('country'))) {
      $form_state->setErrorByName('country', $this->t('Please enter only alphabets!'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $country = $form_state->getValue('country');
    $config = $this->config('world.settings');
    $message = in_array($country, $config->get('world.countries')) ? 'found.' : 'not found.';
    $this->messenger()->addStatus('Specified country is '.$message);
  }

}

