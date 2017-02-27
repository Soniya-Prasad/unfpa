<?php

/**
 * @file
 * Decode HTML entities.
 */

$plugin = array(
  'form' => 'feeds_tamper_url_decode_form',
  'callback' => 'feeds_tamper_url_decode_callback',
  'name' => 'URL decode',
  'multi' => 'loop',
  'category' => 'HTML',
);

function feeds_tamper_url_decode_form($importer, $element_key, $settings) {
  $form = array();
  $form['html'] = array(
    '#markup' => t('Provide URL Decode VAlue for Eg %20 as space'),
  );
  return $form;
}

function feeds_tamper_url_decode_callback($result, $item_key, $element_key, &$field, $settings, $source) {
  $field = urldecode($field);
}
