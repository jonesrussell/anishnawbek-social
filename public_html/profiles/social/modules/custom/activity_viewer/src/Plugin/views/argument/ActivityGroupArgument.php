<?php
/**
 * @file
 * Activity Group Argument for Views.
 */

namespace Drupal\activity_viewer\Plugin\views\argument;

use Drupal\views\Plugin\views\argument\ArgumentPluginBase;

/**
 * Default implementation of the base argument plugin.
 *
 * @ingroup views_argument_handlers
 *
 * @ViewsArgument("activity_group_argument")
 */
class ActivityGroupArgument extends ArgumentPluginBase {

  /**
   * Set up the query for this argument.
   *
   * The argument sent may be found at $this->argument.
   */
  public function query($group_by = FALSE) {
    $this->ensureMyTable();

    // \Drupal\views\Plugin\views\query\QueryPluginBase.
    $this->query->addTable('activity__field_activity_recipient_id');
    $this->query->addTable('activity__field_activity_recipient_target');
    $this->query->addTable('activity__field_activity_entity');
    $this->query->addTable('activity__field_activity_destinations');

    $or_condition = db_or();

    $reciepient_group = db_and();

    // Group is a recipient.
    $reciepient_group->condition('activity__field_activity_recipient_id.field_activity_recipient_id_target_id', 'group_recipient', '=');
    $reciepient_group->condition('activity__field_activity_recipient_target.field_activity_recipient_target_target_id', $this->argument, '=');

    $or_condition->condition($reciepient_group);

    $this->query->addWhere('activity_group_argument', $or_condition);

  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    $cache_contexts = parent::getCacheContexts();

    // Since the Stream is different per url.
    if (!in_array('url', $cache_contexts)) {
      $cache_contexts[] = 'url';
    }

    return $cache_contexts;
  }

}
