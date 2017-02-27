<?php
$p = base_path() . drupal_get_path('module', 'sowp') . '/';
?>

<div class="swp-bubblemap">
    <h3 class="color-text sb-font swp-upper"><?php print $title; ?></h3>

    <div class="swp-bubblemap-main">
        <div id="map3"></div>
    </div>

    <div class="bubblemap-copy">
        <h4 class="color-text"><?php print t('Sierra Leone'); ?></h4>
        <p>An estimated 123,000 women were pregnant in Ebola-affected Sierra Leone in 2015.</p>
        <h4 class="color-text"><?php print t('Nepal'); ?></h4>
        <p>UNFPA estimated that there were approximately 126,000 pregnant women at the time of the April earthquake, including 21,000 of whom would need obstetric care in the coming months.</p>
        <h4 class="color-text"><?php print t('Philippines'); ?></h4>
        <p>An estimated 250,000 women were pregnant when Typhoon Haiyan hit in November 2013 and approximately 70,000 were due in the first quarter of 2014.</p>
        <h4 class="color-text"><?php print t('Vanuatu'); ?></h4>
        <p>At the time of Tropical Cyclone Pam (2015), there were an estimated 8,500 pregnant and lactating women in the affected provinces.</p>
    </div>

    <?php print theme('sowp_sharelinks', array('nid' => $node->nid, 'title' => $title, 'twitter_share' => $twitter_share, 'twitter_hashtags' => $twitter_hashtags)); ?>
</div>

<script>
  //simplemaps_worldmap_mapinfo.calibrate.ratio=1.76923;//width to height of viewport
  //simplemaps_worldmap_mapinfo.calibrate.width=1800;//width of viewport
  //simplemaps_worldmap_mapinfo.calibrate.y_adjust=0;//adjust default viewport along y-axis
  //simplemaps_worldmap_mapinfo.calibrate.x_adjust=0;//adjust default viewport along x-axis

  simplemaps_worldmap_mapinfo.calibrate.ratio = 2.11;
  simplemaps_worldmap_mapinfo.calibrate.y_adjust = -130;

  var simplemaps_worldmap_mapdata = {
      main_settings: {
          div: 'map3', //Unique Map Div Id

          //Genreal settings
          auto_load: 'no',
          width: 'responsive', //px value or 'responsive'
          pop_ups: 'detect', //on_click, on_hover, or detect
          back_image: 'no', //Use image instead of arrow for back zoom
          url_new_tab: 'no',
          images_directory: Drupal.settings.sowp.modulePath + '/chartincludes/bubblemaps/images/',
          link_text: Drupal.t('(Link)'), //Text mobile browsers will see for links

          //General colors and styles
          background_color: '#fff',
          background_transparent: 'yes',
          border_color: '#4e4c4d',
          border_size: 1,
          arrow_color: '#4dcd50',
          arrow_color_border: 'none',
          state_color: '#a1a2a4',
          state_hover_color: '#a1a2a4',
          region_opacity: 1,
          region_hover_opacity: 0.9,
          fade_time: 0.2, //hover/unhover color change time

          //Popup
          popup_color: '#fff',
          popup_opacity: 1,
          popup_shadow: 0,
          popup_corners: 3,
          popup_font: '13px/1.5 unfpatext, Arial, Helvetica, sans-serif',
          popup_nocss: 'no', //use your own css

          //Labels
          label_color: '#d5ddec',
          label_hover_color: '#d5ddec',
          label_size: 22,
          label_font: 'Arial',
          hide_labels: 'no',
          //Zoom
          zoom: 'no', //use default regions
          initial_zoom: -1, //-1 is zoomed out, 0 is for the first continent etc
          initial_zoom_solo: 'no', //hide adjacent states when starting map zoomed in
          initial_back: 'no', //show back button when zoomed out and do this JavaScript upon click
          zoom_out_incrementally: 'yes', //if no, map will zoom all the way out on click
          zoom_percentage: .99,
          zoom_time: .5, //time to zoom between regions in seconds
          adjacent_opacity: .3, //opacity of adjacent states when zoomed in on a state or region

          //State defaults
          state_description: '',
          state_url: '',
          all_states_inactive: 'yes',
          /*all_states_zoomable: 'yes',*/

          //Location defaults
          location_description: '',
          location_color: '#f7941e',
          location_opacity: 1,
          location_hover_opacity: 1,
          location_url: '',
          location_size: 125,
          location_type: 'image', // circle, square, image
          location_image_source: 'marker.png', //name of image in the map_images folder
          location_border_color: 'none',
          location_border: 0,
          location_hover_border: 0,
          all_locations_inactive: 'no',
          all_locations_hidden: 'no'
      },
      state_specific: {
          AF: {
              name: Drupal.t('Afghanistan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AO: {
              name: Drupal.t('Angola'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AL: {
              name: Drupal.t('Albania'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AE: {
              name: Drupal.t('United Arab Emirates'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AR: {
              name: Drupal.t('Argentina'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AM: {
              name: Drupal.t('Armenia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AU: {
              name: Drupal.t('Australia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AT: {
              name: Drupal.t('Austria'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AZ: {
              name: Drupal.t('Azerbaijan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BI: {
              name: Drupal.t('Burundi'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BE: {
              name: Drupal.t('Belgium'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BJ: {
              name: Drupal.t('Benin'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BF: {
              name: Drupal.t('Burkina Faso'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BD: {
              name: Drupal.t('Bangladesh'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BG: {
              name: Drupal.t('Bulgaria'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BA: {
              name: Drupal.t('Bosnia and Herzegovina'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BY: {
              name: Drupal.t('Belarus'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BZ: {
              name: Drupal.t('Belize'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BO: {
              name: Drupal.t('Bolivia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BR: {
              name: Drupal.t('Brazil'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BN: {
              name: Drupal.t('Brunei Darussalam'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BT: {
              name: Drupal.t('Bhutan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BW: {
              name: Drupal.t('Botswana'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CF: {
              name: Drupal.t('Central African Republic'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CA: {
              name: Drupal.t('Canada'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CH: {
              name: Drupal.t('Switzerland'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CL: {
              name: Drupal.t('Chile'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CN: {
              name: Drupal.t('China'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CI: {
              name: Drupal.t('Ivory Coast'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CM: {
              name: Drupal.t('Cameroon'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CD: {
              name: Drupal.t('Democratic Republic of the Congo'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CG: {
              name: Drupal.t('Republic of Congo'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CO: {
              name: Drupal.t('Colombia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CR: {
              name: Drupal.t('Costa Rica'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CU: {
              name: Drupal.t('Cuba'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CZ: {
              name: Drupal.t('Czech Republic'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          DE: {
              name: Drupal.t('Germany'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          DJ: {
              name: Drupal.t('Djibouti'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          DK: {
              name: Drupal.t('Denmark'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          DO: {
              name: Drupal.t('Dominican Republic'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          DZ: {
              name: Drupal.t('Algeria'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          EC: {
              name: Drupal.t('Ecuador'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          EG: {
              name: Drupal.t('Egypt'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          ER: {
              name: Drupal.t('Eritrea'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          EE: {
              name: Drupal.t('Estonia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          ET: {
              name: Drupal.t('Ethiopia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          FI: {
              name: Drupal.t('Finland'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          FJ: {
              name: Drupal.t('Fiji'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GA: {
              name: Drupal.t('Gabon'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GB: {
              name: Drupal.t('United Kingdom'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GE: {
              name: Drupal.t('Georgia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GH: {
              name: Drupal.t('Ghana'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GN: {
              name: Drupal.t('Guinea'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GM: {
              name: Drupal.t('The Gambia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GW: {
              name: Drupal.t('Guinea-Bissau'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GQ: {
              name: Drupal.t('Equatorial Guinea'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GR: {
              name: Drupal.t('Greece'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GL: {
              name: Drupal.t('Greenland'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GT: {
              name: Drupal.t('Guatemala'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GY: {
              name: Drupal.t('Guyana'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          HN: {
              name: Drupal.t('Honduras'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          HR: {
              name: Drupal.t('Croatia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          HT: {
              name: Drupal.t('Haiti'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          HU: {
              name: Drupal.t('Hungary'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          ID: {
              name: Drupal.t('Indonesia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          IN: {
              name: Drupal.t('India'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          IE: {
              name: Drupal.t('Ireland'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          IR: {
              name: Drupal.t('Iran'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          IQ: {
              name: Drupal.t('Iraq'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          IS: {
              name: Drupal.t('Iceland'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          IL: {
              name: Drupal.t('Israel'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          IT: {
              name: Drupal.t('Italy'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          JM: {
              name: Drupal.t('Jamaica'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          JO: {
              name: Drupal.t('Jordan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          JP: {
              name: Drupal.t('Japan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          KZ: {
              name: Drupal.t('Kazakhstan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          KE: {
              name: Drupal.t('Kenya'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          KG: {
              name: Drupal.t('Kyrgyzstan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          KH: {
              name: Drupal.t('Cambodia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          KR: {
              name: Drupal.t('Republic of Korea'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          XK: {
              name: Drupal.t('Kosovo'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          KW: {
              name: Drupal.t('Kuwait'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          LA: {
              name: Drupal.t('Lao PDR'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          LB: {
              name: Drupal.t('Lebanon'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          LR: {
              name: Drupal.t('Liberia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          LY: {
              name: Drupal.t('Libya'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          LK: {
              name: Drupal.t('Sri Lanka'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          LS: {
              name: Drupal.t('Lesotho'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          LT: {
              name: Drupal.t('Lithuania'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          LU: {
              name: Drupal.t('Luxembourg'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          LV: {
              name: Drupal.t('Latvia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MA: {
              name: Drupal.t('Morocco'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MD: {
              name: Drupal.t('Moldova'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MG: {
              name: Drupal.t('Madagascar'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MX: {
              name: Drupal.t('Mexico'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MK: {
              name: Drupal.t('Macedonia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          ML: {
              name: Drupal.t('Mali'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MM: {
              name: Drupal.t('Myanmar'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          ME: {
              name: Drupal.t('Montenegro'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MN: {
              name: Drupal.t('Mongolia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MZ: {
              name: Drupal.t('Mozambique'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MR: {
              name: Drupal.t('Mauritania'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MW: {
              name: Drupal.t('Malawi'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MY: {
              name: Drupal.t('Malaysia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          NA: {
              name: Drupal.t('Namibia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          NE: {
              name: Drupal.t('Niger'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          NG: {
              name: Drupal.t('Nigeria'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          NI: {
              name: Drupal.t('Nicaragua'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          NL: {
              name: Drupal.t('Netherlands'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          NO: {
              name: Drupal.t('Norway'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          NP: {
              name: Drupal.t('Nepal'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          NZ: {
              name: Drupal.t('New Zealand'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          OM: {
              name: Drupal.t('Oman'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PK: {
              name: Drupal.t('Pakistan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PA: {
              name: Drupal.t('Panama'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PE: {
              name: Drupal.t('Peru'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PH: {
              name: Drupal.t('Philippines'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PG: {
              name: Drupal.t('Papua New Guinea'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PL: {
              name: Drupal.t('Poland'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          KP: {
              name: Drupal.t('Democratic Republic of Korea'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PT: {
              name: Drupal.t('Portugal'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PY: {
              name: Drupal.t('Paraguay'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PS: {
              name: Drupal.t('Palestine'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          QA: {
              name: Drupal.t('Qatar'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          RO: {
              name: Drupal.t('Romania'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          RU: {
              name: Drupal.t('Russia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          RW: {
              name: Drupal.t('Rwanda'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          EH: {
              name: Drupal.t('Western Sahara'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SA: {
              name: Drupal.t('Saudi Arabia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SD: {
              name: Drupal.t('Sudan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SS: {
              name: Drupal.t('South Sudan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SN: {
              name: Drupal.t('Senegal'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SL: {
              name: Drupal.t('Sierra Leone'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SV: {
              name: Drupal.t('El Salvador'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          RS: {
              name: Drupal.t('Serbia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SR: {
              name: Drupal.t('Suriname'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SK: {
              name: Drupal.t('Slovakia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SI: {
              name: Drupal.t('Slovenia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SE: {
              name: Drupal.t('Sweden'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SZ: {
              name: Drupal.t('Swaziland'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SY: {
              name: Drupal.t('Syria'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TD: {
              name: Drupal.t('Chad'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TG: {
              name: Drupal.t('Togo'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TH: {
              name: Drupal.t('Thailand'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TJ: {
              name: Drupal.t('Tajikistan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TM: {
              name: Drupal.t('Turkmenistan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TL: {
              name: Drupal.t('Timor-Leste'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TN: {
              name: Drupal.t('Tunisia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TR: {
              name: Drupal.t('Turkey'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TW: {
              name: Drupal.t('Taiwan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TZ: {
              name: Drupal.t('Tanzania'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          UG: {
              name: Drupal.t('Uganda'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          UA: {
              name: Drupal.t('Ukraine'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          UY: {
              name: Drupal.t('Uruguay'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          US: {
              name: Drupal.t('United States'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          UZ: {
              name: Drupal.t('Uzbekistan'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          VE: {
              name: Drupal.t('Venezuela'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          VN: {
              name: Drupal.t('Vietnam'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          VU: {
              name: Drupal.t('Vanuatu'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          YE: {
              name: Drupal.t('Yemen'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          ZA: {
              name: Drupal.t('South Africa'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          ZM: {
              name: Drupal.t('Zambia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          ZW: {
              name: Drupal.t('Zimbabwe'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SO: {
              name: Drupal.t('Somalia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GF: {
              name: Drupal.t('France'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          FR: {
              name: Drupal.t('France'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          ES: {
              name: Drupal.t('Spain'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AW: {
              name: Drupal.t('Aruba'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AI: {
              name: Drupal.t('Anguilla'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AD: {
              name: Drupal.t('Andorra'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AG: {
              name: Drupal.t('Antigua and Barbuda'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BS: {
              name: Drupal.t('Bahamas'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BM: {
              name: Drupal.t('Bermuda'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BB: {
              name: Drupal.t('Barbados'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          KM: {
              name: Drupal.t('Comoros'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CV: {
              name: Drupal.t('Cabo Verde'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          KY: {
              name: Drupal.t('Cayman Islands'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          DM: {
              name: Drupal.t('Dominica'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          FK: {
              name: Drupal.t('Falkland Islands'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          FO: {
              name: Drupal.t('Faeroe Islands'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GD: {
              name: Drupal.t('Grenada'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          HK: {
              name: Drupal.t('Hong Kong'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          KN: {
              name: Drupal.t('Saint Kitts and Nevis'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          LC: {
              name: Drupal.t('Saint Lucia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          LI: {
              name: Drupal.t('Liechtenstein'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MF: {
              name: Drupal.t('Saint Martin (French)'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MV: {
              name: Drupal.t('Maldives'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MT: {
              name: Drupal.t('Malta'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MS: {
              name: Drupal.t('Montserrat'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MU: {
              name: Drupal.t('Mauritius'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          NC: {
              name: Drupal.t('New Caledonia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          NR: {
              name: Drupal.t('Nauru'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PN: {
              name: Drupal.t('Pitcairn Islands'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PR: {
              name: Drupal.t('Puerto Rico'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PF: {
              name: Drupal.t('French Polynesia'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SG: {
              name: Drupal.t('Singapore'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SB: {
              name: Drupal.t('Solomon Islands'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          ST: {
              name: Drupal.t('Sao Tom and Principe'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SX: {
              name: Drupal.t('Saint Martin (Dutch)'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SC: {
              name: Drupal.t('Seychelles'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TC: {
              name: Drupal.t('Turks and Caicos Islands'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TO: {
              name: Drupal.t('Tonga'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TT: {
              name: Drupal.t('Trinidad and Tobago'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          VC: {
              name: Drupal.t('Saint Vincent and the Grenadines'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          VG: {
              name: Drupal.t('British Virgin Islands'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          VI: {
              name: Drupal.t('United States Virgin Islands'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CY: {
              name: Drupal.t('Cyprus'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          RE: {
              name: Drupal.t('Reunion (France)'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          YT: {
              name: Drupal.t('Mayotte (France)'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MQ: {
              name: Drupal.t('Martinique (France)'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GP: {
              name: Drupal.t('Guadeloupe (France)'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CW: {
              name: Drupal.t('Curaco (Netherlands)'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          IC: {
              name: Drupal.t('Canary Islands (Spain)'),
              description: '',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          }
      },
      locations: {
          0: {
              name:
                      '<div class="bubb-content">' +
                      '<div class="bubb-name">' + Drupal.t('Sierra Leone') + '</div>' +
                      '<div class="bubb-desc">' + 'An estimated 123,000 women were pregnant in Ebola-affected Sierra Leone in 2015.' +
                      '</div></div>',
              lat: '8.578137',
              lng: '-11.771250',
              color: 'default',
              description: ''
                      //url: ''
          },
          1: {
              name:
                      '<div class="bubb-content">' +
                      '<div class="bubb-name">' + Drupal.t('Nepal') + '</div>' +
                      '<div class="bubb-desc">' + 'UNFPA estimated that there were approximately 126,000 pregnant women at the time of the April earthquake, including 21,000 of whom would need obstetric care in the coming months.' +
                      '</div></div>',
              lat: '28.069323',
              lng: '84.215710',
              color: 'default',
              description: ''
                      //url: ''
          },
          2: {
              name:
                      '<div class="bubb-content">' +
                      '<div class="bubb-name">' + Drupal.t('Philippines') + '</div>' +
                      '<div class="bubb-desc">' + 'An estimated 250,000 women were pregnant when Typhoon Haiyan hit in November 2013 and approximately 70,000 were due in the first quarter of 2014.' + '</div></div>',
              lat: '12.049930',
              lng: '122.894732',
              color: 'default',
              description: ''
                      //url: ''
          },
          3: {
              name:
                      '<div class="bubb-content">' +
                      '<div class="bubb-name">' + Drupal.t('Vanuatu') + '</div>' +
                      '<div class="bubb-desc">' + 'At the time of Tropical Cyclone Pam (2015), there were an estimated 8,500 pregnant and lactating women in the affected provinces.' +
                      '</div></div>',
              lat: '-16.189600',
              lng: '167.799147',
              color: 'default',
              description: ''
                      //url: ''
          }
      },
      borders: {
          /*0: {
           name: "Kosovo",
           path:"m 1102.2181,356.79763 c 0.5294,-0.2112 1.0339,-0.50801 1.5795,-0.66507 0.1655,-0.015 0.3311,-0.0301 0.4966,-0.0451 0.2412,-0.40621 0.7189,-0.71819 0.7435,-1.21625 0.1369,-0.46302 -0.1218,-1.25401 0.5593,-1.26271 0.4044,0.0263 0.7119,0.45452 1.0766,0.64452 0.864,0.61148 1.7281,1.22297 2.5921,1.83444 0.1186,0.24999 0.081,0.69395 0.2971,0.82277 0.4109,0.0171 0.8218,0.0342 1.2327,0.0513 0.2215,0.43031 0.4416,0.86059 0.068,1.27022 -0.2595,0.50535 -0.5191,1.01069 -0.7786,1.51606 -1.1851,0.35969 -2.3733,0.70944 -3.5511,1.09265 -0.1457,0.40354 -0.098,1.14952 -0.3688,1.33167 -0.2994,-0.13489 -0.7582,-0.12751 -0.7406,-0.54515 -0.1037,-0.44428 -0.2074,-0.88856 -0.3111,-1.33284 -0.6738,-0.52812 -1.3476,-1.05624 -2.0214,-1.58436 -0.2914,-0.63739 -0.5827,-1.2748 -0.8741,-1.91219 z",
           color: 'white',
           size: "1",
           dash: '.'
           },*/
      }

  };//end of simplemaps_worldmap_mapdata

  var map3 = create_simplemaps_worldmap();

  //jQuery(document).ready(function() {
  map3.load();
  //});

</script>