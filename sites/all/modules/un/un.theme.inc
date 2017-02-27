<?php

/**
 * @file
 * Theme functions and preprocessing for Annual Reports 2014 and 2015.
 */



/**
 * Processes variables for un-report-page.tpl.php which is used for Report 2014.
 */
function template_preprocess_un_annual_report_page_2014(&$variables) {
  $year = 2014;

  // Path to this module directory.
  $variables['p'] = base_path() . drupal_get_path('module', 'un') . '/';

  /* Report Pdf download link. */

  $variables['report_pdf'] = FALSE;

  $report_pdf = variable_get('un_rep' . $year . '_general_pdfurl', FALSE);
  if ($report_pdf) {
    $variables['report_pdf'] = l(t('Download Report Pdf'), $report_pdf, array(
      'attributes' => array(
        'class' => array('rp-download', 'sb-font'),
        'target' => '_blank',
      ),
    ));
  }

  /* Cover. */

  $variables['cover_tiles'] = views_embed_view('rep_2014_regions', 'tiles', $year);

  /* Navigation. */

  $variables['nav_subitems_4'] = views_embed_view('rep_2014_inactions', 'menu_items', $year);
  $variables['nav_subitems_5'] = views_embed_view('rep_2014_regions', 'menu_items', $year);

  /* Section 1. */

  $variables['introduction_title']
    = check_plain(variable_get('un_rep' . $year . '_introduction_title', ''));

  $variables['introduction_text']
    = filter_xss_admin(variable_get('un_rep' . $year . '_introduction_text', ''));

  $variables['introduction_video'] = '';
  $file = file_load(variable_get('un_rep' . $year . '_introduction_imgfid', 0));
  if ($file) {
    $video_thumb = theme('image_style', array(
      'style_name' => 'rep2014_video_thumb',
      'path' => $file->uri,
    ));
    $video_url = variable_get('un_rep' . $year . '_introduction_videourl', '');
    $variables['introduction_video'] = un_create_video_thumblink($video_url, $video_thumb);
  }

  $variables['introduction_videotxt']
    = filter_xss_admin(variable_get('un_rep' . $year . '_introduction_videotxt', ''));

  $variables['introduction_graphstitle']
    = check_plain(variable_get('un_rep' . $year . '_introduction_graphstitle', ''));

  $variables['introduction_graphs'] = un_get_introduction_graphs($year);

  /* Section 2. */

  $variables['fromdirector_video'] = '';
  $file = file_load(variable_get('un_rep' . $year . '_fromdirector_imgfid', 0));
  if ($file) {
    $video_thumb = theme('image_style', array(
      'style_name' => 'rep2014_director_video',
      'path' => $file->uri,
    ));
    $video_url = variable_get('un_rep' . $year . '_fromdirector_videourl', '');
    $variables['fromdirector_video'] = un_create_video_thumblink($video_url, $video_thumb);
  }

  $variables['fromdirector_quote']
    = filter_xss_admin(variable_get('un_rep' . $year . '_fromdirector_quote', ''));

  $variables['fromdirector_author']
    = filter_xss_admin(variable_get('un_rep' . $year . '_fromdirector_author', ''));

  /* Section 3. */

  $variables['progress_intro']
    = filter_xss_admin(variable_get('un_rep' . $year . '_progress_intro', ''));

  $variables['progress_items']
    = views_embed_view('rep_2014_progressitems', 'default', $year);

  /* Section 4. */

  $variables['inaction_intro']
    = filter_xss_admin(variable_get('un_rep' . $year . '_inaction_intro', ''));

  $variables['inaction_items'] = views_embed_view('rep_2014_inactions', 'default', $year);

  /* Section 5. */

  $variables['regions_items'] = views_embed_view('rep_2014_regions', 'default', $year);
}



/**
 * Processes variables for un-report-page-2015.tpl.php used for Report 2015.
 */
function template_preprocess_un_annual_report_page_2015(&$variables) {
  $year = 2015;

  // Path to this module directory.
  $variables['p'] = base_path() . drupal_get_path('module', 'un') . '/';

  /* Report Pdf download link. */

  $variables['report_pdf'] = FALSE;

  $report_pdf = variable_get('un_rep' . $year . '_general_pdfurl', FALSE);
  if ($report_pdf) {
    $variables['report_pdf'] = l(t('Download Pdf'), $report_pdf, array(
      'attributes' => array(
        'class' => array('rp-download-2', 'b-font', 'rp-upper'),
        'target' => '_blank',
      ),
    ));
  }

  /* Cover. */

  $variables['cover_tiles'] = views_embed_view('rep_2014_regions', 'tiles', $year);

  /* Navigation. */

  $variables['nav_subitems_4'] = views_embed_view('rep_2014_inactions', 'menu_items', $year);
  $variables['nav_subitems_5'] = views_embed_view('rep_2014_regions', 'menu_items', $year);

  /* Section 1. */

  $variables['introduction_title']
    = check_plain(variable_get('un_rep' . $year . '_introduction_title', ''));

  $variables['introduction_text']
    = filter_xss_admin(variable_get('un_rep' . $year . '_introduction_text', ''));

  $variables['introduction_photo'] = '';
  $file = file_load(variable_get('un_rep' . $year . '_introduction_imgfid', 0));
  if ($file) {
    $variables['introduction_photo'] = theme('image_style', array(
      'style_name' => 'rep2014_intro_img',
      'path' => $file->uri,
    ));
  }

  $variables['introduction_phototxt'] = filter_xss_admin(variable_get('un_rep' . $year . '_introduction_imgtxt', ''));

  $variables['introduction_graphstitle'] = check_plain(variable_get('un_rep' . $year . '_introduction_graphstitle', ''));

  $variables['introduction_numbcols_title'] = check_plain(variable_get('un_rep' . $year . '_introduction_numbcols_title', ''));

  $variables['introduction_numbcols'] = array();
  for ($i = 1; $i <= 4; $i++) {
    $variables['introduction_numbcols'][] = filter_xss_admin(variable_get('un_rep' . $year . '_introduction_numbcols_col' . $i, ''));
  }

  $variables['introduction_graphs_subtitle'] = check_plain(variable_get('un_rep' . $year . '_introduction_graphs_subtitle', ''));

  $variables['introduction_graphs'] = un_get_introduction_graphs($year);

  /* Section 3. */

  $variables['sustainability_items'] = views_embed_view('rep_2014_artiles', 'default', $year);

  /* Section 4. */

  $variables['inaction_intro']
    = filter_xss_admin(variable_get('un_rep' . $year . '_inaction_intro', ''));

  $variables['inaction_items'] = views_embed_view('rep_2014_inactions', 'default', $year);

  /* Section 5. */

  $variables['regions_items'] = views_embed_view('rep_2014_regions', 'default', $year);
}



/**
 * Preprocess variables for node.tpl.php.
 *
 * Added variables are used by Annual Report node templates:
 * - node--artiles.tpl.php
 * - node--progressitem.tpl.php
 * - node--inaction.tpl.php
 * - node--region.tpl.php.
 */
function un_preprocess_node(&$variables) {
  $type = $variables['type'];
  $node = $variables['node'];

  /* --- Tiles Node --- */

  if ($type == 'artiles') {
    // Populate array with all tiles.
    $variables['tiles'] = array();

    $tiles = field_get_items('node', $node, 'field_artiles_tiles', $node->language);
    // For each tile get its details and push it into $variables['tiles'] array.
    foreach ($tiles as $t) {
      $tile = entity_load('field_collection_item', array($t['value']));
      $tile = array_pop($tile);

      // Tile title.
      $tile_title_f = field_get_items('field_collection_item', $tile, 'field_artile_title');
      $tile_title = $tile_title_f[0]['safe_value'];

      // Tile image.
      $tile_img_f = field_get_items('field_collection_item', $tile, 'field_artile_tileimg');
      $tile_img = theme('image_style', array(
        'style_name' => 'rep2014_artile_tile',
        'path' => $tile_img_f[0]['uri'],
      ));

      // Tile photo.
      $tile_photo_f = field_get_items('field_collection_item', $tile, 'field_artile_photo');
      $tile_photo = theme('image_style', array(
        'style_name' => 'rep2014_artile_photo',
        'path' => $tile_photo_f[0]['uri'],
      ));

      // Tile photo copyright.
      $tile_copyright_f = field_get_items('field_collection_item', $tile, 'field_artile_copyright');
      $tile_copyright = $tile_copyright_f[0]['safe_value'];

      // Tile title image bar.
      $tile_titleimg_f = field_get_items('field_collection_item', $tile, 'field_artile_titleimg');
      $tile_titleimg = theme('image_style', array(
        'style_name' => 'rep2014_artile_title',
        'path' => $tile_titleimg_f[0]['uri'],
      ));

      // Tile copy text.
      $tile_text_f = field_get_items('field_collection_item', $tile, 'field_artile_copy');
      $tile_text_view = field_view_value('field_collection_item', $tile, 'field_artile_copy', $tile_text_f[0], array());
      $tile_text = render($tile_text_view);

      // Push tile to array.
      $variables['tiles'][] = array(
        'title' => $tile_title,
        'img' => $tile_img,
        'photo' => $tile_photo,
        'copyright' => $tile_copyright,
        'titleimg' => $tile_titleimg,
        'text' => $tile_text,
      );
    }

    // Use 'normakup' theme function for some fields, so they print without
    // extra HTML - just raw value without the need to override their tpl.php's.
    $variables['content']['field_artiles_body']['#theme'] = 'nomarkup';
  }

  /* --- Progress Item --- */

  elseif ($type == 'progressitem') {
    // Icon class.
    $ico = field_get_items('node', $node, 'field_progress_icon');
    $variables['icon_class'] = drupal_html_class($ico[0]['value']);

    // Background image - desktop.
    $img = field_get_items('node', $node, 'field_progress_image');
    $variables['style'] = '';
    if (isset($img[0]['uri'])) {
      $img_url = image_style_url('rep2014_progress', $img[0]['uri']);
      $variables['style'] = ' style="background-image: url(' . $img_url . ');"';
    }

    // Background image - mobile.
    $img_mob = field_get_items('node', $node, 'field_progress_image2');
    $variables['style_mobile'] = '';
    $variables['class_mobile'] = '';
    if (isset($img_mob[0]['uri'])) {
      $img_url = image_style_url('rep2014_progress_mobile', $img_mob[0]['uri']);
      $variables['style_mobile'] = ' style="background-image: url(' . $img_url . ');"';
      $variables['class_mobile'] = ' has-bg';
    }

    // Progress item side content.
    $variables['side'] = '';
    $side = field_get_items('node', $node, 'field_progress_side');
    if (isset($side[0]['value'])) {
      $variables['side'] = un_create_graph_from_placeholder(filter_xss_admin($side[0]['value']));
    }

    // Use 'normakup' theme function for some fields, so they print without
    // extra HTML - just raw value without the need to override their tpl.php's.
    $variables['content']['field_progress_body']['#theme'] = 'nomarkup';
  }

  /* --- In Action --- */

  elseif ($type == 'inaction') {
    // Report year.
    $rep = field_get_items('node', $node, 'field_un_report');
    $variables['report_year'] = 2014;
    if (isset($rep[0]['value'])) {
      $variables['report_year'] = $rep[0]['value'];
    }

    // Highlights box background image style.
    $variables['highlights_bg'] = '';
    $highlights_bgf = field_get_items('node', $node, 'field_action_highlights_ico');
    if (isset($highlights_bgf[0]['uri'])) {
      $variables['highlights_bg'] = ' style="background-image: url(' . file_create_url($highlights_bgf[0]['uri']) . ')"';
    }

    // Facts.
    $variables['facts'] = array();
    $facts = field_get_items('node', $node, 'field_action_facts');
    foreach ($facts as $f) {
      $fact = entity_load('field_collection_item', array($f['value']));
      $fact = array_pop($fact);

      $fact_title_f = field_get_items('field_collection_item', $fact, 'field_fact_title');
      $fact_title = $fact_title_f[0]['safe_value'];

      $fact_copy_f = field_get_items('field_collection_item', $fact, 'field_graph_copy');
      $fact_copy = $fact_copy_f[0]['safe_value'];

      $graph_doughnut = field_get_items('field_collection_item', $fact, 'field_graph_doughnut');
      $graph_bar = field_get_items('field_collection_item', $fact, 'field_graph_bar');
      $graph_number = field_get_items('field_collection_item', $fact, 'field_graph_number');
      $graph_image = field_get_items('field_collection_item', $fact, 'field_graph_image');

      // At least one graph is required.
      $fact_graph = FALSE;

      // Doughnut graph.
      if ($graph_doughnut) {
        $fact_graph = un_get_graph_doughnut($graph_doughnut[0]['value']);
      }
      // Bar graph.
      elseif ($graph_bar) {
        $fact_graph = un_get_graph_bar($graph_bar[0]['value']);
      }
      // Image + Number graph.
      elseif ($graph_number && $graph_image) {
        $fact_graph = un_get_graph_imgnumb($graph_image[0]['uri'], $graph_number[0]['value']);
      }
      // Number graph.
      elseif ($graph_number) {
        $fact_graph = un_get_graph_number($graph_number[0]['value']);
      }
      // Image graph.
      elseif ($graph_image) {
        $fact_graph = un_get_graph_image($graph_image[0]['uri']);
      }

      if (!empty($fact_graph)) {
        $variables['facts'][] = array(
          'title' => $fact_title,
          'copy' => $fact_copy,
          'graph' => $fact_graph,
        );
      }
    }

    // Facts container css class.
    $variables['facts_class'] = (count($facts) % 2 == 0 ? 'facts-even' : 'facts-odd');

    // Use 'normakup' theme function for some fields, so they print without
    // extra HTML - just raw value without the need to override their tpl.php's.
    $variables['content']['field_action_subtitle']['#theme'] = 'nomarkup';
    $variables['content']['field_action_image']['#theme'] = 'nomarkup';
    $variables['content']['field_action_image2']['#theme'] = 'nomarkup';
    $variables['content']['field_action_body']['#theme'] = 'nomarkup';
    $variables['content']['field_action_highlights']['#theme'] = 'nomarkup';
    $variables['content']['field_action_factshead']['#theme'] = 'nomarkup';
  }

  /* --- Region --- */

  elseif ($type == 'region') {
    // Progrees subsection content.
    $variables['progress'] = array();
    $progress = field_get_items('node', $node, 'field_region_progress', $node->language);
    foreach ($progress as $p) {
      $progr = entity_load('field_collection_item', array($p['value']));
      $progr = array_pop($progr);

      $progr_title_f = field_get_items('field_collection_item', $progr, 'field_progress_title');
      $progr_title = $progr_title_f[0]['value'];

      $progr_copy_f = field_get_items('field_collection_item', $progr, 'field_progress_copy');
      $progr_copy_v = field_view_value('field_collection_item', $progr, 'field_progress_copy', $progr_copy_f[0], array());
      $progr_copy = render($progr_copy_v);

      $variables['progress'][] = array(
        'title' => $progr_title,
        'copy' => $progr_copy,
      );
    }

    // Indicators (Facts).
    $variables['facts'] = array();
    $facts = field_get_items('node', $node, 'field_region_indicators');
    foreach ($facts as $f) {
      $fact = entity_load('field_collection_item', array($f['value']));
      $fact = array_pop($fact);

      $fact_copy_f = field_get_items('field_collection_item', $fact, 'field_graph_copy');
      $fact_copy = $fact_copy_f[0]['safe_value'];

      $fact_bigcopy_f = field_get_items('field_collection_item', $fact, 'field_graph_bigcopy');
      $fact_bigcopy = $fact_bigcopy_f ? $fact_bigcopy_f[0]['safe_value'] : FALSE;

      $graph_doughnut = field_get_items('field_collection_item', $fact, 'field_graph_doughnut');
      $graph_bar = field_get_items('field_collection_item', $fact, 'field_graph_bar');
      $graph_number = field_get_items('field_collection_item', $fact, 'field_graph_number');
      $graph_image = field_get_items('field_collection_item', $fact, 'field_graph_image');

      // At least one graph is required.
      $fact_graph = FALSE;

      // Doughnut graph.
      if ($graph_doughnut) {
        $fact_graph = un_get_graph_doughnut($graph_doughnut[0]['value']);
      }
      // Bar graph.
      elseif ($graph_bar) {
        $fact_graph = un_get_graph_bar($graph_bar[0]['value']);
      }
      // Image + Number graph.
      elseif ($graph_number && $graph_image) {
        $fact_graph = un_get_graph_imgnumb($graph_image[0]['uri'], $graph_number[0]['value']);
      }
      // Number graph.
      elseif ($graph_number) {
        $fact_graph = un_get_graph_number($graph_number[0]['value']);
      }
      // Image graph.
      elseif ($graph_image) {
        $fact_graph = un_get_graph_image($graph_image[0]['uri']);
      }

      if (!empty($fact_graph)) {
        $variables['facts'][] = array(
          'copy' => $fact_copy,
          'bigcopy' => $fact_bigcopy,
          'graph' => $fact_graph,
        );
      }
    }

    // Region Expenses (Text List).
    $variables['expenses_list'] = '';
    $expenses = field_get_items('node', $node, 'field_region_expenses');
    if (isset($expenses[0])) {
      $variables['expenses_list'] = filter_xss_admin($expenses[0]['value']);
    }

    // Region Expenses (Charts).
    $variables['expenses_charts'] = '';
    $expenses_2 = field_get_items('node', $node, 'field_region_expenses2');
    if (isset($expenses_2[0])) {
      $variables['expenses_charts'] = filter_xss_admin($expenses_2[0]['value']);
    }

    // Region Expenses (Js).
    $variables['expenses_js'] = '';
    $expenses_js = field_get_items('node', $node, 'field_region_expenses_js');
    if (isset($expenses_js[0])) {
      $variables['expenses_js'] = '<script>' . $expenses_js[0]['value'] . '</script>';
    }

    // Use 'normakup' theme function for some fields, so they print without
    // extra HTML - just raw value without the need to override their tpl.php's.
    $variables['content']['field_region_photo']['#theme'] = 'nomarkup';
    $variables['content']['field_region_intro_title']['#theme'] = 'nomarkup';
    $variables['content']['field_region_intro_copy']['#theme'] = 'nomarkup';
    $variables['content']['field_region_body']['#theme'] = 'nomarkup';
  }
}



/**
 * Preprocess variables for field.tpl.php.
 *
 * Added variables are used by Annual Report field templates:
 * - field--field-action-video.tpl.php
 * - field--field-region-video.tpl.php.
 */
function un_preprocess_field(&$variables) {
  if (!isset($variables['element']['#field_name'])) {
    return;
  }

  $field_name = $variables['element']['#field_name'];
  $video_fields = array('field_action_video', 'field_region_video');

  if (!in_array($field_name, $video_fields)) {
    return;
  }

  $variables['video_thumblink'] = '';
  $variables['video_label'] = FALSE;

  if (!isset($variables['items'][0])) {
    return;
  }

  $item = $variables['items'][0];

  // Video thumblink.
  if (isset($item['#path']['path']) && isset($item['#item']['uri'])) {
    $video_url = $item['#path']['path'];
    $video_thumb = theme('image_style', array(
      'style_name' => 'rep2014_video_thumb',
      'path' => $item['#item']['uri'],
    ));

    $variables['video_thumblink'] = un_create_video_thumblink($video_url, $video_thumb);
  }

  // Video label.
  if (!empty($item['#suffix'])) {
    $variables['video_label'] = $item['#suffix'];
  }
}



/**
 * Preprocess variables for views-view-unformatted.tpl.php.
 *
 * Added variables are used by Annual Report views templates:
 * - views-view-unformatted--rep-2014-inactions.tpl.php
 * - views-view-unformatted--rep-2014-regions.tpl.php.
 */
function un_preprocess_views_view_unformatted(&$variables) {
  $view_name = $variables['view']->name;
  $views_preprocessed = array(
    'rep_2014_inactions',
    'rep_2014_regions',
  );

  if (!in_array($view_name, $views_preprocessed)) {
    return;
  }

  if (!is_array($variables['rows'])) {
    return;
  }

  // Each row contained in template $rows variable will be now array
  // containing html 'markup' and 'subsection_id' keys.
  foreach ($variables['rows'] as $id => $row) {
    $variables['rows'][$id] = array(
      'markup' => $row,
      'subsection_id' => sprintf("%02d", $id + 1),
    );
  }
}



/**
 * Preprocess variables for views-view-list.tpl.php.
 *
 * Added variables are used by Annual Report views templates:
 * - views-view-list--rep-2014-inactions.tpl.php
 * - views-view-list--rep-2014-progressitems.tpl.php
 * - views-view-list--rep-2014-regions.tpl.php.
 */
function un_preprocess_views_view_list(&$variables) {
  $view_name = $variables['view']->name;
  $views_preprocessed = array(
    'rep_2014_inactions',
    'rep_2014_progressitems',
    'rep_2014_regions',
  );

  if (!in_array($view_name, $views_preprocessed)) {
    return;
  }

  if (!is_array($variables['rows'])) {
    return;
  }

  // Each row contained in template $rows variable will be now array
  // containing html 'markup' and 'subsection_id' keys.
  foreach ($variables['rows'] as $id => $row) {
    $variables['rows'][$id] = array(
      'markup' => $row,
      'subsection_id' => sprintf("%02d", $id + 1),
    );
  }
}



/**
 * Load introduction graphs from taxonomy.
 */
function un_get_introduction_graphs($year) {
  global $language;
  $graphs = '';

  $graphs_voc = taxonomy_vocabulary_machine_name_load('un_graphs');
  $graphs_terms = taxonomy_get_tree($graphs_voc->vid, 0, NULL, $load_entities = TRUE);

  foreach ($graphs_terms as $fact) {
    // Get report year and language.
    $fact_year_f = field_get_items('taxonomy_term', $fact, 'field_un_report');
    $fact_lang_f = field_get_items('taxonomy_term', $fact, 'field_graph_language');

    // Skip this fact if it has no year or no language set.
    if (!$fact_year_f || !$fact_lang_f) {
      continue;
    }

    $fact_year = $fact_year_f[0]['value'];
    $fact_lang = $fact_lang_f[0]['value'];

    // Skip this fact if it's in other language than the one currently
    // used or if it's for other year than displayed report year.
    if ($fact_year != $year || $fact_lang != $language->language) {
      continue;
    }

    // Get graph fields.
    $graph_doughnut = field_get_items('taxonomy_term', $fact, 'field_graph_doughnut');
    $graph_bar = field_get_items('taxonomy_term', $fact, 'field_graph_bar');
    $graph_number = field_get_items('taxonomy_term', $fact, 'field_graph_number');
    $graph_image = field_get_items('taxonomy_term', $fact, 'field_graph_image');

    // Skip this fact if it has no any graph.
    if (!$graph_doughnut && !$graph_bar && !$graph_number && !$graph_image) {
      continue;
    }

    // Doughnut graph.
    if ($graph_doughnut) {
      $graphs .= '<div class="fact fact-with-doughnut">';
      $graphs .= '<div class="fact-graph fact-graph-doughnut">';
      $graphs .= un_get_graph_doughnut($graph_doughnut[0]['value'], 205);
      $graphs .= '</div>';
    }
    // Bar graph.
    elseif ($graph_bar) {
      $graphs .= '<div class="fact fact-with-bar">';
      $graphs .= '<div class="fact-graph">';
      $graphs .= un_get_graph_bar($graph_bar[0]['value'], 74, 232);
      $graphs .= '</div>';
    }
    // Image + Number graph.
    elseif ($graph_image && $graph_number) {
      $graphs .= '<div class="fact fact-with-imgnumb">';
      $graphs .= '<div class="fact-graph">';
      $graphs .= un_get_graph_imgnumb($graph_image[0]['uri'], $graph_number[0]['value']);
      $graphs .= '</div>';
    }
    // Number graph.
    elseif ($graph_number) {
      $graphs .= '<div class="fact fact-with-number">';
      $graphs .= '<div class="fact-graph">';
      $graphs .= un_get_graph_number($graph_number[0]['value'], 232);
      $graphs .= '</div>';
    }
    // Image graph.
    elseif ($graph_image) {
      $graphs .= '<div class="fact fact-with-image">';
      $graphs .= '<div class="fact-graph">';
      $graphs .= un_get_graph_image($graph_image[0]['uri']);
      $graphs .= '</div>';
    }

    $copy = field_get_items('taxonomy_term', $fact, 'field_graph_copy');
    $copy_rend = field_view_value('taxonomy_term', $fact, 'field_graph_copy', $copy[0]);
    $graphs .= '<div class="fact-desc">' . render($copy_rend) . '</div>';

    // Close one of these open fact divs.
    $graphs .= '</div>';

  }

  return $graphs;
}



/**
 * No Markup theme function used by fields.
 */
function theme_nomarkup($variables) {
  $element = $variables['element'];
  
  $variables['items'] = array();
  foreach ($element['#items'] as $delta => $item) {
    if (!empty($element[$delta])) {
      $variables['items'][$delta] = $element[$delta];
    }
  }
  
  $output = '';
  
  // Render the items.
  foreach ($variables['items'] as $delta => $item) {
    $output .= drupal_render($item);
  }
  
  return $output;
}
