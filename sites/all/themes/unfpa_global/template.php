<?php

/**
 * @file
 * UNFPA Global theme template file.
 */

/**
 * Implements hook_html_head_alter().
 *
 * We are overwriting the default meta character type tag with HTML5 version.
 */
function unfpa_global_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8',
  );
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param array $variables
 *   An array containing the breadcrumb links.
 *
 * @return string
 *    Containing the breadcrumb output.
 */
function unfpa_global_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {

    switch (arg(0)) {
      case 'icpd':
        $link = l(t("ICPD"), 'icpd', array(
          'attributes' => array(
            'class' => array('active'),
          ),
        ));
        // The below code removes the '-' from the custom URL prepared for
        // unfpa_global_icpd module.
        $breadcrumb[] = str_replace("-", " ", ucfirst(strtolower(arg(1))));
        $breadcrumb[] = $link;
        break;

      case 'sowmy':
        $link = l(t("State of the World's Midwifery 2014"), 'sowmy', array(
          'attributes' => array(
            'class' => array('active'),
          ),
        ));
        // Country name to shown in the breadcrumb.
        $breadcrumb[] = t(unfpa_global_sowmy_get_country_name(arg(1)));
        $breadcrumb[] = $link;
        break;

      case 'jobs':
        unset($breadcrumb[1]);
        $link_to_node = drupal_get_path_alias('jobs');
        $url = url($link_to_node, array('alias' => TRUE));
        $link = '<a class="active" href="' . $url . '">' . t("Jobs") . '</a>';
        $breadcrumb[] = $link;
        $breadcrumb[] = t(drupal_get_title());
        break;

      case 'taxonomy':
        $tid = arg(2);
        $t_data = taxonomy_term_load($tid);

        switch ($t_data->vocabulary_machine_name) {
          case 'thematic_area':
            $breadcrumb[] = t($t_data->name);
            break;
        }
        break;

      case 'node':
        if (empty(arg(1))) {
          break;
        }

        $node = menu_get_object();
        if (empty($node)) {
          break;
        }

        // For content types modify the breadcrumb and apply the active class.
        $options = array(
          'attributes' => array(
            'class' => array('active'),
          ),
        );

        switch ($node->type) {
          case 'ct_news':
            $breadcrumb[] = l(t('News'), 'news', $options);
            break;

          case 'ct_press':
            $breadcrumb[] = l(t('Press'), 'media-contacts', $options);
            break;

          case 'ct_publications':
            $breadcrumb[] = l(t('Publications'), 'publications', $options);
            break;

          case 'ct_events':
            $breadcrumb[] = l(t('Events'), 'events', $options);
            break;

          case 'exbo_events':
            $breadcrumb[] = l(t('Executive Board Events'), 'executive-board-events/upcoming', $options);
            break;

          case 'ct_submissions':
            $breadcrumb[] = l(t('Request for Proposals'), 'call-for-submissions', $options);
            break;

          case 'ct_vacancies':
            $breadcrumb[] = l(t('Vacancies'), 'vacancies', $options);
            break;

          case 'ct_jobs':
            $breadcrumb[] = l(t('Jobs'), 'jobs', $options);
            break;

          case 'ct_data_portal':
            $breadcrumb[] = l(t('UNFPA Aid Transparency Portal'), 'transparency-portal', $options);
            break;

          case 'ct_topics':
            unset($breadcrumb[2]);
            break;

          case 'ct_inner_pages':
            unset($breadcrumb[1]);
            break;

          case 'slideshow':
            $breadcrumb[] = l(t('Slideshows'), 'slideshows', $options);
            break;
        }
        $breadcrumb[] = t($node->title);
        break;

      case 'search':
        unset($breadcrumb[1]);
        unset($breadcrumb[2]);
        $breadcrumb[] = t("Search");
        break;

      default:
        $breadcrumb[] = t(drupal_get_title());
        break;
    }
    return '<nav class="breadcrumb">' . implode(' ', $breadcrumb) . '</nav>';
  }
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function unfpa_global_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

/**
 * Function to fetch the topics menu based on the taxonomy.
 *
 * @return string
 *    Topics mega menu
 */
function get_topics_menu() {
  // Wrapper Function for Topics Nids specific to tid.
  $nodes_tids_mapper = fetch_tids();

  $volcab = taxonomy_vocabulary_machine_name_load('thematic_area');
  // Use the correct vocabulary id.
  $terms = taxonomy_get_tree($volcab->vid);
  // Get the active trail tid-s.
  $active = arg(2);
  $active_parents = taxonomy_get_parents_all($active);
  $active_parents_tids = array();
  foreach ($active_parents as $parent) {
    $active_parents_tids[] = $parent->tid;
  }

  // Build the menu.
  $term_count = count($terms);
  $depth = '';
  $cont = '<ul class="menu taxonomy_menu">';
  for ($i = 0; $i < $term_count; $i++) {
    // Build the classes string.
    $classes = '';
    $children = taxonomy_get_children($terms[$i]->tid);
    $active_trail = in_array($terms[$i]->tid, $active_parents_tids);
    if ($active_trail && $children) {
      $classes .= 'expanded active-trail ';
    }
    elseif ($active_trail) {
      $classes .= 'active-trail ';
    }
    elseif ($children) {
      $classes .= 'expanded ';
    }

    if ($i == 0) {
      $cont .= '<li class="first ' . $classes . '"><span class="sub-topics">' . t($terms[$i]->name) . '</span>';
    }
    else {
      if ($terms[$i]->depth == $depth) {
        $nid = $nodes_tids_mapper[$terms[$i]->tid];

        $cont .= '</li><li class="' . $classes . '">' . l(t($terms[$i]->name), 'node/' . $nid);
      }
      elseif ($terms[$i]->depth > $depth) {
        $nid = $nodes_tids_mapper[$terms[$i]->tid];
        $cont .= '<ul class="menu level-' . $terms[$i]->depth . '"><li class="first ' . $classes . '">' . l(t($terms[$i]->name), 'node/' . $nid);
      }
      elseif ($terms[$i]->depth < $depth) {
        // Add missing end-tags depending of depth level difference.
        for ($j = $terms[$i]->depth; $j < $depth; $j++) {
          $cont .= '</li></ul>';
        }
        $cont .= '</li><li class="' . $classes . '"><span class="sub-topics">' . t($terms[$i]->name) . '</span>';
      }
      // If we have reached the last element add all possibly missing end-tags.
      if (!isset($terms[$i + 1])) {
        for ($j = 0; $j < $terms[$i]->depth; $j++) {
          $cont .= '</li></ul>';
        }
      }
    }
    $depth = $terms[$i]->depth;
  }
  $cont .= '</li></ul>';

  return $cont;
}

/**
 * Wrapper function to fetch the nid from the taxonomy based on tid.
 *
 * @return array
 *    Node Array with tid mapping
 */
function fetch_tids() {
  global $language;
  $site_language = $language->language;
  $default_language = language_default('language');
  $query = "SELECT node.nid AS nid, taxonomy_index.tid as tid
FROM
{node} node
INNER JOIN {taxonomy_index} taxonomy_index ON node.nid = taxonomy_index.nid
WHERE ( (( (node.status = '1') AND (node.type IN  ('ct_topics')) AND (node.tnid = 0
 OR (node.language = '" . $site_language . "')
 OR (node.language = '" . $default_language . "' AND
          0 = (SELECT count(lmfh_node.nid)
                 FROM {node} AS lmfh_node
                WHERE lmfh_node.tnid = node.tnid AND
                      ((lmfh_node.language = '" . $site_language . "'))))
 OR (node.nid = node.tnid AND
          0 = (SELECT count(lmfh_node.nid)
                 FROM {node} AS lmfh_node
                WHERE lmfh_node.tnid = node.tnid AND
                      ((lmfh_node.language = '" . $site_language . "') OR (lmfh_node.language = '" . $default_language . "'))))) )))";

  $result = db_query($query);
  $nids_cnt = $result->rowCount();
  $nids_array = array();
  if ($nids_cnt > 0) {
    foreach ($result as $obj_result) {
      $tid = $obj_result->tid;
      $nid = $obj_result->nid;
      $nids_array[$tid] = $nid;
    }
  }
  return $nids_array;
}

/**
 * Implements hook_menu_link().
 */
function unfpa_global_menu_link($variables) {

  $element = $variables['element'];
  $sub_menu = '';

  $menu_string = $element['#title'];

  if (module_load_include('inc', 'pathauto', 'pathauto') !== FALSE) {
    $menu_string = pathauto_cleanstring($menu_string);
  }

  $level = 'level-' . $element['#original_link']['depth'];

  $element['#attributes']['class'][] = $level;

  if ($element['#below']) {
    if ($variables['element']['#theme'] == 'menu_link__main_menu') {

      if ($element['#title'] == t("About")) {
        $element['#attributes']['class'][] = 'about-menu';
      }

      if ($element['#title'] == t("Topics")) {
        $sub_menu = get_topics_menu();
      }
      else {
        if (!in_array("expanded", $variables['element']['#attributes']['class'])) {
          $sub_menu = '';
        }
        else {
          $sub_menu = $element['#below'] ? drupal_render($element['#below']) : '';
        }
      }
    }
  }
  $output = l(t($element['#title']), $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>";
}

/**
 * Prepares variables for page templates.
 */
function unfpa_global_preprocess_page(&$variables) {

  if (isset($variables['node']->type)) {
    if ($variables['node']->type == "ct_video") {
      $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
    }
    elseif ($variables['node']->type == "ct_featured_publication") {
      $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
    }
    elseif ($variables['node']->type == "ct_feature") {
      $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
      drupal_add_js(drupal_get_path('theme', 'unfpa_global') . '/js/skrollr.min.js');
    }
    elseif ($variables['node']->type == "ct_timeline") {
      $base_path = drupal_get_path('theme', 'unfpa_global');
      drupal_add_css($base_path . '/css/timeline/timeline.css');
      drupal_add_css($base_path . '/css/timeline/font.default.css');
      drupal_add_js($base_path . '/js/timeline.js');
      drupal_add_js($base_path . '/js/unfpa_timeline.js');
    }

    // Only SDG page nids to show the assigned page template.
    if (in_array($variables['node']->nid, variable_get('sdg_page_nids', array()))) {
      $variables['theme_hook_suggestions'][] = 'page__sdg__' . $variables['node']->type;
    }
  }

  if (drupal_is_front_page()) {
    if (variable_get('home_page_slider_value')) {
      drupal_add_js(array('home_slider_switch' => TRUE), 'setting');
    }
    else {
      drupal_add_js(array('home_slider_switch' => FALSE), 'setting');
    }
  }
}

function unfpa_global_preprocess_views_view(&$variables) {
  if ($variables['view']->name != 'vw_related_topics_terms') {
    return;
  }
  $node = node_load(arg(1));
  $tid = $node->field_thematic_area[LANGUAGE_NONE][0]['tid'];
  $term = taxonomy_term_load($tid);
  $name = $term->name;
  $options = array(
    'attributes' => array('class' => 'more'),
    'html' => TRUE,
  );
  $variables['show_all_news'] = l(t('Show all news'), "news-listing-page/$name", $options);
  $variables['show_all_publications'] = l(t('Show all publications'), "publications-listing-page/$name", $options);
  $variables['show_all_resources'] = l(t('Show all resources'), "resource-listing-page/$name", $options);
}

/**
 * Override or insert variables into the node template.
 */
function unfpa_global_preprocess_node(&$variables) {
  $variables['submitted'] = t('Published by !username on !datetime', array('!username' => $variables['name'], '!datetime' => $variables['date']));
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }

  $node = $variables['node'];
  $view_mode = $variables['view_mode'];
  $variables['theme_hook_suggestions'][] = "node__{$node->type}__{$view_mode}";
  $preprocess_function = "unfpa_global_preprocess_node__{$node->type}__{$view_mode}";

  // Only SDG page nids to show the specific node template.
  if (in_array($node->nid, variable_get('sdg_page_nids', array()))) {
    $variables['theme_hook_suggestions'][] = "node__sdg__{$node->type}__{$view_mode}";
  }

  if (function_exists($preprocess_function)) {
    $preprocess_function($variables);
  }
  if ($node->type == 'ct_news' && $view_mode == 'teaser') {
    $variables['title'] = isset($node->short_title) ? $node->short_title : $node->title;
    $variables['show_feature'] = $node->field_show_feature[LANGUAGE_NONE][0]['value'];
  }
  if ($node->type == 'ct_publications' && $view_mode == 'teaser') {
    $variables['title'] = isset($node->short_title) ? $node->short_title : $node->title;
  }
  if ($node->type == 'ct_resources' && $view_mode == 'teaser') {
    $variables['title'] = isset($node->short_title) ? $node->short_title : $node->title;
    $variables['overwrite'] = $node->field_overwrite_thumb[LANGUAGE_NONE][0]['value'];
  }
}

/**
 * Callback function for detail page node template.
 *
 * For content type featured publications.
 */
function unfpa_global_preprocess_node__ct_featured_publication__full(&$variables) {
  $wrapper = entity_metadata_wrapper('node', $variables['node']);

  $variables['featured_publication']['field_anchor_title_1'] = $wrapper->field_anchor_title_1->value();
  $variables['featured_publication']['field_anchor_title_2'] = $wrapper->field_anchor_title_2->value();
  $variables['featured_publication']['field_anchor_title_3'] = $wrapper->field_anchor_title_3->value();
  $variables['featured_publication']['field_anchor_title_4'] = $wrapper->field_anchor_title_4->value();

  $variables['featured_publication']['node_id'] = $wrapper->getIdentifier();

  // Featured Publication Content.
  if (!empty($wrapper->field_featured_pub->getIdentifier())) {
    $variables['featured_publication']['feature_pub_content'] = views_embed_view('vw_publications', 'featured_pub_panel_pane', $wrapper->field_featured_pub->getIdentifier());
  }

  // Related Resources Section Data.
  $resource_args = array();
  foreach ($wrapper->field_related_resource as $related_resource_wrapper) {
    $resource_args[] = $related_resource_wrapper->getIdentifier();
  }
  if (!empty($resource_args)) {
    $variables['featured_publication']['related_resources_content'] = views_embed_view('resources', 'feat_pub_related_resources', implode("+", $resource_args));
  }

  // Related Publication Section View Data.
  $pub_args = array();
  foreach ($wrapper->field_related_publication as $related_publication_wrapper) {
    $pub_args[] = $related_publication_wrapper->getIdentifier();
  }
  if (!empty($pub_args)) {
    $variables['featured_publication']['related_publications_content'] = views_embed_view('vw_publications', 'previous_pub_panel_pane', implode("+", $pub_args));
  }

  // Background Image and Background Color preparation for fields.
  for ($i = 1; $i <= 4; $i++) {
    $field_bg_selector_name = 'field_background_selector_' . $i;
    $field_color_picker_name = 'field_color_picker_' . $i;
    $variables['featured_publication']['bg_img_' . $i] = !empty($wrapper->$field_bg_selector_name->value()['uri']) ? file_create_url($wrapper->$field_bg_selector_name->value()['uri']) : '';
    $variables['featured_publication']['bg_color_' . $i] = !empty($wrapper->$field_color_picker_name->value()) ? $wrapper->$field_color_picker_name->value() : 'transparent';
  }

  // To show iframe content only on SWOP featured publication page for the
  // values set in the variable swop_page_nids.
  $variables['featured_publication']['swop_iframe_content'] = in_array($wrapper->getIdentifier(), variable_get('swop_page_nids', array()));
  // The URL for demographic divident which is shown via iframe.
  $variables['featured_publication']['swop_iframe_url'] = drupal_get_path('theme', 'unfpa_global') . '/templates/un-demographic-dividend/index.html';
  // To show SOWMY world map only on SOWMY page for the nids set
  // In the variable swop_page_nids which is an array as it contains
  // multi-lingual nids.
  $variables['featured_publication']['sowmy_map_content'] = in_array($wrapper->getIdentifier(), variable_get('sowmy_page_nids', array()));
  if ($variables['featured_publication']['sowmy_map_content']) {
    $map_data = module_invoke('unfpa_global_sowmy', 'block_view', 'custom_sowmy_map');
    $variables['featured_publication']['sowmy_map'] = $map_data['content'];
  }
}

/**
 * Generic preprocess for youtube videos to create thumbnail image.
 */
function unfpa_global_preprocess_views_view_fields(&$variables) {
  if (!isset($variables['view']->name)) {
    return;
  }

  $function = __FUNCTION__ . '__' . $variables['view']->name . '__' . $variables['view']->current_display;
  if (function_exists($function)) {
    $function($variables);
  }
}

/**
 * Generic preprocess for youtube videos.
 *
 * To create thumbnail image on video listing page.
 */
function unfpa_global_preprocess_views_view_fields__vw_video__video_listing_pane(&$variables) {
  unfpa_global_show_youtube_thumbnail($variables, 'video_listing_thumb');
}

/* To create thumbnail image on multimedia page.
 */
function unfpa_global_preprocess_views_view_fields__multimedia__multimedia_video_block(&$variables) {
  unfpa_global_show_youtube_thumbnail($variables, 'video_listing_thumb');
}

/**
 * Generic preprocess for youtube videos.
 *
 * To create thumbnail image on video detail page.
 */
function unfpa_global_preprocess_views_view_fields__related_video_terms__related_videos_terms(&$variables) {
  unfpa_global_show_youtube_thumbnail($variables, 'video_listing_thumb');
}

/**
 * Generic preprocess for youtube videos.
 *
 * To create thumbnail image on emergencies pages.
 */
function unfpa_global_preprocess_views_view_fields__vw_video__block_emergencies_sub(&$variables) {
  // The youtube thumbnail on the "list section" should be display with a play
  // icon on it.
  unfpa_global_show_youtube_thumbnail($variables, 'video_home_thumb', TRUE);
}

/**
 * Wrapper function to show youtube thumbnail.
 *
 * The thumbnail is for video listing, detail and emergencies page.
 * Assuming the node we get here is from the type 'video' only.
 *
 * @param array $variables
 *   An array of variables to pass to the theme template.
 * @param string $image_style_name
 *   A string that contain the image style.
 * @param bool $show_play_icon
 *   A boolean flag to show the play icon on thumbnail image.
 */
function unfpa_global_show_youtube_thumbnail(&$variables, $image_style_name, $show_play_icon = FALSE) {
  $node = $variables['row'];
  $wrapper = entity_metadata_wrapper('node', $node->nid);

  // To check field override thumbnail is set then to not fetch the youtube
  // thumbnail from the video.
  if ($wrapper->field_overwrite_thumb->value()) {
    return;
  }

  $file = $wrapper->field_video->file->value();
  // Set up the settings array with your image style.
  $display['settings'] = array('image_style' => $image_style_name);
  // Get the youtube render image element.
  $image_element = media_youtube_file_formatter_image_view($file, $display, '');

  // If the video has been removed from youtube the returned '#path' is empty.
  if (empty($image_element['#path'])) {
    return;
  }

  $image_element = render($image_element);

  if ($show_play_icon) {
    // The play icon to be shown on top of the rendered image thumbnail.
    $output = '<span class="play-icon"></span>' . $image_element;
  }
  else {
    // The rendered youtube thumbnail image linked to video detail page.
    $output = l($image_element, 'node/' . $node->nid, array('html' => TRUE));
  }

  $variables['fields']['field_video_thumbnail_image']->content = $output;
}

/**
 * Preprocess variables for region.tpl.php.
 *
 * @param array $variables
 *   An array of variables to pass to the theme template.
 */
function unfpa_global_preprocess_region(&$variables) {
  // Use a bare template for the content region.
  if ($variables['region'] == 'content') {
    $variables['theme_hook_suggestions'][] = 'region__bare';
  }
}

/**
 * Override or insert variables into the block templates.
 *
 * @param array $variables
 *   An array of variables to pass to the theme template.
 */
function unfpa_global_preprocess_block(&$variables) {
  // Use a bare template for the page's main content.
  if ($variables['block_html_id'] == 'block-system-main') {
    $variables['theme_hook_suggestions'][] = 'block__bare';
  }
  $variables['title_attributes_array']['class'][] = 'block-title';
}

/**
 * Override or insert variables into the block templates.
 *
 * @param array $variables
 *   An array of variables to pass to the theme template.
 */
function unfpa_global_process_block(&$variables) {
  // Drupal 7 should use a $title variable instead of $block->subject.
  $variables['title'] = $variables['block']->subject;
}

/**
 * Changes the search form to use the "search" input element of HTML5.
 */
function unfpa_global_preprocess_search_block_form(&$vars) {
  $placeholder = t('Search');
  $vars['search_form'] = str_replace('type="text"', 'type="search" placeholder="' . $placeholder . '"', $vars['search_form']);
}

/**
 * Prepares variables for search results page.
 */
function unfpa_global_preprocess_search_result(&$variables) {
  $result = $variables['result'];
  $variables['info'] = '';

  $info = array();
  if (isset($result['node']->type)) {
    $info['node_type'] = $result['node']->type;

    $types = node_type_get_types();

    $info['node_type_name'] = $types[$info['node_type']]->name;
    if (isset($result['node']->field_news_type[LANGUAGE_NONE][0]['value'])) {
      $info['news_type'] = $result['node']->field_news_type[LANGUAGE_NONE][0]['value'];
    }
  }
  // Provide separated and grouped meta information..
  $variables['info_split'] = $info;
}

/**
 * Implements hook_views_pre_render().
 */
function unfpa_global_views_pre_render(&$view) {

  if (($view->name == 'vw_news' && $view->current_display == 'panel_pane_2') || ($view->name == 'vw_news' && $view->current_display == 'panel_pane_1')) {
    $results = &$view->result;
    foreach ($results as $key => $result) {
      $field_blurb = isset($result->_field_data['nid']['entity']->field_blurb['und']['0']['safe_value']) ? $result->_field_data['nid']['entity']->field_blurb['und']['0']['safe_value'] : '';
      $results[$key]->field_field_blurb[0]['rendered']['#markup'] = html_entity_decode($field_blurb);
    }
  }

  if (($view->name == 'vw_press' && $view->current_display == 'panel_pane_1') || ($view->name == 'vw_news' && $view->current_display == 'panel_pane_news_detail')) {
    $results = &$view->result;
    foreach ($results as $key => $result) {
      $field_news_image_body_text = isset($result->_field_data['nid']['entity']->field_news_image_body_text['und']['0']['safe_value']) ? $result->_field_data['nid']['entity']->field_news_image_body_text['und']['0']['safe_value'] : '';
      $results[$key]->field_field_news_image_body_text[0]['rendered']['#markup'] = html_entity_decode($field_news_image_body_text);
    }
  }
}

/**
 * Implements hook_form_views_exposed_form_alter
 */
function unfpa_global_form_views_exposed_form_alter(&$form, &$form_state) {
  if ($form['#id'] != 'views-exposed-form-icpd-resources-icpd-listing-page') {
    return;
  }
  $form['field_icpd_document_type_tid_i18n']['#default_value'] = 'All';
}
