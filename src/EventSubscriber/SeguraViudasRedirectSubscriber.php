<?php

namespace Drupal\blocks_segura_viudas\EventSubscriber;

use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Url;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class SeguraViudasRedirectSubscriber implements EventSubscriberInterface {

  protected $account;

  public function __construct(AccountInterface $account) {
    $this->account = $account;
  }

  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['onKernelRequest'];
    return $events;
  }

  public function onKernelRequest(RequestEvent $event) {
    if ($event->isMasterRequest() && $this->account->isAuthenticated()) {
      $default_password = "S3gur4v1ud4S";
      $current_user = \Drupal\user\Entity\User::load($this->account->id());

      if ($current_user->hasField('pass')) {
        $password_hash_service = \Drupal::service('password');
        if ($password_hash_service->check($default_password, $current_user->getPassword())) {
          $url = Url::fromUri('internal:/some/page')->toString();
          $response = new RedirectResponse($url);
          $event->setResponse($response);
        }
      }
    }
  }
}
