<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom block for Segura Viudas Login.
 *
 * @Block(
 *   id = "segura_viudas_login",
 *   admin_label = @Translation("Segura Viudas Login"),
 *   category = @Translation("Custom")
 * )
 */
class SeguraViudasLogin extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'segura_viudas_login',
      'content' => 'Este es el contenido de mi bloque personalizado.'
    ];
  }

}
