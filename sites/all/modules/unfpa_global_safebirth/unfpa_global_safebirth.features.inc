<?php
/**
 * @file
 * unfpa_global_safebirth.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function unfpa_global_safebirth_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "page_manager" && $api == "pages_default") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_image_default_styles().
 */
function unfpa_global_safebirth_image_default_styles() {
  $styles = array();

  // Exported image style: safebirth_image.
  $styles['safebirth_image'] = array(
    'label' => 'Safebirth Image',
    'effects' => array(
      56 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 610,
          'height' => 407,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: safebirth_main_news_image.
  $styles['safebirth_main_news_image'] = array(
    'label' => 'Safebirth Main News Image',
    'effects' => array(
      57 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 1220,
          'height' => 486,
        ),
        'weight' => 1,
      ),
    ),
  );

  return $styles;
}
