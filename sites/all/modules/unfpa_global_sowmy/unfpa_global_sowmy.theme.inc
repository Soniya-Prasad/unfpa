<?php

/**
 * @file
 * The theme system, which controls the output of Drupal.
 */

/**
 * Processes variables for swomy_page.tpl.php.
 */
function template_preprocess_unfpa_global_sowmy_page(&$variables) {
  global $language;
  // Prepare Country Data for Dropdown section.
  $variables['country_data'] = unfpa_global_sowmy_get_dropdown_values();
  $country_code = strtoupper($variables['country_code']);

  // Show Country Name as title of the page.
  $variables['sowmy_country_name'] = $variables['country_data'][$country_code];

  // What women and newborns need (2012)section.
  $variables['sowmy_needs_content'] = unfpa_global_sowmy_get_needs($country_code);

  // Workforce availability (2012)section.
  $variables['sowmy_availability_content'] = unfpa_global_sowmy_get_availability($country_code);

  // Geographic accessibility section.
  $sowmy_accessibility_content = unfpa_global_sowmy_get_accessibility_data($country_code);
  $variables['accessibility_label'] = $sowmy_accessibility_content['title'];
  $accessibility_settings = array(
    'id' => 'accessibility-chart',
    'rows' => $sowmy_accessibility_content['chart_rows'],
    'cols' => $sowmy_accessibility_content['chart_cols'],
    'options_array' => $sowmy_accessibility_content['options_array'],
  );
  drupal_add_js(array('unfpa_global_accessibility' => $accessibility_settings), 'setting');

  // Midwifery Education, Regulation and Professional Associations section.
  $variables['sowmy_midwifery_content'] = unfpa_global_sowmy_get_education_regulation_association($country_code);

  // Midwifery Pregnencies section.
  $sowmy_pregnencies_content = unfpa_global_sowmy_get_pregnencies_data($country_code);
  $pregnencies_settings = array(
    'id' => 'pregencies-chart',
    'rows' => $sowmy_pregnencies_content['chart_rows'],
    'cols' => $sowmy_pregnencies_content['chart_cols'],
    'options_array' => $sowmy_pregnencies_content['options'],
  );
  drupal_add_js(array('unfpa_global_pregnencies_data' => $pregnencies_settings), 'setting');

  // WhatIf section.
  $variables['sowmy_whatif_content'] = unfpa_global_sowmy_whatif($country_code);

  // Get data for whatif and current trajectory content.
  $current_trajectory_content = unfpa_global_sowmy_current_trajectory($country_code);
  $whatif_trajectory_content = unfpa_global_sowmy_whatif_trajectory($country_code);

  // Set the final maximum value for vAxis current and whatif trajectory graph.
  $max_value = max($current_trajectory_content['options']['vAxis']['viewWindow']['max'], $whatif_trajectory_content['options']['vAxis']['viewWindow']['max']);
  $current_trajectory_content['options']['vAxis']['viewWindow']['max'] = $max_value;
  $whatif_trajectory_content['options']['vAxis']['viewWindow']['max'] = $max_value;

  // The below section is for current trajectory and whatif trajectory.
  $variables['current_trajectory_label'] = t('CURRENT TRAJECTORY');
  $variables['current_trajectory_met_need'] = $current_trajectory_content['met_need'];

  $variables['whatif_trajectory_label'] = t('WHAT IF... TRAJECTORY');
  $variables['whatif_trajectory_met_need'] = $whatif_trajectory_content['met_need'];

  $current_trajectory_settings = array(
    'id' => 'visualization',
    'rows' => $current_trajectory_content['chart_rows'],
    'cols' => $current_trajectory_content['chart_cols'],
    'options_array' => $current_trajectory_content['options'],
  );

  $whatif_trajectory_settings = array(
    'id' => 'whatif-chart',
    'rows' => $whatif_trajectory_content['chart_rows'],
    'cols' => $whatif_trajectory_content['chart_cols'],
    'options_array' => $whatif_trajectory_content['options'],
  );

  drupal_add_js(array('unfpa_global_current_trajectory' => $current_trajectory_settings), 'setting');
  drupal_add_js(array('unfpa_global_whatif_trajectory' => $whatif_trajectory_settings), 'setting');

  // SOWMY Footnotes section.
  $sowmy_footnotes_content = unfpa_global_sowmy_get_footnotes($country_code);
  $variables['footnote1'] = locale($sowmy_footnotes_content['A'], NULL, $language->language);
  $variables['footnote2'] = locale($sowmy_footnotes_content['B'], NULL, $language->language);
  $variables['footnote3'] = locale($sowmy_footnotes_content['C'], NULL, $language->language);
  $variables['footnote4'] = locale($sowmy_footnotes_content['D'], NULL, $language->language);
}
