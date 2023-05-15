<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a custom block for Segura Viudas Profile.
 *
 * @Block(
 *   id = "segura_viudas_profile",
 *   admin_label = @Translation("Segura Viudas Profile"),
 *   category = @Translation("Custom")
 * )
 */
class SeguraViudasProfile extends BlockBase implements ContainerFactoryPluginInterface {

  protected $currentUser;

  public function __construct(array $configuration, $plugin_id, $plugin_definition, AccountProxyInterface $current_user) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->currentUser = $current_user;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('current_user')
    );
  }

  public function build() {
    $current_user = $this->currentUser->getAccount();
    $user = \Drupal\user\Entity\User::load($current_user->id());

    return [
      '#theme' => 'segura_viudas_profile',
      '#user' => $user,
    ];
  }

}
