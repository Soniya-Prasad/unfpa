<?php
/**
 * @file
 * feature_html5.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function feature_html5_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function feature_html5_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function feature_html5_node_info() {
  $items = array(
    'ct_feature' => array(
      'name' => t('Feature'),
      'base' => 'node_content',
      'description' => t('HTML5 Feature'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
