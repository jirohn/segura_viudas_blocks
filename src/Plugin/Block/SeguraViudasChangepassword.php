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
    $passwordChanged = \Drupal::request()->query->get('passwordChanged') == 'true';
    \Drupal::logger('my_module')->notice('Build method called.');
    \Drupal::logger('my_module')->notice('passwordChanged: ' . var_export($passwordChanged, TRUE));
    $form_state = $passwordChanged ? 'true' : 'false';

    return [
      '#theme' => 'segura_viudas_changepassword',
      '#change_password_form' => $form,
      '#form_state' => $form_state,
    ];

}

}
