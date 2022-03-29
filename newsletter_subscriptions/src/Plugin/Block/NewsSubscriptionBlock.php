<?php

namespace Drupal\newsletter_subscriptions\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'NewsSubscriptionBlock' block.
 *
 * @Block(
 *  id = "news_subscription_block",
 *  admin_label = @Translation("News subscription block"),
 * )
 */
class NewsSubscriptionBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    
    $form = \Drupal::formBuilder()->getForm('Drupal\newsletter_subscriptions\Form\NewsLetterForm');

    return $form;
    $news = \Drupal\newsletter_subscriptions\Entity\NewsLetterSubscription::create([
      'mail' => 'test@gamil.com',
      'status' => true,
      'firstname' => 'Moin',
      'lastname' => 'khan'
    ]);
    $news->save();
    d_limit($news->get('mail'), 3);

    exit;
    $build = [];
    $build['#theme'] = 'news_subscription_block';
    $build['news_subscription_block']['#markup'] = 'Implement NewsSubscriptionBlock.';

    return $build;
  }
}
