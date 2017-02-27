<?php
/**
 * @file
 * unfpa_global_funds_and_funding.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function unfpa_global_funds_and_funding_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "page_manager" && $api == "pages_default") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function unfpa_global_funds_and_funding_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}
