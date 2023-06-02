<?php

namespace Drupal\blocks_segura_viudas\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\user\Entity\User;

class ChangePasswordForm extends FormBase {

  public function getFormId() {
    return 'mi_change_password_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['#attributes']['style'] = 'margin-top:2em;';
  
    $form['old_password'] = [
      '#type' => 'password',
      '#title' => $this->t('CONTRASENYA ACTUAL'),
      '#required' => TRUE,
      '#attributes' => [
        'id' => 'current-password',
        'class' => ['password-input'],
      ],
      '#prefix' => '<div class="password-container">',
      '#suffix' => '</div>',
    ];
  
    $form['new_password'] = [
      '#type' => 'password_confirm',
      '#size' => 25,
      '#title' => $this->t('NOVA CONTRASENYA'),
      '#required' => TRUE,
      '#attributes' => [
        'id' => 'new-password',
        'class' => ['password-input'],
      ],
      '#prefix' => '<div class="password-container">',
      '#suffix' => '</div><br><br>',
    ];
    $this->messenger()->addMessage($this->t('La contraseña ha sido cambiada exitosamente.'));

    $form['cancel_button'] = [
      '#type' => 'markup',
      '#markup' => '<a href="' . $this->t('/ca/inici') . '" class="secondary-sub nomobile" type="submit"><em class="icon-crest"></em>' . $this->t('CANCEL·LAR') . '</a>',
    ];
  
    $form['actions'] = [
      '#type' => 'actions',
    ];
  
    $form['actions']['submit'] = [
      '#type' => 'button', // Mantén 'button' en lugar de 'submit'
      '#value' => $this->t('CONFIRMAR'),
      '#attributes' => [
        'style' => 'display: inline-flex;',
        'class' => ['nomobile'],
        'id' => 'icon-submit', // Agrega un atributo 'id'
        'onclick' => 'document.querySelector(\'form\').submit();', // Agrega un atributo 'onclick'
      ],
    ];
    
    
  
    $form['actions']['submit_mobile'] = [
      '#type' => 'submit',
      '#value' => $this->t('CONFIRMAR'),
      '#button_type' => 'primary',
      '#attributes' => [
        'class' => ['nocomputer'],
        'style' => 'width:100%; display:block;',
      ],
    ];
    
  
    $form['actions']['cancel_mobile'] = [
      '#type' => 'markup',
      '#markup' => '<a href="' . $this->t('/ca/inici') . '"class="secondary-sub nocomputer" style="text-align:center; display:block;"><em class="icon-crest"></em>' . $this->t('CANCEL·LAR') . '</a>',
    ];
  
    return $form;
  }
  

  public function validateForm(array &$form, FormStateInterface $form_state) {
    $account = User::load(\Drupal::currentUser()->id());
    if (!\Drupal::service('password')->check($form_state->getValue('old_password'), $account->getPassword())) {
      $form_state->setErrorByName('old_password', $this->t('La contraseña actual es incorrecta.'));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $account = User::load(\Drupal::currentUser()->id());
    $account->setPassword($form_state->getValue('new_password'));
    $account->save();
    $form_state->setRebuild(TRUE);
  }
}