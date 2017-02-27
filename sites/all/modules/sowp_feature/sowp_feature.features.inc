<?php
/**
 * @file
 * sowp_feature.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function sowp_feature_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function sowp_feature_node_info() {
  $items = array(
    'sowp_bigintro' => array(
      'name' => t('SOWP Big Intro'),
      'base' => 'node_content',
      'description' => t('The big introduction text that goes right after the section main title.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'sowp_body' => array(
      'name' => t('SOWP Regular Body'),
      'base' => 'node_content',
      'description' => t('Regular body is used to create the main content of each section, including main content sidebar.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'sowp_chart' => array(
      'name' => t('SOWP Chart/Images'),
      'base' => 'node_content',
      'description' => t('A standalone chart that will appear within the area that print all Regular Bodies of each section.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'sowp_story' => array(
      'name' => t('SOWP Featured Story'),
      'base' => 'node_content',
      'description' => t('A single Featured Stories subsection entry.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
