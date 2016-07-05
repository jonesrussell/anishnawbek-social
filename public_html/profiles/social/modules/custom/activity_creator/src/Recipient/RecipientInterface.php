<?php

/**
 * @file
 * Contains \Drupal\activity_creator\Recipient\RecipientInterface.
 */

namespace Drupal\activity_creator\Recipient;


use Drupal\Core\Entity\EntityInterface;

interface RecipientInterface {

  /**
   * @return string id of the recipient
   */
  public function id();

  /**
   * @param $entity EntityInterface an entity
   * @return array relevant accounts from the Recipient (e.g. all users in a group).
   */
  public function getAccounts($entity);

  /**
   * @return string The target id of the recipient
   */
  public function getTargetId();

  /**
   * @param $target_id string The target id of the recipient
   */
  public function setTargetId($target_id);
}
