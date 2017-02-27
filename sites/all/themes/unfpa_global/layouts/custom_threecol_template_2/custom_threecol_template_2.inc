<?php

// Plugin definition
$plugin = array(
    'title' => t('Custom Template 2 Panel'),
    'category' => t('Columns: 2'),
    'icon' => 'custom_threecol_template_2.png',
    'theme' => 'panels_custom_threecol_template_2',
    'css' => 'custom_threecol_template_2.css',
    'regions' => array(
        'top' => t('Top'),
        'left' => t('Left'),
        'right' => t('Right'),
        'bottom' => t('Bottom')
    ),
);
