<?php

namespace Drupal\segura_viudas_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom block.
 *
 * @Block(
 *   id = "my_custom_block",
 *   admin_label = @Translation("My Custom Block"),
 *   category = @Translation("Custom")
 * )
 */
class seguraviudasheader extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'segura-viudas-blocks-header',
      '#content' => 'Este es el contenido de mi bloque personalizado.',
    ];
  }

}
