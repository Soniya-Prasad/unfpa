<?php

// Plugin definition
$plugin = array(
    'title' => t('Custom Template 1 Panel'),
    'category' => t('Columns: 3'),
    'icon' => 'custom_threecol_template_1.png',
    'theme' => 'panels_custom_threecol_template_1',
    'css' => 'custom_threecol_template_1.css',
    'regions' => array(
        'top' => t('Top'),
        'left' => t('Left'),
        'middle' => t('Middle'),
        'right' => t('Right'),
        'bottom' => t('Bottom')
    ),
);
