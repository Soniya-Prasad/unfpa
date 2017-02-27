<?php
/**
 * @file
 * reports.features.filter.inc
 */

/**
 * Implements hook_filter_default_formats().
 */
function reports_filter_default_formats() {
  $formats = array();

  // Exported format: Line breaks.
  $formats['linebreaker'] = array(
    'format' => 'linebreaker',
    'name' => 'Line breaks',
    'cache' => 1,
    'status' => 1,
    'weight' => 0,
    'filters' => array(
      'filter_html' => array(
        'weight' => -49,
        'status' => 1,
        'settings' => array(
          'allowed_html' => '<em>',
          'filter_html_help' => 0,
          'filter_html_nofollow' => 0,
        ),
      ),
      'un_highlighter' => array(
        'weight' => -48,
        'status' => 1,
        'settings' => array(),
      ),
      'filter_autop' => array(
        'weight' => -47,
        'status' => 1,
        'settings' => array(),
      ),
    ),
  );

  return $formats;
}
