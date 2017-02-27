<?php
$p = base_path() . drupal_get_path('module', 'sowp') . '/';
?>

<div class="swp-map">
    <h3 class="color-text sb-font swp-upper"><?php print $title; ?></h3>

    <div class="swp-floats">
        <div class="swp-map-side">
            <p>This dimension measures the lack of resources available that can help people cope withhazardous events. It is made up of two categories—institutions and infrastructure. This map shows details for the 12 countries with the highest values in the lack of coping capacity dimension.</p>
        </div>

        <div class="swp-map-main">
            <img class="swp-map-legend" src="<?php print $p; ?>/chartincludes/simplemaps/images/legend_green_en.png" alt="" />
            <div id="map2"></div>
        </div>
    </div>

    <div class="swp-map-disclaimer">
        The boundaries and names shown and the designations used on this map do not imply official endorsement or acceptance by the United Nations.
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

  var map2_colors = {
      veryhigh: '#2f9951',
      high: '#94ba49',
      medium: '#b9cf87',
      low: '#deeac2'
  };
  var map2_hover = {
      veryhigh: '#58a857',
      high: '#a6c754',
      medium: '#c5d99c',
      low: '#eaf2d9'
  };

  var simplemaps_worldmap_mapdata = {
      main_settings: {
          div: 'map2', //Unique Map Div Id

          //Genreal settings
          auto_load: 'no',
          width: 'responsive', //px value or 'responsive'
          pop_ups: 'detect', //on_click, on_hover, or detect
          back_image: 'no', //Use image instead of arrow for back zoom
          url_new_tab: 'no',
          images_directory: 'default', //e.g. 'map_images/'
          link_text: Drupal.t('(Link)'), //Text mobile browsers will see for links

          //General colors and styles
          background_color: '#fff',
          background_transparent: 'yes',
          border_color: '#333',
          border_size: 0.6,
          arrow_color: '#4dcd50',
          arrow_color_border: 'none',
          state_color: '#ccc',
          state_hover_color: '#ccc',
          region_opacity: 1,
          region_hover_opacity: 0.7,
          fade_time: 0.2, //hover/unhover color change time

          //Popup
          popup_color: '#fff',
          popup_opacity: .9,
          popup_shadow: 1,
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
          zoom: 'yes', //use default regions
          initial_zoom: -1, //-1 is zoomed out, 0 is for the first continent etc
          initial_zoom_solo: 'no', //hide adjacent states when starting map zoomed in
          initial_back: 'no', //show back button when zoomed out and do this JavaScript upon click
          zoom_out_incrementally: 'yes', //if no, map will zoom all the way out on click
          zoom_percentage: .99,
          zoom_time: .5, //time to zoom between regions in seconds
          adjacent_opacity: .3, //opacity of adjacent states when zoomed in on a state or region

          //State defaults
          state_description: '',
          state_url: ''
                  /*all_states_inactive: 'no',
                   all_states_zoomable: 'yes',*/

                  //Location defaults
                  /*location_description:  'Location description',
                   location_color: '#CCC',
                   location_opacity: 1,
                   location_hover_opacity: 1,
                   location_url: '',
                   location_size: 35,
                   location_type: 'circle', // circle, square, image
                   location_image_source: 'frog.png', //name of image in the map_images folder
                   location_border_color: '#FFFFFF',
                   location_border: 2,
                   location_hover_border: 2.5,
                   all_locations_inactive: 'no',
                   all_locations_hidden: 'no',*/
      },
      state_specific: {
          AF: {
              name: Drupal.t('Afghanistan'),
              description: '8.19',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          AO: {
              name: Drupal.t('Angola'),
              description: '6.76',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          AL: {
              name: Drupal.t('Albania'),
              description: '5.12',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          AE: {
              name: Drupal.t('United Arab Emirates'),
              description: '2.88',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          AR: {
              name: Drupal.t('Argentina'),
              description: '4.01',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          AM: {
              name: Drupal.t('Armenia'),
              description: '5.29',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          AU: {
              name: Drupal.t('Australia'),
              description: '2.21',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          AT: {
              name: Drupal.t('Austria'),
              description: '1.98',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          AZ: {
              name: Drupal.t('Azerbaijan'),
              description: '5.58',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          BI: {
              name: Drupal.t('Burundi'),
              description: '6.54',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          BE: {
              name: Drupal.t('Belgium'),
              description: '1.66',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          BJ: {
              name: Drupal.t('Benin'),
              description: '7.39',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          BF: {
              name: Drupal.t('Burkina Faso'),
              description: '6.66',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          BD: {
              name: Drupal.t('Bangladesh'),
              description: '5.84',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          BG: {
              name: Drupal.t('Bulgaria'),
              description: '3.66',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          BA: {
              name: Drupal.t('Bosnia and Herzegovina'),
              description: '4.78',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          BY: {
              name: Drupal.t('Belarus'),
              description: '4.04',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          BZ: {
              name: Drupal.t('Belize'),
              description: '5.49',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          BO: {
              name: Drupal.t('Bolivia'),
              description: '5.69',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          BR: {
              name: Drupal.t('Brazil'),
              description: '4.24',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          BN: {
              name: Drupal.t('Brunei Darussalam'),
              description: '4.59',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          BT: {
              name: Drupal.t('Bhutan'),
              description: '5.81',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          BW: {
              name: Drupal.t('Botswana'),
              description: '4.85',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          CF: {
              name: Drupal.t('Central African Republic'),
              description: '8.56',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          CA: {
              name: Drupal.t('Canada'),
              description: '2.61',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          CH: {
              name: Drupal.t('Switzerland'),
              description: '1.14',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          CL: {
              name: Drupal.t('Chile'),
              description: '3.13',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          CN: {
              name: Drupal.t('China'),
              description: '4.08',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          CI: {
              name: Drupal.t('Côte d\'Ivoire'),
              description: '7.13',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          CM: {
              name: Drupal.t('Cameroon'),
              description: '7.17',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          CD: {
              name: Drupal.t('Democratic Republic of the Congo'),
              description: '8.33',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          CG: {
              name: Drupal.t('Republic of Congo'),
              description: '7.66',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          CO: {
              name: Drupal.t('Colombia'),
              description: '4.27',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          CR: {
              name: Drupal.t('Costa Rica'),
              description: '2.89',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          CU: {
              name: Drupal.t('Cuba'),
              description: '3.72',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          CZ: {
              name: Drupal.t('Czech Republic'),
              description: '2.73',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          DE: {
              name: Drupal.t('Germany'),
              description: '1.76',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          DJ: {
              name: Drupal.t('Djibouti'),
              description: '6.76',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          DK: {
              name: Drupal.t('Denmark'),
              description: '1.11',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          DO: {
              name: Drupal.t('Dominican Republic'),
              description: '5.28',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          DZ: {
              name: Drupal.t('Algeria'),
              description: '4.92',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          EC: {
              name: Drupal.t('Ecuador'),
              description: '4.4',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          EG: {
              name: Drupal.t('Egypt'),
              description: '4.72',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          ER: {
              name: Drupal.t('Eritrea'),
              description: '7.75',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          EE: {
              name: Drupal.t('Estonia'),
              description: '2.42',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          ET: {
              name: Drupal.t('Ethiopia'),
              description: '7.71',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          FI: {
              name: Drupal.t('Finland'),
              description: '1.7',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          FJ: {
              name: Drupal.t('Fiji'),
              description: '5.83',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          GA: {
              name: Drupal.t('Gabon'),
              description: '6.25',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          GB: {
              name: Drupal.t('United Kingdom'),
              description: '1.76',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          GE: {
              name: Drupal.t('Georgia'),
              description: '4.12',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          GH: {
              name: Drupal.t('Ghana'),
              description: '5.57',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          GN: {
              name: Drupal.t('Guinea'),
              description: '8.35',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          GM: {
              name: Drupal.t('The Gambia'),
              description: '6.62',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          GW: {
              name: Drupal.t('Guinea-Bissau'),
              description: '8.66',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          GQ: {
              name: Drupal.t('Equatorial Guinea'),
              description: '7.48',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          GR: {
              name: Drupal.t('Greece'),
              description: '2.86',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
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
              description: '5.25',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          GY: {
              name: Drupal.t('Guyana'),
              description: '5.8',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          HN: {
              name: Drupal.t('Honduras'),
              description: '5.67',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          HR: {
              name: Drupal.t('Croatia'),
              description: '3.19',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          HT: {
              name: Drupal.t('Haiti'),
              description: '8.17',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          HU: {
              name: Drupal.t('Hungary'),
              description: '2',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          ID: {
              name: Drupal.t('Indonesia'),
              description: '5.44',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          IN: {
              name: Drupal.t('India'),
              description: '5.33',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          IE: {
              name: Drupal.t('Ireland'),
              description: '2.01',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          IR: {
              name: Drupal.t('Iran'),
              description: '5.05',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          IQ: {
              name: Drupal.t('Iraq'),
              description: '7.02',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          IS: {
              name: Drupal.t('Iceland'),
              description: '2.21',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          IL: {
              name: Drupal.t('Israel'),
              description: '2.58',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          IT: {
              name: Drupal.t('Italy'),
              description: '2.48',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          JM: {
              name: Drupal.t('Jamaica'),
              description: '4.09',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          JO: {
              name: Drupal.t('Jordan'),
              description: '4.67',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          JP: {
              name: Drupal.t('Japan'),
              description: '2.12',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          KZ: {
              name: Drupal.t('Kazakhstan'),
              description: '4.23',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          KE: {
              name: Drupal.t('Kenya'),
              description: '6.57',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          KG: {
              name: Drupal.t('Kyrgyzstan'),
              description: '5.18',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          KH: {
              name: Drupal.t('Cambodia'),
              description: '6.92',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          KR: {
              name: Drupal.t('Republic of Korea'),
              description: '2.39',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          /*XK: {
           name: Drupal.t('Kosovo'),
           description: 'default',
           color: 'default',
           hover_color: 'default'
           //url: 'default'
           },*/
          KW: {
              name: Drupal.t('Kuwait'),
              description: '4.08',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          LA: {
              name: Drupal.t('Lao PDR'),
              description: '6.29',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          LB: {
              name: Drupal.t('Lebanon'),
              description: '4.51',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          LR: {
              name: Drupal.t('Liberia'),
              description: '7.49',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          LY: {
              name: Drupal.t('Libya'),
              description: '6.86',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          LK: {
              name: Drupal.t('Sri Lanka'),
              description: '4.27',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          LS: {
              name: Drupal.t('Lesotho'),
              description: '6.78',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          LT: {
              name: Drupal.t('Lithuania'),
              description: '2.89',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          LU: {
              name: Drupal.t('Luxembourg'),
              description: '1.6',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          LV: {
              name: Drupal.t('Latvia'),
              description: '3.25',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          MA: {
              name: Drupal.t('Morocco'),
              description: '5.28',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          MD: {
              name: Drupal.t('Moldova'),
              description: '4.96',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          MG: {
              name: Drupal.t('Madagascar'),
              description: '7.7',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          MX: {
              name: Drupal.t('Mexico'),
              description: '4.1',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          MK: {
              name: Drupal.t('the former Yugoslav Republic of Macedonia'),
              description: '3.97',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          ML: {
              name: Drupal.t('Mali'),
              description: '7.8',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          MM: {
              name: Drupal.t('Myanmar'),
              description: '7',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          ME: {
              name: Drupal.t('Montenegro'),
              description: '3.73',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          MN: {
              name: Drupal.t('Mongolia'),
              description: '5.35',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          MZ: {
              name: Drupal.t('Mozambique'),
              description: '7.2',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          MR: {
              name: Drupal.t('Mauritania'),
              description: '7.29',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          MW: {
              name: Drupal.t('Malawi'),
              description: '6.73',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          MY: {
              name: Drupal.t('Malaysia'),
              description: '3.27',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          NA: {
              name: Drupal.t('Namibia'),
              description: '5.71',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          NE: {
              name: Drupal.t('Niger'),
              description: '8.18',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          NG: {
              name: Drupal.t('Nigeria'),
              description: '6.79',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          NI: {
              name: Drupal.t('Nicaragua'),
              description: '5.51',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          NL: {
              name: Drupal.t('Netherlands'),
              description: '1.4',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          NO: {
              name: Drupal.t('Norway'),
              description: '1.88',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          NP: {
              name: Drupal.t('Nepal'),
              description: '6.39',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          NZ: {
              name: Drupal.t('New Zealand'),
              description: '2.36',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          OM: {
              name: Drupal.t('Oman'),
              description: '4.12',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          PK: {
              name: Drupal.t('Pakistan'),
              description: '5.95',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          PA: {
              name: Drupal.t('Panama'),
              description: '4.05',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          PE: {
              name: Drupal.t('Peru'),
              description: '4.78',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          PH: {
              name: Drupal.t('Philippines'),
              description: '4.7',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          PG: {
              name: Drupal.t('Papua New Guinea'),
              description: '8.13',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          PL: {
              name: Drupal.t('Poland'),
              description: '3.31',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          KP: {
              name: Drupal.t('Democratic People\'s Republic of Korea'),
              description: '7.04',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          PT: {
              name: Drupal.t('Portugal'),
              description: '2.85',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          PY: {
              name: Drupal.t('Paraguay'),
              description: '4.89',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          PS: {
              name: Drupal.t('Palestine'),
              description: '5.09',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          QA: {
              name: Drupal.t('Qatar'),
              description: '2.43',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          RO: {
              name: Drupal.t('Romania'),
              description: '4.4',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          RU: {
              name: Drupal.t('Russia'),
              description: '4.87',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          RW: {
              name: Drupal.t('Rwanda'),
              description: '5.53',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          EH: {
              name: Drupal.t('Western Sahara'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SA: {
              name: Drupal.t('Saudi Arabia'),
              description: '4.33',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          SD: {
              name: Drupal.t('Sudan'),
              description: '7.26',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          SS: {
              name: Drupal.t('South Sudan'),
              description: '8.92',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          SN: {
              name: Drupal.t('Senegal'),
              description: '6.06',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          SL: {
              name: Drupal.t('Sierra Leone'),
              description: '7.34',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          SV: {
              name: Drupal.t('El Salvador'),
              description: '4.98',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          RS: {
              name: Drupal.t('Serbia (Includes Kosovo)'),
              description: 'Includes Kosovo 4.37',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          SR: {
              name: Drupal.t('Suriname'),
              description: '5.31',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          SK: {
              name: Drupal.t('Slovakia'),
              description: '3.37',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          SI: {
              name: Drupal.t('Slovenia'),
              description: '3.37',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          SE: {
              name: Drupal.t('Sweden'),
              description: '1.50',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          SZ: {
              name: Drupal.t('Swaziland'),
              description: '6.75',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          SY: {
              name: Drupal.t('Syria'),
              description: '5.92',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          TD: {
              name: Drupal.t('Chad'),
              description: '8.95',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          TG: {
              name: Drupal.t('Togo'),
              description: '7.7',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          TH: {
              name: Drupal.t('Thailand'),
              description: '4.12',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          TJ: {
              name: Drupal.t('Tajikistan'),
              description: '5.56',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          TM: {
              name: Drupal.t('Turkmenistan'),
              description: '6.75',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          TL: {
              name: Drupal.t('Timor-Leste'),
              description: '7.39',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          TN: {
              name: Drupal.t('Tunisia'),
              description: '5.1',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          TR: {
              name: Drupal.t('Turkey'),
              description: '3.66',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          TW: {
              name: Drupal.t('Taiwan'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TZ: {
              name: Drupal.t('Tanzania'),
              description: '6.88',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          UG: {
              name: Drupal.t('Uganda'),
              description: '7.15',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          UA: {
              name: Drupal.t('Ukraine'),
              description: '5.55',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          UY: {
              name: Drupal.t('Uruguay'),
              description: '3',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          US: {
              name: Drupal.t('United States'),
              description: '2.57',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          UZ: {
              name: Drupal.t('Uzbekistan'),
              description: '4.65',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          VE: {
              name: Drupal.t('Venezuela'),
              description: '5.47',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          VN: {
              name: Drupal.t('Vietnam'),
              description: '4.67',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          VU: {
              name: Drupal.t('Vanuatu'),
              description: '6.4',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          YE: {
              name: Drupal.t('Yemen'),
              description: '8.19',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          ZA: {
              name: Drupal.t('South Africa'),
              description: '4.81',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          ZM: {
              name: Drupal.t('Zambia'),
              description: '6.25',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          ZW: {
              name: Drupal.t('Zimbabwe'),
              description: '6.9',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          SO: {
              name: Drupal.t('Somalia'),
              description: '9.55',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          GF: {
              name: Drupal.t('French Guiana'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          FR: {
              name: Drupal.t('France'),
              description: '2.23',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          ES: {
              name: Drupal.t('Spain'),
              description: '2.32',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          AW: {
              name: Drupal.t('Aruba'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AI: {
              name: Drupal.t('Anguilla'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AD: {
              name: Drupal.t('Andorra'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          AG: {
              name: Drupal.t('Antigua and Barbuda'),
              description: '3.29',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          BS: {
              name: Drupal.t('Bahamas'),
              description: '3.28',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          BM: {
              name: Drupal.t('Bermuda'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          BB: {
              name: Drupal.t('Barbados'),
              description: '2.63',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          KM: {
              name: Drupal.t('Comoros'),
              description: '7.12',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          CV: {
              name: Drupal.t('Cabo Verde'),
              description: '4.83',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          KY: {
              name: Drupal.t('Cayman Islands'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          DM: {
              name: Drupal.t('Dominica'),
              description: '3.32',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          FK: {
              name: Drupal.t('Falkland Islands'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          FO: {
              name: Drupal.t('Faeroe Islands'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GD: {
              name: Drupal.t('Grenada'),
              description: '4.13',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          HK: {
              name: Drupal.t('Hong Kong'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          KN: {
              name: Drupal.t('Saint Kitts and Nevis'),
              description: '3.1',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          LC: {
              name: Drupal.t('Saint Lucia'),
              description: '3.8',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          LI: {
              name: Drupal.t('Liechtenstein'),
              description: '2.29',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          MF: {
              name: Drupal.t('Saint Martin (French)'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MV: {
              name: Drupal.t('Maldives'),
              description: '4.62',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          MT: {
              name: Drupal.t('Malta'),
              description: '2.52',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          MS: {
              name: Drupal.t('Montserrat'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MU: {
              name: Drupal.t('Mauritius'),
              description: '3.24',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          NC: {
              name: Drupal.t('New Caledonia'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          NR: {
              name: Drupal.t('Nauru'),
              description: '6.82',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          PN: {
              name: Drupal.t('Pitcairn Islands'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PR: {
              name: Drupal.t('Puerto Rico'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          PF: {
              name: Drupal.t('French Polynesia'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SG: {
              name: Drupal.t('Singapore'),
              description: '7.34',
              color: map2_colors['veryhigh'],
              hover_color: map2_hover['veryhigh']
                      //url: 'default'
          },
          SB: {
              name: Drupal.t('Solomon Islands'),
              description: '1.93',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          ST: {
              name: Drupal.t('Sao Tom and Principe'),
              description: '5.92',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          SX: {
              name: Drupal.t('Saint Martin (Dutch)'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          SC: {
              name: Drupal.t('Seychelles'),
              description: '4.37',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          TC: {
              name: Drupal.t('Turks and Caicos Islands'),
              description: '5.58',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          TO: {
              name: Drupal.t('Tonga'),
              description: '4.97',
              color: map2_colors['high'],
              hover_color: map2_hover['high']
                      //url: 'default'
          },
          TT: {
              name: Drupal.t('Trinidad and Tobago'),
              description: '3.82',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          VC: {
              name: Drupal.t('Saint Vincent and the Grenadines'),
              description: '3.51',
              color: map2_colors['medium'],
              hover_color: map2_hover['medium']
                      //url: 'default'
          },
          VG: {
              name: Drupal.t('British Virgin Islands'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          VI: {
              name: Drupal.t('United States Virgin Islands'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CY: {
              name: Drupal.t('Cyprus'),
              description: '2.59',
              color: map2_colors['low'],
              hover_color: map2_hover['low']
                      //url: 'default'
          },
          RE: {
              name: Drupal.t('Reunion (France)'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          YT: {
              name: Drupal.t('Mayotte (France)'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          MQ: {
              name: Drupal.t('Martinique (France)'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          GP: {
              name: Drupal.t('Guadeloupe (France)'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          CW: {
              name: Drupal.t('Curaco (Netherlands)'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          },
          IC: {
              name: Drupal.t('Canary Islands (Spain)'),
              description: 'default',
              color: 'default',
              hover_color: 'default'
                      //url: 'default'
          }
      },
      locations: {
          /*0: {
           name: Drupal.t('Paris',
           lat: '48.866666670',
           lng: '2.333333333',
           color: 'default',
           description: ''
           //url: ''
           },

           1: {
           name: Drupal.t('Tokyo',
           lat: '35.666666670',
           lng: '139.750000000',
           color: 'default',
           description: ''
           //url: ''
           }*/
      },
      borders: {
          /*0: {
           name: "Kosovo",
           path:"m 1102.2181,356.79763 c 0.5294,-0.2112 1.0339,-0.50801 1.5795,-0.66507 0.1655,-0.015 0.3311,-0.0301 0.4966,-0.0451 0.2412,-0.40621 0.7189,-0.71819 0.7435,-1.21625 0.1369,-0.46302 -0.1218,-1.25401 0.5593,-1.26271 0.4044,0.0263 0.7119,0.45452 1.0766,0.64452 0.864,0.61148 1.7281,1.22297 2.5921,1.83444 0.1186,0.24999 0.081,0.69395 0.2971,0.82277 0.4109,0.0171 0.8218,0.0342 1.2327,0.0513 0.2215,0.43031 0.4416,0.86059 0.068,1.27022 -0.2595,0.50535 -0.5191,1.01069 -0.7786,1.51606 -1.1851,0.35969 -2.3733,0.70944 -3.5511,1.09265 -0.1457,0.40354 -0.098,1.14952 -0.3688,1.33167 -0.2994,-0.13489 -0.7582,-0.12751 -0.7406,-0.54515 -0.1037,-0.44428 -0.2074,-0.88856 -0.3111,-1.33284 -0.6738,-0.52812 -1.3476,-1.05624 -2.0214,-1.58436 -0.2914,-0.63739 -0.5827,-1.2748 -0.8741,-1.91219 z",
           color: 'white',
           size: "1",
           dash: '.'
           },
           1: {
           name: "Sudan",
           path:"m 1135.1413,573.78254 1.1589,-1.31346 1.159,-0.23179 0.9271,-3.24502 0.4636,-1.2362 0,-1.31347 c 0.2322,-0.71267 1.0997,-1.63712 1.9315,-2.54966 l 0.6954,-0.77263 2.936,-0.69536 0.5408,1.46799 1.6225,1.54525 1.3135,1.8543 1.2362,1.2362 2.5497,-0.92715 3.8631,0 1.468,1.8543 4.5585,-0.15452 0.077,-0.77263 3.3996,-2.00883 0.5408,-1.08167 0.4636,-1.00441 1.7771,-0.92715 c 1.5682,1.10743 3.4452,2.21485 4.2494,3.32228 l 2.6269,-0.46357 2.4724,-2.54966 1.468,-3.09051 2.5496,-2.31787 -0.618,-4.3267 -1.468,-1.69978 3.6313,-0.15456 2.4724,-1.08168 -0.3863,3.63134 0.6953,5.40837 4.2495,3.70861 0.2318,1.69977 -0.077,1.31347 0.6181,1.46799",
           color: 'gray',
           size: "1",
           dash: '.'
           },
           2: {
           name: "Kashmir",
           path:"m 1403.7369,423.83216 1.639,0 1.0926,-0.3278 0.5464,-1.42045 1.3112,-0.6556 2.076,-0.54632 2.1853,0.65559 3.1687,-0.54633 3.0595,-0.10926 2.5131,0.54632",
           color: 'gray',
           size: "1",
           dash: '.'
           },
           3: {
           name: "Jammu",
           path:"m 1385.271,394.11188 c -0.7978,0.6336 -1.5957,1.26717 -2.3935,1.90076 -1.2223,0.3796 -1.4474,1.7298 -0.6659,2.6884 0.5463,-0.21853 1.0926,-0.43706 1.6389,-0.65559 1.6733,2.27561 3.3465,4.55126 5.0198,6.82686 0.8589,0.92105 -0.4741,1.82162 -0.7584,2.67926 0.6504,1.65986 1.2109,3.35415 1.8981,4.9997 1.2227,2.02051 3.14,3.49237 4.8764,5.05274 l 0.089,-2.9823 -0.8499,-2.31788 -0.7726,-0.30905 -0.9272,-1.54525 0.1546,-2.08609 1.5452,-0.69536 6.1038,1.15894 2.0088,0.30905 1.3134,-1.00442 2.8588,-0.46357",
           color: 'gray',
           size: "1",
           dash: '.'
           },
           4: {
           name: "Korea",
           path: "m 1662.9603,388.19792 c 0.1932,-1.00441 0.3863,-2.00883 0.5795,-3.01324 0.5812,-0.23536 1.1364,-0.64371 1.7996,-0.53494 1.0246,-0.0115 2.0719,0.1459 3.0684,-0.16285 0.3804,-0.17681 1.2027,0.01 1.0508,-0.60464 0.01,-0.46725 0.021,-0.93451 0.031,-1.40176",
           color: 'gray',
           size: "1",
           dash: '.'
           },
           5: {
           name: "Somalia",
           path:"m 1234.9213,603.02797 c 0.2563,0.90027 0.8011,-0.50856 1.202,-0.76486 l 4.4799,-0.9834 1.5297,-2.18531 5.2447,-1.96678 4.6984,0.49169 16.7177,-19.72246",
           color: 'gray',
           size: "1",
           dash: '.'
           },
           6: {
           name: "Kashmir-Jammu-China",
           path: "m 1420.0625,415.12502 -1.625,-1.25 -0.75,-1.875 1.4375,-1 -0.125,-0.5625 -0.1875,-0.5625 -0.6875,-0.5 -0.875,-0.1875 -0.5625,0 -0.4375,-0.25 -0.6875,-0.0625 -0.9375,0.25 -0.4375,-0.875 -0.8125,-2.125 -1,-1.0625 -0.3125,-0.875 -0.062,-0.8125 -0.3125,-0.4375",
           color: 'gray',
           size: "1",
           dash: '.'
           }*/
//          0: {
//              name: "Kosovo",
//              path: "m 1102.2181,356.79763 c 0.5294,-0.2112 1.0339,-0.50801 1.5795,-0.66507 0.1655,-0.015 0.3311,-0.0301 0.4966,-0.0451 0.2412,-0.40621 0.7189,-0.71819 0.7435,-1.21625 0.1369,-0.46302 -0.1218,-1.25401 0.5593,-1.26271 0.4044,0.0263 0.7119,0.45452 1.0766,0.64452 0.864,0.61148 1.7281,1.22297 2.5921,1.83444 0.1186,0.24999 0.081,0.69395 0.2971,0.82277 0.4109,0.0171 0.8218,0.0342 1.2327,0.0513 0.2215,0.43031 0.4416,0.86059 0.068,1.27022 -0.2595,0.50535 -0.5191,1.01069 -0.7786,1.51606 -1.1851,0.35969 -2.3733,0.70944 -3.5511,1.09265 -0.1457,0.40354 -0.098,1.14952 -0.3688,1.33167 -0.2994,-0.13489 -0.7582,-0.12751 -0.7406,-0.54515 -0.1037,-0.44428 -0.2074,-0.88856 -0.3111,-1.33284 -0.6738,-0.52812 -1.3476,-1.05624 -2.0214,-1.58436 -0.2914,-0.63739 -0.5827,-1.2748 -0.8741,-1.91219 z",
//              color: '#3B729F',
//              size: "1",
//              dash: '.',
//          },
          1: {
              name: "Sudan",
              path: "m 1135.1413,573.78254 1.1589,-1.31346 1.159,-0.23179 0.9271,-3.24502 0.4636,-1.2362 0,-1.31347 c 0.2322,-0.71267 1.0997,-1.63712 1.9315,-2.54966 l 0.6954,-0.77263 2.936,-0.69536 0.5408,1.46799 1.6225,1.54525 1.3135,1.8543 1.2362,1.2362 2.5497,-0.92715 3.8631,0 1.468,1.8543 4.5585,-0.15452 0.077,-0.77263 3.3996,-2.00883 0.5408,-1.08167 0.4636,-1.00441 1.7771,-0.92715 c 1.5682,1.10743 3.4452,2.21485 4.2494,3.32228 l 2.6269,-0.46357 2.4724,-2.54966 1.468,-3.09051 2.5496,-2.31787 -0.618,-4.3267 -1.468,-1.69978 3.6313,-0.15456 2.4724,-1.08168 -0.3863,3.63134 0.6953,5.40837 4.2495,3.70861 0.2318,1.69977 -0.077,1.31347 0.6181,1.46799",
              color: '#3B729F',
              size: "1",
              dash: '.',
          },
          2: {
              name: "Kashmir",
              path: "m 1403.7369,423.83216 1.639,0 1.0926,-0.3278 0.5464,-1.42045 1.3112,-0.6556 2.076,-0.54632 2.1853,0.65559 3.1687,-0.54633 3.0595,-0.10926 2.5131,0.54632",
              color: '#3B729F',
              size: "1",
              dash: '.',
          },
          3: {
              name: "Jammu",
              path: "m 1385.271,394.11188 c -0.7978,0.6336 -1.5957,1.26717 -2.3935,1.90076 -1.2223,0.3796 -1.4474,1.7298 -0.6659,2.6884 0.5463,-0.21853 1.0926,-0.43706 1.6389,-0.65559 1.6733,2.27561 3.3465,4.55126 5.0198,6.82686 0.8589,0.92105 -0.4741,1.82162 -0.7584,2.67926 0.6504,1.65986 1.2109,3.35415 1.8981,4.9997 1.2227,2.02051 3.14,3.49237 4.8764,5.05274 l 0.089,-2.9823 -0.8499,-2.31788 -0.7726,-0.30905 -0.9272,-1.54525 0.1546,-2.08609 1.5452,-0.69536 6.1038,1.15894 2.0088,0.30905 1.3134,-1.00442 2.8588,-0.46357",
              color: '#3B729F',
              size: "1",
              dash: '.',
          },
          4: {
              name: "Korea",
              path: "m 1662.9603,388.19792 c 0.1932,-1.00441 0.3863,-2.00883 0.5795,-3.01324 0.5812,-0.23536 1.1364,-0.64371 1.7996,-0.53494 1.0246,-0.0115 2.0719,0.1459 3.0684,-0.16285 0.3804,-0.17681 1.2027,0.01 1.0508,-0.60464 0.01,-0.46725 0.021,-0.93451 0.031,-1.40176",
              color: '#3B729F',
              size: "1",
              dash: '.',
          },
          5: {
              name: "Somalia",
              path: "m 1234.9213,603.02797 c 0.2563,0.90027 0.8011,-0.50856 1.202,-0.76486 l 4.4799,-0.9834 1.5297,-2.18531 5.2447,-1.96678 4.6984,0.49169 16.7177,-19.72246",
              color: '#3B729F',
              size: "1",
              dash: '.',
          },
          6: {
              name: "Kashmir-Jammu-China",
              path: "m 1420.0625,415.12502 -1.625,-1.25 -0.75,-1.875 1.4375,-1 -0.125,-0.5625 -0.1875,-0.5625 -0.6875,-0.5 -0.875,-0.1875 -0.5625,0 -0.4375,-0.25 -0.6875,-0.0625 -0.9375,0.25 -0.4375,-0.875 -0.8125,-2.125 -1,-1.0625 -0.3125,-0.875 -0.062,-0.8125 -0.3125,-0.4375",
              color: 'gray',
              size: "1",
              dash: '',
          }
      }

  };//end of simplemaps_worldmap_mapdata

  var map2 = create_simplemaps_worldmap();

  //jQuery(document).ready(function() {
  map2.load();
  //});

</script>