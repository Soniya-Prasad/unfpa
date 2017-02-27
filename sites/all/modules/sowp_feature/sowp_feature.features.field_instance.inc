<?php
/**
 * @file
 * sowp_feature.features.field_instance.inc
 */

/**
 * Implements hook_field_default_field_instances().
 */
function sowp_feature_field_default_field_instances() {
  $field_instances = array();

  // Exported field_instance:
  // 'field_collection_item-sowp_chart_charts-sowp_chart_smallnote'
  $field_instances['field_collection_item-sowp_chart_charts-sowp_chart_smallnote'] = array(
    'bundle' => 'sowp_chart_charts',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 3,
      ),
    ),
    'entity_type' => 'field_collection_item',
    'field_name' => 'sowp_chart_smallnote',
    'label' => 'Chart: note below the chart',
    'required' => 0,
    'settings' => array(
      'better_formats' => array(
        'allowed_formats' => array(
          'plain_text' => 'plain_text',
          'sowp_format' => 'sowp_format',
        ),
        'allowed_formats_toggle' => 0,
        'default_order_toggle' => 0,
        'default_order_wrapper' => array(
          'formats' => array(
            'plain_text' => array(
              'weight' => 10,
            ),
            'sowp_format' => array(
              'weight' => 0,
            ),
          ),
        ),
      ),
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 6,
    ),
  );

  // Exported field_instance:
  // 'field_collection_item-sowp_chart_charts-sowp_chart_static'
  $field_instances['field_collection_item-sowp_chart_charts-sowp_chart_static'] = array(
    'bundle' => 'sowp_chart_charts',
    'deleted' => 0,
    'description' => 'Static png image is used as a fallback for browsers that do not support SVG image format.<br />
WARNING: All images in all fields, including SVG, must have fully transparent background.',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'module' => 'image',
        'settings' => array(
          'image_link' => '',
          'image_style' => 'sowp_chart_static',
        ),
        'type' => 'image',
        'weight' => 1,
      ),
    ),
    'entity_type' => 'field_collection_item',
    'field_name' => 'sowp_chart_static',
    'label' => 'Chart: static PNG image',
    'required' => 1,
    'settings' => array(
      'alt_field' => 0,
      'default_image' => 0,
      'file_directory' => 'sowp/charts',
      'file_extensions' => 'png',
      'max_filesize' => '',
      'max_resolution' => '',
      'min_resolution' => '974x100',
      'title_field' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'image',
      'settings' => array(
        'preview_image_style' => 'thumbnail',
        'progress_indicator' => 'throbber',
      ),
      'type' => 'image_image',
      'weight' => 1,
    ),
  );

  // Exported field_instance:
  // 'field_collection_item-sowp_chart_charts-sowp_chart_svgbars'
  $field_instances['field_collection_item-sowp_chart_charts-sowp_chart_svgbars'] = array(
    'bundle' => 'sowp_chart_charts',
    'deleted' => 0,
    'description' => 'Bars layer must contain only graph bars indicating the values.',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 6,
      ),
    ),
    'entity_type' => 'field_collection_item',
    'field_name' => 'sowp_chart_svgbars',
    'label' => 'Chart: svg bars layer',
    'required' => 1,
    'settings' => array(
      'description_field' => 0,
      'file_directory' => 'sowp/charts',
      'file_extensions' => 'svg',
      'max_filesize' => '',
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'file',
      'settings' => array(
        'progress_indicator' => 'throbber',
      ),
      'type' => 'file_generic',
      'weight' => 4,
    ),
  );

  // Exported field_instance:
  // 'field_collection_item-sowp_chart_charts-sowp_chart_svgbase'
  $field_instances['field_collection_item-sowp_chart_charts-sowp_chart_svgbase'] = array(
    'bundle' => 'sowp_chart_charts',
    'deleted' => 0,
    'description' => 'Base layer must contain all items that are within the chart that aren\'t value bars or y-axis grids y-axis labels. It also shouldn\'t contain x-axis label.',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 4,
      ),
    ),
    'entity_type' => 'field_collection_item',
    'field_name' => 'sowp_chart_svgbase',
    'label' => 'Chart: svg base layer',
    'required' => 1,
    'settings' => array(
      'description_field' => 0,
      'file_directory' => 'sowp/charts',
      'file_extensions' => 'svg',
      'max_filesize' => '',
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'file',
      'settings' => array(
        'progress_indicator' => 'throbber',
      ),
      'type' => 'file_generic',
      'weight' => 2,
    ),
  );

  // Exported field_instance:
  // 'field_collection_item-sowp_chart_charts-sowp_chart_svggrids'
  $field_instances['field_collection_item-sowp_chart_charts-sowp_chart_svggrids'] = array(
    'bundle' => 'sowp_chart_charts',
    'deleted' => 0,
    'description' => 'Grids layer must contain only y-axis grids and labels.',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 5,
      ),
    ),
    'entity_type' => 'field_collection_item',
    'field_name' => 'sowp_chart_svggrids',
    'label' => 'Chart: svg grids layer',
    'required' => 1,
    'settings' => array(
      'description_field' => 0,
      'file_directory' => 'sowp/charts',
      'file_extensions' => 'svg',
      'max_filesize' => '',
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'file',
      'settings' => array(
        'progress_indicator' => 'throbber',
      ),
      'type' => 'file_generic',
      'weight' => 3,
    ),
  );

  // Exported field_instance:
  // 'field_collection_item-sowp_chart_charts-sowp_chart_title'
  $field_instances['field_collection_item-sowp_chart_charts-sowp_chart_title'] = array(
    'bundle' => 'sowp_chart_charts',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'field_collection_item',
    'field_name' => 'sowp_chart_title',
    'label' => 'Chart: title',
    'required' => 1,
    'settings' => array(
      'better_formats' => array(
        'allowed_formats' => array(
          'plain_text' => 'plain_text',
          'sowp_format' => 'sowp_format',
        ),
        'allowed_formats_toggle' => 0,
        'default_order_toggle' => 0,
        'default_order_wrapper' => array(
          'formats' => array(
            'plain_text' => array(
              'weight' => 10,
            ),
            'sowp_format' => array(
              'weight' => 0,
            ),
          ),
        ),
      ),
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 0,
    ),
  );

  // Exported field_instance:
  // 'field_collection_item-sowp_chart_charts-sowp_chart_xaxislabel'
  $field_instances['field_collection_item-sowp_chart_charts-sowp_chart_xaxislabel'] = array(
    'bundle' => 'sowp_chart_charts',
    'deleted' => 0,
    'description' => 'A PNG file with transparent background, containing x-aixs label (ex. \'Year\'). Must be exactly 974x42 pixels.',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'module' => 'image',
        'settings' => array(
          'image_link' => '',
          'image_style' => '',
        ),
        'type' => 'image',
        'weight' => 2,
      ),
    ),
    'entity_type' => 'field_collection_item',
    'field_name' => 'sowp_chart_xaxislabel',
    'label' => 'Chart: x-axis label',
    'required' => 1,
    'settings' => array(
      'alt_field' => 0,
      'default_image' => 0,
      'file_directory' => 'sowp/charts',
      'file_extensions' => 'png',
      'max_filesize' => '',
      'max_resolution' => '',
      'min_resolution' => '974x42',
      'title_field' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'image',
      'settings' => array(
        'preview_image_style' => 'thumbnail',
        'progress_indicator' => 'throbber',
      ),
      'type' => 'image_image',
      'weight' => 5,
    ),
  );

  // Exported field_instance: 'node-sowp_bigintro-sowp_bigintro_body'
  $field_instances['node-sowp_bigintro-sowp_bigintro_body'] = array(
    'bundle' => 'sowp_bigintro',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 0,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_bigintro_body',
    'label' => 'Big intro',
    'required' => 1,
    'settings' => array(
      'better_formats' => array(
        'allowed_formats' => array(
          'plain_text' => 0,
          'sowp_format' => 'sowp_format',
        ),
        'allowed_formats_toggle' => 1,
        'default_order_toggle' => 0,
        'default_order_wrapper' => array(
          'formats' => array(
            'plain_text' => array(
              'weight' => 10,
            ),
            'sowp_format' => array(
              'weight' => 0,
            ),
          ),
        ),
      ),
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 5,
      ),
      'type' => 'text_textarea',
      'weight' => 3,
    ),
  );

  // Exported field_instance: 'node-sowp_bigintro-sowp_bigintro_options'
  $field_instances['node-sowp_bigintro-sowp_bigintro_options'] = array(
    'bundle' => 'sowp_bigintro',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'list',
        'settings' => array(),
        'type' => 'list_default',
        'weight' => 2,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_bigintro_options',
    'label' => 'Options',
    'required' => 0,
    'settings' => array(
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'options',
      'settings' => array(),
      'type' => 'options_buttons',
      'weight' => 2,
    ),
  );

  // Exported field_instance: 'node-sowp_bigintro-sowp_gen_section'
  $field_instances['node-sowp_bigintro-sowp_gen_section'] = array(
    'bundle' => 'sowp_bigintro',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'list',
        'settings' => array(),
        'type' => 'list_default',
        'weight' => 1,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_gen_section',
    'label' => 'Assign to section',
    'required' => 1,
    'settings' => array(
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'options',
      'settings' => array(),
      'type' => 'options_select',
      'weight' => 1,
    ),
  );

  // Exported field_instance: 'node-sowp_body-sowp_body_content'
  $field_instances['node-sowp_body-sowp_body_content'] = array(
    'bundle' => 'sowp_body',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 1,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_body_content',
    'label' => 'Body content',
    'required' => 1,
    'settings' => array(
      'better_formats' => array(
        'allowed_formats' => array(
          'plain_text' => 0,
          'sowp_format' => 'sowp_format',
        ),
        'allowed_formats_toggle' => 1,
        'default_order_toggle' => 0,
        'default_order_wrapper' => array(
          'formats' => array(
            'plain_text' => array(
              'weight' => 10,
            ),
            'sowp_format' => array(
              'weight' => 0,
            ),
          ),
        ),
      ),
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 5,
      ),
      'type' => 'text_textarea',
      'weight' => 3,
    ),
  );

  // Exported field_instance: 'node-sowp_body-sowp_body_download'
  $field_instances['node-sowp_body-sowp_body_download'] = array(
    'bundle' => 'sowp_body',
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'file',
        'settings' => array(),
        'type' => 'file_default',
        'weight' => 5,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_body_download',
    'label' => 'File download',
    'required' => 0,
    'settings' => array(
      'description_field' => 1,
      'file_directory' => 'sowp/downloads',
      'file_extensions' => 'pdf',
      'max_filesize' => '',
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'file',
      'settings' => array(
        'progress_indicator' => 'throbber',
      ),
      'type' => 'file_generic',
      'weight' => 4,
    ),
  );

  // Exported field_instance: 'node-sowp_body-sowp_body_sidebarpos'
  $field_instances['node-sowp_body-sowp_body_sidebarpos'] = array(
    'bundle' => 'sowp_body',
    'default_value' => array(
      0 => array(
        'value' => 'right',
      ),
    ),
    'deleted' => 0,
    'description' => 'Instruction:<br />
<strong>Right</strong> - default layout, wide content on the left, narrow sidebar on right<br />
<strong>Left</strong> - same as default except sidebar is on the left side<br />
<strong>Split in half</strong> - half page width video on the left + large copy on the right + darker background. You should upload single side video and single side image, which will be used as video thumbnail.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'list',
        'settings' => array(),
        'type' => 'list_default',
        'weight' => 4,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_body_sidebarpos',
    'label' => 'Sidebar position',
    'required' => 1,
    'settings' => array(
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'options',
      'settings' => array(),
      'type' => 'options_select',
      'weight' => 2,
    ),
  );

  // Exported field_instance: 'node-sowp_body-sowp_body_sideimgs'
  $field_instances['node-sowp_body-sowp_body_sideimgs'] = array(
    'bundle' => 'sowp_body',
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'image',
        'settings' => array(
          'image_link' => '',
          'image_style' => 'sowp_body_sideimg',
        ),
        'type' => 'image',
        'weight' => 2,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_body_sideimgs',
    'label' => 'Side images',
    'required' => 0,
    'settings' => array(
      'alt_field' => 0,
      'default_image' => 0,
      'file_directory' => 'sowp/sideimgs',
      'file_extensions' => 'png gif jpg jpeg',
      'max_filesize' => '',
      'max_resolution' => '',
      'min_resolution' => '635x100',
      'title_field' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'image',
      'settings' => array(
        'preview_image_style' => 'thumbnail',
        'progress_indicator' => 'throbber',
      ),
      'type' => 'image_image',
      'weight' => 5,
    ),
  );

  // Exported field_instance: 'node-sowp_body-sowp_body_sidevids'
  $field_instances['node-sowp_body-sowp_body_sidevids'] = array(
    'bundle' => 'sowp_body',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'video_embed_field',
        'settings' => array(
          'description' => 1,
          'description_position' => 'bottom',
          'image_link' => 'source',
          'image_style' => 'sowp_body_sideimg',
        ),
        'type' => 'video_embed_field_thumbnail',
        'weight' => 3,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_body_sidevids',
    'label' => 'Side videos',
    'required' => 0,
    'settings' => array(
      'allowed_providers' => array(
        'vimeo' => 'vimeo',
        'youtube' => 'youtube',
      ),
      'description_field' => 1,
      'description_length' => 255,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 0,
      'module' => 'video_embed_field',
      'settings' => array(),
      'type' => 'video_embed_field_video',
      'weight' => 6,
    ),
  );

  // Exported field_instance: 'node-sowp_body-sowp_gen_section'
  $field_instances['node-sowp_body-sowp_gen_section'] = array(
    'bundle' => 'sowp_body',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'list',
        'settings' => array(),
        'type' => 'list_default',
        'weight' => 0,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_gen_section',
    'label' => 'Assign to section',
    'required' => 1,
    'settings' => array(
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'options',
      'settings' => array(),
      'type' => 'options_select',
      'weight' => 1,
    ),
  );

  // Exported field_instance: 'node-sowp_chart-sowp_chart_bgimg'
  $field_instances['node-sowp_chart-sowp_chart_bgimg'] = array(
    'bundle' => 'sowp_chart',
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 7,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_chart_bgimg',
    'label' => 'Background image (optional)',
    'required' => 0,
    'settings' => array(
      'alt_field' => 0,
      'default_image' => 0,
      'file_directory' => 'sowp/charts',
      'file_extensions' => 'jpg jpeg',
      'max_filesize' => '',
      'max_resolution' => '',
      'min_resolution' => '1280x850',
      'title_field' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'image',
      'settings' => array(
        'preview_image_style' => 'thumbnail',
        'progress_indicator' => 'throbber',
      ),
      'type' => 'image_image',
      'weight' => 2,
    ),
  );

  // Exported field_instance: 'node-sowp_chart-sowp_chart_charts'
  $field_instances['node-sowp_chart-sowp_chart_charts'] = array(
    'bundle' => 'sowp_chart',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'module' => 'field_collection',
        'settings' => array(
          'view_mode' => 'full',
        ),
        'type' => 'field_collection_fields',
        'weight' => 11,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_chart_charts',
    'label' => 'Animated charts',
    'required' => 0,
    'settings' => array(
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 0,
      'module' => 'field_collection',
      'settings' => array(),
      'type' => 'field_collection_embed',
      'weight' => 6,
    ),
  );

  // Exported field_instance: 'node-sowp_chart-sowp_chart_description'
  $field_instances['node-sowp_chart-sowp_chart_description'] = array(
    'bundle' => 'sowp_chart',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Value of this field is used by social media sharing feature.',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 5,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_chart_description',
    'label' => 'Description',
    'required' => 1,
    'settings' => array(
      'better_formats' => array(
        'allowed_formats' => array(
          'plain_text' => 'plain_text',
          'sowp_format' => 'sowp_format',
        ),
        'allowed_formats_toggle' => 0,
        'default_order_toggle' => 0,
        'default_order_wrapper' => array(
          'formats' => array(
            'plain_text' => array(
              'weight' => 10,
            ),
            'sowp_format' => array(
              'weight' => 0,
            ),
          ),
        ),
      ),
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 3,
      ),
      'type' => 'text_textarea',
      'weight' => 3,
    ),
  );

  // Exported field_instance: 'node-sowp_chart-sowp_chart_images'
  $field_instances['node-sowp_chart-sowp_chart_images'] = array(
    'bundle' => 'sowp_chart',
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'module' => 'image',
        'settings' => array(
          'image_link' => '',
          'image_style' => 'sowp_chart_imgslider',
        ),
        'type' => 'image',
        'weight' => 3,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_chart_images',
    'label' => 'Static image / Image slider',
    'required' => 0,
    'settings' => array(
      'alt_field' => 0,
      'default_image' => 0,
      'file_directory' => 'sowp/charts/sliders',
      'file_extensions' => 'png gif jpg jpeg',
      'max_filesize' => '',
      'max_resolution' => '',
      'min_resolution' => '1034x573',
      'title_field' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'image',
      'settings' => array(
        'preview_image_style' => 'thumbnail',
        'progress_indicator' => 'throbber',
      ),
      'type' => 'image_image',
      'weight' => 7,
    ),
  );

  // Exported field_instance: 'node-sowp_chart-sowp_chart_include'
  $field_instances['node-sowp_chart-sowp_chart_include'] = array(
    'bundle' => 'sowp_chart',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Custom chart content to be embedded using HTML/PHP include.<br />
You must enter a path to the file, relative to drupal root directory, without trailing slash.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 12,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_chart_include',
    'label' => 'Custom HTML include',
    'required' => 0,
    'settings' => array(
      'better_formats' => array(
        'allowed_formats' => array(
          'plain_text' => 'plain_text',
          'sowp_format' => 'sowp_format',
        ),
        'allowed_formats_toggle' => 0,
        'default_order_toggle' => 0,
        'default_order_wrapper' => array(
          'formats' => array(
            'plain_text' => array(
              'weight' => 10,
            ),
            'sowp_format' => array(
              'weight' => 0,
            ),
          ),
        ),
      ),
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 8,
    ),
  );

  // Exported field_instance: 'node-sowp_chart-sowp_chart_shareimg'
  $field_instances['node-sowp_chart-sowp_chart_shareimg'] = array(
    'bundle' => 'sowp_chart',
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'image',
        'settings' => array(
          'image_link' => '',
          'image_style' => '',
        ),
        'type' => 'image',
        'weight' => 13,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_chart_shareimg',
    'label' => 'Social media sharing image',
    'required' => 1,
    'settings' => array(
      'alt_field' => 0,
      'default_image' => 0,
      'file_directory' => 'sowp/charts',
      'file_extensions' => 'png jpg jpeg',
      'max_filesize' => '',
      'max_resolution' => '',
      'min_resolution' => '1034x573',
      'title_field' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'image',
      'settings' => array(
        'preview_image_style' => 'thumbnail',
        'progress_indicator' => 'throbber',
      ),
      'type' => 'image_image',
      'weight' => 4,
    ),
  );

  // Exported field_instance: 'node-sowp_chart-sowp_chart_usetype'
  $field_instances['node-sowp_chart-sowp_chart_usetype'] = array(
    'bundle' => 'sowp_chart',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 4,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_chart_usetype',
    'label' => 'Entry type',
    'required' => 1,
    'settings' => array(
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'options',
      'settings' => array(),
      'type' => 'options_select',
      'weight' => 5,
    ),
  );

  // Exported field_instance: 'node-sowp_chart-sowp_gen_section'
  $field_instances['node-sowp_chart-sowp_gen_section'] = array(
    'bundle' => 'sowp_chart',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 6,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_gen_section',
    'label' => 'Assign to section',
    'required' => 1,
    'settings' => array(
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'options',
      'settings' => array(),
      'type' => 'options_select',
      'weight' => 1,
    ),
  );

  // Exported field_instance: 'node-sowp_story-sowp_gen_section'
  $field_instances['node-sowp_story-sowp_gen_section'] = array(
    'bundle' => 'sowp_story',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'list',
        'settings' => array(),
        'type' => 'list_default',
        'weight' => 2,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_gen_section',
    'label' => 'Assign to section',
    'required' => 1,
    'settings' => array(
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'options',
      'settings' => array(),
      'type' => 'options_select',
      'weight' => 1,
    ),
  );

  // Exported field_instance: 'node-sowp_story-sowp_story_body'
  $field_instances['node-sowp_story-sowp_story_body'] = array(
    'bundle' => 'sowp_story',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 4,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_story_body',
    'label' => 'Body',
    'required' => 1,
    'settings' => array(
      'better_formats' => array(
        'allowed_formats' => array(
          'plain_text' => 0,
          'sowp_format' => 'sowp_format',
        ),
        'allowed_formats_toggle' => 1,
        'default_order_toggle' => 0,
        'default_order_wrapper' => array(
          'formats' => array(
            'plain_text' => array(
              'weight' => 10,
            ),
            'sowp_format' => array(
              'weight' => 0,
            ),
          ),
        ),
      ),
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 5,
      ),
      'type' => 'text_textarea',
      'weight' => 5,
    ),
  );

  // Exported field_instance: 'node-sowp_story-sowp_story_imgs'
  $field_instances['node-sowp_story-sowp_story_imgs'] = array(
    'bundle' => 'sowp_story',
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'module' => 'image',
        'settings' => array(
          'image_link' => '',
          'image_style' => '',
        ),
        'type' => 'image',
        'weight' => 3,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'sowp_story_imgs',
    'label' => 'Sliding images',
    'required' => 1,
    'settings' => array(
      'alt_field' => 0,
      'default_image' => 0,
      'file_directory' => 'sowp/stories',
      'file_extensions' => 'jpg jpeg',
      'max_filesize' => '',
      'max_resolution' => '',
      'min_resolution' => '890x516',
      'title_field' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'image',
      'settings' => array(
        'preview_image_style' => 'thumbnail',
        'progress_indicator' => 'throbber',
      ),
      'type' => 'image_image',
      'weight' => 4,
    ),
  );

  // Translatables
  // Included for use with string extractors like potx.
  t('A PNG file with transparent background, containing x-aixs label (ex. \'Year\'). Must be exactly 974x42 pixels.');
  t('Animated charts');
  t('Assign to section');
  t('Background image (optional)');
  t('Bars layer must contain only graph bars indicating the values.');
  t('Base layer must contain all items that are within the chart that aren\'t value bars or y-axis grids y-axis labels. It also shouldn\'t contain x-axis label.');
  t('Big intro');
  t('Body');
  t('Body content');
  t('Chart: note below the chart');
  t('Chart: static PNG image');
  t('Chart: svg bars layer');
  t('Chart: svg base layer');
  t('Chart: svg grids layer');
  t('Chart: title');
  t('Chart: x-axis label');
  t('Custom HTML include');
  t('Custom chart content to be embedded using HTML/PHP include.<br />
You must enter a path to the file, relative to drupal root directory, without trailing slash.');
  t('Description');
  t('Entry type');
  t('File download');
  t('Grids layer must contain only y-axis grids and labels.');
  t('Instruction:<br />
<strong>Right</strong> - default layout, wide content on the left, narrow sidebar on right<br />
<strong>Left</strong> - same as default except sidebar is on the left side<br />
<strong>Split in half</strong> - half page width video on the left + large copy on the right + darker background. You should upload single side video and single side image, which will be used as video thumbnail.');
  t('Options');
  t('Side images');
  t('Side videos');
  t('Sidebar position');
  t('Sliding images');
  t('Social media sharing image');
  t('Static image / Image slider');
  t('Static png image is used as a fallback for browsers that do not support SVG image format.<br />
WARNING: All images in all fields, including SVG, must have fully transparent background.');
  t('Value of this field is used by social media sharing feature.');

  return $field_instances;
}
