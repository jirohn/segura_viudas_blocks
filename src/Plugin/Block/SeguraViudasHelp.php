<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom block for Segura Viudas Help.
 * app/web/modules/segura_viudas_blocks/src/Plugin/Block/seguraViudasHeader.php *
 * @Block(
 *   id = "segura_viudas_help",
 *   admin_label = @Translation("Segura Viudas Help"),
 *   category = @Translation("Custom")
 * )
 */
class SeguraViudasHelp extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'segura_viudas_help',
      '#content' => 'Este es el contenido de mi bloque personalizado.'
    ];
  }

}
