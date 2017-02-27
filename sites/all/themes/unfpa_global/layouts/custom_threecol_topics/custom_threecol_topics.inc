<?php

// Plugin definition
$plugin = array(
  'title' => t('Custom Topics Panel'),
  'category' => t('Columns: 3'),
  'icon' => 'custom_threecol_topics.png',
  'theme' => 'panels_custom_threecol_topics',
  'css' => 'custom_threecol_topics.css',
  'regions' => array(
    'top' => t('Top'),
    'center-left' => t('Center Left'),
    'center-right' => t('Center Right'),
    'left' => t('Left side'),
    'middle' => t('Middle column'),
    'right' => t('Right side'),
    'bottom' => t('Bottom')
  ),
);
