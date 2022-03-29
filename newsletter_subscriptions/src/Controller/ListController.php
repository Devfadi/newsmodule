<?php

namespace Drupal\newsletter_subscriptions\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ListController.
 */
class ListController extends ControllerBase
{

  /**
   * Main.
   *
   * @return string
   *   Return Hello string.
   */
  public function main()
  {
    $subscriptions = \Drupal::entityTypeManager()->getStorage('news_letter_subscription')->loadMultiple();

    $header = [
      'id' => $this->t('ID'),
      'first_name' => $this->t('First Name'),
      'last_name' => $this->t('Last Name'),
      'country' => $this->t('Country'),
    ];
    $rows = [];
    foreach ($subscriptions as $subscription) {
      $rows[] = [
        'id' => $subscription->id(),
        'first_name' => $subscription->get('firstname')->value,
        'last_name' => $subscription->get('lastname')->value,
        'country' => $subscription->get('country')->value,
      ];
    }

    return [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#empty' => $this->t('There are no subscriptions yet.'),
    ];
  }
}
