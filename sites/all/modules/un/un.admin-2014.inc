<?php

/**
 * @file
 * Configuration forms for Annual Report 2014.
 */



/**
 * Menu callback: General settings form - 2014.
 */
function un_general_settings_form_2014($form, &$form_state) {
  $form = array();

  $form['un_rep2014_general_pdfurl'] = array(
    '#type' => 'textfield',
    '#title' => t('Full report pdf file URL'),
    '#default_value' => variable_get('un_rep2014_general_pdfurl', FALSE),
    '#description' => t("Warning! You must enter full URL including 'http://'."),
    '#required' => TRUE,
  );

  return system_settings_form($form);
}



/**
 * Menu callback: Introduction section settings form - 2014.
 */
function un_introduction_section_settings_form_2014($form, &$form_state) {
  $form = array();

  $form['un_rep2014_introduction_title'] = array(
    '#type' => 'textfield',
    '#title' => t('Introduction title'),
    '#default_value' => variable_get('un_rep2014_introduction_title', ''),
    '#required' => TRUE,
  );
  $form['un_rep2014_introduction_text'] = array(
    '#type' => 'textarea',
    '#title' => t('Introduction text'),
    '#default_value' => variable_get('un_rep2014_introduction_text', ''),
    '#required' => TRUE,
  );
  $form['un_rep2014_introduction_imgfid'] = array(
    '#type' => 'managed_file',
    '#title' => t('Image (will link to video)'),
    '#name' => 'un_rep2014_introduction_imgfid',
    '#default_value' => variable_get('un_rep2014_introduction_imgfid', ''),
    '#description' => t('Required minimal size is 450 x 253 pixels.'),
    '#upload_location' => 'public://unfpa-report/introduction/',
    '#upload_validators' => array(
      'file_validate_extensions' => array('jpg jpeg'),
      'file_validate_image_resolution' => array('450x253'),
    ),
    '#required' => TRUE,
  );
  $form['un_rep2014_introduction_videourl'] = array(
    '#type' => 'textfield',
    '#title' => t('Video URL'),
    '#default_value' => variable_get('un_rep2014_introduction_videourl', ''),
    '#required' => TRUE,
    '#description' => t('Supported providers: Youtube &amp; Vimeo.'),
  );
  $form['un_rep2014_introduction_videotxt'] = array(
    '#type' => 'textfield',
    '#title' => t('Video description'),
    '#default_value' => variable_get('un_rep2014_introduction_videotxt', ''),
    '#required' => TRUE,
  );
  $form['un_rep2014_introduction_graphstitle'] = array(
    '#type' => 'textfield',
    '#title' => t('Graphs title'),
    '#default_value' => variable_get('un_rep2014_introduction_graphstitle', ''),
    '#required' => TRUE,
  );

  // Set a submit handler manually because the default submit handler
  // gets overridden by the system_settings_form() submit handler.
  $form['#submit'][] = 'un_introduction_section_settings_form_2014_submit';

  return system_settings_form($form);
}



/**
 * Submit callback: Introduction section settings form - 2014.
 */
function un_introduction_section_settings_form_2014_submit($form, &$form_state) {
  // Only do stuff with the file if the managed_file form item contained a val.
  if (!isset($form_state['values']['un_rep2014_introduction_imgfid'])) {
    return;
  }

  $fid = $form_state['values']['un_rep2014_introduction_imgfid'];

  // Handle saving new file.
  $file = file_load($fid);

  // If was was loaded then it means it's a file that was just saved.
  // Make it permanent file and add entry to file_usage table.
  if ($file) {
    $file->status = FILE_STATUS_PERMANENT;

    file_save($file);
    file_usage_add($file, $module = 'un', $type = 'introduction', $id = 1);
  }

  // Handle deleting old file.
  // If new file fid != old file fid, then it means uploaded a new file.
  // Delete the old file_usage entry.
  if ($fid != variable_get('un_rep2014_introduction_imgfid')) {
    $file = file_load(variable_get('un_rep2014_introduction_imgfid', 0));

    if ($file) {
      file_usage_delete($file, $module = 'un', $type = 'introduction', $id = 1, $count = 0);
      file_delete($file);
    }
  }
}



/**
 * Menu callback: From Director section settings form.
 */
function un_fromdirector_section_settings_form_2014($form, &$form_state) {
  $form = array();

  $form['un_rep2014_fromdirector_imgfid'] = array(
    '#type' => 'managed_file',
    '#title' => t('Image (will link to video)'),
    '#name' => 'un_rep2014_fromdirector_imgfid',
    '#default_value' => variable_get('un_rep2014_fromdirector_imgfid', ''),
    '#description' => t('Required minimal size is 930 x 409 pixels.'),
    '#upload_location' => 'public://unfpa-report/fromdirector/',
    '#upload_validators' => array(
      'file_validate_extensions' => array('jpg jpeg'),
      'file_validate_image_resolution' => array('930x409'),
    ),
    '#required' => TRUE,
  );
  $form['un_rep2014_fromdirector_videourl'] = array(
    '#type' => 'textfield',
    '#title' => t('Video URL'),
    '#default_value' => variable_get('un_rep2014_fromdirector_videourl', ''),
    '#required' => TRUE,
    '#description' => t('Supported providers: Youtube &amp; Vimeo.'),
  );
  $form['un_rep2014_fromdirector_quote'] = array(
    '#type' => 'textarea',
    '#title' => t('Quotation text'),
    '#default_value' => variable_get('un_rep2014_fromdirector_quote', ''),
    '#required' => TRUE,
  );
  $form['un_rep2014_fromdirector_author'] = array(
    '#type' => 'textfield',
    '#title' => t('Quotation author'),
    '#default_value' => variable_get('un_rep2014_fromdirector_author', ''),
    '#required' => TRUE,
  );

  // Set a submit handler manually because the default submit handler
  // gets overridden by the system_settings_form() submit handler.
  $form['#submit'][] = 'un_fromdirector_section_settings_form_2014_submit';

  return system_settings_form($form);
}



/**
 * Submit callback: From Director section settings form.
 */
function un_fromdirector_section_settings_form_2014_submit($form, &$form_state) {
  // Only do stuff with the file if the managed_file form item contained a val.
  if (!isset($form_state['values']['un_rep2014_fromdirector_imgfid'])) {
    return;
  }

  $fid = $form_state['values']['un_rep2014_fromdirector_imgfid'];

  $file = file_load($fid);

  // Handle saving new file.
  // If was was loaded then it means it's a file that was just saved.
  // Make it permanent file and add entry to file_usage table.
  if ($file) {
    $file->status = FILE_STATUS_PERMANENT;

    file_save($file);
    file_usage_add($file, $module = 'un', $type = 'fromdirector', $id = 1);
  }

  // Handle deleting old file.
  // If new file fid != old file fid, then it means uploaded a new file.
  // Delete the old file_usage entry.
  if ($fid != variable_get('un_rep2014_fromdirector_imgfid')) {
    $file = file_load(variable_get('un_rep2014_fromdirector_imgfid', 0));

    if ($file) {
      file_usage_delete($file, $module = 'un', $type = 'fromdirector', $id = 1, $count = 0);
      file_delete($file);
    }
  }
}



/**
 * Menu callback: 20 Years of Progress section settings form.
 */
function un_progress_section_settings_form_2014($form, &$form_state) {
  $form = array();

  $form['un_rep2014_progress_intro'] = array(
    '#type' => 'textarea',
    '#title' => t('Introduction text'),
    '#default_value' => variable_get('un_rep2014_progress_intro', ''),
    '#required' => TRUE,
  );

  return system_settings_form($form);
}



/**
 * Menu callback: In Action section settings form.
 */
function un_inaction_section_settings_form_2014($form, &$form_state) {
  $form = array();

  $form['un_rep2014_inaction_intro'] = array(
    '#type' => 'textarea',
    '#title' => t('Introduction text'),
    '#default_value' => variable_get('un_rep2014_inaction_intro', ''),
    '#required' => TRUE,
  );

  return system_settings_form($form);
}
