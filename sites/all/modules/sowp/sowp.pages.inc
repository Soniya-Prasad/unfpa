<?php

/**
 * @file
 * Page callbacks for SOWP Reports.
 */

/**
 * Menu callback for State of World Population 2015 page.
 *
 * @see template_preprocess_sowp_report_page_2015()
 * @see sowp-report-page-2015.tpl.php
 */
function sowp_report_page($year = 2015) {
  $path = drupal_get_path('module', 'sowp');

  // Attach js files - libraries.
  drupal_add_js($path . '/js/lib.detectmobilebrowser.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/js/lib.cycle2.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/js/lib.cycle-swipe.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/js/lib.easing.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/js/lib.colorbox.js', array('type' => 'file', 'scope' => 'footer'));

  // These two are used by map with tabs.
  drupal_add_js($path . '/js/lib.image-map.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/js/lib.responsive-tabs.js', array('type' => 'file', 'scope' => 'footer'));

  // These three are used by Timeline.
  drupal_add_js($path . '/js/lib.chartjs.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_library('system', 'ui.slider');
  drupal_add_js($path . '/js/lib.jqueryui-touch-punch.js', array('type' => 'file', 'scope' => 'footer'));

  // Used by Venn Diagram (for color animation).
  drupal_add_library('system', 'effects');

  // Used by SWOP 2016 Masonry Tiles.
  if ($year == 2016) {
    drupal_add_js($path . '/js/lib.masonry.js', array('type' => 'file', 'scope' => 'footer'));
  }

  // Attach js files - custom.
  drupal_add_js($path . '/sowp.general.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/sowp.scrolling.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/sowp.cboxload.js', array('type' => 'file', 'scope' => 'footer'));

  // Attach scripts that have to be ready when DOM is still loading.
  if ($year == 2015) {
    drupal_add_js($path . '/js/simplemaps/lib.worldmap.js', array('type' => 'file', 'scope' => 'header'));
  }

  // Attach js setting with path to sowp module directory.
  drupal_add_js(array('sowp' => array('modulePath' => base_path() . $path)), 'setting');

  // Attach css files.
  drupal_add_css($path . '/images/font-icons/sowp-icons.css');
  drupal_add_css($path . '/sowp-fonts.css');
  drupal_add_css($path . '/sowp-style.css');
  if ($year == 2016) {
    drupal_add_css($path . '/sowp-style-2016.css');
  }

  // Before returning themed page, attach "og:" meta tags.
  sowp_share_metatags($year);

  // Return renderable array with information about theme.
  $output = array(
    '#theme' => 'sowp_report_page_' . $year,
    '#type' => 'markup',
  );

  return $output;
}
