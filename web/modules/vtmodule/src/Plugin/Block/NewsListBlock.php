<?php

namespace Drupal\vtmodule\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a News List Block.
 *
 * @Block(
 *   id = "news_list",
 *   admin_label = @Translation("News List Block"),
 *   category = @Translation("News List"),
 * )
 */
class NewsListBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $nids = \Drupal::entityQuery('node')
      ->condition('status', 1)
      ->condition('type', 'news')
      ->range(0, 1)
      ->sort('created', 'DESC')
      ->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);

    return array(
      '#theme' => 'news_list',
      '#news' => $nodes
    );
  }

}
