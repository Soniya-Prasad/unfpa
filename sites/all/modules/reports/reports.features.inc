<?php
/**
 * @file
 * reports.features.inc
 */

/**
 * Implements hook_node_info().
 */
function reports_node_info() {
  $items = array(
    'inaction' => array(
      'name' => t('In Action'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'progressitem' => array(
      'name' => t('Progress entry'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'region' => array(
      'name' => t('Region'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Region name'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
