<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom block.
 *
 * @Block(
 *   id = "segura_viudas_header",
 *   admin_label = @Translation("Segura Viudas Header"),
 *   category = @Translation("Custom")
 * )
 */
class SeguraViudasHeader extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'segura_viudas_header',
      '#content' => 'Este es el contenido de mi bloque personalizado.',
    ];
  }

}
