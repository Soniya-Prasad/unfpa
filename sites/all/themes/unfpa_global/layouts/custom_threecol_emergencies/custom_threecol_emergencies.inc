<?php

// Plugin definition
$plugin = array(
    'title' => t('Custom Emergencies Panel'),
    'category' => t('Columns: 3'),
    'icon' => 'custom_threecol_emergencies.png',
    'theme' => 'panels_custom_threecol_emergencies',
    'css' => 'custom_threecol_emergencies.css',
    'regions' => array(
        'top' => t('Top'),
        'first-left' => t('First Left'),
        'first-middle' => t('First Middle'),
        'first-right' => t('First Right'),
        'second-left' => t('Second Left'),
        'second-middle' => t('Second Middle'),
        'second-right' => t('Second Right'),
        'bottom' => t('Bottom')
    ),
);
