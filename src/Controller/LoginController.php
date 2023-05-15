<?php

namespace Drupal\blocks_segura_viudas\Controller;

use Drupal\Core\Controller\ControllerBase;

class LoginController extends ControllerBase {

  public function loginForm() {
    $form = $this->formBuilder()->getForm('Drupal\blocks_segura_viudas\Form\LoginForm');
    return $form;
  }

  public function changePasswordForm() {
    $form = $this->formBuilder()->getForm('Drupal\blocks_segura_viudas\Form\ChangePasswordForm');
    return $form;
  }
}

