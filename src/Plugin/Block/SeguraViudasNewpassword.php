<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom block for Segura Viudas NewPassword.
app/web/modules/segura_viudas_blocks/src/Plugin/Block/seguraViudasHeader.php *
 * @Block(
 *   id = "segura_viudas_newpassword",
 *   admin_label = @Translation("Segura Viudas Newpassword"),
 *   category = @Translation("Custom")
 * )
 */
class SeguraViudasNewpassword extends BlockBase {


public function build() {
  $form = \Drupal::formBuilder()->getForm('Drupal\blocks_segura_viudas\Form\ChangePasswordForm');
  return [
    '#theme' => 'segura_viudas_newpassword',
    '#change_password_form' => $form,
  ];
}  
}
