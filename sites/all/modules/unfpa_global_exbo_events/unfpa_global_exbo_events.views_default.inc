<?php
/**
 * @file
 * unfpa_global_exbo_events.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function unfpa_global_exbo_events_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'exbo_events';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'ExBo Events';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Events';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'time';
  $handler->display->display_options['cache']['results_lifespan'] = 'custom';
  $handler->display->display_options['cache']['results_lifespan_custom'] = '900';
  $handler->display->display_options['cache']['output_lifespan'] = 'custom';
  $handler->display->display_options['cache']['output_lifespan_custom'] = '900';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* No results behavior: Global: Text area */
  $handler->display->display_options['empty']['area']['id'] = 'area';
  $handler->display->display_options['empty']['area']['table'] = 'views';
  $handler->display->display_options['empty']['area']['field'] = 'area';
  $handler->display->display_options['empty']['area']['empty'] = TRUE;
  $handler->display->display_options['empty']['area']['content'] = '<b>No content available.</b>';
  $handler->display->display_options['empty']['area']['format'] = 'filtered_html';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Sort criterion: Content: Start Date (field_event_date) */
  $handler->display->display_options['sorts']['field_event_date_value']['id'] = 'field_event_date_value';
  $handler->display->display_options['sorts']['field_event_date_value']['table'] = 'field_data_field_event_date';
  $handler->display->display_options['sorts']['field_event_date_value']['field'] = 'field_event_date_value';
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
    'ct_events' => 'ct_events',
  );
  $handler->display->display_options['filters']['type']['group'] = 1;
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';

  /* Display: ExBo Events List Page */
  $handler = $view->new_display('panel_pane', 'ExBo Events List Page', 'upcoming_informal_meetings');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = '<h1 id="page-title">Executive Board - Upcoming Meetings</h1>';
  $handler->display->display_options['defaults']['css_class'] = FALSE;
  $handler->display->display_options['css_class'] = 'event-list';
  $handler->display->display_options['defaults']['use_ajax'] = FALSE;
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'node';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['header'] = FALSE;
  $handler->display->display_options['defaults']['footer'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: ExBo date -  start date (field_exbo_date) */
  $handler->display->display_options['sorts']['field_exbo_date_value']['id'] = 'field_exbo_date_value';
  $handler->display->display_options['sorts']['field_exbo_date_value']['table'] = 'field_data_field_exbo_date';
  $handler->display->display_options['sorts']['field_exbo_date_value']['field'] = 'field_exbo_date_value';
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
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
    'exbo_events' => 'exbo_events',
  );
  $handler->display->display_options['filters']['type']['group'] = 1;
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['group'] = 1;
  /* Filter criterion: Content: ExBo date - end date (field_exbo_date:value2) */
  $handler->display->display_options['filters']['field_exbo_date_value2']['id'] = 'field_exbo_date_value2';
  $handler->display->display_options['filters']['field_exbo_date_value2']['table'] = 'field_data_field_exbo_date';
  $handler->display->display_options['filters']['field_exbo_date_value2']['field'] = 'field_exbo_date_value2';
  $handler->display->display_options['filters']['field_exbo_date_value2']['operator'] = '>=';
  $handler->display->display_options['filters']['field_exbo_date_value2']['granularity'] = 'hour';
  $handler->display->display_options['filters']['field_exbo_date_value2']['default_date'] = 'now';
  /* Filter criterion: Global: Combine fields filter */
  $handler->display->display_options['filters']['combine']['id'] = 'combine';
  $handler->display->display_options['filters']['combine']['table'] = 'views';
  $handler->display->display_options['filters']['combine']['field'] = 'combine';
  $handler->display->display_options['filters']['combine']['operator'] = 'contains';
  $handler->display->display_options['filters']['combine']['exposed'] = TRUE;
  $handler->display->display_options['filters']['combine']['expose']['operator_id'] = 'combine_op';
  $handler->display->display_options['filters']['combine']['expose']['label'] = 'Search:';
  $handler->display->display_options['filters']['combine']['expose']['operator'] = 'combine_op';
  $handler->display->display_options['filters']['combine']['expose']['identifier'] = 'combine';
  $handler->display->display_options['filters']['combine']['expose']['remember_roles'] = array(
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
    14 => 0,
  );
  /* Filter criterion: Content: Event Type (field_event_type) */
  $handler->display->display_options['filters']['field_event_type_value']['id'] = 'field_event_type_value';
  $handler->display->display_options['filters']['field_event_type_value']['table'] = 'field_data_field_event_type';
  $handler->display->display_options['filters']['field_event_type_value']['field'] = 'field_event_type_value';
  $handler->display->display_options['filters']['field_event_type_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_event_type_value']['expose']['operator_id'] = 'field_event_type_value_op';
  $handler->display->display_options['filters']['field_event_type_value']['expose']['label'] = 'Filter:';
  $handler->display->display_options['filters']['field_event_type_value']['expose']['operator'] = 'field_event_type_value_op';
  $handler->display->display_options['filters']['field_event_type_value']['expose']['identifier'] = 'field_event_type_value';
  $handler->display->display_options['filters']['field_event_type_value']['expose']['remember_roles'] = array(
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
    14 => 0,
  );
  /* Filter criterion: Content: ExBo date -  start date (field_exbo_date) */
  $handler->display->display_options['filters']['field_exbo_date_value']['id'] = 'field_exbo_date_value';
  $handler->display->display_options['filters']['field_exbo_date_value']['table'] = 'field_data_field_exbo_date';
  $handler->display->display_options['filters']['field_exbo_date_value']['field'] = 'field_exbo_date_value';
  $handler->display->display_options['filters']['field_exbo_date_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_exbo_date_value']['expose']['operator_id'] = 'field_exbo_date_value_op';
  $handler->display->display_options['filters']['field_exbo_date_value']['expose']['operator'] = 'field_exbo_date_value_op';
  $handler->display->display_options['filters']['field_exbo_date_value']['expose']['identifier'] = 'field_exbo_date_value';
  $handler->display->display_options['filters']['field_exbo_date_value']['expose']['remember_roles'] = array(
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
    14 => 0,
  );
  $handler->display->display_options['filters']['field_exbo_date_value']['granularity'] = 'year';

  /* Display: ExBo Past Events List Page */
  $handler = $view->new_display('panel_pane', 'ExBo Past Events List Page', 'past_informal_meetings');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = '<h1 id="page-title">Executive Board - Past Meetings</h1>';
  $handler->display->display_options['defaults']['css_class'] = FALSE;
  $handler->display->display_options['css_class'] = 'event-list';
  $handler->display->display_options['defaults']['use_ajax'] = FALSE;
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'node';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['header'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: ExBo date -  start date (field_exbo_date) */
  $handler->display->display_options['sorts']['field_exbo_date_value']['id'] = 'field_exbo_date_value';
  $handler->display->display_options['sorts']['field_exbo_date_value']['table'] = 'field_data_field_exbo_date';
  $handler->display->display_options['sorts']['field_exbo_date_value']['field'] = 'field_exbo_date_value';
  $handler->display->display_options['sorts']['field_exbo_date_value']['order'] = 'DESC';
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
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
    'exbo_events' => 'exbo_events',
  );
  $handler->display->display_options['filters']['type']['group'] = 1;
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['group'] = 1;
  /* Filter criterion: Content: ExBo date - end date (field_exbo_date:value2) */
  $handler->display->display_options['filters']['field_exbo_date_value2']['id'] = 'field_exbo_date_value2';
  $handler->display->display_options['filters']['field_exbo_date_value2']['table'] = 'field_data_field_exbo_date';
  $handler->display->display_options['filters']['field_exbo_date_value2']['field'] = 'field_exbo_date_value2';
  $handler->display->display_options['filters']['field_exbo_date_value2']['operator'] = '<';
  $handler->display->display_options['filters']['field_exbo_date_value2']['group'] = 1;
  $handler->display->display_options['filters']['field_exbo_date_value2']['granularity'] = 'hour';
  $handler->display->display_options['filters']['field_exbo_date_value2']['default_date'] = 'now';
  /* Filter criterion: Global: Combine fields filter */
  $handler->display->display_options['filters']['combine']['id'] = 'combine';
  $handler->display->display_options['filters']['combine']['table'] = 'views';
  $handler->display->display_options['filters']['combine']['field'] = 'combine';
  $handler->display->display_options['filters']['combine']['operator'] = 'contains';
  $handler->display->display_options['filters']['combine']['group'] = 1;
  $handler->display->display_options['filters']['combine']['exposed'] = TRUE;
  $handler->display->display_options['filters']['combine']['expose']['operator_id'] = 'combine_op';
  $handler->display->display_options['filters']['combine']['expose']['label'] = 'Search:';
  $handler->display->display_options['filters']['combine']['expose']['operator'] = 'combine_op';
  $handler->display->display_options['filters']['combine']['expose']['identifier'] = 'combine';
  $handler->display->display_options['filters']['combine']['expose']['remember_roles'] = array(
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
    14 => 0,
  );
  $handler->display->display_options['filters']['combine']['fields'] = array(
    'title' => 'title',
    'body' => 'body',
  );
  /* Filter criterion: Content: Event Type (field_event_type) */
  $handler->display->display_options['filters']['field_event_type_value']['id'] = 'field_event_type_value';
  $handler->display->display_options['filters']['field_event_type_value']['table'] = 'field_data_field_event_type';
  $handler->display->display_options['filters']['field_event_type_value']['field'] = 'field_event_type_value';
  $handler->display->display_options['filters']['field_event_type_value']['group'] = 1;
  $handler->display->display_options['filters']['field_event_type_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_event_type_value']['expose']['operator_id'] = 'field_event_type_value_op';
  $handler->display->display_options['filters']['field_event_type_value']['expose']['label'] = 'Filter:';
  $handler->display->display_options['filters']['field_event_type_value']['expose']['operator'] = 'field_event_type_value_op';
  $handler->display->display_options['filters']['field_event_type_value']['expose']['identifier'] = 'field_event_type_value';
  $handler->display->display_options['filters']['field_event_type_value']['expose']['remember_roles'] = array(
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
    14 => 0,
  );
  /* Filter criterion: Content: ExBo date -  start date (field_exbo_date) */
  $handler->display->display_options['filters']['field_exbo_date_value']['id'] = 'field_exbo_date_value';
  $handler->display->display_options['filters']['field_exbo_date_value']['table'] = 'field_data_field_exbo_date';
  $handler->display->display_options['filters']['field_exbo_date_value']['field'] = 'field_exbo_date_value';
  $handler->display->display_options['filters']['field_exbo_date_value']['group'] = 1;
  $handler->display->display_options['filters']['field_exbo_date_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_exbo_date_value']['expose']['operator_id'] = 'field_exbo_date_value_op';
  $handler->display->display_options['filters']['field_exbo_date_value']['expose']['operator'] = 'field_exbo_date_value_op';
  $handler->display->display_options['filters']['field_exbo_date_value']['expose']['identifier'] = 'field_exbo_date_value';
  $handler->display->display_options['filters']['field_exbo_date_value']['expose']['remember_roles'] = array(
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
    14 => 0,
  );
  $handler->display->display_options['filters']['field_exbo_date_value']['granularity'] = 'year';

  /* Display: Event Template : Event Details */
  $handler = $view->new_display('panel_pane', 'Event Template : Event Details', 'panel_pane_1');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = '<none>';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'node';
  $handler->display->display_options['row_options']['view_mode'] = 'full';
  $handler->display->display_options['row_options']['links'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Content: Nid */
  $handler->display->display_options['arguments']['nid']['id'] = 'nid';
  $handler->display->display_options['arguments']['nid']['table'] = 'node';
  $handler->display->display_options['arguments']['nid']['field'] = 'nid';
  $handler->display->display_options['arguments']['nid']['default_action'] = 'default';
  $handler->display->display_options['arguments']['nid']['default_argument_type'] = 'node';
  $handler->display->display_options['arguments']['nid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['nid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['nid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'exbo_events' => 'exbo_events',
  );
  $handler->display->display_options['filters']['type']['group'] = 1;
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';

  /* Display: Event Template : Video */
  $handler = $view->new_display('panel_pane', 'Event Template : Video', 'event_video_pane');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = '<none>';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['relationships'] = FALSE;
  /* Relationship: Entity Reference: Referenced Entity */
  $handler->display->display_options['relationships']['field_event_video_target_id']['id'] = 'field_event_video_target_id';
  $handler->display->display_options['relationships']['field_event_video_target_id']['table'] = 'field_data_field_event_video';
  $handler->display->display_options['relationships']['field_event_video_target_id']['field'] = 'field_event_video_target_id';
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['relationship'] = 'field_event_video_target_id';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['title']['element_type'] = 'h1';
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  /* Field: Content: Video */
  $handler->display->display_options['fields']['field_video_1']['id'] = 'field_video_1';
  $handler->display->display_options['fields']['field_video_1']['table'] = 'field_data_field_video';
  $handler->display->display_options['fields']['field_video_1']['field'] = 'field_video';
  $handler->display->display_options['fields']['field_video_1']['relationship'] = 'field_event_video_target_id';
  $handler->display->display_options['fields']['field_video_1']['label'] = '';
  $handler->display->display_options['fields']['field_video_1']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_video_1']['alter']['text'] = '[field_video_1]
<div class="title">
<h3>[title]</h3>
</div>
';
  $handler->display->display_options['fields']['field_video_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_video_1']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_video_1']['type'] = 'media';
  $handler->display->display_options['fields']['field_video_1']['settings'] = array(
    'file_view_mode' => 'media_small',
  );
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Content: Nid */
  $handler->display->display_options['arguments']['nid']['id'] = 'nid';
  $handler->display->display_options['arguments']['nid']['table'] = 'node';
  $handler->display->display_options['arguments']['nid']['field'] = 'nid';
  $handler->display->display_options['arguments']['nid']['default_action'] = 'default';
  $handler->display->display_options['arguments']['nid']['default_argument_type'] = 'node';
  $handler->display->display_options['arguments']['nid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['nid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['nid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';

  /* Display: Event Template : Extra Block */
  $handler = $view->new_display('panel_pane', 'Event Template : Extra Block', 'panel_pane_4');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = '<none>';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Event Block */
  $handler->display->display_options['fields']['field_event_block']['id'] = 'field_event_block';
  $handler->display->display_options['fields']['field_event_block']['table'] = 'field_data_field_event_block';
  $handler->display->display_options['fields']['field_event_block']['field'] = 'field_event_block';
  $handler->display->display_options['fields']['field_event_block']['label'] = '';
  $handler->display->display_options['fields']['field_event_block']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_event_block']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_event_block']['settings'] = array(
    'name' => 'event_block_field_collection_view',
    'display_id' => 'default',
    'add' => '',
  );
  $handler->display->display_options['fields']['field_event_block']['delta_offset'] = '0';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Content: Nid */
  $handler->display->display_options['arguments']['nid']['id'] = 'nid';
  $handler->display->display_options['arguments']['nid']['table'] = 'node';
  $handler->display->display_options['arguments']['nid']['field'] = 'nid';
  $handler->display->display_options['arguments']['nid']['default_action'] = 'default';
  $handler->display->display_options['arguments']['nid']['default_argument_type'] = 'node';
  $handler->display->display_options['arguments']['nid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['nid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['nid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'exbo_events' => 'exbo_events',
  );
  $handler->display->display_options['filters']['type']['group'] = 1;
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';

  /* Display: Event Template : Documents on Left */
  $handler = $view->new_display('panel_pane', 'Event Template : Documents on Left', 'panel_pane_2');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = '<none>';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['empty'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Event Documents */
  $handler->display->display_options['fields']['field_event_documents']['id'] = 'field_event_documents';
  $handler->display->display_options['fields']['field_event_documents']['table'] = 'field_data_field_event_documents';
  $handler->display->display_options['fields']['field_event_documents']['field'] = 'field_event_documents';
  $handler->display->display_options['fields']['field_event_documents']['label'] = '';
  $handler->display->display_options['fields']['field_event_documents']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_event_documents']['alter']['text'] = ' <h2>DOCUMENTS</h2>
              <ul class="box">
                <li>
                   [field_event_documents]
                </li>
              </ul>';
  $handler->display->display_options['fields']['field_event_documents']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_event_documents']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_event_documents']['settings'] = array(
    'name' => 'event_documents_pdf_of_field_collection_view',
    'display_id' => 'default',
    'add' => '',
  );
  $handler->display->display_options['fields']['field_event_documents']['delta_offset'] = '0';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Content: Nid */
  $handler->display->display_options['arguments']['nid']['id'] = 'nid';
  $handler->display->display_options['arguments']['nid']['table'] = 'node';
  $handler->display->display_options['arguments']['nid']['field'] = 'nid';
  $handler->display->display_options['arguments']['nid']['default_action'] = 'default';
  $handler->display->display_options['arguments']['nid']['default_argument_type'] = 'node';
  $handler->display->display_options['arguments']['nid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['nid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['nid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'exbo_events' => 'exbo_events',
  );
  $handler->display->display_options['filters']['type']['group'] = 1;
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';
  /* Filter criterion: Content: Document position (field_document_position) */
  $handler->display->display_options['filters']['field_document_position_value']['id'] = 'field_document_position_value';
  $handler->display->display_options['filters']['field_document_position_value']['table'] = 'field_data_field_document_position';
  $handler->display->display_options['filters']['field_document_position_value']['field'] = 'field_document_position_value';
  $handler->display->display_options['filters']['field_document_position_value']['value'] = array(
    'left' => 'left',
  );

  /* Display: Event Template : Documents on Right */
  $handler = $view->new_display('panel_pane', 'Event Template : Documents on Right', 'panel_pane_3');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = '<none>';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['empty'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Event Documents */
  $handler->display->display_options['fields']['field_event_documents']['id'] = 'field_event_documents';
  $handler->display->display_options['fields']['field_event_documents']['table'] = 'field_data_field_event_documents';
  $handler->display->display_options['fields']['field_event_documents']['field'] = 'field_event_documents';
  $handler->display->display_options['fields']['field_event_documents']['label'] = '';
  $handler->display->display_options['fields']['field_event_documents']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_event_documents']['alter']['text'] = ' <h2>DOCUMENTS</h2>
              <ul class="box">
                <li>
                   [field_event_documents]
                </li>
              </ul>';
  $handler->display->display_options['fields']['field_event_documents']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_event_documents']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_event_documents']['settings'] = array(
    'name' => 'event_documents_pdf_of_field_collection_view',
    'display_id' => 'default',
    'add' => '',
  );
  $handler->display->display_options['fields']['field_event_documents']['delta_offset'] = '0';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Content: Nid */
  $handler->display->display_options['arguments']['nid']['id'] = 'nid';
  $handler->display->display_options['arguments']['nid']['table'] = 'node';
  $handler->display->display_options['arguments']['nid']['field'] = 'nid';
  $handler->display->display_options['arguments']['nid']['default_action'] = 'default';
  $handler->display->display_options['arguments']['nid']['default_argument_type'] = 'node';
  $handler->display->display_options['arguments']['nid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['nid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['nid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'exbo_events' => 'exbo_events',
  );
  $handler->display->display_options['filters']['type']['group'] = 1;
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';
  /* Filter criterion: Content: Document position (field_document_position) */
  $handler->display->display_options['filters']['field_document_position_value']['id'] = 'field_document_position_value';
  $handler->display->display_options['filters']['field_document_position_value']['table'] = 'field_data_field_document_position';
  $handler->display->display_options['filters']['field_document_position_value']['field'] = 'field_document_position_value';
  $handler->display->display_options['filters']['field_document_position_value']['value'] = array(
    'right' => 'right',
  );
  $export['exbo_events'] = $view;

  return $export;
}
