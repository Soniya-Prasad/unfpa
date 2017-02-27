<?php

/**
 * @file
 * This file holds Annual Report page callback (for both 2014 and 2015).
 */



/**
 * Menu callback for UNFPA Annual Reports 2014 page.
 *
 * @see template_preprocess_welldone_home_page()
 * @see un-report-page.tpl.php
 */
function un_annual_report_page($year) {
  $path = drupal_get_path('module', 'un');

  // Attach scripts that have to run first.
  drupal_add_js($path . '/js/lib.detectmobilebrowser.js', array('type' => 'file', 'scope' => 'header'));
  drupal_add_js($path . '/un.early.js', array('type' => 'file', 'scope' => 'header'));

  // Attach js files - libraries.
  drupal_add_js($path . '/js/lib.colorbox.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/js/lib.skrollr.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/js/lib.chartjs.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/js/lib.owl-carousel.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/js/lib.waypoints.js', array('type' => 'file', 'scope' => 'footer'));
  if ($year == '2015') {
    drupal_add_js($path . '/js/lib.masonry.js', array('type' => 'file', 'scope' => 'footer'));
  }

  // Attach js files - custom.
  drupal_add_js($path . '/un.general.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/un.scrolling.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/un.charts.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js($path . '/un.cboxload.js', array('type' => 'file', 'scope' => 'footer'));
  // Attach script that has to be ready when DOM is still loading.
  // The reason is that it contains functions called from inline <scripts>'s.
  drupal_add_js($path . '/un.gchart.js', array('type' => 'file', 'scope' => 'header'));

  // Attach css files.
  drupal_add_css($path . '/un-fonts.css');
  drupal_add_css($path . '/js/lib.owl-carousel.css');
  drupal_add_css($path . '/un-style.css');

  if ($year == '2015') {
    $theme = 'un_annual_report_page_2015';
    // Attach additional css overrides if it's a report from 2015 which uses
    // slightly different styling as well as new items that need styling.
    drupal_add_css($path . '/un-style-2015.css');
    drupal_add_css($path . '/animate.css');
  }
  else {
    $theme = 'un_annual_report_page_2014';
  }

  // Return renderable array with information about theme.
  $output = array(
    '#theme' => $theme,
    '#type' => 'markup',
  );

  return $output;
}
