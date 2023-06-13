<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom block for Segura Viudas ChangePassword.
 * app/web/modules/segura_viudas_blocks/src/Plugin/Block/seguraViudasHeader.php *
 * @Block(
 *   id = "segura_viudas_changepassword",
 *   admin_label = @Translation("Segura Viudas Changepassword"),
 *   category = @Translation("Custom")
 * )
 */
class SeguraViudasChangepassword extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\blocks_segura_viudas\Form\ChangePasswordForm');
    return [
      '#theme' => 'segura_viudas_changepassword',
      '#change_password_form' => $form,
    ];
  }
}
