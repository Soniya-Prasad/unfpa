<?php
/**
 * @file
 * unfpa_global_executive_board.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function unfpa_global_executive_board_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'executive_board';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Executive Board';
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
  $handler->display->display_options['exposed_form']['options']['autosubmit'] = TRUE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['style_options']['grouping'] = array(
    0 => array(
      'field' => 'field_programme_country',
      'rendered' => 1,
      'rendered_strip' => 0,
    ),
  );
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['row_options']['hide_empty'] = TRUE;
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
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;

  /* Display: Updates listing pane */
  $handler = $view->new_display('panel_pane', 'Updates listing pane', 'updates_listing_pane');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Updates';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: News Image */
  $handler->display->display_options['fields']['field_news_image']['id'] = 'field_news_image';
  $handler->display->display_options['fields']['field_news_image']['table'] = 'field_data_field_news_image';
  $handler->display->display_options['fields']['field_news_image']['field'] = 'field_news_image';
  $handler->display->display_options['fields']['field_news_image']['label'] = '';
  $handler->display->display_options['fields']['field_news_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_news_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_news_image']['settings'] = array(
    'image_style' => 'eb_home',
    'image_link' => '',
  );
  /* Field: Content: Update Date */
  $handler->display->display_options['fields']['field_update_date']['id'] = 'field_update_date';
  $handler->display->display_options['fields']['field_update_date']['table'] = 'field_data_field_update_date';
  $handler->display->display_options['fields']['field_update_date']['field'] = 'field_update_date';
  $handler->display->display_options['fields']['field_update_date']['label'] = '';
  $handler->display->display_options['fields']['field_update_date']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_update_date']['settings'] = array(
    'format_type' => 'event_details_date',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
    'show_remaining_days' => 0,
  );
  /* Field: Content: Location */
  $handler->display->display_options['fields']['field_location']['id'] = 'field_location';
  $handler->display->display_options['fields']['field_location']['table'] = 'field_data_field_location';
  $handler->display->display_options['fields']['field_location']['field'] = 'field_location';
  $handler->display->display_options['fields']['field_location']['label'] = '';
  $handler->display->display_options['fields']['field_location']['element_label_colon'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['alter']['max_length'] = '200';
  $handler->display->display_options['fields']['body']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['body']['alter']['more_link_text'] = 'Details';
  $handler->display->display_options['fields']['body']['alter']['strip_tags'] = TRUE;
  $handler->display->display_options['fields']['body']['alter']['trim'] = TRUE;
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  /* Field: Content: Link */
  $handler->display->display_options['fields']['view_node']['id'] = 'view_node';
  $handler->display->display_options['fields']['view_node']['table'] = 'views_entity_node';
  $handler->display->display_options['fields']['view_node']['field'] = 'view_node';
  $handler->display->display_options['fields']['view_node']['label'] = '';
  $handler->display->display_options['fields']['view_node']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['view_node']['alter']['absolute'] = TRUE;
  $handler->display->display_options['fields']['view_node']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['view_node']['text'] = 'Details';
  /* Field: Global: Custom text */
  $handler->display->display_options['fields']['nothing']['id'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['table'] = 'views';
  $handler->display->display_options['fields']['nothing']['field'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['label'] = '';
  $handler->display->display_options['fields']['nothing']['exclude'] = TRUE;
  $handler->display->display_options['fields']['nothing']['alter']['text'] = '[field_news_image] 
<div class=\'infos\'> 
<p class=\'calendar\'>[field_update_date] </p>
<p class=\'location\'>[field_location] </p>
<div class=\'body-wrapper\'>
<p class=\'title\'>[title] </p>
<p class=\'body\'>[body] </p>
<p>[view_node]</p>
</div>
</div>';
  $handler->display->display_options['fields']['nothing']['element_label_colon'] = FALSE;
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
    'ct_updates' => 'ct_updates',
  );
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';
  /* Filter criterion: Content: Exbo (field_exbo) */
  $handler->display->display_options['filters']['field_exbo_value']['id'] = 'field_exbo_value';
  $handler->display->display_options['filters']['field_exbo_value']['table'] = 'field_data_field_exbo';
  $handler->display->display_options['filters']['field_exbo_value']['field'] = 'field_exbo_value';
  $handler->display->display_options['filters']['field_exbo_value']['value'] = array(
    1 => '1',
  );

  /* Display: Bureau Members */
  $handler = $view->new_display('panel_pane', 'Bureau Members', 'bureau_members');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['defaults']['use_ajax'] = FALSE;
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['defaults']['exposed_form'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['autosubmit'] = TRUE;
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['style_options']['row_class'] = 'clearfix';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['header'] = FALSE;
  $handler->display->display_options['defaults']['empty'] = FALSE;
  /* No results behavior: Global: Text area */
  $handler->display->display_options['empty']['area']['id'] = 'area';
  $handler->display->display_options['empty']['area']['table'] = 'views';
  $handler->display->display_options['empty']['area']['field'] = 'area';
  $handler->display->display_options['empty']['area']['empty'] = TRUE;
  $handler->display->display_options['empty']['area']['content'] = 'No bureau members found with matching filter.';
  $handler->display->display_options['empty']['area']['format'] = 'full_html';
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Small portrait picture */
  $handler->display->display_options['fields']['field_eb_small_portrait_picture']['id'] = 'field_eb_small_portrait_picture';
  $handler->display->display_options['fields']['field_eb_small_portrait_picture']['table'] = 'field_data_field_eb_small_portrait_picture';
  $handler->display->display_options['fields']['field_eb_small_portrait_picture']['field'] = 'field_eb_small_portrait_picture';
  $handler->display->display_options['fields']['field_eb_small_portrait_picture']['label'] = '';
  $handler->display->display_options['fields']['field_eb_small_portrait_picture']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_eb_small_portrait_picture']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_eb_small_portrait_picture']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['field_eb_title']['id'] = 'field_eb_title';
  $handler->display->display_options['fields']['field_eb_title']['table'] = 'field_data_field_eb_title';
  $handler->display->display_options['fields']['field_eb_title']['field'] = 'field_eb_title';
  $handler->display->display_options['fields']['field_eb_title']['label'] = '';
  $handler->display->display_options['fields']['field_eb_title']['element_label_colon'] = FALSE;
  /* Field: Content: Country */
  $handler->display->display_options['fields']['field_eb_country']['id'] = 'field_eb_country';
  $handler->display->display_options['fields']['field_eb_country']['table'] = 'field_data_field_eb_country';
  $handler->display->display_options['fields']['field_eb_country']['field'] = 'field_eb_country';
  $handler->display->display_options['fields']['field_eb_country']['settings'] = array(
    'link' => 0,
  );
  /* Field: Content: Time of mandate */
  $handler->display->display_options['fields']['field_eb_time_of_mandate']['id'] = 'field_eb_time_of_mandate';
  $handler->display->display_options['fields']['field_eb_time_of_mandate']['table'] = 'field_data_field_eb_time_of_mandate';
  $handler->display->display_options['fields']['field_eb_time_of_mandate']['field'] = 'field_eb_time_of_mandate';
  $handler->display->display_options['fields']['field_eb_time_of_mandate']['label'] = '';
  $handler->display->display_options['fields']['field_eb_time_of_mandate']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_eb_time_of_mandate']['settings'] = array(
    'format_type' => 'only_year',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
    'show_remaining_days' => 0,
  );
  /* Field: Content: Bio */
  $handler->display->display_options['fields']['field_eb_bio']['id'] = 'field_eb_bio';
  $handler->display->display_options['fields']['field_eb_bio']['table'] = 'field_data_field_eb_bio';
  $handler->display->display_options['fields']['field_eb_bio']['field'] = 'field_eb_bio';
  $handler->display->display_options['fields']['field_eb_bio']['label'] = '';
  $handler->display->display_options['fields']['field_eb_bio']['element_label_colon'] = FALSE;
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Time of mandate -  start date (field_eb_time_of_mandate) */
  $handler->display->display_options['sorts']['field_eb_time_of_mandate_value']['id'] = 'field_eb_time_of_mandate_value';
  $handler->display->display_options['sorts']['field_eb_time_of_mandate_value']['table'] = 'field_data_field_eb_time_of_mandate';
  $handler->display->display_options['sorts']['field_eb_time_of_mandate_value']['field'] = 'field_eb_time_of_mandate_value';
  $handler->display->display_options['sorts']['field_eb_time_of_mandate_value']['order'] = 'DESC';
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Time of mandate -  start date (field_eb_time_of_mandate) */
  $handler->display->display_options['filters']['field_eb_time_of_mandate_value']['id'] = 'field_eb_time_of_mandate_value';
  $handler->display->display_options['filters']['field_eb_time_of_mandate_value']['table'] = 'field_data_field_eb_time_of_mandate';
  $handler->display->display_options['filters']['field_eb_time_of_mandate_value']['field'] = 'field_eb_time_of_mandate_value';
  $handler->display->display_options['filters']['field_eb_time_of_mandate_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_eb_time_of_mandate_value']['expose']['operator_id'] = 'field_eb_time_of_mandate_value_op';
  $handler->display->display_options['filters']['field_eb_time_of_mandate_value']['expose']['operator'] = 'field_eb_time_of_mandate_value_op';
  $handler->display->display_options['filters']['field_eb_time_of_mandate_value']['expose']['identifier'] = 'field_eb_time_of_mandate_value';
  $handler->display->display_options['filters']['field_eb_time_of_mandate_value']['expose']['remember_roles'] = array(
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
  $handler->display->display_options['filters']['field_eb_time_of_mandate_value']['granularity'] = 'year';
  $handler->display->display_options['filters']['field_eb_time_of_mandate_value']['default_date'] = 'now';
  /* Filter criterion: Content: Select Member (field_eb_select_member) */
  $handler->display->display_options['filters']['field_eb_select_member_value']['id'] = 'field_eb_select_member_value';
  $handler->display->display_options['filters']['field_eb_select_member_value']['table'] = 'field_data_field_eb_select_member';
  $handler->display->display_options['filters']['field_eb_select_member_value']['field'] = 'field_eb_select_member_value';
  $handler->display->display_options['filters']['field_eb_select_member_value']['value'] = array(
    'bureau members' => 'bureau members',
  );
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'executive_board' => 'executive_board',
  );
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';

  /* Display: Feature Documents */
  $handler = $view->new_display('panel_pane', 'Feature Documents', 'exbo_featured_documents');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Featured documents';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['style_options']['grouping'] = array(
    0 => array(
      'field' => 'field_programme_country',
      'rendered' => 1,
      'rendered_strip' => 0,
    ),
  );
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'node';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
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
    'board_documents' => 'board_documents',
    'ct_programme_documents' => 'ct_programme_documents',
  );
  /* Filter criterion: Content: Featured document on executive board home (field_featured_doc_exbo) */
  $handler->display->display_options['filters']['field_featured_doc_exbo_value']['id'] = 'field_featured_doc_exbo_value';
  $handler->display->display_options['filters']['field_featured_doc_exbo_value']['table'] = 'field_data_field_featured_doc_exbo';
  $handler->display->display_options['filters']['field_featured_doc_exbo_value']['field'] = 'field_featured_doc_exbo_value';
  $handler->display->display_options['filters']['field_featured_doc_exbo_value']['value'] = array(
    1 => '1',
  );
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';

  /* Display: Decision Board Documents Listing */
  $handler = $view->new_display('panel_pane', 'Decision Board Documents Listing', 'decisions_board_document_listing_pane');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = '<h1 class=\'page-title executive-board full-width\'>Decisions of the Board</h1>';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['style_options']['grouping'] = array(
    0 => array(
      'field' => 'field_programme_country',
      'rendered' => 1,
      'rendered_strip' => 0,
    ),
  );
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['empty'] = FALSE;
  /* No results behavior: Global: Text area */
  $handler->display->display_options['empty']['area']['id'] = 'area';
  $handler->display->display_options['empty']['area']['table'] = 'views';
  $handler->display->display_options['empty']['area']['field'] = 'area';
  $handler->display->display_options['empty']['area']['empty'] = TRUE;
  $handler->display->display_options['empty']['area']['content'] = 'No documents found with matching filter.';
  $handler->display->display_options['empty']['area']['format'] = 'custom_html';
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Supporting documents */
  $handler->display->display_options['fields']['field_supporting_document']['id'] = 'field_supporting_document';
  $handler->display->display_options['fields']['field_supporting_document']['table'] = 'field_data_field_supporting_document';
  $handler->display->display_options['fields']['field_supporting_document']['field'] = 'field_supporting_document';
  $handler->display->display_options['fields']['field_supporting_document']['label'] = '';
  $handler->display->display_options['fields']['field_supporting_document']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_supporting_document']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_supporting_document']['settings'] = array(
    'name' => 'vw_supporting_document_listing_field_collection_view',
    'display_id' => 'default',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_supporting_document']['delta_offset'] = '0';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: Supporting documents */
  $handler->display->display_options['fields']['field_supporting_document_1']['id'] = 'field_supporting_document_1';
  $handler->display->display_options['fields']['field_supporting_document_1']['table'] = 'field_data_field_supporting_document';
  $handler->display->display_options['fields']['field_supporting_document_1']['field'] = 'field_supporting_document';
  $handler->display->display_options['fields']['field_supporting_document_1']['label'] = '';
  $handler->display->display_options['fields']['field_supporting_document_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_supporting_document_1']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_supporting_document_1']['settings'] = array(
    'name' => 'vw_supporting_document_listing_field_collection_view',
    'display_id' => 'vw_supporting_document_download_field_collection_view',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_supporting_document_1']['delta_offset'] = '0';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Board document date -  start date (field_board_document_date) */
  $handler->display->display_options['sorts']['field_board_document_date_value']['id'] = 'field_board_document_date_value';
  $handler->display->display_options['sorts']['field_board_document_date_value']['table'] = 'field_data_field_board_document_date';
  $handler->display->display_options['sorts']['field_board_document_date_value']['field'] = 'field_board_document_date_value';
  $handler->display->display_options['sorts']['field_board_document_date_value']['order'] = 'DESC';
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
    'board_documents' => 'board_documents',
  );
  /* Filter criterion: Content: Document type (field_document_type) */
  $handler->display->display_options['filters']['field_document_type_value']['id'] = 'field_document_type_value';
  $handler->display->display_options['filters']['field_document_type_value']['table'] = 'field_data_field_document_type';
  $handler->display->display_options['filters']['field_document_type_value']['field'] = 'field_document_type_value';
  $handler->display->display_options['filters']['field_document_type_value']['value'] = array(
    'Decisions of the Board' => 'Decisions of the Board',
  );
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';

  /* Display: Reports on Board Documents Listing */
  $handler = $view->new_display('panel_pane', 'Reports on Board Documents Listing', 'reports_board_document_listing_pane');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = '<h1 class=\'page-title executive-board full-width\'>Report of Sessions</h1>';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['style_options']['grouping'] = array(
    0 => array(
      'field' => 'field_programme_country',
      'rendered' => 1,
      'rendered_strip' => 0,
    ),
  );
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['empty'] = FALSE;
  /* No results behavior: Global: Text area */
  $handler->display->display_options['empty']['area']['id'] = 'area';
  $handler->display->display_options['empty']['area']['table'] = 'views';
  $handler->display->display_options['empty']['area']['field'] = 'area';
  $handler->display->display_options['empty']['area']['empty'] = TRUE;
  $handler->display->display_options['empty']['area']['content'] = 'No documents found with matching filter.';
  $handler->display->display_options['empty']['area']['format'] = 'custom_html';
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Supporting documents */
  $handler->display->display_options['fields']['field_supporting_document']['id'] = 'field_supporting_document';
  $handler->display->display_options['fields']['field_supporting_document']['table'] = 'field_data_field_supporting_document';
  $handler->display->display_options['fields']['field_supporting_document']['field'] = 'field_supporting_document';
  $handler->display->display_options['fields']['field_supporting_document']['label'] = '';
  $handler->display->display_options['fields']['field_supporting_document']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_supporting_document']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_supporting_document']['settings'] = array(
    'name' => 'vw_supporting_document_listing_field_collection_view',
    'display_id' => 'default',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_supporting_document']['delta_offset'] = '0';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: Supporting documents */
  $handler->display->display_options['fields']['field_supporting_document_1']['id'] = 'field_supporting_document_1';
  $handler->display->display_options['fields']['field_supporting_document_1']['table'] = 'field_data_field_supporting_document';
  $handler->display->display_options['fields']['field_supporting_document_1']['field'] = 'field_supporting_document';
  $handler->display->display_options['fields']['field_supporting_document_1']['label'] = '';
  $handler->display->display_options['fields']['field_supporting_document_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_supporting_document_1']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_supporting_document_1']['settings'] = array(
    'name' => 'vw_supporting_document_listing_field_collection_view',
    'display_id' => 'vw_supporting_document_download_field_collection_view',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_supporting_document_1']['delta_offset'] = '0';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Board document date -  start date (field_board_document_date) */
  $handler->display->display_options['sorts']['field_board_document_date_value']['id'] = 'field_board_document_date_value';
  $handler->display->display_options['sorts']['field_board_document_date_value']['table'] = 'field_data_field_board_document_date';
  $handler->display->display_options['sorts']['field_board_document_date_value']['field'] = 'field_board_document_date_value';
  $handler->display->display_options['sorts']['field_board_document_date_value']['order'] = 'DESC';
  $handler->display->display_options['sorts']['field_board_document_date_value']['expose']['label'] = 'Board document date -  start date (field_board_document_date)';
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
    'board_documents' => 'board_documents',
  );
  /* Filter criterion: Content: Document type (field_document_type) */
  $handler->display->display_options['filters']['field_document_type_value']['id'] = 'field_document_type_value';
  $handler->display->display_options['filters']['field_document_type_value']['table'] = 'field_data_field_document_type';
  $handler->display->display_options['filters']['field_document_type_value']['field'] = 'field_document_type_value';
  $handler->display->display_options['filters']['field_document_type_value']['value'] = array(
    'Reports on Board sessions' => 'Reports on Board sessions',
  );
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';
  $export['executive_board'] = $view;

  $view = new view();
  $view->name = 'vw_portal_document_pdf_field_collection_view';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'field_collection_item';
  $view->human_name = 'Portal documents pdf field collection view';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['css_class'] = 'vw-pub-image';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['distinct'] = TRUE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '1';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Field collection item: Field collection item ID */
  $handler->display->display_options['fields']['item_id']['id'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['item_id']['field'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['item_id']['hide_alter_empty'] = FALSE;
  $handler->display->display_options['fields']['item_id']['separator'] = '';
  /* Field: Field collection item: Field path */
  $handler->display->display_options['fields']['field_path']['id'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['field_path']['field'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['label'] = '';
  $handler->display->display_options['fields']['field_path']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_path']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_path']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Host Entity ID */
  $handler->display->display_options['fields']['host_entity_id']['id'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['host_entity_id']['field'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['label'] = '';
  $handler->display->display_options['fields']['host_entity_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['host_entity_id']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['host_entity_id']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Portal Upload file */
  $handler->display->display_options['fields']['field_portal_upload_file']['id'] = 'field_portal_upload_file';
  $handler->display->display_options['fields']['field_portal_upload_file']['table'] = 'field_data_field_portal_upload_file';
  $handler->display->display_options['fields']['field_portal_upload_file']['field'] = 'field_portal_upload_file';
  $handler->display->display_options['fields']['field_portal_upload_file']['label'] = '';
  $handler->display->display_options['fields']['field_portal_upload_file']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_portal_upload_file']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_portal_upload_file']['type'] = 'pdfpreview';
  $handler->display->display_options['fields']['field_portal_upload_file']['settings'] = array(
    'image_style' => 'pub_style_home',
    'image_link' => 'file',
    'show_description' => 0,
    'tag' => 'span',
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
  $export['vw_portal_document_pdf_field_collection_view'] = $view;

  $view = new view();
  $view->name = 'vw_support_download_pdf_field_collection_view';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'field_collection_item';
  $view->human_name = 'Supporting download pdf field collection view';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['css_class'] = 'vw-pub-image';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['distinct'] = TRUE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Field collection item: Field collection item ID */
  $handler->display->display_options['fields']['item_id']['id'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['item_id']['field'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['label'] = '';
  $handler->display->display_options['fields']['item_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['item_id']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['item_id']['hide_alter_empty'] = FALSE;
  $handler->display->display_options['fields']['item_id']['separator'] = '';
  /* Field: Field collection item: Field path */
  $handler->display->display_options['fields']['field_path']['id'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['field_path']['field'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['label'] = '';
  $handler->display->display_options['fields']['field_path']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_path']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_path']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Host Entity ID */
  $handler->display->display_options['fields']['host_entity_id']['id'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['host_entity_id']['field'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['label'] = '';
  $handler->display->display_options['fields']['host_entity_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['host_entity_id']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['host_entity_id']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Board PDF Upload */
  $handler->display->display_options['fields']['field_board_pdf_upload']['id'] = 'field_board_pdf_upload';
  $handler->display->display_options['fields']['field_board_pdf_upload']['table'] = 'field_data_field_board_pdf_upload';
  $handler->display->display_options['fields']['field_board_pdf_upload']['field'] = 'field_board_pdf_upload';
  $handler->display->display_options['fields']['field_board_pdf_upload']['label'] = '';
  $handler->display->display_options['fields']['field_board_pdf_upload']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_board_pdf_upload']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_board_pdf_upload']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_board_pdf_upload']['type'] = 'file_url_plain';
  $handler->display->display_options['fields']['field_board_pdf_upload']['settings'] = array(
    'image_style' => 'pub_style_home',
    'image_link' => 'file',
    'show_description' => 0,
    'tag' => 'span',
  );
  /* Field: Field collection item: Available Languages */
  $handler->display->display_options['fields']['field_available_languages']['id'] = 'field_available_languages';
  $handler->display->display_options['fields']['field_available_languages']['table'] = 'field_data_field_available_languages';
  $handler->display->display_options['fields']['field_available_languages']['field'] = 'field_available_languages';
  $handler->display->display_options['fields']['field_available_languages']['label'] = '';
  $handler->display->display_options['fields']['field_available_languages']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_available_languages']['alter']['text'] = '<div class="items"><a href="[field_board_pdf_upload]" target="_blank">[field_available_languages]</a></div>';
  $handler->display->display_options['fields']['field_available_languages']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_available_languages']['settings'] = array(
    'link' => 0,
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
  $export['vw_support_download_pdf_field_collection_view'] = $view;

  $view = new view();
  $view->name = 'vw_support_listing_pdf_field_collection_view';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'field_collection_item';
  $view->human_name = 'Supporting listing pdf field collection view';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['css_class'] = 'vw-pub-image';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['distinct'] = TRUE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '1';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Field collection item: Field collection item ID */
  $handler->display->display_options['fields']['item_id']['id'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['item_id']['field'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['label'] = '';
  $handler->display->display_options['fields']['item_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['item_id']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['item_id']['hide_alter_empty'] = FALSE;
  $handler->display->display_options['fields']['item_id']['separator'] = '';
  /* Field: Field collection item: Field path */
  $handler->display->display_options['fields']['field_path']['id'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['field_path']['field'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['label'] = '';
  $handler->display->display_options['fields']['field_path']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_path']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_path']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Host Entity ID */
  $handler->display->display_options['fields']['host_entity_id']['id'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['host_entity_id']['field'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['label'] = '';
  $handler->display->display_options['fields']['host_entity_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['host_entity_id']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['host_entity_id']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Board PDF Upload */
  $handler->display->display_options['fields']['field_board_pdf_upload']['id'] = 'field_board_pdf_upload';
  $handler->display->display_options['fields']['field_board_pdf_upload']['table'] = 'field_data_field_board_pdf_upload';
  $handler->display->display_options['fields']['field_board_pdf_upload']['field'] = 'field_board_pdf_upload';
  $handler->display->display_options['fields']['field_board_pdf_upload']['label'] = '';
  $handler->display->display_options['fields']['field_board_pdf_upload']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_board_pdf_upload']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_board_pdf_upload']['type'] = 'pdfpreview';
  $handler->display->display_options['fields']['field_board_pdf_upload']['settings'] = array(
    'image_style' => 'pub_style_list',
    'image_link' => 'file',
    'show_description' => 0,
    'tag' => 'span',
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

  /* Display: Board document listing exbo home page */
  $handler = $view->new_display('block', 'Board document listing exbo home page', 'board_doc_exbo_home');
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Field collection item: Field collection item ID */
  $handler->display->display_options['fields']['item_id']['id'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['item_id']['field'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['label'] = '';
  $handler->display->display_options['fields']['item_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['item_id']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['item_id']['hide_alter_empty'] = FALSE;
  $handler->display->display_options['fields']['item_id']['separator'] = '';
  /* Field: Field collection item: Field path */
  $handler->display->display_options['fields']['field_path']['id'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['field_path']['field'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['label'] = '';
  $handler->display->display_options['fields']['field_path']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_path']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_path']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Host Entity ID */
  $handler->display->display_options['fields']['host_entity_id']['id'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['host_entity_id']['field'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['label'] = '';
  $handler->display->display_options['fields']['host_entity_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['host_entity_id']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['host_entity_id']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Board PDF Upload */
  $handler->display->display_options['fields']['field_board_pdf_upload']['id'] = 'field_board_pdf_upload';
  $handler->display->display_options['fields']['field_board_pdf_upload']['table'] = 'field_data_field_board_pdf_upload';
  $handler->display->display_options['fields']['field_board_pdf_upload']['field'] = 'field_board_pdf_upload';
  $handler->display->display_options['fields']['field_board_pdf_upload']['label'] = '';
  $handler->display->display_options['fields']['field_board_pdf_upload']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_board_pdf_upload']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_board_pdf_upload']['type'] = 'pdfpreview';
  $handler->display->display_options['fields']['field_board_pdf_upload']['settings'] = array(
    'image_style' => 'pub_style_home',
    'image_link' => 'file',
    'show_description' => 0,
    'tag' => 'span',
  );
  $export['vw_support_listing_pdf_field_collection_view'] = $view;

  $view = new view();
  $view->name = 'vw_supporting_document_listing_field_collection_view';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'field_collection_item';
  $view->human_name = 'Supporting documents listing field collection view';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['css_class'] = 'vw-pub-image';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['distinct'] = TRUE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '1';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Field collection item: Field collection item ID */
  $handler->display->display_options['fields']['item_id']['id'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['item_id']['field'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['item_id']['hide_alter_empty'] = FALSE;
  $handler->display->display_options['fields']['item_id']['separator'] = '';
  /* Field: Field collection item: Field path */
  $handler->display->display_options['fields']['field_path']['id'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['field_path']['field'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['label'] = '';
  $handler->display->display_options['fields']['field_path']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_path']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_path']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Host Entity ID */
  $handler->display->display_options['fields']['host_entity_id']['id'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['host_entity_id']['field'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['label'] = '';
  $handler->display->display_options['fields']['host_entity_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['host_entity_id']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['host_entity_id']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Supporting Doc Upload */
  $handler->display->display_options['fields']['field_supporting_doc_upload']['id'] = 'field_supporting_doc_upload';
  $handler->display->display_options['fields']['field_supporting_doc_upload']['table'] = 'field_data_field_supporting_doc_upload';
  $handler->display->display_options['fields']['field_supporting_doc_upload']['field'] = 'field_supporting_doc_upload';
  $handler->display->display_options['fields']['field_supporting_doc_upload']['label'] = '';
  $handler->display->display_options['fields']['field_supporting_doc_upload']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_supporting_doc_upload']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_supporting_doc_upload']['settings'] = array(
    'name' => 'vw_support_listing_pdf_field_collection_view',
    'display_id' => 'default',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_supporting_doc_upload']['delta_offset'] = '0';
  /* Field: Field collection item: Supporting Document Title */
  $handler->display->display_options['fields']['field_supporting_document_title']['id'] = 'field_supporting_document_title';
  $handler->display->display_options['fields']['field_supporting_document_title']['table'] = 'field_data_field_supporting_document_title';
  $handler->display->display_options['fields']['field_supporting_document_title']['field'] = 'field_supporting_document_title';
  $handler->display->display_options['fields']['field_supporting_document_title']['label'] = '';
  $handler->display->display_options['fields']['field_supporting_document_title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_supporting_document_title']['element_label_colon'] = FALSE;
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

  /* Display: Supporting documents download field collection view */
  $handler = $view->new_display('block', 'Supporting documents download field collection view', 'vw_supporting_document_download_field_collection_view');
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Field collection item: Field collection item ID */
  $handler->display->display_options['fields']['item_id']['id'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['item_id']['field'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['item_id']['hide_alter_empty'] = FALSE;
  $handler->display->display_options['fields']['item_id']['separator'] = '';
  /* Field: Field collection item: Field path */
  $handler->display->display_options['fields']['field_path']['id'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['field_path']['field'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['label'] = '';
  $handler->display->display_options['fields']['field_path']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_path']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_path']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Host Entity ID */
  $handler->display->display_options['fields']['host_entity_id']['id'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['host_entity_id']['field'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['label'] = '';
  $handler->display->display_options['fields']['host_entity_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['host_entity_id']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['host_entity_id']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Supporting Doc Upload */
  $handler->display->display_options['fields']['field_supporting_doc_upload_1']['id'] = 'field_supporting_doc_upload_1';
  $handler->display->display_options['fields']['field_supporting_doc_upload_1']['table'] = 'field_data_field_supporting_doc_upload';
  $handler->display->display_options['fields']['field_supporting_doc_upload_1']['field'] = 'field_supporting_doc_upload';
  $handler->display->display_options['fields']['field_supporting_doc_upload_1']['label'] = '';
  $handler->display->display_options['fields']['field_supporting_doc_upload_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_supporting_doc_upload_1']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_supporting_doc_upload_1']['settings'] = array(
    'name' => 'vw_support_download_pdf_field_collection_view',
    'display_id' => 'default',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_supporting_doc_upload_1']['delta_offset'] = '0';
  $export['vw_supporting_document_listing_field_collection_view'] = $view;

  $view = new view();
  $view->name = 'vw_supporting_document_pdf_field_collection_view';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'field_collection_item';
  $view->human_name = 'Supporting documents pdf field collection view';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['css_class'] = 'vw-pub-image';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['distinct'] = TRUE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '1';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Field collection item: Field collection item ID */
  $handler->display->display_options['fields']['item_id']['id'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['item_id']['field'] = 'item_id';
  $handler->display->display_options['fields']['item_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['item_id']['hide_alter_empty'] = FALSE;
  $handler->display->display_options['fields']['item_id']['separator'] = '';
  /* Field: Field collection item: Field path */
  $handler->display->display_options['fields']['field_path']['id'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['field_path']['field'] = 'field_path';
  $handler->display->display_options['fields']['field_path']['label'] = '';
  $handler->display->display_options['fields']['field_path']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_path']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_path']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Host Entity ID */
  $handler->display->display_options['fields']['host_entity_id']['id'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['host_entity_id']['field'] = 'host_entity_id';
  $handler->display->display_options['fields']['host_entity_id']['label'] = '';
  $handler->display->display_options['fields']['host_entity_id']['exclude'] = TRUE;
  $handler->display->display_options['fields']['host_entity_id']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['host_entity_id']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Supporting Doc Upload */
  $handler->display->display_options['fields']['field_supporting_doc_upload']['id'] = 'field_supporting_doc_upload';
  $handler->display->display_options['fields']['field_supporting_doc_upload']['table'] = 'field_data_field_supporting_doc_upload';
  $handler->display->display_options['fields']['field_supporting_doc_upload']['field'] = 'field_supporting_doc_upload';
  $handler->display->display_options['fields']['field_supporting_doc_upload']['label'] = '';
  $handler->display->display_options['fields']['field_supporting_doc_upload']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_supporting_doc_upload']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_supporting_doc_upload']['settings'] = array(
    'name' => 'vw_support_listing_pdf_field_collection_view',
    'display_id' => 'board_doc_exbo_home',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_supporting_doc_upload']['delta_offset'] = '0';
  /* Field: Field collection item: Supporting Document Title */
  $handler->display->display_options['fields']['field_supporting_document_title']['id'] = 'field_supporting_document_title';
  $handler->display->display_options['fields']['field_supporting_document_title']['table'] = 'field_data_field_supporting_document_title';
  $handler->display->display_options['fields']['field_supporting_document_title']['field'] = 'field_supporting_document_title';
  $handler->display->display_options['fields']['field_supporting_document_title']['label'] = '';
  $handler->display->display_options['fields']['field_supporting_document_title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_supporting_document_title']['element_label_colon'] = FALSE;
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
  $export['vw_supporting_document_pdf_field_collection_view'] = $view;

  return $export;
}
