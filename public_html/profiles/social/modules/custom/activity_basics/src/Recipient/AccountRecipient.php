<?php

/**
 * @file
 * Contains \Drupal\activity_basics\Recipient\AccountRecipient.
 */

namespace Drupal\activity_basics\Recipient;

use Drupal\activity_creator\Recipient\BaseRecipient;
use  Drupal\activity_creator\Recipient\RecipientInterface;

class AccountRecipient extends BaseRecipient implements RecipientInterface {

  /**
   * @inheritdoc
   */
  public function id() {
    return 'account_recipient';
  }

  /**
   * @inheritdoc
   */
  public function getAccounts($entity) {
    return $entity;
  }
}