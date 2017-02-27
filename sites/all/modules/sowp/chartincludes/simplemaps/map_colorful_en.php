<?php
$p = base_path() . drupal_get_path('module', 'sowp') . '/';
?>

<div class="swp-map">
    <h3 class="color-text sb-font swp-upper"><?php print $title; ?></h3>

    <div class="swp-floats">
        <div class="swp-map-side">
            <div class="sb-font">
                This index looks at 12 dimensions of vulnerability, including whether economic development is uneven or equitable, whether there is respect for human rights and liberties, the extent of poverty and economic decline, frequency of disasters, and whether key services, particularly education and health are available to all. According to this index, four countries are on &quot;very high alert&quot;, with South Sudan at the top of the list, followed by Somalia, Central African Republic and Sudan. Between 2013 and 2014, measures of fragility on this index worsened to some degree in 67 countries (FFP, 2015).
            </div>
        </div>

        <div class="swp-map-main">
            <img class="swp-map-legend" src="<?php print $p; ?>/chartincludes/simplemaps/images/legend_colorful_en.png" alt="" />
            <div id="map1"></div>
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

  var map1_colors = {
      0: '#5aa3d5',
      20: '#5cbca7',
      30: '#61bb46',
      40: '#a6ce38',
      50: '#d5d52f',
      60: '#ffd416',
      70: '#fdb820',
      80: '#f89c1b',
      90: '#f5821f',
      100: '#f16531',
      110: '#ef4023'
  };
  var map1_hover = {
      0: '#76b5d7',
      20: '#80c7bd',
      30: '#7ec26a',
      40: '#c5d85b',
      50: '#ebdf5e',
      60: '#ffe671',
      70: '#fbcb6b',
      80: '#f9b05f',
      90: '#f79d49',
      100: '#ef794b',
      110: '#ef6641'
  };

  var simplemaps_worldmap_mapdata = {
      main_settings: {
          div: 'map1', //Unique Map Div Id

          //Genreal settings
          auto_load: 'no',
          width: 'responsive', //px value or 'responsive'
          pop_ups: 'detect', //on_click, on_hover, or detect
          back_image: 'no', //Use image instead of arrow for back zoom
          url_new_tab: 'no',
          images_directory: 'default', //e.g. 'map_images/'
          link_text: '', //Text mobile browsers will see for links

          //General colors and styles
          background_color: '#fff',
          background_transparent: 'yes',
          border_color: '#333',
          border_size: 0.6,
          arrow_color: '#f8941d',
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
          AE: {
              name: 'United Arab Emirates',
              description: '46.2',
              color: map1_colors[40],
              hover_color: map1_hover[40]
                      //url: ''
          },
          AF: {
              name: 'Afghanistan',
              description: '107.9',
              color: map1_colors[100],
              hover_color: map1_hover[100]
                      //url: ''
          },
          AL: {
              name: 'Albania',
              description: '61.9',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          AM: {
              name: 'Armenia',
              description: '69.7',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          AO: {
              name: 'Angola',
              description: '88.1',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          AR: {
              name: 'Argentina',
              description: '47.6',
              color: map1_colors[40],
              hover_color: map1_hover[40]
                      //url: ''
          },
          AT: {
              name: 'Austria',
              description: '26.0',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          AU: {
              name: 'Australia',
              description: '24.3',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          AZ: {
              name: 'Azerbaijan',
              description: '77.3',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          BA: {
              name: 'Bosnia-Herzegovina',
              description: '77.4',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          BD: {
              name: 'Bangladesh',
              description: '91.8',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          BE: {
              name: 'Belgium',
              description: '30.4',
              color: map1_colors[30],
              hover_color: map1_hover[30]
                      //url: ''
          },
          BF: {
              name: 'Burkina Faso',
              description: '89.2',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          BG: {
              name: 'Bulgaria',
              description: '55.4',
              color: map1_colors[50],
              hover_color: map1_hover[50]
                      //url: ''
          },
          BH: {
              name: 'Bahrain',
              description: '64.3',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          BI: {
              name: 'Burundi',
              description: '98.1',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          BJ: {
              name: 'Benin',
              description: '78.8',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          BN: {
              name: 'Brunei Darussalam',
              description: '63.0',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          BO: {
              name: 'Bolivia',
              description: '78.0',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          BR: {
              name: 'Brazil',
              description: '62.6',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          BS: {
              name: 'Bahamas',
              description: '51.6',
              color: map1_colors[50],
              hover_color: map1_hover[50]
                      //url: ''
          },
          BT: {
              name: 'Bhutan',
              description: '78.7',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          BW: {
              name: 'Botswana',
              description: '62.8',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          BY: {
              name: 'Belarus',
              description: '75.6',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          BZ: {
              name: 'Belize',
              description: '65.3',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          CA: {
              name: 'Canada',
              description: '25.7',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          CD: {
              name: 'Democratic Republic of the Congo',
              description: '90.8',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          CF: {
              name: 'Central African Republic',
              description: '111.9',
              color: map1_colors[110],
              hover_color: map1_hover[110]
                      //url: ''
          },
          CG: {
              name: 'Republic of Congo',
              description: '109.7',
              color: map1_colors[100],
              hover_color: map1_hover[100]
                      //url: ''
          },
          CH: {
              name: 'Switzerland',
              description: '22.3',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          CI: {
              name: 'Côte d\'Ivoire',
              description: '100.0',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          CL: {
              name: 'Chile',
              description: '41.5',
              color: map1_colors[40],
              hover_color: map1_hover[40]
                      //url: ''
          },
          CM: {
              name: 'Cameroon',
              description: '94.3',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          CN: {
              name: 'China',
              description: '76.4',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          CO: {
              name: 'Colombia',
              description: '82.5',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          CR: {
              name: 'Costa Rica',
              description: '46.7',
              color: map1_colors[40],
              hover_color: map1_hover[40]
                      //url: ''
          },
          CU: {
              name: 'Cuba',
              description: '67.4',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          CV: {
              name: 'Cape Verde',
              description: '73.5',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          CY: {
              name: 'Cyprus',
              description: '66.2',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          CZ: {
              name: 'Czech Republic',
              description: '37.4',
              color: map1_colors[30],
              hover_color: map1_hover[30]
                      //url: ''
          },
          DE: {
              name: 'Germany',
              description: '28.1',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          DJ: {
              name: 'Djibouti',
              description: '88.1',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          DK: {
              name: 'Denmark',
              description: '21.5',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          DO: {
              name: 'Dominican Republic',
              description: '71.2',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          DZ: {
              name: 'Algeria',
              description: '79.6',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          EC: {
              name: 'Ecuador',
              description: '75.9',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          EE: {
              name: 'Estonia',
              description: '43.8',
              color: map1_colors[40],
              hover_color: map1_hover[40]
                      //url: ''
          },
          EG: {
              name: 'Egypt',
              description: '90.0',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          EH: {
              name: 'Western Sahara',
              description: '', //TODO
              color: 'default',
              hover_color: 'default'
                      //url: ''
          },
          ER: {
              name: 'Eritrea',
              description: '96.9',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          ES: {
              name: 'Spain',
              description: '40.9',
              color: map1_colors[40],
              hover_color: map1_hover[40]
                      //url: ''
          },
          ET: {
              name: 'Ethiopia',
              description: '97.5',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          FI: {
              name: 'Finland',
              description: '17.8',
              color: map1_colors[0],
              hover_color: map1_hover[0]
                      //url: ''
          },
          FJ: {
              name: 'Fiji',
              description: '76.8',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          FK: {
              name: 'Falkland Islands',
              description: '', //TODO
              color: 'default',
              hover_color: 'default'
                      //url: ''
          },
          FR: {
              name: 'France',
              description: '33.7',
              color: map1_colors[30],
              hover_color: map1_hover[30]
                      //url: ''
          },
          GA: {
              name: 'Gabon',
              description: '71.3',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          GB: {
              name: 'United Kingdom',
              description: '33.4',
              color: map1_colors[30],
              hover_color: map1_hover[30]
                      //url: ''
          },
          GE: {
              name: 'Georgia',
              description: '79.3',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          GF: {
              name: 'French Guyana',
              description: '', //TODO
              color: 'default',
              hover_color: 'default'
                      //url: ''
          },
          GH: {
              name: 'Ghana',
              description: '71.9',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          GL: {
              name: 'Greenland',
              description: '', //TODO
              color: 'default',
              hover_color: 'default'
                      //url: ''
          },
          GM: {
              name: 'Gambia',
              description: '85.4',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          GN: {
              name: 'Guinea',
              description: '104.9',
              color: map1_colors[100],
              hover_color: map1_hover[100]
                      //url: ''
          },
          GQ: {
              name: 'Equatorial Guinea',
              description: '84.8',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          GR: {
              name: 'Greece',
              description: '52.6',
              color: map1_colors[50],
              hover_color: map1_hover[50]
                      //url: ''
          },
          GS: {
              name: 'S. Georgia & S. Sandwich Isls.',
              description: '', //TODO
              color: 'default',
              hover_color: 'default'
                      //url: ''
          },
          GT: {
              name: 'Guatemala',
              description: '80.4',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          GW: {
              name: 'Guinea Bissau',
              description: '99.9',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          GY: {
              name: 'Guyana',
              description: '70.5',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          HN: {
              name: 'Honduras',
              description: '78.2',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          HR: {
              name: 'Croatia',
              description: '51.0',
              color: map1_colors[50],
              hover_color: map1_hover[50]
                      //url: ''
          },
          HT: {
              name: 'Haiti',
              description: '104.5',
              color: map1_colors[100],
              hover_color: map1_hover[100]
                      //url: ''
          },
          HU: {
              name: 'Hungary',
              description: '49.1',
              color: map1_colors[40],
              hover_color: map1_hover[40]
                      //url: ''
          },
          IC: {
              name: 'Canary Islands',
              description: '', //TODO
              color: 'default',
              hover_color: 'default'
                      //url: ''
          },
          ID: {
              name: 'Indonesia',
              description: '75.0',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          IE: {
              name: 'Ireland',
              description: '24.7',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          IL: {
              name: 'Israel',
              description: '79.4',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          IN: {
              name: 'India',
              description: '79.4',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          IQ: {
              name: 'Iraq',
              description: '104.5',
              color: map1_colors[100],
              hover_color: map1_hover[100]
                      //url: ''
          },
          IR: {
              name: 'Iran',
              description: '87.2',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          IS: {
              name: 'Iceland',
              description: '23.4',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          IT: {
              name: 'Italy',
              description: '43.2',
              color: map1_colors[40],
              hover_color: map1_hover[40]
                      //url: ''
          },
          JM: {
              name: 'Jamaica',
              description: '64.6',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          JO: {
              name: 'Jordan',
              description: '76.9',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          JP: {
              name: 'Japan',
              description: '36.0',
              color: map1_colors[30],
              hover_color: map1_hover[30]
                      //url: ''
          },
          KE: {
              name: 'Kenya',
              description: '97.4',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          KG: {
              name: 'Kyrgyzstan',
              description: '82.2',
              color: map1_colors[90],
              hover_color: 'default'
                      //url: ''
          },
          KH: {
              name: 'Cambodia',
              description: '87.9',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          KP: {
              name: 'Democratic People\'s Republic of Korea',
              description: '93.8',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          KR: {
              name: 'South Korea',
              description: '36.3',
              color: map1_colors[30],
              hover_color: map1_hover[30]
                      //url: ''
          },
          KW: {
              name: 'Kuwait',
              description: '57.5',
              color: map1_colors[50],
              hover_color: map1_hover[50]
                      //url: ''
          },
          KZ: {
              name: 'Kazakhstan',
              description: '68.3',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          LA: {
              name: 'Laos',
              description: '84.5',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          LB: {
              name: 'Lebanon',
              description: '88.1',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          LK: {
              name: 'Sri Lanka',
              description: '90.6',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          LR: {
              name: 'Liberia',
              description: '97.3',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          LS: {
              name: 'Lesotho',
              description: '79.9',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          LT: {
              name: 'Lithuania',
              description: '43.0',
              color: map1_colors[40],
              hover_color: map1_hover[40]
                      //url: ''
          },
          LU: {
              name: 'Luxembourg',
              description: '22.2',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          LV: {
              name: 'Latvia',
              description: '48.6',
              color: map1_colors[40],
              hover_color: map1_hover[40]
                      //url: ''
          },
          LY: {
              name: 'Libya',
              description: '95.3',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          MA: {
              name: 'Morocco',
              description: '74.6',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          MD: {
              name: 'Moldavia',
              description: '73.0',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          ME: {
              name: 'Montenegro',
              description: '54.2',
              color: map1_colors[50],
              hover_color: map1_hover[50]
                      //url: ''
          },
          MG: {
              name: 'Madagascar',
              description: '83.6',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          MK: {
              name: 'the former Yugoslav Republic of Macedonia',
              description: '64.5',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          ML: {
              name: 'Mali',
              description: '93.1',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          MM: {
              name: 'Myanmar',
              description: '94.7',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          MN: {
              name: 'Mongolia',
              description: '57.0',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          MR: {
              name: 'Mauritania',
              description: '94.9',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          MW: {
              name: 'Malawi',
              description: '86.9',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          MX: {
              name: 'Mexico',
              description: '71.8',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          MY: {
              name: 'Malaysia',
              description: '65.9',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          MZ: {
              name: 'Mozambique',
              description: '86.9',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          NA: {
              name: 'Namibia',
              description: '70.8',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          NC: {
              name: 'New Caledonia (French)',
              description: '', //TODO
              color: 'default',
              hover_color: 'default'
                      //url: ''
          },
          NE: {
              name: 'Niger',
              description: '97.8',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          NG: {
              name: 'Nigeria',
              description: '102.4',
              color: map1_colors[100],
              hover_color: map1_hover[100]
                      //url: ''
          },
          NI: {
              name: 'Nicaragua',
              description: '79.0',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          NL: {
              name: 'Netherlands',
              description: '26.8',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          NO: {
              name: 'Norway',
              description: '20.8',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          NP: {
              name: 'Nepal',
              description: '90.5',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          NZ: {
              name: 'New Zealand',
              description: '22.6',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          OM: {
              name: 'Oman',
              description: '52.0',
              color: map1_colors[50],
              hover_color: map1_hover[50]
                      //url: ''
          },
          PA: {
              name: 'Panama',
              description: '54.6',
              color: map1_colors[50],
              hover_color: map1_hover[50]
                      //url: ''
          },
          PE: {
              name: 'Peru',
              description: '71.9',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          PG: {
              name: 'Papua New Guinea',
              description: '83.4',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          PH: {
              name: 'Philippines',
              description: '86.3',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          PK: {
              name: 'Pakistan',
              description: '102.9',
              color: map1_colors[100],
              hover_color: map1_hover[100]
                      //url: ''
          },
          PL: {
              name: 'Poland',
              description: '39.8',
              color: map1_colors[30],
              hover_color: map1_hover[30]
                      //url: ''
          },
          PR: {
              name: 'Puerto Rico',
              description: '', //TODO
              color: 'default',
              hover_color: 'default'
                      //url: ''
          },
          PS: {
              name: 'Palestine',
              description: '', //TODO
              color: 'default',
              hover_color: 'default'
                      //url: ''
          },
          PT: {
              name: 'Portugal',
              description: '29.7',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          PY: {
              name: 'Paraguay',
              description: '71.3',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          QA: {
              name: 'Qatar',
              description: '46.3',
              color: map1_colors[40],
              hover_color: map1_hover[40]
                      //url: ''
          },
          RO: {
              name: 'Romania',
              description: '54.2',
              color: map1_colors[50],
              hover_color: map1_hover[50]
                      //url: ''
          },
          RS: {
              name: 'Serbia (Includes Kosovo)',
              description: '73.8',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          RU: {
              name: 'Russia',
              description: '80.0',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          RW: {
              name: 'Rwanda',
              description: '90.2',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          SA: {
              name: 'Saudi Arabia',
              description: '71.6',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          SB: {
              name: 'Solomon Islands',
              description: '85.9',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          SD: {
              name: 'Sudan',
              description: '110.8',
              color: map1_colors[110],
              hover_color: map1_hover[110]
                      //url: ''
          },
          SE: {
              name: 'Sweden',
              description: '20.2',
              color: map1_colors[20],
              hover_color: map1_hover[20]
                      //url: ''
          },
          SI: {
              name: 'Slovenia',
              description: '31.6',
              color: map1_colors[30],
              hover_color: map1_hover[30]
                      //url: ''
          },
          SK: {
              name: 'Slovakia',
              description: '42.6',
              color: map1_colors[40],
              hover_color: map1_hover[40]
                      //url: ''
          },
          SL: {
              name: 'Sierra Leone',
              description: '91.9',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          SN: {
              name: 'Senegal',
              description: '83.0',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          SO: {
              name: 'Somalia',
              description: '114.0',
              color: map1_colors[110],
              hover_color: map1_hover[110]
                      //url: ''
          },
          SR: {
              name: 'Suriname',
              description: '68.4',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          SS: {
              name: 'South Sudan',
              description: '114.5',
              color: map1_colors[110],
              hover_color: map1_hover[110]
                      //url: ''
          },
          SV: {
              name: 'El Salvador',
              description: '71.4',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          SY: {
              name: 'Syria',
              description: '107.9',
              color: map1_colors[100],
              hover_color: map1_hover[100]
                      //url: ''
          },
          SZ: {
              name: 'Swaziland',
              description: '86.3',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          TD: {
              name: 'Chad',
              description: '108.4',
              color: map1_colors[100],
              hover_color: map1_hover[100]
                      //url: ''
          },
          TG: {
              name: 'Togo',
              description: '86.8',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          TH: {
              name: 'Thailand',
              description: '79.1',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          TJ: {
              name: 'Tajikistan',
              description: '83.4',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          TL: {
              name: 'Timor-Leste',
              description: '90.6',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          TM: {
              name: 'Turkmenistan',
              description: '77.5',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          TN: {
              name: 'Tunisia',
              description: '75.8',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          TR: {
              name: 'Turkey',
              description: '74.5',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          TT: {
              name: 'Trinidad and Tobago',
              description: '58.7',
              color: map1_colors[50],
              hover_color: map1_hover[50]
                      //url: ''
          },
          TW: {
              name: 'Taiwan, Province of China',
              description: '', //TODO
              color: 'default',
              hover_color: 'default'
                      //url: ''
          },
          TZ: {
              name: 'Tanzania, United Republic of',
              description: '80.8',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          UA: {
              name: 'Ukraine',
              description: '76.3',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          UG: {
              name: 'Uganda',
              description: '97.0',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          US: {
              name: 'United States',
              description: '35.3',
              color: map1_colors[30],
              hover_color: map1_hover[30]
                      //url: ''
          },
          UY: {
              name: 'Uruguay',
              description: '36.5',
              color: map1_colors[30],
              hover_color: map1_hover[30]
                      //url: ''
          },
          UZ: {
              name: 'Uzbekistan',
              description: '85.4',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          VE: {
              name: 'Venezuela',
              description: '78.6',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          VN: {
              name: 'Vietnam',
              description: '72.4',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          VU: {
              name: 'Vanuatu',
              description: '', //TODO
              color: 'default',
              hover_color: 'default'
                      //url: ''
          },
          YE: {
              name: 'Yemen',
              description: '108.1',
              color: map1_colors[100],
              hover_color: map1_hover[100]
                      //url: ''
          },
          ZA: {
              name: 'South Africa',
              description: '67.0',
              color: map1_colors[60],
              hover_color: map1_hover[60]
                      //url: ''
          },
          ZM: {
              name: 'Zambia',
              description: '85.2',
              color: map1_colors[80],
              hover_color: map1_hover[80]
                      //url: ''
          },
          XK: {
              //Kosovo (part of Serbia to the UN)
              name: '',
              description: '73.8',
              color: map1_colors[70],
              hover_color: map1_hover[70]
                      //url: ''
          },
          XX: {
              name: 'Jammu and Kashmir',
              description: '', //TODO
              color: 'default',
              inactive: 'yes',
              hover_color: 'default'
                      //url: ''
          },
          ZW: {
              name: 'Zimbabwe',
              description: '100.0',
              color: map1_colors[90],
              hover_color: map1_hover[90]
                      //url: ''
          },
          SG: {
              name: 'Singapore',
              description: '34.4',
              color: map1_colors[30],
              hover_color: map1_hover[30]
                      //url: ''
          }
      },
      locations: {
          /*0: {
           name: 'Paris',
           lat: '48.866666670',
           lng: '2.333333333',
           color: 'default',
           description: ''
           //url: ''
           },

           1: {
           name: 'Tokyo',
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

  var map1 = create_simplemaps_worldmap();

  //jQuery(document).ready(function() {
  map1.load();
  //});

</script>