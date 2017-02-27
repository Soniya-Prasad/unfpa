<?php

require_once('Encoding.php');
$plugin = array(
    'form' => 'feeds_tamper_utf8_decode_form',
    'callback' => 'feeds_tamper_utf8_decode_callback',
    'name' => 'forceUTF8',
    'multi' => 'loop',
    'category' => 'Text',
);

function feeds_tamper_utf8_decode_form($importer, $element_key, $settings) {
    $form = array();
    $form['html'] = array(
        '#markup' => t('This will convert all ISO-8859-1 characters to their UTF-8 equivalents.'
        ),
    );
    return $form;
}

function feeds_tamper_utf8_decode_callback($result, $item_key, $element_key, &$field, $settings, $source) {
    $field = Encoding::fixUTF8($field);
}
