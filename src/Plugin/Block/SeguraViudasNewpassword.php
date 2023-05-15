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

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'segura_viudas_newpassword',
      '#content' => 'Este es el contenido de mi bloque personalizado.'
    ];
  }

}
