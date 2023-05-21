<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom block for Segura Viudas Appointment.
app/web/modules/segura_viudas_blocks/src/Plugin/Block/seguraViudasHeader.php *
 * @Block(
 *   id = "segura_viudas_appointment",
 *   admin_label = @Translation("Segura Viudas Appointment"),
 *   category = @Translation("Custom")
 * )
 */
class SeguraViudasAppointment extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'segura_viudas_appointment',
      '#content' => 'Este es el contenido de mi bloque personalizado.'
    ];
  }

}
