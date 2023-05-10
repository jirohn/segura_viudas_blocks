<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom block for Segura Viudas Footer.
app/web/modules/segura_viudas_blocks/src/Plugin/Block/seguraViudasHeader.php *
 * @Block(
 *   id = "segura_viudas_footer",
 *   admin_label = @Translation("Segura Viudas Footer"),
 *   category = @Translation("Custom")
 * )
 */
class SeguraViudasFooter extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'segura_viudas_footer',
      '#content' => 'Este es el contenido de mi bloque personalizado.'
    ];
  }

}
