<?php

namespace Drupal\blocks_segura_viudas\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\user\Entity\User;

class ChangePasswordForm extends FormBase {

  public function getFormId() {
    return 'change_password_form';
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

    // Eliminada la línea de mensaje aquí

    $form['cancel_button'] = [
      '#type' => 'markup',
      '#markup' => '<a href="' . $this->t('/ca/inici') . '" class="secondary-sub nomobile" type="submit"><em class="icon-crest"></em>' . $this->t('CANCEL·LAR') . '</a>',
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];

    /*$form['actions']['submit'] = [
      '#type' => 'submit', // Cambiado a 'submit'
      '#value' => $this->t('CONFIRMAR'),
      '#attributes' => [
        'style' => 'display: inline-flex;',
        'class' => ['nomobile'],
        'id' => 'icon-submit',
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
    ];*/
    $form['actions'] = array('#type' => 'actions');

    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary',
    );

    $form['actions']['cancel_mobile'] = [
      '#type' => 'markup',
      '#markup' => '<a href="' . $this->t('/ca/inici') . '"class="secondary-sub nocomputer" style="text-align:center; display:block;"><em class="icon-crest"></em>' . $this->t('CANCEL·LAR') . '</a>',
    ];
    $passwordChanged = \Drupal::request()->query->get('passwordChanged') == 'true';
    $form_state = $passwordChanged ? 'true' : 'false';
    \Drupal::logger('my_module')->notice('passwordChanged: ' . var_export($passwordChanged, TRUE));

    // enviamos la variable form_state a la plantilla
    //$form['form_state'] = $form_state;

    return $form;
  }


  public function validateForm(array &$form, FormStateInterface $form_state) {
    $account = User::load(\Drupal::currentUser()->id());
    $password_service = \Drupal::service('password');
    \Drupal::logger('segura_viudas_blocks')->notice('validando contraseña');

    if (!$password_service->check($form_state->getValue('old_password'), $account->getPassword())) {
      // Agrega un mensaje de error si la contraseña actual es incorrecta.
      $form_state->setErrorByName('old_password', $this->t('La contraseña actual es incorrecta.'));
      \Drupal::logger('segura_viudas_blocks')->notice('La contraseña actual es incorrecta.');
      // hacemos un echo con un div con la id 'popup incorrecto' y le ponemos un h1 que diga Contraseña incorrecta
      echo '<div id="popup_incorrecto"><h1>Contraseña incorrecta (Meter aqui el popup)</h1></div>';
    }

    $new_password_values = $form_state->getValue('new_password');
    if (is_array($new_password_values) && ($new_password_values['pass1'] !== $new_password_values['pass2'])) {
      // Agrega un mensaje de error si las contraseñas no coinciden.
      $form_state->setErrorByName('new_password', $this->t('La nueva contraseña y la confirmación no coinciden.'));
      \Drupal::logger('segura_viudas_blocks')->notice('La nueva contraseña y la confirmación no coinciden.');
      echo '<div id="popup_incorrecto"><h1>Contraseñas diferentes (Meter aqui el popup)</h1></div>';
    }
  }





  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addMessage($this->t('La contraseña ha sido cambiada exitosamente.'), 'status');

    $account = User::load(\Drupal::currentUser()->id());
    $account->setPassword($form_state->getValue('new_password'));
    $account->save();

    $url = \Drupal\Core\Url::fromRoute('<current>');
    $form_state->setRedirectUrl($url->setOption('query', ['passwordChanged' => 'true']));
}

}

