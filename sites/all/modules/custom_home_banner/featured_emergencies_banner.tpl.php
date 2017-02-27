<?php
/**
 * @file
 * The custom template used to theme a featured banner section on emergencies page.
 *
 */
global $base_url;
?>
<!--featured content-->
<div id="featured_content_vertical" class="module clearfix">
  <div class="carousel">
    <a href="javascript:;" class="mobile-arrow left"><</a>
    <div class="show">
      <!--  <img src="assets/images/featured_banner.png" class="image"/>
       <div class="text" >
         <h3>Countdown of the Last 1,000 Days to Achieve the Millennium Development Goals in 2015</h3>
         <span>1000 days to build momentum</span>
       </div> -->
    </div>
    <div class="hide"></div>
    <a href="javascript:;" class="mobile-arrow right">></a>
    <div class="thumbs">
      <a href="javascript:;" class="arrow left"><</a>
      <div class="itens"  id="viewport">
        <?php
        $feature_flag = '';
        ?>
        <ul class="flow <?php echo $feature_flag; ?>">
          <?php
          foreach ($data as $sub_key => $bod_list) {

            if ($bod_list['field_field_feature_banner_image_uri'] != "") {
              $image_thumbnail = image_style_url('banner_home_large', $bod_list['field_field_feature_banner_image_uri']);
              $image_small_thumbnail = image_style_url('banner_home_small', $bod_list['field_field_feature_banner_image_uri']);
            }
            else {
              $image_thumbnail = $base_url . "/" . drupal_get_path('theme', variable_get('theme_default', NULL)) . "/images/noimage_banner.png";
              $image_small_thumbnail = $base_url . "/" . drupal_get_path('theme', variable_get('theme_default', NULL)) . "/images/noimage_banner.png";
            }
            ?>

            <li>
              <?php
              $link_to_node = drupal_get_path_alias('node/' . $bod_list["nid"]);
              $feature_img_title = $bod_list["field_field_feature_title"];
              ?>
              <a href="javascript:;">
                <img src="<?php echo $image_small_thumbnail; ?>" alt="<?php echo $feature_img_title; ?>" title="<?php echo $feature_img_title; ?>" />
              </a>
              <div class="text" >
                <h3><a href="<?php echo $link_to_node; ?>"><?php echo $bod_list["field_field_feature_title"]; ?></a></h3>
                <span><a href="<?php echo $link_to_node; ?>"><?php echo $bod_list["field_field_feature_short_text"]; ?></a></span>
              </div>
              <div class="bigslide" style="display:none;">
                <a href="<?php echo $link_to_node; ?>" title="<?php echo $feature_img_title; ?>">
                  <img src="<?php echo $image_thumbnail; ?>" alt="<?php echo $feature_img_title; ?>" title="<?php echo $feature_img_title; ?>" />
                </a>
                <div class="text">
                  <h3><a href="<?php echo $link_to_node; ?>"><?php echo $bod_list["field_field_feature_title"]; ?></a></h3>
                  <span><a href="<?php echo $link_to_node; ?>"><?php echo $bod_list["field_field_feature_short_text"]; ?></a></span>
                </div>
              </div>
            </li>
            <?php
          }
          ?>

        </ul>
        <div class="clearfix"></div>
      </div>
      <a href="javascript:;" class="arrow right">></a>
      <div class="clearfix"></div>

      <div class="bullets">
        <ul>
          <!--     <li><a href="javascript:;">o</a></li>
              <li class="current"><a href="javascript:;">o</a></li>
              <li><a href="javascript:;">o</a></li>
              <li><a href="javascript:;">o</a></li> -->
        </ul>
      </div>

    </div>
  </div>
</div>
<!--.featured content-->