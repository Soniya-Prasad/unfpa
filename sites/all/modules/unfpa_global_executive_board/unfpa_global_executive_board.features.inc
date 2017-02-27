<?php
/**
 * @file
 * unfpa_global_executive_board.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function unfpa_global_executive_board_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "page_manager" && $api == "pages_default") {
    return array("version" => "1");
  }
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function unfpa_global_executive_board_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function unfpa_global_executive_board_node_info() {
  $items = array(
    'board_documents' => array(
      'name' => t('Board Documents'),
      'base' => 'node_content',
      'description' => t('Board Documents for Executive board.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'ct_programme_documents' => array(
      'name' => t('Programme documents'),
      'base' => 'node_content',
      'description' => t('Programme documents'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'executive_board' => array(
      'name' => t('Executive Board'),
      'base' => 'node_content',
      'description' => t('Member of Executive Board'),
      'has_title' => '1',
      'title_label' => t('Name'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
