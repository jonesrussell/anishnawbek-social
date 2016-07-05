<?php

/**
 * @file
 * Contains \Drupal\activity_basics\Recipient\GroupRecipient.
 */

namespace Drupal\activity_basics\Recipient;

use Drupal\activity_creator\Recipient\BaseRecipient;
use  Drupal\activity_creator\Recipient\RecipientInterface;
use Drupal\group\Entity\Group;
use Drupal\group\GroupMembership;
use Drupal\social_group\SocialGroupHelperService;

class GroupRecipient extends BaseRecipient implements RecipientInterface {

  /**
   * @inheritdoc
   */
  public function id() {
    return 'group_recipient';
  }

  /**
   * @inheritdoc
   */
  public function getAccounts($entity) {
    $accounts = array();
    if ($gid = SocialGroupHelperService::getGroupFromEntity($entity)) {
      $group = Group::load($gid);
      $memberships = GroupMembership::loadByGroup($group);
      foreach ($memberships as $membership) {
        $accounts[] = $membership->getUser();
      }
    }

    return $accounts;
  }
}