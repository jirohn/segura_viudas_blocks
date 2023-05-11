<?php

namespace Drupal\blocks_segura_viudas\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormBuilderInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
// usamos la dependencia de drupal_get_path
use Drupal\Core\Link;
/**
 * Provides a custom login.
 *
 * @Block(
 *   id = "segura_viudas_login",
 *   admin_label = @Translation("Segura Viudas Login"),
 *   category = @Translation("NATEEVO")
 * )
 */
class SeguraViudasLogin extends BlockBase implements ContainerFactoryPluginInterface {

 /**
   * The form builder.
   *
   * @var \Drupal\Core\Form\FormBuilderInterface
   */
  protected $formBuilder;

  /**
   * Constructs a new LoginFormBlock instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Form\FormBuilderInterface $form_builder
   *   The form builder.
   */
  protected $moduleHandler;

  public function __construct(array $configuration, $plugin_id, $plugin_definition, FormBuilderInterface $form_builder, ModuleHandlerInterface $module_handler) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->formBuilder = $form_builder;
    $this->moduleHandler = $module_handler;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('form_builder'),
      $container->get('module_handler')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    // obtenemos el formulario de login
    $login_form = $this->formBuilder->getForm('Drupal\user\Form\UserLoginForm');
    // declaramos una variable con el path del modulo, compatible con drupal 9
    $module_path = $this->moduleHandler->getModule('blocks_segura_viudas')->getPath();
    // retornamos un array con el tema y las variables que queremos pasarle
    return [
      '#theme' => 'segura_viudas_login',
      '#login_form' => $login_form,
      '#module_path' => $module_path,

    ];
  }

}
