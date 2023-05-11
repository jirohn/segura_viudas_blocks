<?php

namespace Drupal\mi_modulo\Controller;

use Drupal\Core\Controller\ControllerBase;

class MiModuleController extends ControllerBase {

  public function loginForm() {
    $form = $this->formBuilder()->getForm('Drupal\blocks_segura_viudas\Form\LoginForm');
    return $form;
  }

}
