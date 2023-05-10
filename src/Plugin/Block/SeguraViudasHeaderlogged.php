<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom block for Segura Viudas Header Logged.
app/web/modules/segura_viudas_blocks/src/Plugin/Block/seguraViudasHeader.php *
 * @Block(
 *   id = "segura_viudas_headerlogged",
 *   admin_label = @Translation("Segura Viudas Header Logged"),
 *   category = @Translation("Custom")
 * )
 */
class SeguraViudasHeaderLogged extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'segura_viudas_headerlogged',
      '#content' => 'Este es el contenido de mi bloque personalizado.'
    ];
  }

}
