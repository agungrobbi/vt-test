<?php

namespace Drupal\vtmodule\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a Events List Block.
 *
 * @Block(
 *   id = "events_list",
 *   admin_label = @Translation("Events List Block"),
 *   category = @Translation("Events List"),
 * )
 */
class EventsListBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $nids = \Drupal::entityQuery('node')
      ->condition('status', 1)
      ->condition('type', 'events')
      ->sort('created' , 'DESC')
      ->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);

    return array(
      '#theme' => 'events_list',
      '#events' => $nodes
    );
  }

}
