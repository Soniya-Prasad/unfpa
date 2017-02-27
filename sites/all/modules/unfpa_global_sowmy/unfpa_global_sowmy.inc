<?php

/**
 * @file
 * Include file for Custom SOWMY.
 */

/**
 * Fetches map data shown on map used on SOWMY landing page.
 *
 * @return object
 *    Returns the result for map data.
 */
function unfpa_global_sowmy_get_map_data() {
  $query = db_select('sowmy_availability', 's');
  $query->join('country_code', 'c', 'c.cc = s.CC');
  $query->fields('c');
  $query->fields('s');
  $query->where('CHAR_LENGTH(c.cc) = 2');
  $result = $query->execute()->fetchAll();

  return $result;
}

/**
 * Fetches the data to show on dropdown on SOWMY country page.
 *
 * @return country
 *   Country name with country code.
 */
function unfpa_global_sowmy_get_dropdown_values() {
  global $language;
  $country = array();
  $query = db_select('sowmy_needs', 's');
  $query->join('country_code', 'c', 'c.cc = s.CC');
  $query->fields('c');
  $query->where('CHAR_LENGTH(c.cc) = 2');
  $query->orderBy('c.c_name');
  $result = $query->execute()->fetchAll();

  foreach ($result as $country_code) {
    $country[$country_code->cc] = locale(unfpa_global_sowmy_rename_country($country_code->c_name), NULL, $language->language);
  }

  return $country;
}

/**
 * Get the color codes for the map on SOWMY landing page.
 *
 * @return array
 *    Color codes.
 */
function unfpa_global_sowmy_get_color_code() {

  return array(
    0 => '#9ea9ad',
    2 => '#919da1',
    12 => '#839096',
    25 => '#75848a',
    35 => '#69777c',
    45 => '#647176',
    55 => '#5e6a6e',
    65 => '#525d61',
    75 => '#464f53',
    85 => '#3a4245',
    87 => '#2f3537',
    96 => '#232829',
    98 => '#171a1c',
    100 => '#0c0d0e',
  );
}

/**
 * Fetches data to show on What women and newborns need section on Country page.
 *
 * @param string $country_code
 *   Two digit Country code.
 *
 * @return array
 *    Returns data for women and newborns needs.
 */
function unfpa_global_sowmy_women_and_newborns_needs_data($country_code) {
  $query = db_select('sowmy_needs', 's');
  $query->join('country_code', 'c', 'c.cc = s.CC');
  $query->fields('c', array('c_name'));
  $query->fields('s');
  $query->condition('s.CC', $country_code);
  $sowmy_record = $query->execute()->fetchAssoc();

  // Generate image for needs section.
  $image_placeholder = array('@country_name' => locale($sowmy_record['c_name']), '@image_text' => t('Number and distribution of pregnancies (2012)'));
  $image_name = format_string('@country_name - @image_text', $image_placeholder);
  $image_variables = array(
    'path' => base_path() . 'sites/default/files/sowmy_country_images/' . $country_code . '.png',
    'alt' => $image_name,
    'title' => $image_name,
  );

  $data = array(
    // Label.
    'title' => $sowmy_record['A'],
    // Number of pregnancies in 2012.
    'number_of_pregnancies' => number_format($sowmy_record['B']),
    // Total number of family planning visits (advice and delivery)
    // needed in 2012.
    'number_of_family_planning_visits' => number_format($sowmy_record['C']),
    // Number of ANC visits needed in 2012: 2012 pregnancies x 4.
    'number_of_anc_visits_needed' => number_format($sowmy_record['D']),
    // Number of skilled birth attendance needed in 2012: 2012 deliveries.
    'skilled_birth_attendance_needed' => number_format($sowmy_record['E']),
    // Number of PNC visits needed in 2012: 2012 deliveries x 4.
    'number_of_pnc_visits_needed' => number_format($sowmy_record['F']),
    // Country name.
    'country_name' => $sowmy_record['c_name'],
    'image' => theme('image', $image_variables),
  );

  return $data;
}

/**
 * Fetches data to show on Workforce availability section on Country page.
 *
 * @param string $country_code
 *   Two digit Country code.
 *
 * @return array
 *    Returns availability data.
 */
function unfpa_global_sowmy_get_availability_data($country_code) {
  global $language; 
  $query = db_select('sowmy_availability', 's');
  $query->fields('s');
  $query->condition('s.CC', $country_code);
  $availability_record = $query->execute()->fetchAssoc();

  $data = array(
    // Section label.
    'title' => locale($availability_record['A'], NULL, $language->language),
    // Number of full time equivalent health workers in a "midwife" cadre
    // working in MNH , 2012.
    'midwife_workers' => unfpa_global_sowmy_check_is_numeric($availability_record['B']),
    // Percentage of available working hours that health workers in a "midwife"
    // cadre spend on providing MNH care.
    'midwife_working_hours' => unfpa_global_sowmy_check_is_numeric($availability_record['C']),
    // Number of full time equivalent health workers in an "auxiliary midwife"
    // cadre  working in MNH , 2012.
    'auxiliary_midwife_workers' => unfpa_global_sowmy_check_is_numeric($availability_record['D']),
    // Percentage of available working hours that health workers in an
    // "auxiliary midwife" cadre spend on providing MNH care.
    'auxiliary_midwife_working_hours' => unfpa_global_sowmy_check_is_numeric($availability_record['E']),
    // Number of full time equivalent health workers in a "nurse-midwife" cadre
    // working in MNH , 2012.
    'nurse_midwife_workers' => unfpa_global_sowmy_check_is_numeric($availability_record['F']),
    // Percentage of available working hours that health workers in a
    // "nurse-midwife" cadre spend on providing MNH care.
    'nurse_midwife_working_hours' => unfpa_global_sowmy_check_is_numeric($availability_record['G']),
    // Number of full time equivalent health workers in a "nurse" cadre
    // working in MNH , 2012.
    'nurse_workers' => unfpa_global_sowmy_check_is_numeric($availability_record['H']),
    // Percentage of available working hours that health workers in a "nurse"
    // cadre spend on providing MNH care.
    'nurse_working_hours' => unfpa_global_sowmy_check_is_numeric($availability_record['I']),
    // Number of full time equivalent health workers in a "auxiliary
    // nurse-midwife" cadre  working in MNH , 2012.
    'auxiliary_nurse_midwife_workers' => unfpa_global_sowmy_check_is_numeric($availability_record['J']),
    // Percentage of available working hours that health workers in a
    // "auxiliary nurse-midwife" cadre spend on providing MNH care.
    'auxiliary_nurse_midwife_working_hours' => unfpa_global_sowmy_check_is_numeric($availability_record['K']),
    // Number of full time equivalent health workers in a "physician generalist"
    // cadre  working in MNH , 2012.
    'physician_generalist_workers' => unfpa_global_sowmy_check_is_numeric($availability_record['L']),
    // Percentage of available working hours that health workers in a "physician
    // generalist" cadre spend on providing MNH care.
    'physician_generalist_working_hours' => unfpa_global_sowmy_check_is_numeric($availability_record['M']),
    // Number of full time equivalent health workers in a "physician specialist"
    // cadre  working in MNH , 2012.
    'physician_specialist_workers' => unfpa_global_sowmy_check_is_numeric($availability_record['N']),
    // Percentage of available working hours that health workers in a "physician
    // specialist" cadre spend on providing MNH care.
    'physician_specialist_working_hours' => unfpa_global_sowmy_check_is_numeric($availability_record['O']),
    // Number of full time equivalent health workers in a "clinical officer
    // and/or medical assistant" cadre  working in MNH , 2012.
    'clinical_officer_workers' => unfpa_global_sowmy_check_is_numeric($availability_record['P']),
    // Percentage of available working hours that health workers in a
    // "clinical officer and/or medical assistant"
    // cadre spend on providing MNH care.
    'clinical_officer_working_hours' => unfpa_global_sowmy_check_is_numeric($availability_record['R']),
    // Estimate of met need (national aggregate) based on
    // available data for year 2012.
    'met_need' => unfpa_global_sowmy_check_is_numeric($availability_record['S']),
  );

  return $data;
}

/**
 * Format a number with grouped thousands.
 *
 * @param string $value
 *    Number or a numeric string.
 *
 * @return string
 *    Formated number.
 */
function unfpa_global_sowmy_check_is_numeric($value) {
  global $language;
  return is_numeric($value) ? number_format($value) : locale($value, NULL, $language->language);
}

/**
 * Fetches data to show on Geographic accessibility section on Country page.
 *
 * @param string $country_code
 *   Two digit Country code.
 *
 * @return array
 *    Results for SOWMY accessibility.
 */
function unfpa_global_sowmy_get_accessibility_data($country_code) {
  $query = db_select('sowmy_accessibility', 's');
  $query->join('country_code', 'c', 'c.cc = s.CC');
  $query->fields('c');
  $query->fields('s');
  $query->condition('s.CC', $country_code);
  $accessibility_record = $query->execute()->fetchAssoc();

  /*
   * This is an internal function of 'unfpa_global_sowmy_get_accessibility_data'
   * that converts the value of a specific key inside the $accessibility_record
   * to an integer.
   *
   * @param $key
   *  A key to check.
   *
   * @return int
   *  The integer value of the accessibility record.
   */
  $get_accessibility_value = function ($key) use ($accessibility_record) {
    if (!isset($accessibility_record[$key])) {
      return 0;
    }
    // If this is a "not applicable" we should return 0 as a default value.
    return $accessibility_record[$key] == 'NOT APPLICABLE' ? 0 : intval($accessibility_record[$key]);
  };

  $chart_cols = array(
    array('id' => 'category', 'label' => 'Category', 'type' => 'string'),
    array(
      'id' => 'accessed_data',
      'label' => t('Accessed a SBA'),
      'type' => 'number',
    ),
    array(
      'id' => 'not_access_data',
      'label' => t('Did not access a SBA'),
      'type' => 'number',
    ),
    array(
      'id' => 'no_data',
      'label' => t('No data on rural/urban SBA'),
      'type' => 'number',
    ),
  );

  $chart_rows = array(
    array(
      'c' => array(
        array('v' => t('Rural')),
        // 'E' contains Number of live births taking place in rural areas,
        // 2012 * country-wide skilled birth attendance rate (DHS).
        array('v' => $get_accessibility_value('E')),
        // 'D' contains Number of live births taking place in rural areas,
        // 2012 * (1- country-wide skilled birth attendance rate (DHS)).
        array('v' => $get_accessibility_value('D')),
        // 'G' contains Number of live births (rural) - no SBA data.
        array('v' => $get_accessibility_value('G')),
      ),
    ),
    array(
      'c' => array(
        array('v' => t('Urban')),
        // 'C' contains Number of live births taking place in urban areas,
        // 2012 * country-wide skilled birth attendance rate (DHS).
        array('v' => $get_accessibility_value('C')),
        // 'B' contains Number of live births taking place in urban areas,
        // 2012 * (1- country-wide skilled birth attendance rate (DHS)).
        array('v' => $get_accessibility_value('B')),
        // 'F' Number of live births (urban) - No SBA data.
        array('v' => $get_accessibility_value('F')),
      ),
    ),
  );

  $options = array(
    'width' => '100%',
    'vAxis' => array(
      'minValue' => 0,
      'title' => t('Number of live births'),
      'gridlines' => array('count' => 4),
    ),
    'hAxis' => array(
      'baselineColor' => 'red',
      'baseline' => 2,
      'gridlines' => array('count' => 1),
    ),
    'legend' => array('position' => 'none'),
    'bar' => array('groupWidth' => "60%"),
    'isStacked' => TRUE,
    'series' => array(
      0 => array('color' => '#582E91'),
      1 => array('color' => '#F36421'),
      2 => array('color' => '#b7b794'),
    ),
  );

  $data = array(
    // Label.
    'title' => $accessibility_record['A'],
    'options_array' => $options,
    'chart_cols' => $chart_cols,
    'chart_rows' => $chart_rows,
  );

  return $data;
}

/**
 * Fetches data to show on Education, Regulation and association section.
 *
 * @param string $country_code
 *   Country code.
 *
 * @return array
 *    Returns data for Education, Regulation and association.
 */
function unfpa_global_sowmy_get_education_regulation_association_data($country_code) {
  global $language;
  $query = db_select('sowmy_education_regulation_association', 's');
  $query->fields('s');
  $query->condition('s.CC', $country_code);
  $association_record = $query->execute()->fetchAssoc();

  $data = array(
    // Minimum entry requirements to train as a midwife
    // (or nurse-midwife if no midwife cadre).
    'minimum_entry_requirements' => locale($association_record['A'], NULL, $language->language),
    // Years of study required to qualify as a midwife
    // (or nurse-midwife if no midwife cadre).
    'years_of_study_required' => locale($association_record['B'], NULL, $language->language),
    // Is there a standard curriculum for midwives
    // (or nurse-midwife if no midwife cadre)?.
    'standard_curriculum' => locale($association_record['C'], NULL, $language->language),
    // Midwives Year of last update.
    'last_update_year' => locale($association_record['D'], NULL, $language->language),
    // Number of midwives
    // (or nurse-midwife if no midwife cadre) graduating in 2012 as a
    // percentage of total number of midwives in 2012.
    'number_of_midwives' => locale($association_record['F'], NULL, $language->language),
    // Percentage of midwife graduates(or nurse-midwife if no midwife cadre)
    // that are typically employed within one year of graduation.
    'midwife_graduates_percent' => locale($association_record['G'], NULL, $language->language),
    // Is there legislation which recognizes midwifery as an
    // autonomous profession?
    'is_autonomous_profession' => locale($association_record['H'], NULL, $language->language),
    // Is there an officially recognized definition of a
    // professional midwife in the country?
    'is_professional_midwife' => locale($association_record['I'], NULL, $language->language),
    // Does a government body regulate midwifery practice?
    'midwifery_practice' => locale($association_record['J'], NULL, $language->language),
    // Is there a system of "licensing" for midwives (or nusre-midwives)
    // before they start practicing?
    'is_system_licensing' => locale($association_record['K'], NULL, $language->language),
    // Is there a register of licensed midwives (or nurse-midwives)?
    'licensed_midwives' => locale($association_record['L'], NULL, $language->language),
    // Number of EmONC function that midwives are authorized to carry out (n=7).
    'number_of_functions_carried_out' => locale($association_record['M'], NULL, $language->language),
    // Are midwives or nurse-midwives authorized
    // to provide contraceptive injections?
    'authorized_contraceptive_injections' => locale($association_record['N'], NULL, $language->language),
    // Number of EmONC functions that midwives are allowed to practice.
    'number_of_functions_allowed' => locale($association_record['O'], NULL, $language->language),
    // Midwives allowed to provide injectable contraceptives.
    'allowed_injectable_contraceptives' => locale($association_record['P'], NULL, $language->language),
    // Midwives allowed to provide IUDs.
    'allowed_to_provide_idu' => locale($association_record['Q'], NULL, $language->language),
    // Year of creation of professional associations.
    'professional_associations_year' => locale($association_record['R'], NULL, $language->language),
    // Does at least one professional association perform
    // continuing professional development?
    'professional_development' => locale($association_record['S'], NULL, $language->language),
    // Does at least one professional association advise or
    // respresent members accused of misconduct or incompetence?
    'members_accused' => locale($association_record['T'], NULL, $language->language),
    // Does at least one professional association advise members of
    // quality standards for MNH care?
    'advise_quality_standards' => locale($association_record['U'], NULL, $language->language),
    // Does at least one professional association provide advice to the
    // Government on the most recent national MNH or health policy document?
    'advice_health_policy' => locale($association_record['V'], NULL, $language->language),
    // Does at least one professional association negotiate work or
    // salary issues with the Government?
    'negotiate_work_salary_issues' => locale($association_record['W'], NULL, $language->language),
  );

  return $data;
}

/**
 * Fetches data to show on PROJECTED NUMBER OF PREGNANCIES on Country page.
 *
 * @param string $country_code
 *   Two digit Country code.
 *
 * @return array
 *    Returns rows and cols data for chart.
 */
function unfpa_global_sowmy_get_pregnencies_data($country_code) {
  $query = db_select('sowmy_pregnencies', 's');
  $query->fields('s');
  $query->condition('s.CC', $country_code);
  $get_pregnencies_record = $query->execute()->fetchAssoc();

  $chart_cols = array(
    array('id' => 'year', 'label' => t('year'), 'type' => 'string'),
    array('id' => 'rural', 'label' => t('Rural'), 'type' => 'number'),
    array('id' => 'urban', 'label' => t('Urban'), 'type' => 'number'),
  );

  $chart_rows = array(
    array(
      'c' => array(
        array('v' => '2012'),
        // Number of pregnancies taking places in rural areas, 2012.
        array('v' => intval($get_pregnencies_record['B'])),
        // Number of pregnancies taking places in urban areas, 2012.
        array('v' => intval($get_pregnencies_record['U'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2013'),
        // Number of pregnancies taking places in rural areas, 2013.
        array('v' => intval($get_pregnencies_record['C'])),
        // Number of pregnancies taking places in urban areas, 2013.
        array('v' => intval($get_pregnencies_record['V'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2014'),
        // Number of pregnancies taking places in rural areas, 2014.
        array('v' => intval($get_pregnencies_record['D'])),
        // Number of pregnancies taking places in urban areas, 2014.
        array('v' => intval($get_pregnencies_record['W'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2015'),
        // Number of pregnancies taking places in rural areas, 2015.
        array('v' => intval($get_pregnencies_record['E'])),
        // Number of pregnancies taking places in urban areas, 2015.
        array('v' => intval($get_pregnencies_record['X'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2016'),
        // Number of pregnancies taking places in rural areas, 2016.
        array('v' => intval($get_pregnencies_record['F'])),
        // Number of pregnancies taking places in urban areas, 2016.
        array('v' => intval($get_pregnencies_record['Y'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2017'),
        // Number of pregnancies taking places in rural areas, 2017.
        array('v' => intval($get_pregnencies_record['G'])),
        // Number of pregnancies taking places in rural areas, 2017.
        array('v' => intval($get_pregnencies_record['Z'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2018'),
        // Number of pregnancies taking places in rural areas, 2018.
        array('v' => intval($get_pregnencies_record['H'])),
        // Number of pregnancies taking places in urban areas, 2018.
        array('v' => intval($get_pregnencies_record['AA'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2019'),
        // Number of pregnancies taking places in rural areas, 2019.
        array('v' => intval($get_pregnencies_record['I'])),
        // Number of pregnancies taking places in urban areas, 2019.
        array('v' => intval($get_pregnencies_record['AB'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2020'),
        // Number of pregnancies taking places in rural areas, 2020.
        array('v' => intval($get_pregnencies_record['J'])),
        // Number of pregnancies taking places in urban areas, 2020.
        array('v' => intval($get_pregnencies_record['AC'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2021'),
        // Number of pregnancies taking places in rural areas, 2021.
        array('v' => intval($get_pregnencies_record['K'])),
        // Number of pregnancies taking places in urban areas, 2021.
        array('v' => intval($get_pregnencies_record['AD'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2022'),
        // Number of pregnancies taking places in rural areas, 2022.
        array('v' => intval($get_pregnencies_record['L'])),
        // Number of pregnancies taking places in urban areas, 2022.
        array('v' => intval($get_pregnencies_record['AE'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2023'),
        // Number of pregnancies taking places in rural areas, 2023.
        array('v' => intval($get_pregnencies_record['M'])),
        // Number of pregnancies taking places in urban areas, 2023.
        array('v' => intval($get_pregnencies_record['AF'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2024'),
        // Number of pregnancies taking places in rural areas, 2024.
        array('v' => intval($get_pregnencies_record['N'])),
        // Number of pregnancies taking places in urban areas, 2024.
        array('v' => intval($get_pregnencies_record['AG'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2025'),
        // Number of pregnancies taking places in rural areas, 2025.
        array('v' => intval($get_pregnencies_record['O'])),
        // Number of pregnancies taking places in urban areas, 2025.
        array('v' => intval($get_pregnencies_record['AH'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2026'),
        // Number of pregnancies taking places in rural areas, 2026.
        array('v' => intval($get_pregnencies_record['P'])),
        // Number of pregnancies taking places in urban areas, 2026.
        array('v' => intval($get_pregnencies_record['AI'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2027'),
        // Number of pregnancies taking places in rural areas, 2027.
        array('v' => intval($get_pregnencies_record['Q'])),
        // Number of pregnancies taking places in urban areas, 2027.
        array('v' => intval($get_pregnencies_record['AJ'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2028'),
        // Number of pregnancies taking places in rural areas, 2028.
        array('v' => intval($get_pregnencies_record['R'])),
        // Number of pregnancies taking places in urban areas, 2028.
        array('v' => intval($get_pregnencies_record['AK'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2029'),
        // Number of pregnancies taking places in rural areas, 2029.
        array('v' => intval($get_pregnencies_record['S'])),
        // Number of pregnancies taking places in urban areas, 2029.
        array('v' => intval($get_pregnencies_record['AL'])),
      ),
    ),
    array(
      'c' => array(
        array('v' => '2030'),
        // Number of pregnancies taking places in rural areas, 2030.
        array('v' => intval($get_pregnencies_record['T'])),
        // Number of pregnancies taking places in urban areas, 2030.
        array('v' => intval($get_pregnencies_record['AM'])),
      ),
    ),
  );

  $options = array(
    'width' => '100%',
    'vAxis' => array('minValue' => 0, 'title' => t('Number of pregnancies')),
    'legend' => array(
      'position' => 'right',
      ' maxLines' => 3,
      'alignment' => 'start',
    ),
    'bar' => array('groupWidth' => '50%'),
    'isStacked' => TRUE,
    'series' => array(
      0 => array('color' => '#FCB814'),
      1 => array('color' => '#72469B'),
    ),
  );

  $data = array(
    'options' => $options,
    'chart_cols' => $chart_cols,
    'chart_rows' => $chart_rows,
  );

  return $data;
}

/**
 * Fetches data for Whatif section.
 *
 * @param string $country_code
 *   Two digit Country code.
 *
 * @return array
 *    Resutrns result of what if data.
 */
function unfpa_global_sowmy_get_whatif_data($country_code) {
  $query = db_select('sowmy_whatif', 's');
  $query->fields('s');
  $query->condition('s.CC', $country_code);
  $whatif_record = $query->execute()->fetchAssoc();

  return $whatif_record;
}

/**
 * Fetches data to shown on CURRENT TRAJECTORY combo chart on country page.
 *
 * @param string $country_code
 *   Two digit Country code.
 *
 * @return array
 *    Returns data for Current trajectory.
 */
function unfpa_global_sowmy_get_current_trajectory($country_code) {
  $query = db_select('sowmy_current_trajectory', 's');
  $query->fields('s');
  $query->condition('s.CC', $country_code);
  $current_trajectory_record = $query->execute()->fetchAssoc();

  $year = array();
  $need_data = array();
  $availability_data = array();
  $year[0] = 2012;
  // Workforce need projection 2012(baseline scenario).
  $need_data[0] = $current_trajectory_record['A'];
  // Workforce availability projection 2012(baseline scenario).
  $availability_data[0] = $current_trajectory_record['T'];
  $year[1] = 2013;
  // Workforce need projection 2013(baseline scenario).
  $need_data[1] = $current_trajectory_record['B'];
  // Workforce availability projection 2013(baseline scenario).
  $availability_data[1] = $current_trajectory_record['U'];
  $year[2] = 2014;
  // Workforce need projection 2014(baseline scenario).
  $need_data[2] = $current_trajectory_record['C'];
  $availability_data[2] = $current_trajectory_record['V'];
  $year[3] = 2015;
  // Workforce need projection 2015(baseline scenario).
  $need_data[3] = $current_trajectory_record['D'];
  // Workforce availability projection 2015(baseline scenario).
  $availability_data[3] = $current_trajectory_record['W'];
  $year[4] = 2016;
  // Workforce need projection 2016(baseline scenario).
  $need_data[4] = $current_trajectory_record['E'];
  // Workforce availability projection 2016(baseline scenario).
  $availability_data[4] = $current_trajectory_record['X'];
  $year[5] = 2017;
  // Workforce need projection 2017(baseline scenario).
  $need_data[5] = $current_trajectory_record['F'];
  // Workforce availability projection 2017(baseline scenario).
  $availability_data[5] = $current_trajectory_record['Y'];
  $year[6] = 2018;
  // Workforce need projection 2018(baseline scenario).
  $need_data[6] = $current_trajectory_record['G'];
  // Workforce availability projection 2018(baseline scenario).
  $availability_data[6] = $current_trajectory_record['Z'];
  $year[7] = 2019;
  // Workforce need projection 2019(baseline scenario).
  $need_data[7] = $current_trajectory_record['H'];
  // Workforce availability projection 2019(baseline scenario).
  $availability_data[7] = $current_trajectory_record['AA'];
  $year[8] = 2020;
  // Workforce need projection 2020(baseline scenario).
  $need_data[8] = $current_trajectory_record['I'];
  // Workforce availability projection 2020(baseline scenario).
  $availability_data[8] = $current_trajectory_record['AB'];
  $year[9] = 2021;
  // Workforce need projection 2021(baseline scenario).
  $need_data[9] = $current_trajectory_record['J'];
  // Workforce availability projection 2021(baseline scenario).
  $availability_data[9] = $current_trajectory_record['AC'];
  $year[10] = 2022;
  // Workforce need projection 2022(baseline scenario).
  $need_data[10] = $current_trajectory_record['K'];
  // Workforce availability projection 2022(baseline scenario).
  $availability_data[10] = $current_trajectory_record['AD'];
  $year[11] = 2023;
  // Workforce need projection 2023(baseline scenario).
  $need_data[11] = $current_trajectory_record['L'];
  // Workforce availability projection 2023(baseline scenario).
  $availability_data[11] = $current_trajectory_record['AE'];
  $year[12] = 2024;
  // Workforce need projection 2024(baseline scenario).
  $need_data[12] = $current_trajectory_record['M'];
  // Workforce availability projection 2024(baseline scenario).
  $availability_data[12] = $current_trajectory_record['AF'];
  $year[13] = 2025;
  // Workforce need projection 2025(baseline scenario).
  $need_data[13] = $current_trajectory_record['N'];
  // Workforce availability projection 2025(baseline scenario).
  $availability_data[13] = $current_trajectory_record['AG'];
  $year[14] = 2026;
  // Workforce need projection 2026(baseline scenario).
  $need_data[14] = $current_trajectory_record['O'];
  // Workforce availability projection 2026(baseline scenario).
  $availability_data[14] = $current_trajectory_record['AH'];
  $year[15] = 2027;
  // Workforce need projection 2027(baseline scenario).
  $need_data[15] = $current_trajectory_record['P'];
  // Workforce availability projection 2027(baseline scenario).
  $availability_data[15] = $current_trajectory_record['AI'];
  $year[16] = 2028;
  // Workforce need projection 2028(baseline scenario).
  $need_data[16] = $current_trajectory_record['Q'];
  // Workforce availability projection 2028(baseline scenario).
  $availability_data[16] = $current_trajectory_record['AJ'];
  $year[17] = 2029;
  // Workforce need projection 2029(baseline scenario).
  $need_data[17] = $current_trajectory_record['R'];
  // Workforce availability projection 2029(baseline scenario).
  $availability_data[17] = $current_trajectory_record['AK'];
  $year[18] = 2030;
  // Workforce need projection 2030(baseline scenario).
  $need_data[18] = $current_trajectory_record['S'];
  // Workforce availability projection 2030(baseline scenario).
  $availability_data[18] = $current_trajectory_record['AL'];

  $need_value = max($need_data);
  $availability_value = max($availability_data);
  $data = array(
    'year' => $year,
    'need_data' => $need_data,
    'availability_data' => $availability_data,
    // Met Need 2030(baseline).
    'met_need' => $current_trajectory_record['AM'],
    'max_current_value' => max($need_value, $availability_value),
  );

  return $data;
}

/**
 * Fetches data to de shown on WHAT IF.. TRAJECTORY combo chart on country page.
 *
 * @param string $country_code
 *   Two digit Country code.
 *
 * @return array
 *    Returns data for ehat if trajectory.
 */
function unfpa_global_sowmy_get_whatif_trajectory_data($country_code) {
  $query = db_select('sowmy_whatif_trajectory', 's');
  $query->fields('s');
  $query->condition('s.CC', $country_code);
  $whatif_trajectory_record = $query->execute()->fetchAssoc();

  $year = array();
  $need_data = array();
  $availability_data = array();
  $year[0] = 2012;
  // Workforce need projection 2012(scenario 1).
  $need_data[0] = $whatif_trajectory_record['A'];
  // Workforce availability projection 2012(scenarios 2 + 3 + 4).
  $availability_data[0] = $whatif_trajectory_record['T'];
  $year[1] = 2013;
  // Workforce need projection 2013(scenario 1).
  $need_data[1] = $whatif_trajectory_record['B'];
  // Workforce availability projection 2013(scenarios 2 + 3 + 4).
  $availability_data[1] = $whatif_trajectory_record['U'];
  $year[2] = 2014;
  // Workforce need projection 2014(scenario 1).
  $need_data[2] = $whatif_trajectory_record['C'];
  // Workforce availability projection 2014(scenarios 2 + 3 + 4).
  $availability_data[2] = $whatif_trajectory_record['V'];
  $year[3] = 2015;
  // Workforce need projection 2015(scenario 1).
  $need_data[3] = $whatif_trajectory_record['D'];
  // Workforce availability projection 2015(scenarios 2 + 3 + 4).
  $availability_data[3] = $whatif_trajectory_record['W'];
  $year[4] = 2016;
  // Workforce need projection 2016(scenario 1).
  $need_data[4] = $whatif_trajectory_record['E'];
  // Workforce availability projection 2016(scenarios 2 + 3 + 4).
  $availability_data[4] = $whatif_trajectory_record['X'];
  $year[5] = 2017;
  // Workforce need projection 2017(scenario 1).
  $need_data[5] = $whatif_trajectory_record['F'];
  // Workforce availability projection 2017(scenarios 2 + 3 + 4).
  $availability_data[5] = $whatif_trajectory_record['Y'];
  $year[6] = 2018;
  // Workforce need projection 2018(scenario 1).
  $need_data[6] = $whatif_trajectory_record['G'];
  // Workforce availability projection 2018(scenarios 2 + 3 + 4).
  $availability_data[6] = $whatif_trajectory_record['Z'];
  $year[7] = 2019;
  // Workforce need projection 2019(scenario 1).
  $need_data[7] = $whatif_trajectory_record['H'];
  // Workforce availability projection 2019(scenarios 2 + 3 + 4).
  $availability_data[7] = $whatif_trajectory_record['AA'];
  $year[8] = 2020;
  // Workforce need projection 2020(scenario 1).
  $need_data[8] = $whatif_trajectory_record['I'];
  // Workforce availability projection 2020(scenarios 2 + 3 + 4).
  $availability_data[8] = $whatif_trajectory_record['AB'];
  $year[9] = 2021;
  // Workforce need projection 2021(scenario 1).
  $need_data[9] = $whatif_trajectory_record['J'];
  // Workforce availability projection 2021(scenarios 2 + 3 + 4).
  $availability_data[9] = $whatif_trajectory_record['AC'];
  $year[10] = 2022;
  // Workforce need projection 2022(scenario 1).
  $need_data[10] = $whatif_trajectory_record['K'];
  // Workforce availability projection 2022(scenarios 2 + 3 + 4).
  $availability_data[10] = $whatif_trajectory_record['AD'];
  $year[11] = 2023;
  // Workforce need projection 2023(scenario 1).
  $need_data[11] = $whatif_trajectory_record['L'];
  // Workforce availability projection 2023(scenarios 2 + 3 + 4).
  $availability_data[11] = $whatif_trajectory_record['AE'];
  $year[12] = 2024;
  // Workforce need projection 2024(scenario 1).
  $need_data[12] = $whatif_trajectory_record['M'];
  // Workforce availability projection 2024(scenarios 2 + 3 + 4).
  $availability_data[12] = $whatif_trajectory_record['AF'];
  $year[13] = 2025;
  // Workforce need projection 2025(scenario 1).
  $need_data[13] = $whatif_trajectory_record['N'];
  // Workforce availability projection 2025(scenarios 2 + 3 + 4).
  $availability_data[13] = $whatif_trajectory_record['AG'];
  $year[14] = 2026;
  // Workforce need projection 2026(scenario 1).
  $need_data[14] = $whatif_trajectory_record['O'];
  // Workforce availability projection 2026(scenarios 2 + 3 + 4).
  $availability_data[14] = $whatif_trajectory_record['AH'];
  $year[15] = 2027;
  // Workforce need projection 2027(scenario 1).
  $need_data[15] = $whatif_trajectory_record['P'];
  // Workforce availability projection 2027(scenarios 2 + 3 + 4).
  $availability_data[15] = $whatif_trajectory_record['AI'];
  $year[16] = 2028;
  // Workforce need projection 2028(scenario 1).
  $need_data[16] = $whatif_trajectory_record['Q'];
  // Workforce availability projection 2028(scenarios 2 + 3 + 4).
  $availability_data[16] = $whatif_trajectory_record['AJ'];
  $year[17] = 2029;
  // Workforce need projection 2029(scenario 1).
  $need_data[17] = $whatif_trajectory_record['R'];
  // Workforce availability projection 2029(scenarios 2 + 3 + 4).
  $availability_data[17] = $whatif_trajectory_record['AK'];
  $year[18] = 2030;
  // Workforce need projection 2030(scenario 1).
  $need_data[18] = $whatif_trajectory_record['S'];
  // Workforce availability projection 2030(scenarios 2 + 3 + 4).
  $availability_data[18] = $whatif_trajectory_record['AL'];

  $need_value = max($need_data);
  $availability_value = max($availability_data);
  $data = array(
    'year' => $year,
    'need_data' => $need_data,
    'availability_data' => $availability_data,
    // Value of Met Need 2030(all scenarios).
    'met_need' => $whatif_trajectory_record['AM'],
    'max_whatif_value' => max($need_value, $availability_value),
  );

  return $data;
}

/**
 * Fetches data to be shown on footnotes on the SOWMY country page.
 *
 * @param string $country_code
 *   Country code.
 *
 * @return array
 *    Returns the results for footnotes.
 */
function unfpa_global_sowmy_get_footnotes($country_code) {
  $query = db_select('sowmy_footnotes', 's');
  $query->fields('s');
  $query->condition('s.CC', $country_code);
  $footnotes_record = $query->execute()->fetchAssoc();

  return $footnotes_record;
}

/**
 * To get the country name.
 *
 * @param string $cid
 *   The two digit code of country.
 *
 * @return string
 *   The country name.
 */
function unfpa_global_sowmy_get_country_name($cid) {
  $query = db_select('country_code', 'c');
  $query->fields('c');
  $query->condition('c.cc', $cid);
  $country_data = $query->execute()->fetchAssoc();
  $country_name = unfpa_global_sowmy_rename_country($country_data['c_name']);

  return $country_name;
}

/*
 * For country name with suffix '.' just consider prefix.
 * for e.g: China.3 will output China.
 */

/**
 * This function is used to rename the country name.
 *
 * @param string $country_name
 *   The name of the country to be renamed.
 *
 * @return string
 *   The renamed country.
 */
function unfpa_global_sowmy_rename_country($country_name) {
  $country = explode('.', $country_name);

  return reset($country);
}
