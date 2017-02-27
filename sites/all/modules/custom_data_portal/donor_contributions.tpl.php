<script type="text/javascript">
  /*$(document).ready(function(){
   $(".form-submit").onclick(function(){
   var year = $("#edit-year").val();
   alert(year);

   })

   });*/
</script>
<?php /* ?><script src="http://local.global.unfpa.org/sites/all/themes/unfpa_global/templates/html5worldmapv2.9_trial/mapdata.js"></script><?php */ ?>
<div class="select-box-container">

    <!-- Please select a year: <select name="projects-selector" class="projects_select"> -->
    <?php
    $year_cnt = count($data["year_arr"]);
    $cnt_yr_flag = 1;
    foreach ($data["year_arr"] as $key => $year) {
      ?>
      <?php /* ?><option value="<?php echo $year; ?>" <?php if ($cnt_yr_flag == $year_cnt) { ?>selected="selected"<?php } ?>><?php echo $year; ?></option> <?php */ ?>
      <?php
      if ($cnt_yr_flag == 1) {
        $last_selected_year = $year; // For display block on the last year show Program activities
      }
      $cnt_yr_flag++;
    }
    //print_r($data["year_arr"]);
    //$last_selected_year = array_pop($data["year_arr"]);
    ?>
    <!-- </select> -->
</div>
<?php

//echo $last_selected_year."---";
function get_donor_color_code($arr, $val) {
  $final_cc = '';
  foreach ($arr as $color_code => $upto_percent) {
    if ($val >= $upto_percent) {
      $final_cc = $color_code;
      break;
    }
  }

  return $final_cc;
}

$location_static_array = array('Comoros', 'Maldives', 'Fiji', 'Sao Tome & Principe', 'Seychelles', 'Cape Verde');
$location_static_latlon = array(
  "Comoros" => array("lat" => "-12.1667", "lng" => "44.25", "size" => "16"),
  "Maldives" => array("lat" => "-0.6", "lng" => "73.1", "size" => "16"),
  "Fiji" => array("lat" => "-19", "lng" => "178", "size" => "16"),
  "Sao Tome & Principe" => array("lat" => "0.2", "lng" => "6.6", "size" => "16"),
  "Seychelles" => array("lat" => "-4.5833", "lng" => "55.6667", "size" => "16"),
  "Cape Verde" => array("lat" => "15.1111", "lng" => "-23.6167", "size" => "16"),
);
$cnt = 0;

//print_r($data["color_code_array"]);
$sum_total_commitments = array_sum($data["total_commitments"]);
$flag_max = true;
foreach ($data["dd_array"] as $year => $arr) {
  if ($last_selected_year == $year) {
    foreach ($arr as $cc => $donor) {
      $cc_code = '';
      $commitments = isset($donor["commitments"]) ? $donor["commitments"] : 0;
      $payments_received = isset($donor["payments_received"]) ? $donor["payments_received"] : 0;
//Per Country Commitments percentage
      /* if ($payments_received == 0) {
        $res = 0;
        } else {
        $res = ($commitments / $payments_received) * 100;
        } */
      if ($commitments == 0) {
        $res = 0;
      }
      else {
        $res = ($commitments / $sum_total_commitments) * 100;
      }
//echo $flag_max."---";
      if ($flag_max) {
        $threshold_value = $res;
//echo  $threshold_value."---";
        $res = ($res / $threshold_value) * 100;
        $flag_max = false;
      }
      else {
        $res = ($res / $threshold_value) * 100;
      }

      $cc_code = get_donor_color_code($data["color_code_array"], $res);
      $country_temp_name = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
      if (!in_array($country_temp_name, $location_static_array)) {
        $country_arr[$cc]['name'] = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
        $country_arr[$cc]['description'] = "Contributions $ " . number_format($commitments);
        $country_arr[$cc]['color'] = ($cc_code != "") ? $cc_code : 'default';
        $country_arr[$cc]['hover_color'] = 'default';
        //$country_arr[$cc]['url'] = isset($data["cc_array"][$cc]["url"]) ? $data["cc_array"][$cc]["url"] : '';
        $country_arr[$cc]['inactive'] = "no";
        $country_arr[$cc]['hide'] = "no";
      }
      else {

        $location_arr[$cnt]['name'] = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
        $location_arr[$cnt]['description'] = "Contributions $ " . number_format($commitments);
        $location_arr[$cnt]['color'] = ($cc_code != "") ? $cc_code : 'default';
        $location_arr[$cnt]['hover_color'] = 'default';
        //$location_arr[$cnt]['url'] = isset($data["cc_array"][$cc]["url"]) ? $data["cc_array"][$cc]["url"] : '';
        $location_arr[$cnt]['display'] = "all";
        $location_arr[$cnt]['type'] = "circle";
        $location_arr[$cnt]['size'] = $location_static_latlon[$country_temp_name]["size"];
        $location_arr[$cnt]['lat'] = $location_static_latlon[$country_temp_name]["lat"];
        $location_arr[$cnt]['lng'] = $location_static_latlon[$country_temp_name]["lng"];
        $cnt++;
      }


//echo "--".$cc."---".$res."---".$cc_code."<br />";
//}
      /* name: 'United Arab Emirates',
        description: 'default',
        color: '#E4F5F9',
        hover_color: 'default',
        url: 'default',
        hide: 'no',
        inactive: 'no' */
    }
  }
}

//echo "<pre>";
//print_r($country_arr);
//echo "</pre>";
?>
<script type="text/javascript">
  var simplemaps_worldmap_mapdata = {
      main_settings: {
          width: 'responsive',
          background_color: '#F1FBFD',
          background_transparent: 'yes',
          label_color: '#d5ddec',
          //border_color: '#759BB4',
          border_color: '#FFFFFF',
          pop_ups: 'detect',
          state_description: 'Commitments $ 0.00',
          //state_color: '#7ACCE0',
          state_color: '#CCC',
          //state_hover_color: '#3B729F',
          state_hover_color: '#C0DC7D',
          state_url: '',
          all_states_inactive: 'no',
          location_description: 'Location description',
          location_color: '#7ACCE0',
          location_opacity: '1',
          location_url: '',
          location_size: '35',
          location_type: 'circle',
          all_locations_inactive: 'no',
          div: 'map',
          arrow_color: '#3B729F',
          arrow_color_border: '#88A4BC',
          border_size: '0.75',
          popup_color: 'white',
          popup_opacity: '0.9',
          popup_shadow: '1',
          popup_corners: '5',
          popup_font: '12px/1.5 Verdana, Arial, Helvetica, sans-serif',
          popup_nocss: 'no',
          initial_zoom: '-1',
          initial_zoom_solo: 'no',
          all_states_zoomable: 'no',
          auto_load: 'yes',
          zoom: 'no',
          js_hooks: 'no',
          url_new_tab: 'yes'
      },
      borders: {
          0: {
              name: "Kosovo",
              path: "m 1102.2181,356.79763 c 0.5294,-0.2112 1.0339,-0.50801 1.5795,-0.66507 0.1655,-0.015 0.3311,-0.0301 0.4966,-0.0451 0.2412,-0.40621 0.7189,-0.71819 0.7435,-1.21625 0.1369,-0.46302 -0.1218,-1.25401 0.5593,-1.26271 0.4044,0.0263 0.7119,0.45452 1.0766,0.64452 0.864,0.61148 1.7281,1.22297 2.5921,1.83444 0.1186,0.24999 0.081,0.69395 0.2971,0.82277 0.4109,0.0171 0.8218,0.0342 1.2327,0.0513 0.2215,0.43031 0.4416,0.86059 0.068,1.27022 -0.2595,0.50535 -0.5191,1.01069 -0.7786,1.51606 -1.1851,0.35969 -2.3733,0.70944 -3.5511,1.09265 -0.1457,0.40354 -0.098,1.14952 -0.3688,1.33167 -0.2994,-0.13489 -0.7582,-0.12751 -0.7406,-0.54515 -0.1037,-0.44428 -0.2074,-0.88856 -0.3111,-1.33284 -0.6738,-0.52812 -1.3476,-1.05624 -2.0214,-1.58436 -0.2914,-0.63739 -0.5827,-1.2748 -0.8741,-1.91219 z",
              color: '#3B729F',
              size: "1",
              dash: '.',
          },
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
              dash: '.',
          }
      },
      state_specific:<?php echo json_encode($country_arr); ?>,
      locations:<?php echo json_encode($location_arr); ?>,
      /*locations: {
       0: {
       name: 'Comoros',
       lat: '-12.1667',
       lng: '44.25',
       description: '',
       color: 'default',
       url: 'https://data.unfpa.org/docs/com',
       size: '16',
       type: 'circle',
       opacity: '1',
       border_color: '#759BB4'
       },
       1: {
       name: 'Maldives',
       lat: '-0.6',
       lng: ' 73.1',
       color: 'default',
       type: 'circle',
       description: '',
       url: 'https://data.unfpa.org/docs/mdv',
       size: '16',
       opacity: '1'
       },
       2: {
       name: 'Pacific-SRO - Fiji',
       lat: '-19',
       lng: '178',
       color: 'default',
       description: '',
       url: 'https://data.unfpa.org/docs/r62',
       size: '36',
       type: 'circle',
       opacity: '1'
       },
       3: {
       name: 'Sao Tome & Principe',
       lat: '0.2',
       lng: '6.6',
       color: 'default',
       description: '',
       url: 'https://data.unfpa.org/docs/stp',
       size: '16',
       type: 'circle',
       opacity: '1'
       },
       4: {
       name: 'Seychelles',
       lat: '-4.5833',
       lng: '55.6667',
       color: 'default',
       description: '',
       url: 'https://data.unfpa.org/docs/syc',
       size: '16',
       type: 'circle',
       opacity: '1'
       }

       },*/
      /*regions: {
       0: {
       name: 'East & Southern Africa',
       states: ["AO", "BW", "BI", "KM", "CD", "ER", "ET", "KE", "LS", "MG", "MU", "SC", "MW", "MZ", "NA", "RW", "ZA", "SS", "SZ", "TZ", "UG", "ZM", "ZW"]
       },
       1: {
       name: 'West & Central Africa',
       states: ["BJ", "BF", "CM", "CV", "CF", "TD", "CG", "CI", "GQ", "GA", "GM", "GH", "GN", "GW", "LR", "ML", "MR", "NE", "NG", "ST", "SN", "SL", "TG"]
       },
       2: {
       name: 'Arab States',
       states: ["DZ", "DJ", "EG", "IQ", "JO", "LB", "LY", "MA", "OM", "PS", "SO", "SD", "SY", "TN", "YE"]
       },
       3: {
       name: 'Asia & the Pacific',
       states: ["AF", "BD", "BT", "CN", "KH", "TW", "IN", "ID", "IR", "JP", "LA", "MY", "MV", "MN", "MM", "NP", "PK", "PG", "PH", "LK", "TH", "TL", "VN"]
       },
       4: {
       name: 'Eastern Europe & Central Asia',
       states: ["AL", "AM", "AZ", "BY", "BA", "GE", "KZ", "CS", "KG", "MK", "MD", "RU", "RS", "TJ", "TR", "TM", "UA", "UZ"]
       },
       5: {
       name: 'Latin America & the Caribbean',
       states: ["AR", "BR", "BO", "CL", "CO", "CR", "CU", "DO", "EC", "SV", "GT", "HT", "HN", "MX", "NI", "PA", "PY", "PE", "UY", "VE", "BS", "TC", "CU", "HT", "DO", "JM", "KY", "PR", "VI", "VG", "AI", "AG", "GP", "SX", "BQ", "BL", "KN", "MS", "GP", "TT"]
       }

       },*/
      continent: [
          {
              x: '890',
              y: '489.1999999999999',
              width: '215.0000000000005',
              height: '335.9000000000003'
          },
          {
              x: '684.4000000000001',
              y: '430.1',
              width: '294.4',
              height: '205.4999999999998'
          },
          {
              x: '731.4',
              y: '365.8',
              width: '422.40000000000026',
              height: '248.70000000000007'
          },
          {
              x: '1053.9',
              y: '273.90000000000003',
              width: '645.6999999999997',
              height: '402.6'
          },
          {
              x: '904.4',
              y: '114.69999999999997',
              width: '712.0999999999997',
              height: '265.1'
          },
          {
              x: '184.29999999999995',
              y: '395.6000000000001',
              width: '444.7999999999999',
              height: '555.3999999999997'
          },
          {
              x: '0',
              y: '0',
              height: '1017.3917466920637',
              width: '1800.0000000000002'
          }

      ]

  }
</script>
<?php global $base_url; ?>
<script src="<?php echo $base_url; ?>/sites/all/themes/unfpa_global/templates/html5worldmap/worldmap.js"></script>
<div id="map"></div>
<div id="map-scale-1">
    <div class="scale"></div>
    <span class="max">Higher</span>
    <span class="min">Lower</span>
</div>
<?php
preparehorizontalbarchart($data['chart_array'], $last_selected_year);

function preparehorizontalbarchart($arr_chart, $last_selected_year) {
// array to be converted to json string and used in google chart's area chart

  $chart_title = 'Top 20 donors to UNFPA core and non-core resources';
  $options_array = array('title' => $chart_title,
    "isStacked" => true,
    'vAxis' => array('title' => 'Donors', 'titleTextStyle' => array('color' => '#4B8BCD')),
    'hAxis' => array('format' => '###,###,###$'),
    'chartArea' => array("width" => "60%", "height" => "75%", "left" => "20%"),
    'colors' => array('#91A0AE', '#E0DECD') // colors:['red','#E0DECD']
  );

  $label_res_type = "Core";
  $label_res_type_nc = "Non Core";
  $bar_chart_cols_arr = array(
    array('id' => 'Country', 'label' => 'Country', 'pattern' => '', 'type' => 'string'),
    array('id' => $label_res_type, 'label' => $label_res_type, 'pattern' => '', 'type' => 'number'),
    array('id' => $label_res_type_nc, 'label' => $label_res_type_nc, 'pattern' => '', 'type' => 'number')
  );
// array to be converted to json string and used in google chart's area chart
  $bar_chart_rows_arr = array();
  foreach ($arr_chart as $year => $bar_data) {
    if ($year == $last_selected_year) { // Show data for only selected year
      $i = 0;
      foreach ($bar_data as $key => $arr) {
        if ($i < 20) {
          array_push($bar_chart_rows_arr, array('c' => array(
              array('v' => $arr["cc"]),
              //array('v' => $arr["donation_c"]),
              array('v' => round($arr["donation_c"], 0, PHP_ROUND_HALF_UP)),
              //array('v' => $arr["donation_nc"])
              array('v' => round($arr["donation_nc"], 0, PHP_ROUND_HALF_UP))
            )
          ));
        }
        $i++;
      }
    }
  }
  // print_r($bar_chart_cols_arr);
  ?>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
    google.load("visualization", "1", {packages: ["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        /*var data = google.visualization.arrayToDataTable([
         ['Year', 'Sales', 'Expenses'],
         ['2004', 1000, 400],
         ['2005', 1170, 460],
         ['2006', 660, 1120],
         ['2007', 1030, 540]
         ]);
         console.log(data.toJSON());
         */
        var data = new google.visualization.DataTable({
            cols: <?php echo json_encode($bar_chart_cols_arr); ?>,
            rows: <?php echo json_encode($bar_chart_rows_arr); ?>});
        /*var options = {
         title: 'Top 20 donors to UNFPA core resources',
         vAxis: {title: 'Countries', titleTextStyle: {color: '#4B8BCD'}},
         colors:['#91A0AE'] // colors:['red','#004411']
         };*/
        var options = <?php echo json_encode($options_array); ?>;
        var formatter = new google.visualization.NumberFormat(
                {negativeColor: 'red', negativeParens: true, pattern: '$###,###,###'});
        formatter.format(data, 1); // Apply formatter to second column
        formatter.format(data, 2);
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

        chart.draw(data, options);
    }
  </script>
  <div id="chart_div" style="width: 980px; height: 750px;"></div>
  <?php
}
