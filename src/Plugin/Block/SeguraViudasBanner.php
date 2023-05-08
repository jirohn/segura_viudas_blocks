<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom block for Segura Viudas Banner.
 *
 * @Block(
 *   id = "segura_viudas_banner",
 *   admin_label = @Translation("Segura Viudas Banner"),
 *   category = @Translation("Custom")
 * )
 */
class SeguraViudasBanner extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'segura_viudas_banner',
      'content' => 'Este es el contenido de mi bloque personalizado.'
    ];
  }

}
