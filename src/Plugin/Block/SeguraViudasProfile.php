<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom block for Segura Viudas Profile.
app/web/modules/segura_viudas_blocks/src/Plugin/Block/seguraViudasHeader.php *
 * @Block(
 *   id = "segura_viudas_profile",
 *   admin_label = @Translation("Segura Viudas Profile"),
 *   category = @Translation("Custom")
 * )
 */
class SeguraViudasProfile extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'segura_viudas_profile',
      '#content' => 'Este es el contenido de mi bloque personalizado.'
    ];
  }

}
