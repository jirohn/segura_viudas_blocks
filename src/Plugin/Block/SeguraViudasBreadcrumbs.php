<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom block for Segura Viudas Breadcrubs.
app/web/modules/segura_viudas_blocks/src/Plugin/Block/seguraViudasHeader.php *
 * @Block(
 *   id = "segura_viudas_breadcrumbs",
 *   admin_label = @Translation("Segura Viudas Breadcrumbs"),
 *   category = @Translation("Custom")
 * )
 */
class SeguraViudasBreadcrumbs extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    return [
      '#theme' => 'segura_viudas_breadcrumbs',
      '#content' => '',
    ];
  }

}
