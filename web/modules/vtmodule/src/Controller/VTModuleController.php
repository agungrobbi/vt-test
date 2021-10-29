<?php

namespace Drupal\vtmodule\Controller;

use Drupal\Core\Controller\ControllerBase;

class VTModuleController extends ControllerBase
{
  public function renderEventsListBlock()
  {
    $block_manager = \Drupal::service('plugin.manager.block');
    $config = [];
    $block = $block_manager->createInstance('events_list', $config);
    $render = $block->build();
    return $render;
  }

  public function renderNewsListBlock()
  {
    $block_manager = \Drupal::service('plugin.manager.block');
    $config = [];
    $block = $block_manager->createInstance('news_list', $config);
    $render = $block->build();
    return $render;
  }
}
