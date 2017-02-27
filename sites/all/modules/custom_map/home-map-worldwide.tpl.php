<?php
/**
 * @file
 * Custom template used on home page map.
 */
global $base_url;

function get_summary($str, $limit = 100, $strip = false) {
  $str = ($strip == true) ? strip_tags($str) : $str;
  if (strlen($str) > $limit) {
    $str = substr($str, 0, $limit - 3);
    return (substr($str, 0, strrpos($str, ' ')) . '...');
  }
  return trim($str);
}
?>

<!-- unfpa_worldwide-->
<div id="unfpa_worldwide" class="module">
  <div class="wrapper">
    <h1>News from the field &amp; UNFPA offices</h1>

    <div class="selector">
      <span class="selected">Stories from the field</span><?php
      $volcab = taxonomy_vocabulary_machine_name_load('thematic_area');
      $tree = taxonomy_get_tree($volcab->vid, 0, 1);
      $output = '<ul class="list topics">';
      $output .= '<li><a class="bg topics" href="topics">All Topics</a></li>';
      foreach ($tree as $term) {
        $output .= '<li><a href="topic_' . $term->tid . '">' . t($term->name) . '</a></li>';
      }
      $output .= '</ul>';
      echo $output;
      ?>
    </div>

    <div class="selector" style="left: auto; right: 0">
      <span class="selected">Show UNFPA offices</span><?php
      $volcab = taxonomy_vocabulary_machine_name_load('offices_taxonomy');
      $tree = taxonomy_get_tree($volcab->vid, 0, 1);
      $output = '<ul class="list offices">';
      $output .= '<li><a class="" href="offices">All offices</a></li>';
      foreach ($tree as $term) {
        $class_name = '';
        $filter_name = '';
        $update_term_name = $term->name;
        switch ($term->name) {
          case 'Headquarter Offices':
            $class_name = 'head';
            $filter_name = 'head_liaison';
            $update_term_name = 'Headquarter and Liaison Offices';
            break;

          case 'Liaison Offices':
            $class_name = 'liaison';
            $filter_name = 'head_liaison';
            break;

          case 'Regional Offices':
            $class_name = 'regional';
            $filter_name = 'regional';
            break;

          case 'Sub-Regional Offices':
            $class_name = 'sub-regional';
            $filter_name = 'sub-regional';
            break;

          case 'Country Offices':
            $update_term_name = "Field Offices";
            $class_name = 'country';
            $filter_name = 'country';
            break;
        }
        if ($update_term_name != 'Liaison Offices') {
          $output .= '<li><a class="bg ' . $class_name . '" href="office_' . $filter_name . '">' . t($update_term_name) . '</a></li>';
        }
      }
      $output .= '</ul>';
      echo $output;
      ?>
    </div>

    <div class="map-legend">
      <ul class="last">
        <li class="stories"><?php print t('Stories from the field') ?></li>
        <li class="liaison-offices"><?php print t('HQ and Liaison Offices') ?></li>
        <li class="regional-offices"><?php print t('Regional Offices') ?></li>
        <li class="sub-regional-offices"><?php print t('Sub-Regional Offices') ?></li>
        <li class="country-offices"><?php print t('Field Offices') ?></li>
      </ul>
    </div>

    <!-- UNFPA map -->
    <div class="map-wrapper">
      <?php print $map_image; ?>
      <!-- topics -->
      <?php
      if (!empty($stories)) {
        //Taxonomy News
        foreach ($stories as $pid => $st_arr) {
          if (is_numeric($pid)) {
            foreach ($st_arr as $cid => $arr) {
              $st_title = $arr[0]['title'];
              $st_short_title = $arr[0]['short_title'];
              $st_image = $arr[0]['image'];
              $st_link = $arr[0]['node_link'];
              $st_top = $arr[0]['top'] + 2;
              $st_left = $arr[0]['left'] - 31;
              $lat = $arr[0]['lat'];
              $lng = $arr[0]['lng'];
              $news_type = $arr[0]['news_type'];
              ?>
              <div class="map_item <?php echo "topic_" . $pid; ?>" data-ctop="<?php echo $lat; ?>" data-cleft="<?php echo $lng; ?>">
                <a class="pin topics" href="#">Pin</a>

                <div class="info">
                  <hgroup>
                    <h2><?php echo $news_type; ?></h2>
                    <h3><a href="<?php echo $st_link; ?>" title="<?php echo addslashes($st_title); ?>"><?php echo!empty($st_short_title) ? $st_short_title : $st_title; ?></a></h3>
                    <?php
                    if ($st_image != ''):
                      $image_file_path = image_style_url('news_map', $st_image);
                      ?>
                      <a href="<?php echo $st_link; ?>" title="<?php echo addslashes($st_title); ?>"><img src="<?php echo file_create_url($image_file_path); ?>" alt="<?php echo $st_title; ?>" title="<?php echo $st_title; ?>" /></a>
                    <?php endif; ?>
                  </hgroup>
                  <a class="close" href="#">Close</a>
                  <span class="arrow"></span>          </div>

              </div>
              <?php
            } //End For Inner Loop
          } // End IF
        }
        //All News
        foreach ($stories['all'] as $pid => $t_arr) {
          $st_title = $t_arr[0]['title'];
          $st_short_title = $t_arr[0]['short_title'];
          $st_image = $t_arr[0]['image'];
          $st_link = $t_arr[0]['node_link'];
          $st_top = $t_arr[0]['top'] + 2;
          $st_left = $t_arr[0]['left'] - 31;
          $lat = $t_arr[0]['lat'];
          $lng = $t_arr[0]['lng'];
          $news_type = $t_arr[0]['news_type'];
          $country = $t_arr[0]['country'];
          ?>
          <div class="map_item topics" data-ctop="<?php echo $lat; ?>" data-cleft="<?php echo $lng; ?>">
            <a class="pin topics" href="#">Pin</a>
            <div class="quick-info"><?php echo $country; ?></div>
            <div class="info">
              <hgroup>
                <h2><?php echo $news_type; ?></h2>
                <h3><a href="<?php echo $st_link; ?>" title="<?php echo addslashes($st_title); ?>"><?php echo!empty($st_short_title) ? $st_short_title : $st_title; ?></a></h3>
                <?php
                if ($st_image != ''):
                  $image_file_path = image_style_url('news_map', $st_image);
                  ?>
                  <a href="<?php echo $st_link; ?>" title="<?php echo addslashes($st_title); ?>"><img src="<?php echo file_create_url($image_file_path); ?>" alt="<?php echo $st_title; ?>" title="<?php echo $st_title; ?>" /></a>
                <?php endif; ?>
              </hgroup>
              <a class="close" href="#">Close</a>
              <span class="arrow"></span>          </div>

          </div>
          <?php
        }
      }
      ?>
      <!-- /topics -->

      <!-- Offices Container -->
      <?php
      if (!empty($locations)) {
        foreach ($locations as $tid => $off_arr) {
          foreach ($off_arr as $key => $offices) {
            $top = $offices['top'] + 2;     //90
            $left = $offices['left'] - 31;   //32
            $lat = $offices['lat'];
            $lng = $offices['lng'];
            ?>
            <div class="map_item offices office_<?php echo $offices['filter_name']; ?>" data-ctop="<?php echo $lat; ?>" data-cleft="<?php echo $lng; ?>">
              <a class="pin <?php echo $offices['class_name']; ?>" href="#">Pin</a>
              <div class="quick-info"><?php echo $offices['title']; ?></div>
              <div class="info">
                <?php
                if ($offices['class_name'] == 'regional') {
                  ?>
                  <hgroup>
                    <h2><?php echo $offices['region']; ?></h2>
                  </hgroup>
                  <?php
                }
                else {
                  ?>
                  <hgroup>
                    <h2><?php echo $offices['title']; ?></h2>
                  </hgroup>

                <?php } if (!empty($offices['regional_office_url'])) { ?>
                  <div><b>Regional Office Website:</b><br /><a target="_blank" href="<?php echo $offices['regional_office_url']; ?>"><?php echo $offices['region']; ?></a></div>
                <?php } ?>
                <?php
                if ($offices['class_name'] != 'regional') {
                  if (!empty($offices['open_data_portal_url'])) {
                    ?>
                    <div><a target="_blank" href="<?php echo $offices['open_data_portal_url']; ?>"><b>Open Data Portal</b></a></div>
                    <?php
                  }
                  ?>

                  <?php if (!empty($offices['country_office_url'])) { ?>
                    <div><a target="_blank" href="<?php echo $offices['country_office_url']; ?>"><b>Field Office Website</b></a></div>
                    <?php
                  }
                }
                ?>

                <?php
                if (!empty($offices['liaison_office_name'])) {
                  ?>
                  <div><b>Liaison Office Website:</b><br />
                    <?php if (!empty($offices['liaison_office_url'])) { ?>
                      <a target="_blank" href="<?php echo $offices['liaison_office_url']; ?>"><?php echo $offices['liaison_office_name']; ?></a>
                      <?php
                    }
                    else {
                      echo $offices['liaison_office_name'];
                    }
                    ?>
                  </div>
                  <?php
                }
                ?>
                <?php
                if (!empty($offices['sub_regional_office_name'])) {
                  ?>
                  <div><b>Sub-Regional Office Website:</b><br />
                    <?php if (!empty($offices['sub_regional_office_url'])) { ?>
                      <a target="_blank" href="<?php echo $offices['sub_regional_office_url']; ?>"><?php echo $offices['sub_regional_office_name']; ?></a>
                      <?php
                    }
                    else {
                      echo $offices['sub_regional_office_name'];
                    }
                    ?>
                  </div>
                  <?php
                }
                ?>
                <a class="close" href="#">Close</a>
                <span class="arrow"></span>          </div>
            </div>
            <?php
          }
        }
      }
      ?>
      <!-- /Offices Container -->
    </div>
  </div>
</div>
<!-- . unfpa_worldwide-->