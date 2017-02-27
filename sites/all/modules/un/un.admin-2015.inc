<?php

/**
 * @file
 * Configuration forms for Annual Report 2015.
 */



/**
 * Menu callback: General settings form - 2015.
 */
function un_general_settings_form_2015($form, &$form_state) {
  $form = array();

  $form['un_rep2015_general_pdfurl'] = array(
    '#type' => 'textfield',
    '#title' => t('Full report pdf file URL'),
    '#default_value' => variable_get('un_rep2015_general_pdfurl', FALSE),
    '#description' => t("Warning! You must enter full URL including 'http://'."),
    '#required' => TRUE,
  );

  return system_settings_form($form);
}



/**
 * Menu callback: Introduction section settings form - 2015.
 */
function un_introduction_section_settings_form_2015($form, &$form_state) {
  $form = array();

  $form['un_rep2015_introduction_title'] = array(
    '#type' => 'textfield',
    '#title' => t('Introduction title'),
    '#default_value' => variable_get('un_rep2015_introduction_title', ''),
    '#required' => TRUE,
  );
  $form['un_rep2015_introduction_text'] = array(
    '#type' => 'textarea',
    '#title' => t('Introduction text'),
    '#default_value' => variable_get('un_rep2015_introduction_text', ''),
    '#required' => TRUE,
  );
  $form['un_rep2015_introduction_imgfid'] = array(
    '#type' => 'managed_file',
    '#title' => t('Image'),
    '#name' => 'un_rep2014_introduction_imgfid',
    '#default_value' => variable_get('un_rep2015_introduction_imgfid', ''),
    '#description' => t('Required minimal size is 406 x 390 pixels.'),
    '#upload_location' => 'public://unfpa-report/introduction/',
    '#upload_validators' => array(
      'file_validate_extensions' => array('jpg jpeg'),
      'file_validate_image_resolution' => array('406x390'),
    ),
    '#required' => TRUE,
  );
  $form['un_rep2015_introduction_imgtxt'] = array(
    '#type' => 'textfield',
    '#title' => t('Text under image'),
    '#default_value' => variable_get('un_rep2015_introduction_imgtxt', ''),
    '#required' => TRUE,
  );
  $form['un_rep2015_introduction_graphstitle'] = array(
    '#type' => 'textfield',
    '#title' => t('Graphs top title'),
    '#default_value' => variable_get('un_rep2015_introduction_graphstitle', ''),
    '#required' => TRUE,
  );
  $form['un_rep2015_introduction_numbcols_title'] = array(
    '#type' => 'textfield',
    '#title' => t('Number columns - title'),
    '#default_value' => variable_get('un_rep2015_introduction_numbcols_title', ''),
    '#required' => TRUE,
  );
  for ($i = 1; $i <= 4; $i++) {
    $form['un_rep2015_introduction_numbcols_col' . $i] = array(
      '#type' => 'textfield',
      '#title' => t('Number columns - column !count', array('!count' => $i)),
      '#default_value' => variable_get('un_rep2015_introduction_numbcols_col' . $i, ''),
      '#required' => TRUE,
    );
    if ($i == 1) {
      $form['un_rep2015_introduction_numbcols_col' . $i]['#description']
        = 'Use &lt;strong&gt; tags for bold text and &lt;span&gt; tags for grey text.';
    }
  }
  $form['un_rep2015_introduction_graphs_subtitle'] = array(
    '#type' => 'textfield',
    '#title' => t('Graphs - title'),
    '#default_value' => variable_get('un_rep2015_introduction_graphs_subtitle', ''),
    '#required' => TRUE,
  );

  // Set a submit handler manually because the default submit handler
  // gets overridden by the system_settings_form() submit handler.
  $form['#submit'][] = 'un_introduction_section_settings_form_2015_submit';

  return system_settings_form($form);
}



/**
 * Submit callback: Introduction section settings form - 2015.
 */
function un_introduction_section_settings_form_2015_submit($form, &$form_state) {
  // Only do stuff with the file if the managed_file form item contained a val.
  if (!isset($form_state['values']['un_rep2015_introduction_imgfid'])) {
    return;
  }

  $fid = $form_state['values']['un_rep2015_introduction_imgfid'];

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
  if ($fid != variable_get('un_rep2015_introduction_imgfid')) {
    $file = file_load(variable_get('un_rep2015_introduction_imgfid', 0));

    if ($file) {
      file_usage_delete($file, $module = 'un', $type = 'introduction', $id = 1, $count = 0);
      file_delete($file);
    }
  }
}



/**
 * Menu callback: In Action section settings form.
 */
function un_inaction_section_settings_form_2015($form, &$form_state) {
  $form = array();

  $form['un_rep2015_inaction_intro'] = array(
    '#type' => 'textarea',
    '#title' => t('Introduction text'),
    '#default_value' => variable_get('un_rep2015_inaction_intro', ''),
    '#required' => TRUE,
  );

  return system_settings_form($form);
}
