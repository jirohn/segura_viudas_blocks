<?php

namespace Drupal\blocks_segura_viudas\Controller;

use Drupal\Core\Controller\ControllerBase;

class PasswordRecoveryController extends ControllerBase {

  public function content() {
    $form = \Drupal::formBuilder()->getForm('Drupal\\blocks_segura_viudas\\Form\\PasswordRecoveryForm');
    return $form;
  }
}
