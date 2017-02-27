<?php

/**
 * Implements hook_preprocess_html().
 */
function safe_birth_preprocess_html(&$variables) {
  if (drupal_is_front_page()) {
    $variables['classes_array'][] = "is-intro-page";
  }
}

/**
 * Implements hook_process_html().
 */
function safe_bitrh_process_html(&$variables) {
  $variables['classes'] = implode(' ', $variables['classes_array']);
}

/**
 * Prepares variables for page templates.
 */
function safe_birth_preprocess_page(&$variables) {
  if (drupal_is_front_page()) {
    $block = module_invoke('unfpa_global_safebirth', 'block_view', 'safebirth_intro_page_block');
    $variables['intro_content'] = $block['content'];
  }
  $image_options = array(
    'path'  => base_path() . path_to_theme().'/images/mobile-menu-img.png',
    'alt' => $variables['site_name'],
    'title' => $variables['site_name'],
  );
  $variables['mobile_menu_image'] = theme('image',$image_options);
}
