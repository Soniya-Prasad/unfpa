<?php
/**
 * @file
 * The template used for the Jobs Map
 */
?>

<div id="unfpa_worldwide" class="module">
  <div class="wrapper">
    <h1><?php print t('UNFPA Worldwide Jobs'); ?></h1>

    <!-- UNFPA map -->
    <div class="map-wrapper">
      <?php print $map_image; ?>
      <?php
      if (!empty($jobs['all'])) {
        //All Jobs
        foreach ($jobs['all'] as $pid => $t_arr) {
          $st_top = $t_arr[0]['top'] + 2;
          $st_left = $t_arr[0]['left'] - 31;
          $lat = $t_arr[0]['lat'];
          $lng = $t_arr[0]['lng'];
          $country = $t_arr[0]['country'];
          ?>
          <div class="map_item jobs" data-ctop="<?php echo $lat; ?>" data-cleft="<?php echo $lng; ?>">
            <a class="pin job" href="#">Pin</a>
            <div class="quick-info"><?php echo $country; ?></div>
            <div class="info">
              <hgroup>
                <?php
                foreach ($t_arr as $key => $val) {
                  $st_title = $val['title'];
                  $st_link = $val['node_link'];
                  ?>
                  <h3><a href="<?php echo $st_link; ?>" title="<?php echo addslashes($st_title); ?>"><?php echo $st_title; ?></a></h3>
                <?php } ?>
              </hgroup>
              <a class="close" href="#">Close</a>
              <span class="arrow"></span>
            </div>
          </div>
          <?php
        }
      }
      ?>
    </div>
  </div>
</div>
