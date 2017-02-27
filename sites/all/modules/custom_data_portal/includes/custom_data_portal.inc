<?php

/**
 * This function fetches the details for Expenses for programe activities
 * on google chart used in Funds and Funding page.
 *
 * @return array
 *  Outcome array with all details of category.
 */
function custom_data_portal_transparency_funds_get_outcomes() {
  $query = db_select('support_outcomes', 's')->fields('s')->execute();
  $result = $query->fetchAll();
  $outcomes = array();
  $parent_label = "";
  $i = 1;
  // Prepares label and outcomes for donut and bar chart.
  foreach ($result as $support_outcome) {
    // Program activities parent labels.
    if ($parent_label != $support_outcome->short_text) {
      $outcomes['P' . $i]['label'] = $support_outcome->short_text;
      $outcomes['P' . $i]['outcomes'] = $support_outcome->short_text;
      $parent_label = $support_outcome->short_text;
      $i++;
    }
    // Program activities child labels.
    $outcomes[$support_outcome->project_type]['label'] = $support_outcome->short_text;
    $outcomes[$support_outcome->project_type]['outcomes'] = $support_outcome->descr;
  }

  return $outcomes;
}

/**
 * Function to show the Transparency images block.
 * 
 * @return array
 *  Generate theme.
 */
function custom_data_portal_transparency_block_images() {
  $module_path = drupal_get_path('module', 'custom_data_portal');
  $transparency_icon_path = $module_path . '/images/transparency-portal-section-icons';
  $annual_report_icon_variables = array('path' => $transparency_icon_path . '/annual-report-icon.png');
  $donor_contributions_icon_variables = array('path' => $transparency_icon_path . '/donor-contributions-icon.png');
  $programme_expenses_icon_variables = array('path' => $transparency_icon_path . '/programme-expenses-icon.png');
  $total_need_icon_variables = array('path' => $transparency_icon_path . '/total-need-icon.png');
  $transparency_portal_icon_variables = array('path' => $transparency_icon_path . '/transparency-portal-icons.png');

  $variables = array('section_title' => t('Transparency'),
    'annual_report_icon' => theme('image', $annual_report_icon_variables),
    'donor_contributions_icon' => theme('image', $donor_contributions_icon_variables),
    'programme_expenses_icon' => theme('image', $programme_expenses_icon_variables),
    'total_need_icon' => theme('image', $total_need_icon_variables),
    'transparency_portal_icon' => theme('image', $transparency_portal_icon_variables),
    'transparency_portal_url' => url('transparency-portal'),
    'donor_contributions_url' => url('donor-contributions'),
    'total_need_url' => url('total-need'),
    'annual_report_url' => url('annual-report'),
  );

  return theme('custom_data_portal_transparency_block_images', $variables);
}
