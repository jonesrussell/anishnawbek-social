<?php

/**
 * @file
 * Contains \Drupal\activity_basics\Plugin\ActivityContext\CommunityActivityContext.
 */

namespace Drupal\activity_basics\Plugin\ActivityContext;

use Drupal\activity_basics\Recipient\CommunityRecipient;
use Drupal\activity_creator\Plugin\ActivityContextBase;
use Drupal\group\Entity\GroupContent;

/**
 * Provides a 'CommunityActivityContext' acitivy context.
 *
 * @ActivityContext(
 *  id = "community_activity_context",
 *  label = @Translation("Community activity context"),
 * )
 */
class CommunityActivityContext extends ActivityContextBase {

  /**
   * {@inheritdoc}
   */
  public function getRecipients(array $data, $last_uid, $limit) {
    $recipients = array();
    $recipients[] = new CommunityRecipient();
    return $recipients;
  }

  public function isValidEntity($entity) {
    // Check if it's placed in a group (regardless off content type).
    if ($group_entity = GroupContent::loadByEntity($entity)) {
      return FALSE;
    }
    if ($entity->getEntityTypeId() === 'post') {
      if (!empty($entity->get('field_recipient_group')->getValue())) {
        return FALSE;
      }
      elseif (!empty($entity->get('field_recipient_user')->getValue())) {
        return FALSE;
      }
    }
    return TRUE;
  }

}
