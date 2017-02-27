<?php



/**
 * Implements hook_views_default_views()
 *
 * Defined views
 * - sowp_bigintros
 * - sowp_bodies
 * - sowp_stories
 * - sowp_contentadmin.
 */
function sowp_views_default_views() {
  $views = array();
  
  /*
   .-----------------------------------------------------.
   |                   SOWP_BIGINTROS                    |
   '-----------------------------------------------------'
  */
  
  $view = new view();
  $view->name = 'sowp_bigintros';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'sowp_bigintros';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '1';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'node';
  $handler->display->display_options['row_options']['view_mode'] = 'full';
  $handler->display->display_options['row_options']['links'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  /* Contextual filter: Content: Assign to section (sowp_gen_section) */
  $handler->display->display_options['arguments']['sowp_gen_section_value']['id'] = 'sowp_gen_section_value';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['table'] = 'field_data_sowp_gen_section';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['field'] = 'sowp_gen_section_value';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['default_action'] = 'not found';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['summary_options']['items_per_page'] = '25';
  /* Contextual filter: Content: Report year (sowp_report) */
  $handler->display->display_options['arguments']['sowp_report_value']['id'] = 'sowp_report_value';
  $handler->display->display_options['arguments']['sowp_report_value']['table'] = 'field_data_sowp_report';
  $handler->display->display_options['arguments']['sowp_report_value']['field'] = 'sowp_report_value';
  $handler->display->display_options['arguments']['sowp_report_value']['default_action'] = 'not found';
  $handler->display->display_options['arguments']['sowp_report_value']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['sowp_report_value']['default_argument_options']['argument'] = '2015';
  $handler->display->display_options['arguments']['sowp_report_value']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['sowp_report_value']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['sowp_report_value']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['sowp_report_value']['limit'] = '0';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'sowp_bigintro' => 'sowp_bigintro',
  );
  /* Filter criterion: Content: Language */
  $handler->display->display_options['filters']['language']['id'] = 'language';
  $handler->display->display_options['filters']['language']['table'] = 'node';
  $handler->display->display_options['filters']['language']['field'] = 'language';
  $handler->display->display_options['filters']['language']['value'] = array(
    '***CURRENT_LANGUAGE***' => '***CURRENT_LANGUAGE***',
  );
  
  $views[$view->name] = $view;
  
  /*
   .-----------------------------------------------------.
   |                     SOWP_BODIES                     |
   '-----------------------------------------------------'
  */
  
  $view = new view();
  $view->name = 'sowp_bodies';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'sowp_bodies';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'node';
  $handler->display->display_options['row_options']['view_mode'] = 'full';
  $handler->display->display_options['row_options']['links'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  /* Contextual filter: Content: Assign to section (sowp_gen_section) */
  $handler->display->display_options['arguments']['sowp_gen_section_value']['id'] = 'sowp_gen_section_value';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['table'] = 'field_data_sowp_gen_section';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['field'] = 'sowp_gen_section_value';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['default_action'] = 'not found';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['summary_options']['items_per_page'] = '25';
  /* Contextual filter: Content: Report year (sowp_report) */
  $handler->display->display_options['arguments']['sowp_report_value']['id'] = 'sowp_report_value';
  $handler->display->display_options['arguments']['sowp_report_value']['table'] = 'field_data_sowp_report';
  $handler->display->display_options['arguments']['sowp_report_value']['field'] = 'sowp_report_value';
  $handler->display->display_options['arguments']['sowp_report_value']['default_action'] = 'not found';
  $handler->display->display_options['arguments']['sowp_report_value']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['sowp_report_value']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['sowp_report_value']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['sowp_report_value']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['sowp_report_value']['limit'] = '0';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'sowp_chart' => 'sowp_chart',
    'sowp_body' => 'sowp_body',
  );
  /* Filter criterion: Content: Language */
  $handler->display->display_options['filters']['language']['id'] = 'language';
  $handler->display->display_options['filters']['language']['table'] = 'node';
  $handler->display->display_options['filters']['language']['field'] = 'language';
  $handler->display->display_options['filters']['language']['value'] = array(
    '***CURRENT_LANGUAGE***' => '***CURRENT_LANGUAGE***',
  );
  
  $views[$view->name] = $view;
  
  /*
   .-----------------------------------------------------.
   |                    SOWP_STORIES                     |
   '-----------------------------------------------------'
  */
  
  $view = new view();
  $view->name = 'sowp_stories';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'sowp_stories';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'list';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['style_options']['class'] = 'swp-nolist stories-list';
  $handler->display->display_options['style_options']['wrapper_class'] = '';
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['row_options']['default_field_elements'] = FALSE;
  /* Field: Content: Sliding images */
  $handler->display->display_options['fields']['sowp_story_imgs']['id'] = 'sowp_story_imgs';
  $handler->display->display_options['fields']['sowp_story_imgs']['table'] = 'field_data_sowp_story_imgs';
  $handler->display->display_options['fields']['sowp_story_imgs']['field'] = 'sowp_story_imgs';
  $handler->display->display_options['fields']['sowp_story_imgs']['label'] = '';
  $handler->display->display_options['fields']['sowp_story_imgs']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['sowp_story_imgs']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['sowp_story_imgs']['settings'] = array(
    'image_style' => 'sowp_story_thumb',
    'image_link' => '',
  );
  $handler->display->display_options['fields']['sowp_story_imgs']['delta_limit'] = '1';
  $handler->display->display_options['fields']['sowp_story_imgs']['delta_offset'] = '0';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_type'] = 'div';
  $handler->display->display_options['fields']['title']['element_class'] = 'js-equal-height';
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['element_wrapper_type'] = 'h4';
  $handler->display->display_options['fields']['title']['element_wrapper_class'] = 'sb-font color-text';
  $handler->display->display_options['fields']['title']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  /* Contextual filter: Content: Assign to section (sowp_gen_section) */
  $handler->display->display_options['arguments']['sowp_gen_section_value']['id'] = 'sowp_gen_section_value';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['table'] = 'field_data_sowp_gen_section';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['field'] = 'sowp_gen_section_value';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['default_action'] = 'not found';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['sowp_gen_section_value']['summary_options']['items_per_page'] = '25';
  /* Contextual filter: Content: Report year (sowp_report) */
  $handler->display->display_options['arguments']['sowp_report_value']['id'] = 'sowp_report_value';
  $handler->display->display_options['arguments']['sowp_report_value']['table'] = 'field_data_sowp_report';
  $handler->display->display_options['arguments']['sowp_report_value']['field'] = 'sowp_report_value';
  $handler->display->display_options['arguments']['sowp_report_value']['default_action'] = 'not found';
  $handler->display->display_options['arguments']['sowp_report_value']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['sowp_report_value']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['sowp_report_value']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['sowp_report_value']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['sowp_report_value']['limit'] = '0';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'sowp_story' => 'sowp_story',
  );
  /* Filter criterion: Content: Language */
  $handler->display->display_options['filters']['language']['id'] = 'language';
  $handler->display->display_options['filters']['language']['table'] = 'node';
  $handler->display->display_options['filters']['language']['field'] = 'language';
  $handler->display->display_options['filters']['language']['value'] = array(
    '***CURRENT_LANGUAGE***' => '***CURRENT_LANGUAGE***',
  );

  /* Display: Attachment */
  $handler = $view->new_display('attachment', 'Attachment', 'fullstories');
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'node';
  $handler->display->display_options['row_options']['view_mode'] = 'full';
  $handler->display->display_options['row_options']['links'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  
  $views[$view->name] = $view;
  
  /*
   .-----------------------------------------------------.
   |                  SOWP_CONTENTADMIN                  |
   '-----------------------------------------------------'
  */
  
  $view = new view();
  $view->name = 'sowp_contentadmin';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'sowp_contentadmin';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Manage SOWP Content';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'sowp_gen_section' => 'sowp_gen_section',
    'title' => 'title',
    'type' => 'type',
    'created' => 'created',
    'language' => 'language',
    'clone_node' => 'clone_node',
    'edit_node' => 'edit_node',
    'nothing' => 'nothing',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'sowp_gen_section' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'title' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'type' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'created' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'language' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'clone_node' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'edit_node' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'nothing' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['sticky'] = TRUE;
  /* Field: Content: Nid */
  $handler->display->display_options['fields']['nid']['id'] = 'nid';
  $handler->display->display_options['fields']['nid']['table'] = 'node';
  $handler->display->display_options['fields']['nid']['field'] = 'nid';
  $handler->display->display_options['fields']['nid']['label'] = '';
  $handler->display->display_options['fields']['nid']['exclude'] = TRUE;
  $handler->display->display_options['fields']['nid']['element_label_colon'] = FALSE;
  /* Field: Content: Assign to section */
  $handler->display->display_options['fields']['sowp_gen_section']['id'] = 'sowp_gen_section';
  $handler->display->display_options['fields']['sowp_gen_section']['table'] = 'field_data_sowp_gen_section';
  $handler->display->display_options['fields']['sowp_gen_section']['field'] = 'sowp_gen_section';
  $handler->display->display_options['fields']['sowp_gen_section']['label'] = 'Section';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: Type */
  $handler->display->display_options['fields']['type']['id'] = 'type';
  $handler->display->display_options['fields']['type']['table'] = 'node';
  $handler->display->display_options['fields']['type']['field'] = 'type';
  $handler->display->display_options['fields']['type']['element_label_colon'] = FALSE;
  /* Field: Content: Post date */
  $handler->display->display_options['fields']['created']['id'] = 'created';
  $handler->display->display_options['fields']['created']['table'] = 'node';
  $handler->display->display_options['fields']['created']['field'] = 'created';
  $handler->display->display_options['fields']['created']['date_format'] = 'short';
  $handler->display->display_options['fields']['created']['second_date_format'] = 'long';
  /* Field: Content: Language */
  $handler->display->display_options['fields']['language']['id'] = 'language';
  $handler->display->display_options['fields']['language']['table'] = 'node';
  $handler->display->display_options['fields']['language']['field'] = 'language';
  $handler->display->display_options['fields']['language']['label'] = 'Lang';
  /* Field: Content: Edit link */
  $handler->display->display_options['fields']['edit_node']['id'] = 'edit_node';
  $handler->display->display_options['fields']['edit_node']['table'] = 'views_entity_node';
  $handler->display->display_options['fields']['edit_node']['field'] = 'edit_node';
  $handler->display->display_options['fields']['edit_node']['label'] = '';
  $handler->display->display_options['fields']['edit_node']['exclude'] = TRUE;
  $handler->display->display_options['fields']['edit_node']['alter']['text'] = '[edit_node] - [clone_node]';
  $handler->display->display_options['fields']['edit_node']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['edit_node']['hide_alter_empty'] = FALSE;
  $handler->display->display_options['fields']['edit_node']['text'] = 'edit';
  /* Field: Global: Custom text */
  $handler->display->display_options['fields']['nothing_1']['id'] = 'nothing_1';
  $handler->display->display_options['fields']['nothing_1']['table'] = 'views';
  $handler->display->display_options['fields']['nothing_1']['field'] = 'nothing';
  $handler->display->display_options['fields']['nothing_1']['label'] = '';
  $handler->display->display_options['fields']['nothing_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['nothing_1']['alter']['text'] = 'clone';
  $handler->display->display_options['fields']['nothing_1']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['nothing_1']['alter']['path'] = 'node/[nid]/clone/confirm';
  $handler->display->display_options['fields']['nothing_1']['element_label_colon'] = FALSE;
  /* Field: Global: Custom text */
  $handler->display->display_options['fields']['nothing']['id'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['table'] = 'views';
  $handler->display->display_options['fields']['nothing']['field'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['label'] = 'Operations';
  $handler->display->display_options['fields']['nothing']['alter']['text'] = '[edit_node] | [nothing_1]';
  /* Sort criterion: Content: Assign to section (sowp_gen_section) */
  $handler->display->display_options['sorts']['sowp_gen_section_value']['id'] = 'sowp_gen_section_value';
  $handler->display->display_options['sorts']['sowp_gen_section_value']['table'] = 'field_data_sowp_gen_section';
  $handler->display->display_options['sorts']['sowp_gen_section_value']['field'] = 'sowp_gen_section_value';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'sowp_bigintro' => 'sowp_bigintro',
    'sowp_chart' => 'sowp_chart',
    'sowp_story' => 'sowp_story',
    'sowp_body' => 'sowp_body',
  );
  $handler->display->display_options['filters']['type']['group'] = 1;
  /* Filter criterion: Content: Report year (sowp_report) */
  $handler->display->display_options['filters']['sowp_report_value']['id'] = 'sowp_report_value';
  $handler->display->display_options['filters']['sowp_report_value']['table'] = 'field_data_sowp_report';
  $handler->display->display_options['filters']['sowp_report_value']['field'] = 'sowp_report_value';
  $handler->display->display_options['filters']['sowp_report_value']['group'] = 1;
  $handler->display->display_options['filters']['sowp_report_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['sowp_report_value']['expose']['operator_id'] = 'sowp_report_value_op';
  $handler->display->display_options['filters']['sowp_report_value']['expose']['label'] = 'Report year';
  $handler->display->display_options['filters']['sowp_report_value']['expose']['operator'] = 'sowp_report_value_op';
  $handler->display->display_options['filters']['sowp_report_value']['expose']['identifier'] = 'sowp_report_value';
  $handler->display->display_options['filters']['sowp_report_value']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    7 => 0,
    8 => 0,
    9 => 0,
    10 => 0,
    11 => 0,
    12 => 0,
    13 => 0,
  );
  /* Filter criterion: Content: Assign to section (sowp_gen_section) */
  $handler->display->display_options['filters']['sowp_gen_section_value']['id'] = 'sowp_gen_section_value';
  $handler->display->display_options['filters']['sowp_gen_section_value']['table'] = 'field_data_sowp_gen_section';
  $handler->display->display_options['filters']['sowp_gen_section_value']['field'] = 'sowp_gen_section_value';
  $handler->display->display_options['filters']['sowp_gen_section_value']['group'] = 1;
  $handler->display->display_options['filters']['sowp_gen_section_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['sowp_gen_section_value']['expose']['operator_id'] = 'sowp_gen_section_value_op';
  $handler->display->display_options['filters']['sowp_gen_section_value']['expose']['label'] = 'Section';
  $handler->display->display_options['filters']['sowp_gen_section_value']['expose']['operator'] = 'sowp_gen_section_value_op';
  $handler->display->display_options['filters']['sowp_gen_section_value']['expose']['identifier'] = 'section';
  $handler->display->display_options['filters']['sowp_gen_section_value']['expose']['remember'] = TRUE;
  $handler->display->display_options['filters']['sowp_gen_section_value']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
  );
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type_1']['id'] = 'type_1';
  $handler->display->display_options['filters']['type_1']['table'] = 'node';
  $handler->display->display_options['filters']['type_1']['field'] = 'type';
  $handler->display->display_options['filters']['type_1']['value'] = array(
    'sowp_bigintro' => 'sowp_bigintro',
    'sowp_chart' => 'sowp_chart',
    'sowp_story' => 'sowp_story',
    'sowp_body' => 'sowp_body',
  );
  $handler->display->display_options['filters']['type_1']['group'] = 1;
  $handler->display->display_options['filters']['type_1']['exposed'] = TRUE;
  $handler->display->display_options['filters']['type_1']['expose']['operator_id'] = 'type_1_op';
  $handler->display->display_options['filters']['type_1']['expose']['label'] = 'Type';
  $handler->display->display_options['filters']['type_1']['expose']['operator'] = 'type_1_op';
  $handler->display->display_options['filters']['type_1']['expose']['identifier'] = 'type';
  $handler->display->display_options['filters']['type_1']['expose']['remember'] = TRUE;
  $handler->display->display_options['filters']['type_1']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    7 => 0,
    8 => 0,
    9 => 0,
    10 => 0,
    11 => 0,
    12 => 0,
    13 => 0,
  );
  $handler->display->display_options['filters']['type_1']['expose']['reduce'] = TRUE;
  /* Filter criterion: Content: Title */
  $handler->display->display_options['filters']['title']['id'] = 'title';
  $handler->display->display_options['filters']['title']['table'] = 'node';
  $handler->display->display_options['filters']['title']['field'] = 'title';
  $handler->display->display_options['filters']['title']['operator'] = 'contains';
  $handler->display->display_options['filters']['title']['group'] = 1;
  $handler->display->display_options['filters']['title']['exposed'] = TRUE;
  $handler->display->display_options['filters']['title']['expose']['operator_id'] = 'title_op';
  $handler->display->display_options['filters']['title']['expose']['label'] = 'Search by title';
  $handler->display->display_options['filters']['title']['expose']['operator'] = 'title_op';
  $handler->display->display_options['filters']['title']['expose']['identifier'] = 'title';
  $handler->display->display_options['filters']['title']['expose']['remember'] = TRUE;
  $handler->display->display_options['filters']['title']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
  );
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status_1']['id'] = 'status_1';
  $handler->display->display_options['filters']['status_1']['table'] = 'node';
  $handler->display->display_options['filters']['status_1']['field'] = 'status';
  $handler->display->display_options['filters']['status_1']['value'] = 'All';
  $handler->display->display_options['filters']['status_1']['group'] = 1;
  $handler->display->display_options['filters']['status_1']['exposed'] = TRUE;
  $handler->display->display_options['filters']['status_1']['expose']['operator_id'] = '';
  $handler->display->display_options['filters']['status_1']['expose']['label'] = 'Published';
  $handler->display->display_options['filters']['status_1']['expose']['operator'] = 'status_1_op';
  $handler->display->display_options['filters']['status_1']['expose']['identifier'] = 'status';
  $handler->display->display_options['filters']['status_1']['expose']['remember'] = TRUE;
  $handler->display->display_options['filters']['status_1']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
  );
  /* Filter criterion: Content: Language */
  $handler->display->display_options['filters']['language']['id'] = 'language';
  $handler->display->display_options['filters']['language']['table'] = 'node';
  $handler->display->display_options['filters']['language']['field'] = 'language';
  $handler->display->display_options['filters']['language']['value'] = array(
    'en' => 'en',
    'fr' => 'fr',
    'es' => 'es',
  );
  $handler->display->display_options['filters']['language']['group'] = 1;
  $handler->display->display_options['filters']['language']['exposed'] = TRUE;
  $handler->display->display_options['filters']['language']['expose']['operator_id'] = 'language_op';
  $handler->display->display_options['filters']['language']['expose']['label'] = 'Language';
  $handler->display->display_options['filters']['language']['expose']['operator'] = 'language_op';
  $handler->display->display_options['filters']['language']['expose']['identifier'] = 'language';
  $handler->display->display_options['filters']['language']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
  );
  $handler->display->display_options['filters']['language']['expose']['reduce'] = TRUE;

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'admin/content/sowp';
  
  $views[$view->name] = $view;
  
  return $views;
}