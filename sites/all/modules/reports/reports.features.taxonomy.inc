<?php
/**
 * @file
 * reports.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function reports_taxonomy_default_vocabularies() {
  return array(
    'un_graphs' => array(
      'name' => 'Graphs',
      'machine_name' => 'un_graphs',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}
