<?php

/**
 * @file
 * Decode HTML entities.
 */
$plugin = array(
    'form' => 'feeds_tamper_utf8_encode_form',
    'callback' => 'feeds_tamper_utf8_encode_callback',
    'name' => 'Convert ISO-8859-1 to UTF-8',
    'multi' => 'loop',
    'category' => 'Text',
);

function feeds_tamper_utf8_encode_form($importer, $element_key, $settings) {
    $form = array();
    $form['html'] = array(
        '#markup' => t('This will convert all ISO-8859-1 characters to their UTF-8 equivalents.'
        ),
    );
    return $form;
}

function feeds_tamper_utf8_encode_callback($result, $item_key, $element_key, &$field, $settings, $source) {
    $field = utf8_encode($field);
}
