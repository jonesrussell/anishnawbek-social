<?php

/**
 * @file
 * Contains \Drupal\activity_basics\Recipient\CommunityRecipient.
 */

namespace Drupal\activity_basics\Recipient;

use Drupal\activity_creator\Recipient\BaseRecipient;
use \Drupal\activity_creator\Recipient\RecipientInterface;

class CommunityRecipient extends BaseRecipient implements RecipientInterface {

  /**
   * @inheritdoc
   */
  public function id() {
    return 'community_recipient';
  }

  /**
   * @inheritdoc
   */
  public function getAccounts($entity) {
    /** @var $entity_type_manager \Drupal\Core\Entity\EntityTypeManagerInterface */
    $entity_type_manager = \Drupal::service('entity.type.manager');

    /** @var $entity_storage \Drupal\Core\Entity\EntityStorageInterface */
    $entity_storage = $entity_type_manager->getStorage('user');

    // Load all users.
    $accounts = $entity_storage->loadMultiple();
    return $accounts;
  }
}