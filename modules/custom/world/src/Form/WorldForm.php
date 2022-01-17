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
    $form['count'] = [
      '#type' => 'number',
      '#title' => $this->t('Enter no. of countries'),
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
    if (strlen($form_state->getValue('count')) < 1) {
      $form_state->setErrorByName('count', $this->t('Please enter positive number!'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $count = $form_state->getValue('count');
    $world =  new WorldController;
    $countries = explode(',',$world->countries()['#markup']);
    $this->messenger()->addStatus(implode(',',array_slice($countries,0,$count)));
  }

}

