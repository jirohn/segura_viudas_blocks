<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom block for Segura Viudas header.
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
    $module_path = \Drupal::moduleHandler()->getModule('blocks_segura_viudas')->getPath();
    return [
      '#theme' => 'segura_viudas_header',
      'content' => 'Este es el contenido de mi bloque personalizado.',
      'module_path' => $module_path,
    ];
  }

}
