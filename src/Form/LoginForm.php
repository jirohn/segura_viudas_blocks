<?php

namespace Drupal\blocks_segura_viudas\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Authentication\AuthenticationManagerInterface;
use Drupal\Core\Url;
/**
 * Custom login form.
 */
class LoginForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'mi_login_form';
  }

  // Agrega este nuevo atributo de clase.
  /**
   * The authentication manager.
   *
   * @var \Drupal\Core\Authentication\AuthenticationManagerInterface
   */
  protected $authenticationManager;
    // Actualiza el constructor para recibir el servicio de autenticación.
    public function __construct(AuthenticationManagerInterface $authentication_manager) {
      $this->authenticationManager = $authentication_manager;
    }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['cif'] = [
      '#type' => 'textfield',
      '#title' => $this->t('CIF'),
      '#required' => TRUE,
    ];

    $form['password'] = [
      '#type' => 'password',
      '#title' => $this->t('Contraseña'),
      '#required' => TRUE,
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Accedir'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // Aquí puedes agregar tu lógica de validación personalizada si es necesario.
  }

/**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $cif = $form_state->getValue('cif');
    $password = $form_state->getValue('password');

    // Intenta iniciar sesión.
    $uid = $this->authenticationManager->authenticate($cif, $password);

    if ($uid) {
      // El inicio de sesión fue exitoso, guarda el usuario en la sesión.
      $user_storage = $this->entityTypeManager()->getStorage('user');
      $account = $user_storage->load($uid);
      user_login_finalize($account);

      // Redirecciona al usuario a su página de perfil o a la página que desees.
      $form_state->setRedirectUrl(Url::fromRoute('user.page', ['user' => $uid]));
    } else {
      // El inicio de sesión falló, muestra un mensaje de error.
      $this->messenger()->addError($this->t('El CIF o la contraseña ingresados son incorrectos.'));
    }
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('authentication_manager')
    );
  }
}