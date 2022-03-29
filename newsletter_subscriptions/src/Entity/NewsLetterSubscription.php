<?php

namespace Drupal\newsletter_subscriptions\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the NewsLetterSubscription entity.
 *
 * @ingroup NewsLetterSubscription
 *
 * @ContentEntityType(
 *   id = "news_letter_subscription",
 *   label = @Translation("News Letter Subscription"),
 *   base_table = "news_letter_subscription",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *   },
 * )
 */

class NewsLetterSubscription extends ContentEntityBase implements ContentEntityInterface
{

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type)
  {

    // Standard field, used as unique if primary index.
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the Advertiser entity.'))
      ->setReadOnly(TRUE);

    // Standard field, unique outside of the scope of the current project.
    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the Advertiser entity.'))
      ->setReadOnly(TRUE);

    $fields['mail'] = BaseFieldDefinition::create('email')
      ->setLabel(t('Email'))
      ->setDescription(t('The email of this user.'))
      ->setDefaultValue('');


    $fields['status'] = BaseFieldDefinition::create('boolean')
      ->setLabel(t('status'))
      ->setDescription(t('Whether the user is active or blocked.'))
      ->setDefaultValue(FALSE);


    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the user was created.'));

    $fields['firstname'] = BaseFieldDefinition::create('string')
      ->setLabel(t('First name'))
      ->setDescription(t('The name of this user.'));

    $fields['lastname'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Last name'))
      ->setDescription(t('The name of this user.'));

    $fields['country'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Country'))
      ->setDescription(t('The Country of this user.'));

    return $fields;
  }
}
