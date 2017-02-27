<?php
/**
 * @file
 * unfpa_global_icpd.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function unfpa_global_icpd_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'icpd_resources';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'ICPD Resources';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Resources';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
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
  /* Field: Content: News Date */
  $handler->display->display_options['fields']['field_news_date']['id'] = 'field_news_date';
  $handler->display->display_options['fields']['field_news_date']['table'] = 'field_data_field_news_date';
  $handler->display->display_options['fields']['field_news_date']['field'] = 'field_news_date';
  /* Field: Content: Path */
  $handler->display->display_options['fields']['path']['id'] = 'path';
  $handler->display->display_options['fields']['path']['table'] = 'node';
  $handler->display->display_options['fields']['path']['field'] = 'path';
  /* Field: Content: Short Title */
  $handler->display->display_options['fields']['field_short_title']['id'] = 'field_short_title';
  $handler->display->display_options['fields']['field_short_title']['table'] = 'field_data_field_short_title';
  $handler->display->display_options['fields']['field_short_title']['field'] = 'field_short_title';
  /* Contextual filter: Content: Nid */
  $handler->display->display_options['arguments']['nid']['id'] = 'nid';
  $handler->display->display_options['arguments']['nid']['table'] = 'node';
  $handler->display->display_options['arguments']['nid']['field'] = 'nid';
  $handler->display->display_options['arguments']['nid']['default_action'] = 'default';
  $handler->display->display_options['arguments']['nid']['default_argument_type'] = 'node';
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
    'icpd_library_resource' => 'icpd_library_resource',
  );
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';

  /* Display: ICPD Listing Library */
  $handler = $view->new_display('page', 'ICPD Listing Library', 'icpd_listing_page');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'ICPD Resources';
  $handler->display->display_options['defaults']['css_class'] = FALSE;
  $handler->display->display_options['css_class'] = 'icpd-listing-library';
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
  $handler->display->display_options['style_options']['row_class'] = 'clearfix';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Resource Cover Image */
  $handler->display->display_options['fields']['field_resource_cover_image']['id'] = 'field_resource_cover_image';
  $handler->display->display_options['fields']['field_resource_cover_image']['table'] = 'field_data_field_resource_cover_image';
  $handler->display->display_options['fields']['field_resource_cover_image']['field'] = 'field_resource_cover_image';
  $handler->display->display_options['fields']['field_resource_cover_image']['label'] = '';
  $handler->display->display_options['fields']['field_resource_cover_image']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_cover_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_cover_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_resource_cover_image']['settings'] = array(
    'image_style' => 'pub_style_list',
    'image_link' => '',
  );
  /* Field: Content: Resource Document */
  $handler->display->display_options['fields']['field_resource_document']['id'] = 'field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['table'] = 'field_data_field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['field'] = 'field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['label'] = '';
  $handler->display->display_options['fields']['field_resource_document']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_document']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_document']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_resource_document']['settings'] = array(
    'name' => 'resource_pdf_preview_icpd',
    'display_id' => 'default',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_resource_document']['delta_offset'] = '0';
  /* Field: Views: Views Conditional */
  $handler->display->display_options['fields']['views_conditional']['id'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional']['table'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional']['field'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional']['label'] = '';
  $handler->display->display_options['fields']['views_conditional']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['views_conditional']['if'] = 'field_resource_cover_image';
  $handler->display->display_options['fields']['views_conditional']['condition'] = '5';
  $handler->display->display_options['fields']['views_conditional']['then'] = '[field_resource_document]';
  $handler->display->display_options['fields']['views_conditional']['or'] = '[field_resource_cover_image]';
  /* Field: Content: Resource Date */
  $handler->display->display_options['fields']['field_resource_date']['id'] = 'field_resource_date';
  $handler->display->display_options['fields']['field_resource_date']['table'] = 'field_data_field_resource_date';
  $handler->display->display_options['fields']['field_resource_date']['field'] = 'field_resource_date';
  $handler->display->display_options['fields']['field_resource_date']['label'] = '';
  $handler->display->display_options['fields']['field_resource_date']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_date']['settings'] = array(
    'format_type' => 'news_date_format',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
    'show_remaining_days' => 0,
  );
  /* Field: Content: ICPD Document Type */
  $handler->display->display_options['fields']['field_icpd_document_type']['id'] = 'field_icpd_document_type';
  $handler->display->display_options['fields']['field_icpd_document_type']['table'] = 'field_data_field_icpd_document_type';
  $handler->display->display_options['fields']['field_icpd_document_type']['field'] = 'field_icpd_document_type';
  $handler->display->display_options['fields']['field_icpd_document_type']['label'] = '';
  $handler->display->display_options['fields']['field_icpd_document_type']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_icpd_document_type']['type'] = 'taxonomy_term_reference_plain';
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
  $handler->display->display_options['fields']['body']['alter']['max_length'] = '220';
  $handler->display->display_options['fields']['body']['alter']['trim'] = TRUE;
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['body']['type'] = 'text_trimmed';
  $handler->display->display_options['fields']['body']['settings'] = array(
    'trim_length' => '220',
  );
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Resource Date (field_resource_date) */
  $handler->display->display_options['sorts']['field_resource_date_value']['id'] = 'field_resource_date_value';
  $handler->display->display_options['sorts']['field_resource_date_value']['table'] = 'field_data_field_resource_date';
  $handler->display->display_options['sorts']['field_resource_date_value']['field'] = 'field_resource_date_value';
  $handler->display->display_options['sorts']['field_resource_date_value']['order'] = 'DESC';
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'icpd_library_resource' => 'icpd_library_resource',
  );
  $handler->display->display_options['filters']['type']['group'] = 1;
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['group'] = 1;
  /* Filter criterion: Global: Combine fields filter */
  $handler->display->display_options['filters']['combine']['id'] = 'combine';
  $handler->display->display_options['filters']['combine']['table'] = 'views';
  $handler->display->display_options['filters']['combine']['field'] = 'combine';
  $handler->display->display_options['filters']['combine']['operator'] = 'contains';
  $handler->display->display_options['filters']['combine']['group'] = 1;
  $handler->display->display_options['filters']['combine']['exposed'] = TRUE;
  $handler->display->display_options['filters']['combine']['expose']['operator_id'] = 'combine_op';
  $handler->display->display_options['filters']['combine']['expose']['label'] = 'Search';
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
    'field_icpd_document_type' => 'field_icpd_document_type',
    'title' => 'title',
    'body' => 'body',
  );
  /* Filter criterion: Content: Resource Date (field_resource_date) */
  $handler->display->display_options['filters']['field_resource_date_value']['id'] = 'field_resource_date_value';
  $handler->display->display_options['filters']['field_resource_date_value']['table'] = 'field_data_field_resource_date';
  $handler->display->display_options['filters']['field_resource_date_value']['field'] = 'field_resource_date_value';
  $handler->display->display_options['filters']['field_resource_date_value']['group'] = 1;
  $handler->display->display_options['filters']['field_resource_date_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_resource_date_value']['expose']['operator_id'] = 'field_resource_date_value_op';
  $handler->display->display_options['filters']['field_resource_date_value']['expose']['label'] = 'Year';
  $handler->display->display_options['filters']['field_resource_date_value']['expose']['operator'] = 'field_resource_date_value_op';
  $handler->display->display_options['filters']['field_resource_date_value']['expose']['identifier'] = 'field_resource_date_value';
  $handler->display->display_options['filters']['field_resource_date_value']['expose']['remember_roles'] = array(
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
  $handler->display->display_options['filters']['field_resource_date_value']['granularity'] = 'year';
  $handler->display->display_options['filters']['field_resource_date_value']['year_range'] = '1993:+0';
  /* Filter criterion: Content: ICPD Document Type (field_icpd_document_type) (translated) */
  $handler->display->display_options['filters']['field_icpd_document_type_tid_i18n']['id'] = 'field_icpd_document_type_tid_i18n';
  $handler->display->display_options['filters']['field_icpd_document_type_tid_i18n']['table'] = 'field_data_field_icpd_document_type';
  $handler->display->display_options['filters']['field_icpd_document_type_tid_i18n']['field'] = 'field_icpd_document_type_tid_i18n';
  $handler->display->display_options['filters']['field_icpd_document_type_tid_i18n']['value'] = array(
    786 => '786',
    791 => '791',
    784 => '784',
    783 => '783',
    792 => '792',
    787 => '787',
    790 => '790',
    782 => '782',
    788 => '788',
    785 => '785',
  );
  $handler->display->display_options['filters']['field_icpd_document_type_tid_i18n']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_icpd_document_type_tid_i18n']['expose']['operator_id'] = 'field_icpd_document_type_tid_i18n_op';
  $handler->display->display_options['filters']['field_icpd_document_type_tid_i18n']['expose']['label'] = 'Document Type';
  $handler->display->display_options['filters']['field_icpd_document_type_tid_i18n']['expose']['operator'] = 'field_icpd_document_type_tid_i18n_op';
  $handler->display->display_options['filters']['field_icpd_document_type_tid_i18n']['expose']['identifier'] = 'field_icpd_document_type_tid_i18n';
  $handler->display->display_options['filters']['field_icpd_document_type_tid_i18n']['expose']['remember_roles'] = array(
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
  $handler->display->display_options['filters']['field_icpd_document_type_tid_i18n']['expose']['reduce'] = TRUE;
  $handler->display->display_options['filters']['field_icpd_document_type_tid_i18n']['type'] = 'select';
  $handler->display->display_options['filters']['field_icpd_document_type_tid_i18n']['vocabulary'] = 'icpd_tag';
  /* Filter criterion: Content: ICPD Document Type (field_icpd_document_type) */
  $handler->display->display_options['filters']['field_icpd_document_type_tid']['id'] = 'field_icpd_document_type_tid';
  $handler->display->display_options['filters']['field_icpd_document_type_tid']['table'] = 'field_data_field_icpd_document_type';
  $handler->display->display_options['filters']['field_icpd_document_type_tid']['field'] = 'field_icpd_document_type_tid';
  $handler->display->display_options['filters']['field_icpd_document_type_tid']['value'] = array(
    786 => '786',
    791 => '791',
    784 => '784',
    783 => '783',
    792 => '792',
    787 => '787',
    790 => '790',
    782 => '782',
    788 => '788',
    785 => '785',
  );
  $handler->display->display_options['filters']['field_icpd_document_type_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_icpd_document_type_tid']['vocabulary'] = 'icpd_tag';
  $handler->display->display_options['path'] = 'icpd/icpd-listing-library';

  /* Display: Resource:Template 1 */
  $handler = $view->new_display('panel_pane', 'Resource:Template 1', 'resource_detail_pane_1');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Path */
  $handler->display->display_options['fields']['path']['id'] = 'path';
  $handler->display->display_options['fields']['path']['table'] = 'node';
  $handler->display->display_options['fields']['path']['field'] = 'path';
  $handler->display->display_options['fields']['path']['label'] = '';
  $handler->display->display_options['fields']['path']['exclude'] = TRUE;
  $handler->display->display_options['fields']['path']['element_label_colon'] = FALSE;
  /* Field: Content: Resource Cover Image */
  $handler->display->display_options['fields']['field_resource_cover_image']['id'] = 'field_resource_cover_image';
  $handler->display->display_options['fields']['field_resource_cover_image']['table'] = 'field_data_field_resource_cover_image';
  $handler->display->display_options['fields']['field_resource_cover_image']['field'] = 'field_resource_cover_image';
  $handler->display->display_options['fields']['field_resource_cover_image']['label'] = '';
  $handler->display->display_options['fields']['field_resource_cover_image']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_cover_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_cover_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_resource_cover_image']['settings'] = array(
    'image_style' => 'pub_style_list',
    'image_link' => '',
  );
  /* Field: Content: Resource Document */
  $handler->display->display_options['fields']['field_resource_document_1']['id'] = 'field_resource_document_1';
  $handler->display->display_options['fields']['field_resource_document_1']['table'] = 'field_data_field_resource_document';
  $handler->display->display_options['fields']['field_resource_document_1']['field'] = 'field_resource_document';
  $handler->display->display_options['fields']['field_resource_document_1']['label'] = '';
  $handler->display->display_options['fields']['field_resource_document_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_document_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_document_1']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_resource_document_1']['settings'] = array(
    'name' => 'vw_resource_listing_page_pdf_field_collection_view',
    'display_id' => 'default',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_resource_document_1']['delta_offset'] = '0';
  /* Field: Field: Sub Title */
  $handler->display->display_options['fields']['field_sub_title']['id'] = 'field_sub_title';
  $handler->display->display_options['fields']['field_sub_title']['table'] = 'field_data_field_sub_title';
  $handler->display->display_options['fields']['field_sub_title']['field'] = 'field_sub_title';
  $handler->display->display_options['fields']['field_sub_title']['label'] = '';
  $handler->display->display_options['fields']['field_sub_title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_sub_title']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_sub_title']['alter']['text'] = '<h2 class="pub-sub-title">[field_sub_title]</h2>';
  $handler->display->display_options['fields']['field_sub_title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_sub_title']['hide_empty'] = TRUE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['text'] = '<h1 class="pub-title">[title]</h1>
<div class="social">
<span class="social-icons st_twitter_custom">
	<span class=\'st_twitter_vcount\'></span>
</span>
<span class="social-icons st_facebook_custom">
	<span class=\'st_facebook_vcount\'></span>
</span>
<span class="social-icons st_googleplus_custom">
	<span class=\'st_googleplus_vcount\'></span>
</span>
<span class="social-icons st_email_custom">
	<span class=\'st_email_vcount\'></span>
</span>
 <div class="clearfix"></div>
</div>
[field_sub_title] 
<div class="clearfix"></div>';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Field: Content: Date Selector */
  $handler->display->display_options['fields']['field_date_selector']['id'] = 'field_date_selector';
  $handler->display->display_options['fields']['field_date_selector']['table'] = 'field_data_field_date_selector';
  $handler->display->display_options['fields']['field_date_selector']['field'] = 'field_date_selector';
  $handler->display->display_options['fields']['field_date_selector']['label'] = '';
  $handler->display->display_options['fields']['field_date_selector']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_date_selector']['element_label_colon'] = FALSE;
  /* Field: Content: Resource Date */
  $handler->display->display_options['fields']['field_resource_date_1']['id'] = 'field_resource_date_1';
  $handler->display->display_options['fields']['field_resource_date_1']['table'] = 'field_data_field_resource_date';
  $handler->display->display_options['fields']['field_resource_date_1']['field'] = 'field_resource_date';
  $handler->display->display_options['fields']['field_resource_date_1']['label'] = '';
  $handler->display->display_options['fields']['field_resource_date_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_date_1']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_resource_date_1']['alter']['text'] = '[field_resource_date_1]';
  $handler->display->display_options['fields']['field_resource_date_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_date_1']['settings'] = array(
    'format_type' => 'only_year',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
  );
  /* Field: Content: Resource Date */
  $handler->display->display_options['fields']['field_resource_date_2']['id'] = 'field_resource_date_2';
  $handler->display->display_options['fields']['field_resource_date_2']['table'] = 'field_data_field_resource_date';
  $handler->display->display_options['fields']['field_resource_date_2']['field'] = 'field_resource_date';
  $handler->display->display_options['fields']['field_resource_date_2']['label'] = '';
  $handler->display->display_options['fields']['field_resource_date_2']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_date_2']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_resource_date_2']['alter']['text'] = '[field_resource_date_2]';
  $handler->display->display_options['fields']['field_resource_date_2']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_date_2']['settings'] = array(
    'format_type' => 'month_and_year',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
  );
  /* Field: Views: Views Conditional */
  $handler->display->display_options['fields']['views_conditional_1']['id'] = 'views_conditional_1';
  $handler->display->display_options['fields']['views_conditional_1']['table'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional_1']['field'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional_1']['label'] = '';
  $handler->display->display_options['fields']['views_conditional_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['views_conditional_1']['if'] = 'field_date_selector';
  $handler->display->display_options['fields']['views_conditional_1']['condition'] = '1';
  $handler->display->display_options['fields']['views_conditional_1']['equalto'] = 'Show Year';
  $handler->display->display_options['fields']['views_conditional_1']['then'] = '[field_resource_date_1]';
  $handler->display->display_options['fields']['views_conditional_1']['or'] = '[field_resource_date_2]';
  /* Field: Views: Views Conditional */
  $handler->display->display_options['fields']['views_conditional']['id'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional']['table'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional']['field'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional']['label'] = '';
  $handler->display->display_options['fields']['views_conditional']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['views_conditional']['if'] = 'field_resource_cover_image';
  $handler->display->display_options['fields']['views_conditional']['condition'] = '6';
  $handler->display->display_options['fields']['views_conditional']['then'] = '[field_resource_cover_image]';
  $handler->display->display_options['fields']['views_conditional']['or'] = '[field_resource_document_1]';
  /* Field: Content: Author */
  $handler->display->display_options['fields']['field_author']['id'] = 'field_author';
  $handler->display->display_options['fields']['field_author']['table'] = 'field_data_field_author';
  $handler->display->display_options['fields']['field_author']['field'] = 'field_author';
  $handler->display->display_options['fields']['field_author']['label'] = '';
  $handler->display->display_options['fields']['field_author']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_author']['alter']['text'] = '<strong>Author:</strong> [field_author]';
  $handler->display->display_options['fields']['field_author']['element_label_colon'] = FALSE;
  /* Field: Content: Publisher */
  $handler->display->display_options['fields']['field_publisher']['id'] = 'field_publisher';
  $handler->display->display_options['fields']['field_publisher']['table'] = 'field_data_field_publisher';
  $handler->display->display_options['fields']['field_publisher']['field'] = 'field_publisher';
  $handler->display->display_options['fields']['field_publisher']['label'] = '';
  $handler->display->display_options['fields']['field_publisher']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_publisher']['alter']['text'] = '<strong>Publisher:</strong> [field_publisher] ';
  $handler->display->display_options['fields']['field_publisher']['element_label_colon'] = FALSE;
  /* Field: Content: Resource Document */
  $handler->display->display_options['fields']['field_resource_document']['id'] = 'field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['table'] = 'field_data_field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['field'] = 'field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['label'] = '';
  $handler->display->display_options['fields']['field_resource_document']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_resource_document']['alter']['text'] = '<div class="downButtons">
                <div class="items"><p>Download</p></div>
                [field_resource_document]
              </div>';
  $handler->display->display_options['fields']['field_resource_document']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_document']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_resource_document']['settings'] = array(
    'name' => 'resource_listing_download_pdf_of_field_collection_view',
    'display_id' => 'default',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_resource_document']['delta_offset'] = '0';
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'icpd_library_resource' => 'icpd_library_resource',
  );
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';

  /* Display: Resource:Template 2 */
  $handler = $view->new_display('panel_pane', 'Resource:Template 2', 'resource_detail_pane_2');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['defaults']['css_class'] = FALSE;
  $handler->display->display_options['css_class'] = 'template-2';
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Path */
  $handler->display->display_options['fields']['path']['id'] = 'path';
  $handler->display->display_options['fields']['path']['table'] = 'node';
  $handler->display->display_options['fields']['path']['field'] = 'path';
  $handler->display->display_options['fields']['path']['label'] = '';
  $handler->display->display_options['fields']['path']['exclude'] = TRUE;
  $handler->display->display_options['fields']['path']['element_label_colon'] = FALSE;
  /* Field: Content: Resource Cover Image */
  $handler->display->display_options['fields']['field_resource_cover_image']['id'] = 'field_resource_cover_image';
  $handler->display->display_options['fields']['field_resource_cover_image']['table'] = 'field_data_field_resource_cover_image';
  $handler->display->display_options['fields']['field_resource_cover_image']['field'] = 'field_resource_cover_image';
  $handler->display->display_options['fields']['field_resource_cover_image']['label'] = '';
  $handler->display->display_options['fields']['field_resource_cover_image']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_cover_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_cover_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_resource_cover_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Resource Document */
  $handler->display->display_options['fields']['field_resource_document_1']['id'] = 'field_resource_document_1';
  $handler->display->display_options['fields']['field_resource_document_1']['table'] = 'field_data_field_resource_document';
  $handler->display->display_options['fields']['field_resource_document_1']['field'] = 'field_resource_document';
  $handler->display->display_options['fields']['field_resource_document_1']['label'] = '';
  $handler->display->display_options['fields']['field_resource_document_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_document_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_document_1']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_resource_document_1']['settings'] = array(
    'name' => 'vw_resource_listing_page_pdf_for_template_2_field_collection_view',
    'display_id' => 'default',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_resource_document_1']['delta_offset'] = '0';
  /* Field: Field: Sub Title */
  $handler->display->display_options['fields']['field_sub_title']['id'] = 'field_sub_title';
  $handler->display->display_options['fields']['field_sub_title']['table'] = 'field_data_field_sub_title';
  $handler->display->display_options['fields']['field_sub_title']['field'] = 'field_sub_title';
  $handler->display->display_options['fields']['field_sub_title']['label'] = '';
  $handler->display->display_options['fields']['field_sub_title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_sub_title']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_sub_title']['alter']['text'] = '<h2 class="pub-sub-title">[field_sub_title]</h2>';
  $handler->display->display_options['fields']['field_sub_title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_sub_title']['hide_empty'] = TRUE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['text'] = '<h1 class="pub-title">[title]</h1>
<div class="social">
<span class="social-icons st_twitter_custom">
	<span class=\'st_twitter_vcount\'></span>
</span>
<span class="social-icons st_facebook_custom">
	<span class=\'st_facebook_vcount\'></span>
</span>
<span class="social-icons st_googleplus_custom">
	<span class=\'st_googleplus_vcount\'></span>
</span>
<span class="social-icons st_email_custom">
	<span class=\'st_email_vcount\'></span>
</span>
 <div class="clearfix"></div>
</div>
[field_sub_title] 
<div class="clearfix"></div>';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Field: Content: Date Selector */
  $handler->display->display_options['fields']['field_date_selector']['id'] = 'field_date_selector';
  $handler->display->display_options['fields']['field_date_selector']['table'] = 'field_data_field_date_selector';
  $handler->display->display_options['fields']['field_date_selector']['field'] = 'field_date_selector';
  $handler->display->display_options['fields']['field_date_selector']['label'] = '';
  $handler->display->display_options['fields']['field_date_selector']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_date_selector']['element_label_colon'] = FALSE;
  /* Field: Content: Resource Date */
  $handler->display->display_options['fields']['field_resource_date_1']['id'] = 'field_resource_date_1';
  $handler->display->display_options['fields']['field_resource_date_1']['table'] = 'field_data_field_resource_date';
  $handler->display->display_options['fields']['field_resource_date_1']['field'] = 'field_resource_date';
  $handler->display->display_options['fields']['field_resource_date_1']['label'] = '';
  $handler->display->display_options['fields']['field_resource_date_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_date_1']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_resource_date_1']['alter']['text'] = '[field_resource_date_1]';
  $handler->display->display_options['fields']['field_resource_date_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_date_1']['settings'] = array(
    'format_type' => 'only_year',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
  );
  /* Field: Content: Resource Date */
  $handler->display->display_options['fields']['field_resource_date_2']['id'] = 'field_resource_date_2';
  $handler->display->display_options['fields']['field_resource_date_2']['table'] = 'field_data_field_resource_date';
  $handler->display->display_options['fields']['field_resource_date_2']['field'] = 'field_resource_date';
  $handler->display->display_options['fields']['field_resource_date_2']['label'] = '';
  $handler->display->display_options['fields']['field_resource_date_2']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_date_2']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_resource_date_2']['alter']['text'] = '[field_resource_date_2]';
  $handler->display->display_options['fields']['field_resource_date_2']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_date_2']['settings'] = array(
    'format_type' => 'month_and_year',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
  );
  /* Field: Views: Views Conditional */
  $handler->display->display_options['fields']['views_conditional_1']['id'] = 'views_conditional_1';
  $handler->display->display_options['fields']['views_conditional_1']['table'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional_1']['field'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional_1']['label'] = '';
  $handler->display->display_options['fields']['views_conditional_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['views_conditional_1']['if'] = 'field_date_selector';
  $handler->display->display_options['fields']['views_conditional_1']['condition'] = '1';
  $handler->display->display_options['fields']['views_conditional_1']['equalto'] = 'Show Year';
  $handler->display->display_options['fields']['views_conditional_1']['then'] = '[field_resource_date_1]';
  $handler->display->display_options['fields']['views_conditional_1']['or'] = '[field_resource_date_2]';
  /* Field: Content: Author */
  $handler->display->display_options['fields']['field_author']['id'] = 'field_author';
  $handler->display->display_options['fields']['field_author']['table'] = 'field_data_field_author';
  $handler->display->display_options['fields']['field_author']['field'] = 'field_author';
  $handler->display->display_options['fields']['field_author']['label'] = '';
  $handler->display->display_options['fields']['field_author']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_author']['alter']['text'] = '<strong>Author:</strong> [field_author]';
  $handler->display->display_options['fields']['field_author']['element_label_colon'] = FALSE;
  /* Field: Content: Publisher */
  $handler->display->display_options['fields']['field_publisher']['id'] = 'field_publisher';
  $handler->display->display_options['fields']['field_publisher']['table'] = 'field_data_field_publisher';
  $handler->display->display_options['fields']['field_publisher']['field'] = 'field_publisher';
  $handler->display->display_options['fields']['field_publisher']['label'] = '';
  $handler->display->display_options['fields']['field_publisher']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_publisher']['alter']['text'] = '<strong>Publisher:</strong> [field_publisher] ';
  $handler->display->display_options['fields']['field_publisher']['element_label_colon'] = FALSE;
  /* Field: Content: Resource Document */
  $handler->display->display_options['fields']['field_resource_document']['id'] = 'field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['table'] = 'field_data_field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['field'] = 'field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['label'] = '';
  $handler->display->display_options['fields']['field_resource_document']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_resource_document']['alter']['text'] = '<div class="downButtons">
                <div class="items"><p>Download</p></div>
                [field_resource_document]
              </div>';
  $handler->display->display_options['fields']['field_resource_document']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_document']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_resource_document']['settings'] = array(
    'name' => 'resource_listing_download_pdf_of_field_collection_view',
    'display_id' => 'default',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_resource_document']['delta_offset'] = '0';
  /* Field: Views: Views Conditional */
  $handler->display->display_options['fields']['views_conditional']['id'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional']['table'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional']['field'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional']['label'] = '';
  $handler->display->display_options['fields']['views_conditional']['element_class'] = 'img';
  $handler->display->display_options['fields']['views_conditional']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['views_conditional']['if'] = 'field_resource_cover_image';
  $handler->display->display_options['fields']['views_conditional']['condition'] = '6';
  $handler->display->display_options['fields']['views_conditional']['then'] = '[field_resource_cover_image]';
  $handler->display->display_options['fields']['views_conditional']['or'] = '[field_resource_document_1]';
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['exclude'] = TRUE;
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'icpd_library_resource' => 'icpd_library_resource',
  );
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';

  /* Display: Resource:Template 3 */
  $handler = $view->new_display('panel_pane', 'Resource:Template 3', 'resource_detail_pane_3');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['defaults']['css_class'] = FALSE;
  $handler->display->display_options['css_class'] = 'template-3';
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Path */
  $handler->display->display_options['fields']['path']['id'] = 'path';
  $handler->display->display_options['fields']['path']['table'] = 'node';
  $handler->display->display_options['fields']['path']['field'] = 'path';
  $handler->display->display_options['fields']['path']['label'] = '';
  $handler->display->display_options['fields']['path']['exclude'] = TRUE;
  $handler->display->display_options['fields']['path']['element_label_colon'] = FALSE;
  /* Field: Content: Resource Cover Image */
  $handler->display->display_options['fields']['field_resource_cover_image']['id'] = 'field_resource_cover_image';
  $handler->display->display_options['fields']['field_resource_cover_image']['table'] = 'field_data_field_resource_cover_image';
  $handler->display->display_options['fields']['field_resource_cover_image']['field'] = 'field_resource_cover_image';
  $handler->display->display_options['fields']['field_resource_cover_image']['label'] = '';
  $handler->display->display_options['fields']['field_resource_cover_image']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_cover_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_cover_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_resource_cover_image']['settings'] = array(
    'image_style' => 'pub_style_list',
    'image_link' => '',
  );
  /* Field: Content: Resource Document */
  $handler->display->display_options['fields']['field_resource_document_1']['id'] = 'field_resource_document_1';
  $handler->display->display_options['fields']['field_resource_document_1']['table'] = 'field_data_field_resource_document';
  $handler->display->display_options['fields']['field_resource_document_1']['field'] = 'field_resource_document';
  $handler->display->display_options['fields']['field_resource_document_1']['label'] = '';
  $handler->display->display_options['fields']['field_resource_document_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_document_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_document_1']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_resource_document_1']['settings'] = array(
    'name' => 'vw_resource_listing_page_pdf_field_collection_view',
    'display_id' => 'default',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_resource_document_1']['delta_offset'] = '0';
  /* Field: Content: Date Selector */
  $handler->display->display_options['fields']['field_date_selector']['id'] = 'field_date_selector';
  $handler->display->display_options['fields']['field_date_selector']['table'] = 'field_data_field_date_selector';
  $handler->display->display_options['fields']['field_date_selector']['field'] = 'field_date_selector';
  $handler->display->display_options['fields']['field_date_selector']['label'] = '';
  $handler->display->display_options['fields']['field_date_selector']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_date_selector']['element_label_colon'] = FALSE;
  /* Field: Content: Resource Date */
  $handler->display->display_options['fields']['field_resource_date_1']['id'] = 'field_resource_date_1';
  $handler->display->display_options['fields']['field_resource_date_1']['table'] = 'field_data_field_resource_date';
  $handler->display->display_options['fields']['field_resource_date_1']['field'] = 'field_resource_date';
  $handler->display->display_options['fields']['field_resource_date_1']['label'] = '';
  $handler->display->display_options['fields']['field_resource_date_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_date_1']['alter']['text'] = '<strong>Resource date:</strong> [field_resource_date_1]';
  $handler->display->display_options['fields']['field_resource_date_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_date_1']['settings'] = array(
    'format_type' => 'only_year',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
  );
  /* Field: Content: Resource Date */
  $handler->display->display_options['fields']['field_resource_date_2']['id'] = 'field_resource_date_2';
  $handler->display->display_options['fields']['field_resource_date_2']['table'] = 'field_data_field_resource_date';
  $handler->display->display_options['fields']['field_resource_date_2']['field'] = 'field_resource_date';
  $handler->display->display_options['fields']['field_resource_date_2']['label'] = '';
  $handler->display->display_options['fields']['field_resource_date_2']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_date_2']['alter']['text'] = '<strong>Resource date:</strong> [field_resource_date_2]';
  $handler->display->display_options['fields']['field_resource_date_2']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_date_2']['settings'] = array(
    'format_type' => 'month_and_year',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
  );
  /* Field: Views: Views Conditional */
  $handler->display->display_options['fields']['views_conditional']['id'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional']['table'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional']['field'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional']['label'] = '';
  $handler->display->display_options['fields']['views_conditional']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['views_conditional']['if'] = 'field_resource_cover_image';
  $handler->display->display_options['fields']['views_conditional']['condition'] = '6';
  $handler->display->display_options['fields']['views_conditional']['then'] = '[field_resource_cover_image]';
  $handler->display->display_options['fields']['views_conditional']['or'] = '[field_resource_document_1]';
  /* Field: Views: Views Conditional */
  $handler->display->display_options['fields']['views_conditional_1']['id'] = 'views_conditional_1';
  $handler->display->display_options['fields']['views_conditional_1']['table'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional_1']['field'] = 'views_conditional';
  $handler->display->display_options['fields']['views_conditional_1']['label'] = '';
  $handler->display->display_options['fields']['views_conditional_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['views_conditional_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['views_conditional_1']['if'] = 'field_date_selector';
  $handler->display->display_options['fields']['views_conditional_1']['condition'] = '1';
  $handler->display->display_options['fields']['views_conditional_1']['equalto'] = 'Show Year';
  $handler->display->display_options['fields']['views_conditional_1']['then'] = '[field_resource_date_1]';
  $handler->display->display_options['fields']['views_conditional_1']['or'] = '[field_resource_date_2]';
  /* Field: Field: Sub Title */
  $handler->display->display_options['fields']['field_sub_title']['id'] = 'field_sub_title';
  $handler->display->display_options['fields']['field_sub_title']['table'] = 'field_data_field_sub_title';
  $handler->display->display_options['fields']['field_sub_title']['field'] = 'field_sub_title';
  $handler->display->display_options['fields']['field_sub_title']['label'] = '';
  $handler->display->display_options['fields']['field_sub_title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_sub_title']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_sub_title']['alter']['text'] = '<h2 class="pub-sub-title">[field_sub_title]</h2>';
  $handler->display->display_options['fields']['field_sub_title']['element_label_colon'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['text'] = '<h1 class="pub-title">[title]</h1>
<div class="social">
<span class="social-icons st_twitter_custom">
	<span class=\'st_twitter_vcount\'></span>
</span>
<span class="social-icons st_facebook_custom">
	<span class=\'st_facebook_vcount\'></span>
</span>
<span class="social-icons st_googleplus_custom">
	<span class=\'st_googleplus_vcount\'></span>
</span>
<span class="social-icons st_email_custom">
	<span class=\'st_email_vcount\'></span>
</span>
 <div class="clearfix"></div>
</div>
[field_sub_title]
<div class="pub-date">[views_conditional_1]</div>
<div class="clearfix"></div>';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Field: Content: Author */
  $handler->display->display_options['fields']['field_author']['id'] = 'field_author';
  $handler->display->display_options['fields']['field_author']['table'] = 'field_data_field_author';
  $handler->display->display_options['fields']['field_author']['field'] = 'field_author';
  $handler->display->display_options['fields']['field_author']['label'] = '';
  $handler->display->display_options['fields']['field_author']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_author']['alter']['text'] = '<strong>Author:</strong> [field_author]';
  $handler->display->display_options['fields']['field_author']['element_label_colon'] = FALSE;
  /* Field: Content: Publisher */
  $handler->display->display_options['fields']['field_publisher']['id'] = 'field_publisher';
  $handler->display->display_options['fields']['field_publisher']['table'] = 'field_data_field_publisher';
  $handler->display->display_options['fields']['field_publisher']['field'] = 'field_publisher';
  $handler->display->display_options['fields']['field_publisher']['label'] = '';
  $handler->display->display_options['fields']['field_publisher']['alter']['text'] = '<strong>Publisher:</strong> [field_publisher]';
  $handler->display->display_options['fields']['field_publisher']['element_label_colon'] = FALSE;
  /* Field: Content: Resource Document */
  $handler->display->display_options['fields']['field_resource_document']['id'] = 'field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['table'] = 'field_data_field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['field'] = 'field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['label'] = '';
  $handler->display->display_options['fields']['field_resource_document']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_resource_document']['alter']['text'] = '<div class="downButtons">
                <div class="items"><p>Download</p></div>
                [field_resource_document]
              </div>';
  $handler->display->display_options['fields']['field_resource_document']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_document']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_resource_document']['settings'] = array(
    'name' => 'resource_listing_download_pdf_of_field_collection_view',
    'display_id' => 'default',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_resource_document']['delta_offset'] = '0';
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'icpd_library_resource' => 'icpd_library_resource',
  );
  $handler->display->display_options['filters']['type']['group'] = 1;
  /* Filter criterion: Content: Select translation */
  $handler->display->display_options['filters']['select_translation']['id'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['table'] = 'node';
  $handler->display->display_options['filters']['select_translation']['field'] = 'select_translation';
  $handler->display->display_options['filters']['select_translation']['group'] = 1;

  /* Display: Content pane */
  $handler = $view->new_display('panel_pane', 'Content pane', 'panel_pane_1');
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Resource Document */
  $handler->display->display_options['fields']['field_resource_document']['id'] = 'field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['table'] = 'field_data_field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['field'] = 'field_resource_document';
  $handler->display->display_options['fields']['field_resource_document']['label'] = '';
  $handler->display->display_options['fields']['field_resource_document']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_document']['type'] = 'field_collection_views_view';
  $handler->display->display_options['fields']['field_resource_document']['settings'] = array(
    'name' => 'field_collection_view',
    'display_id' => 'default',
    'add' => 'Add',
  );
  $handler->display->display_options['fields']['field_resource_document']['delta_offset'] = '0';
  $export['icpd_resources'] = $view;

  $view = new view();
  $view->name = 'resource_listing_download_pdf_of_field_collection_view';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'field_collection_item';
  $view->human_name = 'Resource Listing Download PDF of field collection view';
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
  /* Field: Field collection item: Resource PDF Upload */
  $handler->display->display_options['fields']['field_resource_pdf_upload']['id'] = 'field_resource_pdf_upload';
  $handler->display->display_options['fields']['field_resource_pdf_upload']['table'] = 'field_data_field_resource_pdf_upload';
  $handler->display->display_options['fields']['field_resource_pdf_upload']['field'] = 'field_resource_pdf_upload';
  $handler->display->display_options['fields']['field_resource_pdf_upload']['label'] = '';
  $handler->display->display_options['fields']['field_resource_pdf_upload']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_pdf_upload']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_pdf_upload']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_resource_pdf_upload']['type'] = 'file_url_plain';
  /* Field: Field collection item: Available Languages */
  $handler->display->display_options['fields']['field_available_language']['id'] = 'field_available_language';
  $handler->display->display_options['fields']['field_available_language']['table'] = 'field_data_field_available_language';
  $handler->display->display_options['fields']['field_available_language']['field'] = 'field_available_language';
  $handler->display->display_options['fields']['field_available_language']['label'] = '';
  $handler->display->display_options['fields']['field_available_language']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_available_language']['alter']['text'] = '<div class="items"><a href="[field_resource_pdf_upload]" target="_blank">[field_available_language]</a></div>';
  $handler->display->display_options['fields']['field_available_language']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_available_language']['settings'] = array(
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
  /* Filter criterion: Field collection item: Field name */
  $handler->display->display_options['filters']['field_name']['id'] = 'field_name';
  $handler->display->display_options['filters']['field_name']['table'] = 'field_collection_item';
  $handler->display->display_options['filters']['field_name']['field'] = 'field_name';
  $handler->display->display_options['filters']['field_name']['value'] = array(
    'field_resource_document' => 'field_resource_document',
  );
  $export['resource_listing_download_pdf_of_field_collection_view'] = $view;

  $view = new view();
  $view->name = 'resource_pdf_preview_icpd';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'field_collection_item';
  $view->human_name = 'Resource pdf preview - ICPD';
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
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '1';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Relationship: Field collection item: Entity with the Resource Document (field_resource_document) */
  $handler->display->display_options['relationships']['field_resource_document_node']['id'] = 'field_resource_document_node';
  $handler->display->display_options['relationships']['field_resource_document_node']['table'] = 'field_collection_item';
  $handler->display->display_options['relationships']['field_resource_document_node']['field'] = 'field_resource_document_node';
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
  /* Field: Field collection item: Host Entity Path */
  $handler->display->display_options['fields']['host_entity_path']['id'] = 'host_entity_path';
  $handler->display->display_options['fields']['host_entity_path']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['host_entity_path']['field'] = 'host_entity_path';
  $handler->display->display_options['fields']['host_entity_path']['label'] = '';
  $handler->display->display_options['fields']['host_entity_path']['exclude'] = TRUE;
  $handler->display->display_options['fields']['host_entity_path']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['host_entity_path']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Host Entity Type */
  $handler->display->display_options['fields']['host_entity_type']['id'] = 'host_entity_type';
  $handler->display->display_options['fields']['host_entity_type']['table'] = 'field_collection_item';
  $handler->display->display_options['fields']['host_entity_type']['field'] = 'host_entity_type';
  $handler->display->display_options['fields']['host_entity_type']['label'] = '';
  $handler->display->display_options['fields']['host_entity_type']['exclude'] = TRUE;
  $handler->display->display_options['fields']['host_entity_type']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['host_entity_type']['hide_alter_empty'] = FALSE;
  /* Field: Field collection item: Resource PDF Upload */
  $handler->display->display_options['fields']['field_resource_pdf_upload']['id'] = 'field_resource_pdf_upload';
  $handler->display->display_options['fields']['field_resource_pdf_upload']['table'] = 'field_data_field_resource_pdf_upload';
  $handler->display->display_options['fields']['field_resource_pdf_upload']['field'] = 'field_resource_pdf_upload';
  $handler->display->display_options['fields']['field_resource_pdf_upload']['label'] = '';
  $handler->display->display_options['fields']['field_resource_pdf_upload']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_resource_pdf_upload']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_pdf_upload']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_resource_pdf_upload']['type'] = 'pdfpreview';
  $handler->display->display_options['fields']['field_resource_pdf_upload']['settings'] = array(
    'image_style' => 'pub_style_list',
    'image_link' => '',
    'show_description' => 0,
    'tag' => 'span',
  );
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['relationship'] = 'field_resource_document_node';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['text'] = '[field_resource_pdf_upload]';
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
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
  $export['resource_pdf_preview_icpd'] = $view;

  return $export;
}
