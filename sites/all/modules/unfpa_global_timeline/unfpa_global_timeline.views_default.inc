<?php

/**
 * @file
 * unfpa_global_timeline.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function unfpa_global_timeline_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'timeline_field_collection_view';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'field_collection_item';
  $view->human_name = 'Timeline field collection view';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['distinct'] = TRUE;
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Field collection item: Event */
  $handler->display->display_options['fields']['field_event']['id'] = 'field_event';
  $handler->display->display_options['fields']['field_event']['table'] = 'field_data_field_event';
  $handler->display->display_options['fields']['field_event']['field'] = 'field_event';
  $handler->display->display_options['fields']['field_event']['label'] = '';
  $handler->display->display_options['fields']['field_event']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_event']['settings'] = array(
    'link' => 0,
  );
  /* Field: Field collection item: Event Title */
  $handler->display->display_options['fields']['field_event_title']['id'] = 'field_event_title';
  $handler->display->display_options['fields']['field_event_title']['table'] = 'field_data_field_event_title';
  $handler->display->display_options['fields']['field_event_title']['field'] = 'field_event_title';
  $handler->display->display_options['fields']['field_event_title']['label'] = '';
  $handler->display->display_options['fields']['field_event_title']['element_label_colon'] = FALSE;
  /* Field: Field collection item: Event Description */
  $handler->display->display_options['fields']['field_event_description']['id'] = 'field_event_description';
  $handler->display->display_options['fields']['field_event_description']['table'] = 'field_data_field_event_description';
  $handler->display->display_options['fields']['field_event_description']['field'] = 'field_event_description';
  $handler->display->display_options['fields']['field_event_description']['label'] = '';
  $handler->display->display_options['fields']['field_event_description']['element_label_colon'] = FALSE;
  /* Field: Field collection item: Event Image */
  $handler->display->display_options['fields']['field_event_image']['id'] = 'field_event_image';
  $handler->display->display_options['fields']['field_event_image']['table'] = 'field_data_field_event_image';
  $handler->display->display_options['fields']['field_event_image']['field'] = 'field_event_image';
  $handler->display->display_options['fields']['field_event_image']['label'] = '';
  $handler->display->display_options['fields']['field_event_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_event_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_event_image']['type'] = 'image_url';
  $handler->display->display_options['fields']['field_event_image']['settings'] = array(
    'url_type' => '0',
    'image_style' => 'thumbnail',
    'image_link' => '',
  );
  /* Sort criterion: Field collection item: Field collection item ID */
  $handler->display->display_options['sorts']['item_id']['id'] = 'item_id';
  $handler->display->display_options['sorts']['item_id']['table'] = 'field_collection_item';
  $handler->display->display_options['sorts']['item_id']['field'] = 'item_id';
  /* Contextual filter: Field collection item: Field collection item ID */
  $handler->display->display_options['arguments']['item_id']['id'] = 'item_id';
  $handler->display->display_options['arguments']['item_id']['table'] = 'field_collection_item';
  $handler->display->display_options['arguments']['item_id']['field'] = 'item_id';
  $handler->display->display_options['arguments']['item_id']['default_action'] = 'not found';
  $handler->display->display_options['arguments']['item_id']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['item_id']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['item_id']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['item_id']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['item_id']['break_phrase'] = TRUE;
  /* Filter criterion: Field collection item: Field name */
  $handler->display->display_options['filters']['field_name']['id'] = 'field_name';
  $handler->display->display_options['filters']['field_name']['table'] = 'field_collection_item';
  $handler->display->display_options['filters']['field_name']['field'] = 'field_name';
  $handler->display->display_options['filters']['field_name']['value'] = array(
    'field_timeline_events' => 'field_timeline_events',
  );
  $export['timeline_field_collection_view'] = $view;

  $view = new view();
  $view->name = 'vw_timeline';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Timeline';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Timeline';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '1';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['body']['type'] = 'text_plain';
  /* Field: Content: Timelime image */
  $handler->display->display_options['fields']['field_timelime_image']['id'] = 'field_timelime_image';
  $handler->display->display_options['fields']['field_timelime_image']['table'] = 'field_data_field_timelime_image';
  $handler->display->display_options['fields']['field_timelime_image']['field'] = 'field_timelime_image';
  $handler->display->display_options['fields']['field_timelime_image']['label'] = '';
  $handler->display->display_options['fields']['field_timelime_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_timelime_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_timelime_image']['type'] = 'image_url';
  $handler->display->display_options['fields']['field_timelime_image']['settings'] = array(
    'url_type' => '0',
    'image_style' => 'thumbnail',
    'image_link' => '',
  );
  /* Field: Content: Timeline Events */
  $handler->display->display_options['fields']['field_timeline_events']['id'] = 'field_timeline_events';
  $handler->display->display_options['fields']['field_timeline_events']['table'] = 'field_data_field_timeline_events';
  $handler->display->display_options['fields']['field_timeline_events']['field'] = 'field_timeline_events';
  $handler->display->display_options['fields']['field_timeline_events']['label'] = '';
  $handler->display->display_options['fields']['field_timeline_events']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_timeline_events']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_timeline_events']['settings'] = array(
    'name' => 'timeline_field_collection_view',
    'display_id' => 'default',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_timeline_events']['delta_offset'] = '0';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Contextual filter: Content: Nid */
  $handler->display->display_options['arguments']['nid']['id'] = 'nid';
  $handler->display->display_options['arguments']['nid']['table'] = 'node';
  $handler->display->display_options['arguments']['nid']['field'] = 'nid';
  $handler->display->display_options['arguments']['nid']['default_action'] = 'not found';
  $handler->display->display_options['arguments']['nid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['nid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['nid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['nid']['summary_options']['items_per_page'] = '25';
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
    'ct_timeline' => 'ct_timeline',
  );
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page_1');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Timelines';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Timelime image */
  $handler->display->display_options['fields']['field_timelime_image']['id'] = 'field_timelime_image';
  $handler->display->display_options['fields']['field_timelime_image']['table'] = 'field_data_field_timelime_image';
  $handler->display->display_options['fields']['field_timelime_image']['field'] = 'field_timelime_image';
  $handler->display->display_options['fields']['field_timelime_image']['label'] = '';
  $handler->display->display_options['fields']['field_timelime_image']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_timelime_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_timelime_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_timelime_image']['settings'] = array(
    'image_style' => 'news_list',
    'image_link' => 'content',
  );
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['exclude'] = TRUE;
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  /* Field: Global: Custom text */
  $handler->display->display_options['fields']['nothing']['id'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['table'] = 'views';
  $handler->display->display_options['fields']['nothing']['field'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['label'] = '';
  $handler->display->display_options['fields']['nothing']['alter']['text'] = '<section class="item">
    <div class="left">
        [field_timelime_image]
    </div>
    <div class="right">
        <div class="timeline-title">[title]</div>
        [body]
    </div>
    <div class="clearfix"></div>
</section>';
  $handler->display->display_options['fields']['nothing']['element_label_colon'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  $handler->display->display_options['path'] = 'timelines';
  $export['vw_timeline'] = $view;

  return $export;
}
