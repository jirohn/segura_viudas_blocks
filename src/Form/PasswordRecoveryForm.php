<?php

namespace Drupal\blocks_segura_viudas\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\user\Entity\User;

class PasswordRecoveryForm extends FormBase {

  public function getFormId() {
    return 'segura_viudas_password_recovery_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['cif'] = [
      '#type' => 'textfield',
      '#title' => $this->t('CIF'),
      '#required' => TRUE,
      '#description' => '<span>' . $this->t('Introdueix el CIF sense espais ni caràcters especials i en majúscules. Exemple: 43414180A') . '</span>',
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['cancel_mobile'] = [
      '#type' => 'markup',
      '#markup' => '<a href="' . $this->t('/ca/inici') . '"class="secondary-sub" style="text-align:center; display:block; margin-right:.5em;"><em class="icon-crest"></em>' . $this->t('CANCEL·LAR') . '</a>',
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Confirmar'),
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $cif = $form_state->getValue('cif');

    $users = \Drupal::entityTypeManager()->getStorage('user')
      ->loadByProperties(['field_cif_empresa' => $cif]);

      if (!empty($users)) {
        $user = reset($users);
        _user_mail_notify('password_reset', $user);
        \Drupal::messenger()->addMessage(t('Se ha enviado un correo electrónico con las instrucciones para restablecer la contraseña.'));
      } else {
        \Drupal::messenger()->addError(t('No existe un usuario asociado con el CIF proporcionado.'));
      }

  }
}