<?php

/**
 * @file
 * Contains \Drupal\activity_creator\Recipient\BaseRecipient.
 */

namespace Drupal\activity_creator\Recipient;

class BaseRecipient implements RecipientInterface {

  protected $target_id;

  /**
   * BaseRecipient constructor.
   * @param $target_id string
   */
  public function __construct($target_id = NULL) {
    $this->target_id = $target_id;
  }

  /**
   * @inheritdoc
   */
  public function id() {
    return 'base_recipient';
  }

  /**
   * @inheritdoc
   */
  public function getAccounts($entity) {
    return $entity;
  }

  /**
   * @inheritdoc
   */
  public function getTargetId() {
    return $this->target_id;
  }

  /**
   * @inheritdoc
   */
  public function setTargetId($target_id) {
    $this->target_id = $target_id;
  }
}