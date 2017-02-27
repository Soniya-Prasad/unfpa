<?php

/**
 * @file
 * Contains theme functions and theme preprocess hooks for SWOP report.
 */



/**
 * Processes variables for swop-page-2015.tpl.php.
 */
function template_preprocess_sowp_report_page_2015(&$variables) {
  $year = 2015;

  // Path to this module directory.
  $variables['p'] = base_path() . drupal_get_path('module', 'sowp') . '/';

  // Language css class.
  global $language;
  $variables['language_class'] = ' swp-' . $language->language;

  /* Cover. */

  $variables['cover_intro'] = theme('sowp_intro', array(
    'title' => t('Shelter<br>From The<br>Storm'),
    'subtitle' => t('A transformative agenda<br /> for women and girls in a<br /> crisis-prone world'),
    'type' => 'rich',
    'logo' => TRUE,
    'year' => $year,
  ));
  $variables['cover_bigintro'] = sowp_embed_view('sowp_bigintros', 'default', array(0, $year));
  $variables['cover_bodies'] = sowp_embed_view('sowp_bodies', 'default', array(0, $year));

  /* Risk section. */

  $variables['risk_intro'] = theme('sowp_intro', array(
    'title' => t('Risks'),
    'subtitle' => t('Women and girls are<br /> disproportionately<br /> disadvantaged'),
    'type' => 'regular',
  ));
  $variables['risk_bigintro'] = sowp_embed_view('sowp_bigintros', 'default', array(1, $year));
  $variables['risk_stories'] = theme('sowp_stories', array('section_id' => 1, 'year' => $year));
  $variables['risk_bodies'] = sowp_embed_view('sowp_bodies', 'default', array(1, $year));

  /* Response section. */

  $variables['response_intro'] = theme('sowp_intro', array(
    'title' => t('Response'),
    'subtitle' => t('Essential actions and services<br /> from the onset of a crisis'),
    'type' => 'regular',
  ));
  $variables['response_bigintro'] = sowp_embed_view('sowp_bigintros', 'default', array(2, $year));
  $variables['response_stories'] = theme('sowp_stories', array('section_id' => 2, 'year' => $year));
  $variables['response_bodies'] = sowp_embed_view('sowp_bodies', 'default', array(2, $year));

  /* Resilience section. */

  $variables['resilience_intro'] = theme('sowp_intro', array(
    'title' => t('Resilience'),
    'subtitle' => t('Prevention, preparedness<br /> and empowerment'),
    'type' => 'regular',
  ));
  $variables['resilience_bigintro'] = sowp_embed_view('sowp_bigintros', 'default', array(3, $year));
  $variables['resilience_stories'] = theme('sowp_stories', array('section_id' => 3, 'year' => $year));
  $variables['resilience_bodies'] = sowp_embed_view('sowp_bodies', 'default', array(3, $year));

  /* Moving section. */

  $variables['moving_intro'] = theme('sowp_intro', array(
    'title' => t('Moving Forward'),
    'subtitle' => t('A new vision for<br /> humanitarian action'),
    'type' => 'regular',
  ));
  $variables['moving_bigintro'] = sowp_embed_view('sowp_bigintros', 'default', array(4, $year));
  $variables['moving_stories'] = theme('sowp_stories', array('section_id' => 4, 'year' => $year));
  $variables['moving_bodies'] = sowp_embed_view('sowp_bodies', 'default', array(4, $year));

  /* Data section. */

  $variables['data_intro'] = theme('sowp_intro', array(
    'title' => t('Data'),
    'subtitle' => t('State of World Population 2015<br />Indicators'),
    'type' => 'regular',
  ));
  $variables['data_bigintro'] = sowp_embed_view('sowp_bigintros', 'default', array(5, $year));
  $variables['data_stories'] = theme('sowp_stories', array('section_id' => 5, 'year' => $year));
  $variables['data_bodies'] = sowp_embed_view('sowp_bodies', 'default', array(5, $year));
}



/**
 * Processes variables for swop-page-2016.tpl.php.
 */
function template_preprocess_sowp_report_page_2016(&$variables) {
  $year = 2016;

  // Path to this module directory.
  $variables['p'] = base_path() . drupal_get_path('module', 'sowp') . '/';

  // Language css class.
  global $language;
  $variables['language_class'] = ' swp-' . $language->language;

  /* Cover. */

  $variables['cover_image_grid'] = theme('sowp_imagegrid', array('language' => $language->language));
  $variables['cover_bigintro'] = sowp_embed_view('sowp_bigintros', 'default', array(0, $year));
  $variables['cover_bodies'] = sowp_embed_view('sowp_bodies', 'default', array(0, $year));

  /* I'm 10 section. */

  $variables['im10_intro'] = theme('sowp_intro', array(
    'title' => t("I'm 10!"),
    'subtitle' => t("I'm the face of<br />the future"),
    'type' => 'regular',
    'year' => $year,
  ));
  $variables['im10_bigintro'] = sowp_embed_view('sowp_bigintros', 'default', array(1, $year));
  $variables['im10_stories'] = theme('sowp_stories', array('section_id' => 1, 'year' => $year));
  $variables['im10_bodies'] = sowp_embed_view('sowp_bodies', 'default', array(1, $year));

  /* My challenges section. */

  $variables['challenges_intro'] = theme('sowp_intro', array(
    'title' => t('My Challenges'),
    'subtitle' => t('The obstacles on my path<br />to adulthood'),
    'type' => 'regular',
    'year' => $year,
  ));
  $variables['challenges_bigintro'] = sowp_embed_view('sowp_bigintros', 'default', array(2, $year));
  $variables['challenges_stories'] = theme('sowp_stories', array('section_id' => 2, 'year' => $year));
  $variables['challenges_bodies'] = sowp_embed_view('sowp_bodies', 'default', array(2, $year));

  /* My opportunities section. */

  $variables['opportunities_intro'] = theme('sowp_intro', array(
    'title' => t('My Opportunities'),
    'subtitle' => t('Supporting me today <br />for a better tomorrow for all'),
    'type' => 'regular',
    'year' => $year,
  ));
  $variables['opportunities_bigintro'] = sowp_embed_view('sowp_bigintros', 'default', array(3, $year));
  $variables['opportunities_stories'] = theme('sowp_stories', array('section_id' => 3, 'year' => $year));
  $variables['opportunities_bodies'] = sowp_embed_view('sowp_bodies', 'default', array(3, $year));

  /* My potential section. */

  $variables['potential_intro'] = theme('sowp_intro', array(
    'title' => t('My Potential'),
    'subtitle' => t('Igniting my potential'),
    'type' => 'regular',
    'year' => $year,
  ));
  $variables['potential_bigintro'] = sowp_embed_view('sowp_bigintros', 'default', array(4, $year));
  $variables['potential_stories'] = theme('sowp_stories', array('section_id' => 4, 'year' => $year));
  $variables['potential_bodies'] = sowp_embed_view('sowp_bodies', 'default', array(4, $year));

  /* My future section. */

  $variables['future_intro'] = theme('sowp_intro', array(
    'title' => t('My Future'),
    'subtitle' => t('Where will I be<br />in 15 years?'),
    'type' => 'regular',
    'year' => $year,
  ));
  $variables['future_bigintro'] = sowp_embed_view('sowp_bigintros', 'default', array(5, $year));
  $variables['future_stories'] = theme('sowp_stories', array('section_id' => 5, 'year' => $year));
  $variables['future_bodies'] = sowp_embed_view('sowp_bodies', 'default', array(5, $year));

  /* Data section. */

  $variables['data_intro'] = theme('sowp_intro', array(
    'title' => t('Data'),
    'subtitle' => t('State of World Population 2016'),
    'type' => 'regular',
    'year' => $year,
    'extra_markup' => l(t('View Indicators'), 'world-population-dashboard', array(
      'attributes' => array(
        'class' => array(
          'swp-title-link',
          'sb-font',
          'color-bg',
        ),
      ),
    )),
  ));
  $variables['data_bigintro'] = sowp_embed_view('sowp_bigintros', 'default', array(6, $year));
  $variables['data_stories'] = theme('sowp_stories', array('section_id' => 6, 'year' => $year));
  $variables['data_bodies'] = sowp_embed_view('sowp_bodies', 'default', array(6, $year));
}



/**
 * Processes variables for node.tpl.php.
 */
function sowp_preprocess_node(&$variables) {
  $type = $variables['type'];
  $node = $variables['node'];

  /* --- Big Intro Node --- */

  if ($type == 'sowp_bigintro') {
    // Share links.
    $variables['sowp_sharelinks'] = theme('sowp_sharelinks', array(
      'nid' => $node->nid,
      'title' => check_plain($node->title),
    ));

    // Report download buttons.
    $year_field = field_get_items('node', $node, 'sowp_report');
    $year = 2015;
    if (isset($year_field[0]['value'])) {
      $year = $year_field[0]['value'];
    }
    $variables['sowp_download_buttons'] = theme('sowp_download_buttons', array('year' => $year));

    // Should this bigintro show Report download buttons?.
    $variables['show_downloads'] = FALSE;

    $bigintro_options = field_get_items('node', $node, 'sowp_bigintro_options');
    if (isset($bigintro_options[0]['value'])) {
      $variables['show_downloads'] = TRUE;
    }

    // Use 'sowp_normakup' theme function for some fields, so they print without
    // extra HTML - just raw value without the need to override their tpl.php's.
    $variables['content']['sowp_bigintro_body']['#theme'] = 'sowp_nomarkup';
  }

  /* --- Featured Story --- */

  elseif ($type == 'sowp_story') {
    // Share links.
    $variables['sowp_sharelinks'] = theme('sowp_sharelinks', array(
      'nid' => $node->nid,
      'title' => check_plain($node->title),
    ));

    // Use 'sowp_normakup' theme function for some fields, so they print without
    // extra HTML - just raw value without the need to override their tpl.php's.
    $variables['content']['sowp_story_body']['#theme'] = 'sowp_nomarkup';
  }

  /* --- Regular Body --- */

  elseif ($type == 'sowp_body') {
    // Determine .swp-body additional class.
    $swp_body_class = '';
    // Determine .swp-body-main additional class.
    $swp_body_main_class = '';
    // Is this a regular item or 'photosplit' (half media, half text).
    $is_photosplit = FALSE;

    $spos = field_get_items('node', $node, 'sowp_body_sidebarpos');

    if (isset($spos[0]['value'])) {
      // Inverted sidebar.
      if ($spos[0]['value'] == 'left') {
        $swp_body_class .= ' swp-body-inverted';
      }
      // Half splitted (video on left + copy on right).
      elseif ($spos[0]['value'] == 'half') {
        $swp_body_class .= ' swp-body-inverted swp-photosplit';
        $swp_body_main_class = ' sb-font';
        $is_photosplit = TRUE;
      }
    }

    $variables['swp_body_class'] = $swp_body_class;
    $variables['swp_body_main_class'] = $swp_body_main_class;
    $variables['is_photosplit'] = $is_photosplit;

    // Photosplit video with thumbnail.
    $vids = field_get_items('node', $node, 'sowp_body_sidevids');
    $imgs = field_get_items('node', $node, 'sowp_body_sideimgs');

    $variables['photosplit_video'] = '';

    if (isset($vids[0]['video_url']) && isset($vids[0]['thumbnail_path'])) {
      $thumburi = $vids[0]['thumbnail_path'];
      if (isset($imgs[0]['uri'])) {
        $thumburi = $imgs[0]['uri'];
      }
      $video_thumb = theme('image_style', array(
        'style_name' => 'sowp_photosplit',
        'path' => $thumburi,
      ));
      $variables['photosplit_video'] = theme('sowp_videothumb', array(
        'video_url' => $vids[0]['video_url'],
        'video_thumb' => $video_thumb,
      ));
    }

    // Get include path.
    $variables['sideinclude'] = FALSE;
    $includef = field_get_items('node', $node, 'sowp_body_sideinclude');
    if (isset($includef[0]['value'])) {
      $variables['sideinclude'] = DRUPAL_ROOT . '/' . trim($includef[0]['value']);
    }

    // Share links.
    $twitter_share = '';
    $twitter_hashtags = '';

    $twsh = field_get_items('node', $node, 'field_twitter_share');
    $twhashtags = field_get_items('node', $node, 'field_twitter_hashtags');

    if (isset($twsh[0]['value'])) {
      $twitter_share = $twsh[0]['value'];
    }
    if (isset($twhashtags[0]['value'])) {
      $twitter_hashtags = $twhashtags[0]['value'];
    }

    $variables['sowp_sharelinks'] = theme('sowp_sharelinks', array(
      'nid' => $node->nid,
      'title' => check_plain($node->title),
      'twitter_share' => $twitter_share,
      'twitter_hashtags' => $twitter_hashtags,
    ));

    // Use 'sowp_normakup' theme function for some fields, so they print without
    // extra HTML - just raw value without the need to override their tpl.php's.
    $variables['content']['sowp_body_content']['#theme'] = 'sowp_nomarkup';
  }

  /* --- Chart / Images --- */

  elseif ($type == 'sowp_chart') {
    // Detect if we should use custom background image.
    $variables['bg'] = '';
    $bg_field = field_get_items('node', $node, 'sowp_chart_bgimg');
    if (isset($bg_field[0]['uri'])) {
      $variables['bg'] = ' style="background-image: url(' .
        image_style_url('sowp_subsection_bg', $bg_field[0]['uri']) . ')"';
    }

    // Detect 'chart' vs 'image' slider vs custom 'include'.
    $usetype = field_get_items('node', $node, 'sowp_chart_usetype');
    $variables['usetype'] = 'chart';

    if ($usetype[0]['value'] == 2) {
      $variables['usetype'] = 'image';
    }
    elseif ($usetype[0]['value'] == 3) {
      $variables['usetype'] = 'include';
    }

    // Get single image (if slider contains single image).
    $variables['single_image'] = FALSE;

    $slider_images = field_get_items('node', $node, 'sowp_chart_images');
    if (isset($slider_images[0]['uri']) && count($slider_images) < 2) {
      $variables['single_image'] = theme('image_style', array(
        'style_name' => 'sowp_chart_imgsingle',
        'path' => $slider_images[0]['uri'],
      ));
    }

    // Get include path.
    $variables['include'] = FALSE;
    $includef = field_get_items('node', $node, 'sowp_chart_include');
    if (isset($includef[0]['value'])) {
      $variables['include'] = DRUPAL_ROOT . '/' . trim($includef[0]['value']);
    }

    // Share links.
    $twitter_share = '';
    $twitter_hashtags = '';

    $twsh = field_get_items('node', $node, 'field_twitter_share');
    $twhashtags = field_get_items('node', $node, 'field_twitter_hashtags');

    if (isset($twsh[0]['value'])) {
      $twitter_share = $twsh[0]['value'];
    }
    if (isset($twhashtags[0]['value'])) {
      $twitter_hashtags = $twhashtags[0]['value'];
    }

    $variables['twitter_share'] = $twitter_share;
    $variables['twitter_hashtags'] = $twitter_hashtags;

    $variables['sowp_sharelinks'] = theme('sowp_sharelinks', array(
      'nid' => $node->nid,
      'title' => check_plain($node->title),
      'twitter_share' => $twitter_share,
      'twitter_hashtags' => $twitter_hashtags,
    ));
  }
}



/**
 * Preprocess variables for field.tpl.php.
 *
 * Added variables are used by SOWP field templates:
 * - field--sowp-story-imgs.tpl.php
 * - field--sowp-body-sideimgs.tpl.php
 * - field--sowp-body-sidevids.tpl.php
 * - field--sowp-body-download.tpl.php
 * - field--sowp-chart-charts.tpl.php
 * - field--sowp-chart-images.tpl.php.
 */
function sowp_preprocess_field(&$variables) {
  if (!isset($variables['element']['#field_name'])) {
    return;
  }

  $field_name = $variables['element']['#field_name'];

  /* --- Featured Story - Images --- */

  if ($field_name == 'sowp_story_imgs') {
    $story_imgs = array();

    foreach ($variables['items'] as $delta => $item) {
      // Image.
      $story_imgs[$delta]['img'] = theme('image_style', array(
        'style_name' => 'sowp_story_large',
        'path' => $item['#item']['uri'],
      ));

      // Caption.
      $story_imgs[$delta]['caption'] = FALSE;
      if (!empty($item['#item']['title'])) {
        $story_imgs[$delta]['caption'] = filter_xss_admin($item['#item']['title']);
      }
    }

    $variables['story_imgs'] = $story_imgs;
  }

  /* --- Regular Body - Side Images --- */

  elseif ($field_name == 'sowp_body_sideimgs') {
    $side_imgs = array();

    foreach ($variables['items'] as $delta => $item) {
      // Image.
      $side_imgs[$delta]['image'] = '';
      if (isset($item['#item']['uri'])) {
        $side_imgs[$delta]['image'] = theme('image_style', array(
          'style_name' => 'sowp_body_sideimg',
          'path' => $item['#item']['uri'],
        ));
      }

      // Caption.
      $side_imgs[$delta]['caption'] = FALSE;
      if (!empty($item['#item']['title'])) {
        $side_imgs[$delta]['caption'] = filter_xss_admin($item['#item']['title']);
      }
    }

    $variables['side_imgs'] = $side_imgs;
  }

  /* --- Regular Body - Side Videos --- */

  elseif ($field_name == 'sowp_body_sidevids') {
    $side_vids = array();

    foreach ($variables['items'] as $delta => $item) {
      // Video thumb.
      if (isset($item['#path']['path']) && isset($item['#item']['uri'])) {
        $video_url = $item['#path']['path'];

        $video_thumb = theme('image_style', array(
          'style_name' => 'sowp_body_sidevid',
          'path' => $item['#item']['uri'],
        ));

        $videothumb = theme('sowp_videothumb', array(
          'video_url' => $video_url,
          'video_thumb' => $video_thumb,
        ));
      }

      // Caption.
      $caption = FALSE;
      if (!empty($item['#suffix'])) {
        $caption = $item['#suffix'];
      }

      $side_vids[] = array(
        'videothumb' => $videothumb,
        'caption' => $caption,
      );
    }

    $variables['side_vids'] = $side_vids;
  }

  /* --- Regular Body - Pdf Download --- */

  elseif ($field_name == 'sowp_body_download') {
    $downloads = array();

    foreach ($variables['items'] as $delta => $item) {
      // Module path.
      $variables['icon_path'] = base_path() . drupal_get_path('module', 'sowp')
        . '/images/arr-down.svg';
      // Label.
      $label = $item['#file']->filename;
      if (isset($item['#file']->description)) {
        $label = check_plain($item['#file']->description);
      }

      // Url.
      $url = file_create_url($item['#file']->uri);

      $downloads[$delta] = array(
        'label' => $label,
        'url' => $url,
      );
    }

    $variables['downloads'] = $downloads;
  }

  /* --- Chart Nodes - Chart Images --- */

  elseif ($field_name == 'sowp_chart_images') {
    $chart_imgs = array();

    foreach ($variables['items'] as $delta => $item) {
      // Image.
      $image = '';
      if (isset($item['#item']['uri'])) {
        $image = theme('image_style', array(
          'style_name' => 'sowp_chart_imgslider',
          'path' => $item['#item']['uri'],
        ));
      }

      // Caption.
      $caption = FALSE;
      if (!empty($item['#item']['title'])) {
        $caption = filter_xss_admin($item['#item']['title']);
      }

      $chart_imgs[$delta] = array(
        'image' => $image,
        'caption' => $caption,
      );
    }

    $variables['chart_imgs'] = $chart_imgs;
  }
}



/**
 * Preprocess variables for chart charts field collection item entity template.
 *
 * Field-collection-item--sowp-chart-charts.tpl.php is an entity template
 * thus we are using template_preprocess_entity() hook.
 *
 * Added variables are used by SOWP field templates:
 * - field-collection-item--sowp-chart-charts.tpl.php.
 */
function sowp_preprocess_entity(&$variables, $hook) {
  if ($variables['entity_type'] == 'field_collection_item') {
    if ($variables['elements']['#bundle'] == 'sowp_chart_charts') {
      // Access entity item.
      $fcolitem = $variables['elements']['#entity'];

      // Get chart svg's.
      $svg_base_field = field_get_items('field_collection_item', $fcolitem, 'sowp_chart_svgbase');
      $svg_grid_field = field_get_items('field_collection_item', $fcolitem, 'sowp_chart_svggrids');
      $svg_bars_field = field_get_items('field_collection_item', $fcolitem, 'sowp_chart_svgbars');

      $variables['svg_base'] = file_create_url($svg_base_field[0]['uri']);
      $variables['svg_grid'] = file_create_url($svg_grid_field[0]['uri']);
      $variables['svg_bars'] = file_create_url($svg_bars_field[0]['uri']);

      // Small note.
      $smallnote_f = field_get_items('field_collection_item', $fcolitem, 'sowp_chart_smallnote');
      $variables['smallnote'] = FALSE;
      if (isset($smallnote_f[0]['value'])) {
        $variables['smallnote'] = check_plain($smallnote_f[0]['value']);
      }

      // Use sowp_normakup theme function for some fields, so they print without
      // extra HTML - just raw value w/o the need to override their tpl.php's.
      $variables['content']['sowp_chart_static']['#theme'] = 'sowp_nomarkup';
      $variables['content']['sowp_chart_xaxislabel']['#theme'] = 'sowp_nomarkup';
      $variables['content']['sowp_chart_smallnote']['#theme'] = 'sowp_nomarkup';
    }
  }
}



/**
 * Section introduction title and background.
 */
function theme_sowp_intro($variables) {
  $output = '';

  $class = '';
  if ($variables['type'] == 'regular') {
    $class = ' swp-intro-regular';
  }
  elseif ($variables['type'] == 'rich') {
    $class = ' swp-intro-rich';
  }

  $output .= '<div class="swp-intro">';
  $output .= '<div class="swp-intro-bg-wrap"><div class="swp-intro-bg"></div></div>';
  $output .= '<div class="swp-intro-content' . $class . '">';
  $output .= '<div class="swp-title">';
  $output .= '<div class="swp-title-inner">';

  // Regular title (like in most sections).
  if ($variables['type'] == 'regular') {
    $output .= '<h2>' . $variables['title'] . '</h2>';
    $output .= '<div class="swp-title-subtitle">';
    if ($variables['year'] == 2016) {
      $output .= '<span class="swp-title-sep">';
      $output .= '<span class="swp-line-piece piece-1 girl-color-1"></span>';
      $output .= '<span class="swp-line-piece piece-2 girl-color-2"></span>';
      $output .= '<span class="swp-line-piece piece-3 girl-color-3"></span>';
      $output .= '<span class="swp-line-piece piece-4 girl-color-4"></span>';
      $output .= '<span class="swp-line-piece piece-5 girl-color-5"></span>';
      $output .= '<span class="swp-line-piece piece-6 girl-color-6"></span>';
      $output .= '<span class="swp-line-piece piece-7 girl-color-7"></span>';
      $output .= '<span class="swp-line-piece piece-8 girl-color-8"></span>';
      $output .= '<span class="swp-line-piece piece-9 girl-color-9"></span>';
      $output .= '<span class="swp-line-piece piece-10 girl-color-10"></span>';
      $output .= '</span>';
    }
    else {
      $output .= '<span class="swp-title-sep color-bord"></span>';
    }
    $output .= '<h3 class="sb-font color-text">' . $variables['subtitle'] . '</h3>';
    if (!empty($variables['extra_markup'])) {
      $output .= $variables['extra_markup'];
    }
    $output .= '</div>';
  }

  // Rich title (cover section).
  if ($variables['type'] == 'rich') {
    $output .= '<div class="swp-intro-posbottom">';

    $output .= '<h2 class="sb-font">' . $variables['title'] . '</h2>';
    $output .= '<span class="t-sepline color-bg"></span>';
    $output .= '<h3 class="sb-font color-text">' . $variables['subtitle'] . '</h3>';

    if ($variables['logo']) {
      $output .= '<div class="swp-intro-logo unfpa-font">';
      $output .= '<div class="swp-title-logo">';
      $output .= '<img src="' . base_path() . drupal_get_path('module', 'sowp') . '/images/logo.svg" alt="" />';
      $output .= '<span>';
      if ($variables['year'] == 2015) {
        $output .= t('state of world population 2015');
      }
      elseif ($variables['year'] == 2016) {
        $output .= t('state of world population 2016');
      }
      $output .= '</span>';
      $output .= '</div>';
      $output .= '<span class="swp-continue"><span class="icon icon-go-down"></span></span>';
      $output .= '</div>';
    }

    $output .= '</div>';
  }

  $output .= '</div>';
  $output .= '</div>';
  $output .= '</div>';
  $output .= '</div>';

  return $output;
}



/**
 * Section introduction title and background.
 */
function theme_sowp_imagegrid($variables) {
  // Define all grid items.
  $language = isset($variables['language']) ? $variables['language'] : 'en';
  $items = array(
    array(
      'type' => 'img',
      'title' => 'Aditi',
      'img' => 'grid-aditi.jpg',
      'color' => '253, 184, 37',
      'wish' => t('To visit beautiful places in India and to visit America'),
    ),
    array(
      'type' => 'img',
      'title' => 'Daline',
      'img' => 'grid-daline.jpg',
      'color' => '239, 72, 62',
      'wish' => t('That my family be in peace and all&nbsp;together'),
    ),
    array(
      'type' => 'img',
      'title' => 'Hiba',
      'img' => 'grid-hiba.jpg',
      'color' => '236, 81, 157',
      'wish' => t('That my father could be with&nbsp;us'),
    ),
    array(
      'type' => 'img',
      'title' => 'Ingeborg',
      'img' => 'grid-ingeborg.jpg',
      'color' => '96, 195, 216',
      'wish' => t('To have a good and healthy&nbsp;life'),
    ),
    array(
      'type' => 'img',
      'title' => 'Tuong Anh',
      'img' => 'grid-tuonganh.jpg',
      'color' => '193, 215, 46',
      'wish' => t('I wish for a bicycle so that I can ride to school with my&nbsp;friends'),
    ),
    array(
      'type' => 'title',
      'title' => t('How our future depends on a girl at this decisive age'),
      'img' => 'grid-title-'. $language. '.png',
    ),
    array(
      'type' => 'img',
      'title' => 'Isabelle',
      'img' => 'grid-isabelle.jpg',
      'color' => '0, 167, 154',
      'wish' => t('To have peace in this&nbsp;world'),
    ),
    array(
      'type' => 'img',
      'title' => 'Temawelase',
      'img' => 'grid-temawelase.jpg',
      'color' => '168, 92, 164',
      'wish' => t('That I grow up to be a responsible&nbsp;person'),
    ),
    array(
      'type' => 'img',
      'title' => 'Samantha',
      'img' => 'grid-samantha.jpg',
      'color' => '0, 155, 76',
      'wish' => t('I would like to be a police&nbsp;officer'),
    ),
    array(
      'type' => 'img',
      'title' => 'Rosita',
      'img' => 'grid-rosita.jpg',
      'color' => '0, 143, 208',
      'wish' => t('That my family and I may travel to France or&nbsp;Germany'),
    ),
    array(
      'type' => 'img',
      'title' => 'Ortilia',
      'img' => 'grid-ortilia.jpg',
      'color' => '57, 83, 164',
      'wish' => t('To have my own&nbsp;bike!'),
    ),
  );

  $module_path = drupal_get_path('module', 'sowp');
  $imgs_path = '/' . $module_path . '/images/2016/';
  $title = t('How our future depends on a girl at this decisive age');
  $count = 1;

  $output = '<div class="swp-imagegrid">';

  $output .= '<div class="grid-title-mobile">';
  $output .= '<div class="grid-title-mobile-inner">';
  $output .= '<img src="' . $imgs_path . 'grid-title-mobile.png" alt="' . $title . '" />';
  $output .= '</div>';
  $output .= '</div>';

  $output .= '<div class="swp-imagegrid-inner">';
  $output .= '<div class="swp-imagegrid-inner-2">';
  foreach ($items as $item) {

    if ($item['type'] == 'img') {
      $style = 'border-color: rgba(' . $item['color'] . ', 0.95);';
      $style .= 'color: rgba(' . $item['color'] . ');';
      $style .= 'background: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 40%, rgba(' . $item['color'] . ', 0.8) 100%);';
      $style .= 'background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 40%, rgba(' . $item['color'] . ', 0.8) 100%);';
      $style .= 'background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 40%, rgba(' . $item['color'] . ', 0.8) 100%);';

      $style_2 = 'background: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 60%, rgba(0, 0, 0, 0.5) 100%);';
      $style_2 .= 'background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 60%, rgba(0, 0, 0, 0.5) 100%);';
      $style_2 .= 'background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 60%, rgba(0, 0, 0, 0.5) 100%);';

      $output .= '<button class="swp-grid-item item-' . $count . '">';
      $output .= '<div class="swp-grid-item-inner">';
      $output .= '<img src="' . $imgs_path . $item['img'] . '" alt="" />';
      $output .= '<div class="swp-grid-item-content" style="' . $style . '">';
      $output .= '<div class="swp-grid-item-content-inner" style="' . $style_2 . '">';
      $output .= '<h3 class="swp-grid-item-title wild-font" style="color: rgba(255, 255, 255, 0.8);">' . $item['title'] . '</h3>';
      $output .= '<span class="swp-grid-item-wish element-invisible" data-color="' . $item['color'] . '">' . $item['wish'] . '</span>';
      $output .= '</div>';
      $output .= '</div>';
      $output .= '</div>';
      $output .= '</button>';

      $count++;
    }

    elseif ($item['type'] == 'title') {
      $output .= '<div class="swp-grid-title">';
      $output .= '<div class="swp-grid-title-inner">';
      $output .= '<img class="swp-grid-title-img" src="' . $imgs_path . $item['img'] . '" alt="' . $item['title'] . '" />';
      $output .= '<div class="swp-grid-wish-preview">';
      $output .= '<div class="swp-grid-wish-preview-table">';
      $output .= '<div class="swp-grid-wish-preview-cell">';
      $output .= '<div class="swp-grid-wish-preview-content">';
      $output .= '</div>';
      $output .= '</div>';
      $output .= '</div>';
      $output .= '</div>';
      $output .= '</div>';
      $output .= '</div>';
    }

  }
  $output .= '</div>';
  $output .= '</div>';
  
  $output .= '<span class="swp-grid-continue color-text"><span class="icon icon-go-down"></span></span>';

  $output .= '</div>';

  return $output;
}



/**
 * Featured stories.
 */
function theme_sowp_stories($variables) {
  $output = '';

  $stories = sowp_embed_view('sowp_stories', 'default', array($variables['section_id']));

  if ($stories) {
    $output .= '<div class="swp-bg swp-stories">';
    $output .= '<div class="swp-width">';
    $output .= '<div class="swp-content">';

    $output .= '<h3 class="swp-upper color-text">' . t('Featured Stories') . '</h3>';

    $output .= $stories;
    $output .= '<span class="swp-clear">&nbsp;</span>';
    $output .= sowp_embed_view('sowp_stories', 'fullstories', array($variables['section_id']));

    $output .= '</div>';
    $output .= '<span class="swp-clear">&nbsp;</span>';
    $output .= '</div>';
    $output .= '</div>';
  }

  return $output;
}



/**
 * Create video thumb.
 */
function theme_sowp_videothumb($variables) {
  $video_url = sowp_get_video_embed_url($variables['video_url']);
  $video_thumb = $variables['video_thumb'];

  $output = '<a class="swp-video colorbox-load color-text" href="' . $video_url . '">';
  $output .= '<div class="swpvid-button-wrap">';
  $output .= '<span class="swpvid-button sb-font">';
  $output .= '<span class="icon-wrap"><span class="icon icon-arr-play"></span></span> ' . t('Play');
  $output .= '</span>';
  $output .= '</div>';
  $output .= $video_thumb;
  $output .= '</a>';

  return $output;
}



/**
 * Share links.
 */
function theme_sowp_sharelinks($variables) {
  $shareurl = urlencode(sowp_share_href($variables['nid']));
  $title = urlencode($variables['title']);
  $twitter_share = urlencode($variables['twitter_share']) == '' ? $title : urlencode($variables['twitter_share']);
  $twitter_hashtags = urlencode($variables['twitter_hashtags']);
  $rand = '&amp;rnd=' . rand(0, 9999);

  // Prepare sharing hrefs.
  $href_fb = 'https://www.facebook.com/sharer.php?u=' . $shareurl;
  $href_tw = 'https://twitter.com/share?url=' . $shareurl . '&amp;text=' . $twitter_share . '&amp;hashtags=' . $twitter_hashtags;
  $href_gp = 'https://plus.google.com/share?url=' . $shareurl;
  $href_ln = 'https://www.linkedin.com/cws/share?url=' . $shareurl . $rand . '&amp;mini=true';

  // Prepare shareing onclicks.
  $onclick_fb = "Drupal.sowp.sharePopup('" . $href_fb . "');";
  $onclick_tw = "Drupal.sowp.sharePopup('" . $href_tw . "');";
  $onclick_gp = "Drupal.sowp.sharePopup('" . $href_gp . "');";
  $onclick_ln = "Drupal.sowp.sharePopup('" . $href_ln . "');";

  // Build output.
  $output = '<div class="swp-share">';
  $output .= '<div class="swp-share-inner">';

  // Facebook.
  $output .=
    '<a class="swp-share-fb" href="' . $href_fb . '" ' . 'onclick="' . $onclick_fb . '" target="_blank">' .
    '<span class="icon icon-social-fb"></span></a>';

  // Twitter.
  $output .=
    '<a class="swp-share-tw" href="' . $href_tw . '" ' . 'onclick="' . $onclick_tw . '" target="_blank">' .
    '<span class="icon icon-social-tw"></span></a>';

  // Google Plus.
  $output .=
    '<a class="swp-share-gplus" href="' . $href_gp . '" ' . 'onclick="' . $onclick_gp . '" target="_blank">' .
    '<span class="icon icon-social-gplus"></span></a>';

  // LinkedIn.
  $output .=
    '<a class="swp-share-linkedin" href="' . $href_ln . '" ' . 'onclick="' . $onclick_ln . '" target="_blank">' .
    '<span class="icon icon-social-linkedin"></span></a>';

  // Debugging sharing features:
  // FB: https://developers.facebook.com/tools/debug/og/object/
  // TW: https://cards-dev.twitter.com/validator
  global $user;
  if ($user->uid == 1) {
    // Shows node nid that can be usefull if we want to reset sharer cache:
    /*$output .= '<a class="swp-share-debug sb-font" href="javascript:;">' . $variables['nid'] . '</a>';*/
  }
  $output .= '</div>';
  $output .= '</div>';

  return $output;
}



/**
 * Theme function for printing Venn Graph circle.
 */
function theme_sowp_circle($variables) {
  // Prepare additional class.
  $class = '';
  if ($variables['class']) {
    $class = ' ' . $variables['class'];
  }
  // Prepare styling and data-color.
  $style = '';
  $color = '';
  if ($variables['color']) {
    $style = ' style="background-color: rgba(' . $variables['color'] . ', 0.38);"';
    $color = ' data-color="' . $variables['color'] . '"';
  }
  // Prepare data-info.
  $txt = str_replace(array('&', '"'), array('&amp;', '&quot'), $variables['info']);
  $info = ' data-info="' . $txt . '"';

  // Prepare data-icon.
  $icon = ' data-icon="' . drupal_html_class($variables['icon']) . '"';

  $output = '<div class="swp-circle' . $class . '"' . $style . $color . $info . $icon . '>';
  $output .= '<div class="circle-content">';
  $output .= '<div class="circle-tb">';
  $output .= '<div class="circle-cl b-font">';
  $output .= '<span class="circle-text">' . $variables['label'] . '</span>';
  $output .= '</div>';
  $output .= '</div>';
  $output .= '</div>';
  $output .= '</div>';

  return $output;
}



/**
 * Report download buttons.
 */
function theme_sowp_download_buttons($variables) {
  $langs = array(
    'en' => t('English'),
    'fr' => t('French'),
    'es' => t('Spanish'),
    'ru' => t('Russian'),
    'ar' => t('Arabic'),
  );

  $variable_suffix = '';
  if ($variables['year'] == 2016) {
    $variable_suffix = '_2016';
  }

  // Prepare array of <ul> items, where each item is a link to download report.
  $reports = array();
  foreach ($langs as $lang => $label) {
    $fid = variable_get('sowp_reportfile_' . $lang . $variable_suffix, '');
    if (!empty($fid) && $file = file_load($fid)) {
      $reports[] = l($label, file_create_url($file->uri), array(
        'attributes' => array(
          'class' => array('color-bg', 'b-font'),
          'target' => '_blank',
        ),
      ));
    }
  }

  // Prepare <ul> items, where each item is a link to download highlight.
  $highlights = array();
  foreach ($langs as $lang => $label) {
    $fid = variable_get('sowp_highlights_' . $lang . $variable_suffix, '');
    if (!empty($fid) && $file = file_load($fid)) {
      $highlights[] = l($label, file_create_url($file->uri), array(
        'attributes' => array(
          'class' => array('color-bg', 'b-font'),
          'target' => '_blank',
        ),
      ));
    }
  }

  /* Build output. */

  $output = '<div class="swp-downloads">';
  $output .= '<h3 class="color-text">' . t('Download Report') . '</h3>';
  $output .= theme('item_list', array('items' => $reports));

  /* $output .= '<h3 class="color-text">' . t('Download Higlights Summary') . '</h3>'; */
  /* $output .= theme('item_list', array('items' => $highlights)); */
  $output .= '</div>';

  return $output;
}



/**
 * No Markup theme function used by fields.
 */
function theme_sowp_nomarkup($variables) {
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



/**
 * Override of theme_video_filter_iframe().
 */
function theme_video_filter_iframe_override($variables) {
  $video = $variables['video'];

  $classes = video_filter_get_classes($video);

  $output = '<div class="inline-video ' . implode(' ', $classes) . '">';
  $output .= '<iframe src="' . $video['source'] . '" frameborder="0"></iframe>';
  $output .= '</div>';

  return $output;
}



/**
 * Override of theme_video_filter_flash().
 */
function theme_video_filter_flash_override($variables) {
  $video = $variables['video'];
  $params = isset($variables['params']) ? $variables['params'] : array();

  $classes = video_filter_get_classes($video);

  $output = '<div class="inline-video ' . implode(' ', $classes) . '">';
  $output .= '<object class="' . implode(' ', $classes) . '" type="application/x-shockwave-flash" ';
  $output .= 'data="' . $video['source'] . '">' . "\n";

  $defaults = array(
    'movie' => $video['source'],
    'wmode' => 'transparent',
    'allowFullScreen' => 'true',
  );

  $params = array_merge($defaults, (is_array($params) && count($params)) ? $params : array());

  foreach ($params as $name => $value) {
    $output .= '  <param name="' . $name . '" value="' . $value . '" />' . "\n";
  }

  $output .= '</object></div>' . "\n";

  return $output;
}
