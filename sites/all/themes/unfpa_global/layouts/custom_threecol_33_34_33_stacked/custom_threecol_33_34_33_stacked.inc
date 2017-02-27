<?php

// Plugin definition
$plugin = array(
  'title' => t('Custom Three column 33/34/33 stacked'),
  'category' => t('Columns: 3'),
  'icon' => 'threecol_33_34_33_stacked.png',
  'theme' => 'panels_custom_threecol_33_34_33_stacked',
  'css' => 'custom_threecol_33_34_33_stacked.css',
  'regions' => array(
    'top' => t('Top'),
	'center' => t('Center'),
    'left' => t('Left side'),
    'middle' => t('Middle column'),
    'right' => t('Right side'),
    'bottom' => t('Bottom')
  ),
);
