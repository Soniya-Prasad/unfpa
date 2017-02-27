<?php

drupal_get_path('module', 'custom_data_portal');
?>
<?php

/**
 * Function for generating form
 */
function custom_data_dropdown($form, &$form_state) {
  $form['custom_data_dropdown']['year'] = array(
    '#title' => t('Please select a year:'),
    '#type' => 'select',
    '#options' => _load_year(),
    '#ajax' => array(
      'event' => 'change',
      'callback' => 'custom_data_dropdown_activities',
      'wrapper' => 'activities-wrapper',
    ),
  );

  $form['custom_data_dropdown']['wrapper'] = array(
    '#prefix' => '<div id="activities-wrapper">',
    '#suffix' => '</div>',
  );

  $options = array('- Select activity -');
  if (isset($form_state['values']['year'])) {
    $options = _load_activities($form_state['values']['year']);
  }

// Province dropdown list
  $form['custom_data_dropdown']['wrapper']['activities'] = array(
    '#title' => t('activities'),
    '#type' => 'select',
    '#options' => $options,
  );

// Form submit button
  $form["custom_data_dropdown"]["submit"] = array(
    "#value" => t("Submit"),
    "#type" => "submit",
    "#submit" => array("custom_data_dropdown_submit"),
  );

  return $form;
}

/**
 * Function for handling form submission
 */
function custom_data_dropdown_submit($form, &$form_state) {
  $replacement = array(
    '@province_id' => $form_state['values']['year'],
    '@city_id' => $form_state['values']['activities'],
  );

  drupal_set_message(t('Submitted data: Province ID = @province_id, activities ID = @city_id.', $replacement));
}

/**
 * Function for handling ajax request
 */
function custom_data_dropdown_activities($form, $form_state) {
// Return the dropdown list including the wrapper
  return $form['custom_data_dropdown']['wrapper'];
}

/**
 * Function for populating year
 */
function _load_year() {
  $year = array('- Select year -');

  $q = db_select('iatifinal', 'i')->distinct()->fields('i', array('year'))->orderBy('i.year', 'ASC')->execute();
  $res = $q->fetchAll();
  foreach ($res as $key => $row) {

    $year[$row->year] = $row->year;
  }
  return $year;
}

/**
 * Function for populating city
 */
function _load_activities($year) {
  //echo $year."---";
  $activities = array('- Select activity -');
  if (!empty($year)) {
    //Outcomes Array
    $q = db_select('support_outcomes', 's')->fields('s')->execute();
    $res = $q->fetchAll();
    $so_arr = array(); // Contains the Support Outcomes Array
    foreach ($res as $key => $so) {
      $project_type = $so->project_type;
      $so_label = $so->descr;

      $so_arr[$project_type]['type'] = $project_type;
      $so_arr[$project_type]['label'] = $so_label;
    }

    // Select table
    $query = db_select("iatifinal", "i");
    // Selected fields
    $query->fields("i", array('outcome'));
    // Filter the active ones only
    //$query->condition("a.status", 1);
    // Filter based province id
    //$query->condition("a.province_id", $province_id);
    // Order by name
    $query->orderBy('i.outcome', "ASC");
    // Execute query
    $result = $query->execute();

    while ($row = $result->fetchObject()) {
      // Key-value pair for dropdown options
      $activities[$row->outcome] = $so_arr[$row->outcome]['label'];
    }
  }
  return $activities;
}
