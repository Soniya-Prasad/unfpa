<?php
/**
 * @file
 * sowp_feature.features.filter.inc
 */

/**
 * Implements hook_filter_default_formats().
 */
function sowp_feature_filter_default_formats() {
  $formats = array();

  // Exported format: SOWP Text Format.
  $formats['sowp_format'] = array(
    'format' => 'sowp_format',
    'name' => 'SOWP Text Format',
    'cache' => 1,
    'status' => 1,
    'weight' => 0,
    'filters' => array(
      'filter_html' => array(
        'weight' => -10,
        'status' => 1,
        'settings' => array(
          'allowed_html' => '<p> <br> <a> <strong> <img> <div> <span>',
          'filter_html_help' => 1,
          'filter_html_nofollow' => 0,
        ),
      ),
      'video_filter' => array(
        'weight' => -1,
        'status' => 1,
        'settings' => array(
          'video_filter_width' => 320,
          'video_filter_height' => 180,
          'video_filter_autoplay' => 0,
          'video_filter_related' => 0,
          'video_filter_html5' => 1,
        ),
      ),
    ),
  );

  return $formats;
}
