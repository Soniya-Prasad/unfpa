<?php

/**
 * @file
 * Configuration forms for SOWP.
 */



/**
 * Defines report files to be managed in the config form - 2015.
 */
function sowp_general_settings_files_2015() {
  return array(
    'sowp_reportfile_en' => t('Report File - English'),
    'sowp_reportfile_fr' => t('Report File - French'),
    'sowp_reportfile_es' => t('Report File - Spanish'),
    'sowp_reportfile_ru' => t('Report File - Russian'),
    'sowp_reportfile_ar' => t('Report File - Arabic'),

    'sowp_highlights_en' => t('Highlights File - English'),
    'sowp_highlights_fr' => t('Highlights File - French'),
    'sowp_highlights_es' => t('Highlights File - Spanish'),
    'sowp_highlights_ru' => t('Highlights File - Russian'),
    'sowp_highlights_ar' => t('Highlights File - Arabic'),
  );
}



/**
 * Defines report files to be managed in the config form - 2016.
 */
function sowp_general_settings_files_2016() {
  return array(
    'sowp_reportfile_en_2016' => t('Report File - English'),
    'sowp_reportfile_fr_2016' => t('Report File - French'),
    'sowp_reportfile_es_2016' => t('Report File - Spanish'),
    'sowp_reportfile_ru_2016' => t('Report File - Russian'),
    'sowp_reportfile_ar_2016' => t('Report File - Arabic'),
  );
}



/**
 * Menu callback: General settings form for SOWP 2015.
 */
function sowp_general_settings_form_2015($form, &$form_state) {
  $form = array();

  $files = sowp_general_settings_files_2015();

  foreach ($files as $key => $label) {
    $form[$key] = array(
      '#type' => 'managed_file',
      '#title' => $label,
      '#default_value' => variable_get($key, ''),
      '#upload_location' => 'public://sowp/downloads/',
      '#upload_validators' => array(
        'file_validate_extensions' => array('pdf'),
      ),
    );
  }

  $form = system_settings_form($form);
  $form['#submit'][] = 'sowp_general_settings_form_2015_submit';

  return $form;
}



/**
 * Submit callback for our settings form for SOWP 2015.
 */
function sowp_general_settings_form_2015_submit($form, &$form_state) {
  $files = sowp_general_settings_files_2015();

  // Process and save each file.
  foreach ($files as $key => $label) {

    // Get the original default files if one extsis.
    $previous = (!empty($form[$key]['#default_value'])) ? $form[$key]['#default_value'] : 0;

    // If we have provided files, make sure to mark them as in use.
    if (isset($form_state['values'][$key]) && $form_state['values'][$key]) {
      $new = $form_state['values'][$key];
      // If the uploaded file is different than the one we already had, then
      // we need to remove the current file and replace it with the new one.
      if (isset($previous) && $previous != $new) {
        sowp_remove_managed_file($previous);
      }
      sowp_add_managed_file($new);
    }

    // If we are here then it means there should be no file
    // so delete previous if any.
    else {
      sowp_remove_managed_file($previous);
    }

  }
}



/**
 * Menu callback: General settings form for SOWP 2016.
 */
function sowp_general_settings_form_2016($form, &$form_state) {
  $form = array();

  $files = sowp_general_settings_files_2016();

  foreach ($files as $key => $label) {
    $form[$key] = array(
      '#type' => 'managed_file',
      '#title' => $label,
      '#default_value' => variable_get($key, ''),
      '#upload_location' => 'public://sowp/downloads/',
      '#upload_validators' => array(
        'file_validate_extensions' => array('pdf'),
      ),
    );
  }

  $form = system_settings_form($form);
  $form['#submit'][] = 'sowp_general_settings_form_2016_submit';

  return $form;
}


/**
 * Submit callback for our settings form for SOWP 2016.
 */
function sowp_general_settings_form_2016_submit($form, &$form_state) {
  $files = sowp_general_settings_files_2016();

  // Process and save each file.
  foreach ($files as $key => $label) {

    // Get the original default files if one extsis.
    $previous = (!empty($form[$key]['#default_value'])) ? $form[$key]['#default_value'] : 0;

    // If we have provided files, make sure to mark them as in use.
    if (isset($form_state['values'][$key]) && $form_state['values'][$key]) {
      $new = $form_state['values'][$key];
      // If the uploaded file is different than the one we already had, then
      // we need to remove the current file and replace it with the new one.
      if (isset($previous) && $previous != $new) {
        sowp_remove_managed_file($previous);
      }
      sowp_add_managed_file($new);
    }

    // If we are here then it means there should be no file
    // so delete previous if any.
    else {
      sowp_remove_managed_file($previous);
    }

  }
}



/**
 * Delete custom sowp managed file.
 */
function sowp_remove_managed_file($fid) {
  // Retrieve the old file.
  $file = $fid ? file_load($fid) : FALSE;

  if ($file) {
    // When a module is managing a file, it must manage the usage count.
    // Here we decrement the usage count with file_usage_delete().
    file_usage_delete($file, 'sowp', 'sowp', $fid);

    // The file_delete() function takes a file object and checks to see if
    // the file is being used by any other modules. If it is the delete
    // operation is cancelled, otherwise the file is deleted.
    file_delete($file);
  }
}



/**
 * Add custom sowp managed file.
 */
function sowp_add_managed_file($fid) {
  // If our file is already in use, then we don't need
  // to re-do this and increase the count.
  $count = db_query('SELECT count FROM {file_usage} WHERE fid=:fid', array('fid' => $fid))->fetchField();

  if (empty($count)) {
    // Load the file via fid.
    $file = file_load($fid);
    $file->status = FILE_STATUS_PERMANENT;
    file_save($file);
    file_usage_add($file, 'sowp', 'sowp', $fid);
    unset($file);
  }
}
