<?php
/**
 * @file
 * sowp_feature.features.ckeditor_profile.inc
 */

/**
 * Implements hook_ckeditor_profile_defaults().
 */
function sowp_feature_ckeditor_profile_defaults() {
  $data = array(
    'sowp_text' => array(
      'name' => 'sowp_text',
      'settings' => array(
        'ss' => 2,
        'toolbar' => '[
    [\'Source\'],[\'Bold\',\'RemoveFormat\'],[\'Link\',\'Unlink\'],[\'Image\',\'video_filter\',\'CreateDiv\'],[\'ShowBlocks\',\'Maximize\']
]',
        'expand' => 't',
        'default' => 't',
        'show_toggle' => 'f',
        'uicolor' => 'default',
        'uicolor_user' => 'default',
        'width' => '100%',
        'lang' => 'en',
        'auto_lang' => 't',
        'language_direction' => 'default',
        'allowed_content' => 'f',
        'extraAllowedContent' => '',
        'enter_mode' => 'p',
        'shift_enter_mode' => 'br',
        'font_format' => 'p;div;pre;address;h1;h2;h3;h4;h5;h6',
        'custom_formatting' => 'f',
        'formatting' => array(
          'custom_formatting_options' => array(
            'indent' => 'indent',
            'breakBeforeOpen' => 'breakBeforeOpen',
            'breakAfterOpen' => 'breakAfterOpen',
            'breakAfterClose' => 'breakAfterClose',
            'breakBeforeClose' => 0,
            'pre_indent' => 0,
          ),
        ),
        'css_mode' => 'none',
        'css_path' => '',
        'css_style' => 'theme',
        'styles_path' => '',
        'filebrowser' => 'none',
        'filebrowser_image' => '',
        'filebrowser_flash' => '',
        'UserFilesPath' => '%b%f/',
        'UserFilesAbsolutePath' => '%d%b%f/',
        'forcePasteAsPlainText' => 't',
        'html_entities' => 't',
        'scayt_autoStartup' => 'f',
        'theme_config_js' => 'f',
        'js_conf' => '',
        'loadPlugins' => array(
          'video_filter' => array(
            'name' => 'video_filter',
            'desc' => 'Plugin for inserting video tags with video_filter',
            'path' => '%plugin_dir%video_filter/',
            'buttons' => array(
              'video_filter' => array(
                'label' => 'video_filter',
                'icon' => 'video_filter.png',
              ),
            ),
            'default' => 'f',
          ),
        ),
      ),
      'input_formats' => array(
        'sowp_format' => 'SOWP Text Format',
      ),
    ),
  );
  return $data;
}
