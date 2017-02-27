<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
    'title' => t('Custom Single column'),
    'category' => t('Columns: 1'),
    'icon' => 'onecol.png',
    'theme' => 'panels_custom_onecol',
    'css' => 'custom_onecol.css',
    'regions' => array(
        'row1' => t('Row 1'),
        'row2' => t('Row 2'),
        'row3' => t('Row 3'),
        'row4' => t('Row 4'),
        'row5' => t('Row 5')
    ),
);
