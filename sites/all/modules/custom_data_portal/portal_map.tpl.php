<?php
/**
 * @file
 * Displays the template for Program Expense.
 */
?>
<div class="select-box-container">
  <?php
  $year_cnt = count($data["year_arr"]);
  $cnt_yr_flag = 1;
  foreach ($data["year_arr"] as $key => $year) {
    ?>
    <?php
    if ($cnt_yr_flag == $year_cnt) {
      // For display block on the last year show Program activities.
      $last_selected_year = $data['selected_year'];
    }
    $cnt_yr_flag++;
  }
  ?>
</div>
<div id="active-activities"></div>

<?php

/**
 * This function is used to get the color code according to value.
 */
function get_color_code($arr, $val) {
  $final_cc = '';
  foreach ($arr as $color_code => $upto_percent) {
    if ($val >= $upto_percent) {
      $final_cc = $color_code;
      break;
    }
  }

  return $final_cc;
}

$location_static_array = array(
  'Comoros', 'Maldives', 'Pacific-SRO', 'Sao Tome & Principe',
  'Seychelles', 'Cape Verde', 'Caribbean SRO',
);
$location_static_latlon = array(
  "Comoros" => array(
    "lat" => "-12.1667",
    "lng" => "44.25",
    "size" => "16"
  ),
  "Maldives" => array(
    "lat" => "-0.6",
    "lng" => "73.1",
    "size" => "16"
  ),
  "Sao Tome & Principe" => array(
    "lat" => "0.333",
    "lng" => "6.73",
    "size" => "16"
  ),
  "Seychelles" => array(
    "lat" => "-4.5833",
    "lng" => "55.6667",
    "size" => "16"
  ),
  "Cape Verde" => array(
    "lat" => "15.1111",
    "lng" => "-23.6167",
    "size" => "16"
  ),
  "Pacific-SRO" => array(
    "lat" => "-18.0000",
    "lng" => "179.0000",
    "size" => "16"
  ),
  "Caribbean SRO" => array(
    "lat" => "18.1824",
    "lng" => "-77.3218",
    "size" => "16"
  ),
);
$cnt = 0;
foreach ($data["map_data"] as $year => $spending_arr) {
  if ($last_selected_year == $year) {
    $threshold_value = max($data["max_spending"][$year]);
    $total_year_spending = array_sum($data["total_spending"][$year]);
    foreach ($spending_arr as $cc => $total_spending) {
      $cc_code = '';
      $total_spending = array_sum($total_spending);
      $actual_country_spending_percentage = ($total_spending / $threshold_value) * 100;
      $cc_code = get_color_code($data["color_code_array"], $actual_country_spending_percentage);
      $country_temp_name = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
      if (!in_array($country_temp_name, $location_static_array)) {
        $country_arr[$cc]['name'] = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
        $descr = '';
        if (isset($data["cc_array"][$cc]["description"])) {
          $descr = $data["cc_array"][$cc]["description"];
        }
        $country_arr[$cc]['description'] = "Total spending: $" . number_format($total_spending) . "<br/>" . $descr;
        $country_arr[$cc]['color'] = ($cc_code != "") ? $cc_code : 'default';
        $country_arr[$cc]['hover_color'] = 'default';
        $country_arr[$cc]['url'] = isset($data["cc_array"][$cc]["url"]) ? '/' . $data["cc_array"][$cc]["url"] : '';
        $country_arr[$cc]['hide'] = "no";
        $country_arr[$cc]['inactive'] = "no";
        $country_arr[$cc]['region_name'] = $data['map_region_name'][$cc];
      }
      else {
        $location_arr[$cnt]['name'] = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
        $descr = '';
        if (isset($data["cc_array"][$cc]["description"])) {
          $descr = $data["cc_array"][$cc]["description"];
        }
        $location_arr[$cnt]['description'] = "Total spending: $" . number_format($total_spending) . "<br/>" . $descr;
        $location_arr[$cnt]['color'] = ($cc_code != "") ? $cc_code : 'default';
        $location_arr[$cnt]['hover_color'] = 'default';
        $location_arr[$cnt]['url'] = isset($data["cc_array"][$cc]["url"]) ? $data["cc_array"][$cc]["url"] : '';
        $location_arr[$cnt]['type'] = "circle";
        $location_arr[$cnt]['display'] = "region";
        $location_arr[$cnt]['label'] = "yes";
        $location_arr[$cnt]['hide'] = "no";
        $location_arr[$cnt]['size'] = $location_static_latlon[$country_temp_name]["size"];
        $location_arr[$cnt]['lat'] = $location_static_latlon[$country_temp_name]["lat"];
        $location_arr[$cnt]['lng'] = $location_static_latlon[$country_temp_name]["lng"];
        $cnt++;
      }
    }
  }
}
$country_list_arr = array();
foreach ($country_arr as $key => $value) {
  if (!empty($value['url'])) {
    $country_list_arr[$value['region_name']][$key]['name'] = $value['name'];
    $country_list_arr[$value['region_name']][$key]['url'] = $value['url'];
  }
}
?>
<script type="text/javascript">
  var simplemaps_worldmap_mapdata = {
    main_settings: {
      width: 'responsive',
      background_color: '#F1FBFD',
      background_transparent: 'yes',
      label_color: '#d5ddec',
      border_color: '#FFFFFF',
      state_description: '',
      state_color: '#CCC',
      state_hover_color: '#C0DC7D',
      state_url: '',
      all_states_inactive: 'no',
      location_description: 'Location description',
      location_color: '#CCC',
      location_opacity: '1',
      location_url: 'http://unfpa.org',
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
      zoom: 'yes',
      js_hooks: 'yes',
      url_new_tab: 'no',
      link_text: 'Click here'
    },
    borders: {
      0: {
        name: "Kosovo",
        path: "m 1102.2181,356.79763 c 0.5294,-0.2112 1.0339,-0.50801 1.5795,-0.66507 0.1655,-0.015 0.3311,-0.0301 0.4966,-0.0451 0.2412,-0.40621 0.7189,-0.71819 0.7435,-1.21625 0.1369,-0.46302 -0.1218,-1.25401 0.5593,-1.26271 0.4044,0.0263 0.7119,0.45452 1.0766,0.64452 0.864,0.61148 1.7281,1.22297 2.5921,1.83444 0.1186,0.24999 0.081,0.69395 0.2971,0.82277 0.4109,0.0171 0.8218,0.0342 1.2327,0.0513 0.2215,0.43031 0.4416,0.86059 0.068,1.27022 -0.2595,0.50535 -0.5191,1.01069 -0.7786,1.51606 -1.1851,0.35969 -2.3733,0.70944 -3.5511,1.09265 -0.1457,0.40354 -0.098,1.14952 -0.3688,1.33167 -0.2994,-0.13489 -0.7582,-0.12751 -0.7406,-0.54515 -0.1037,-0.44428 -0.2074,-0.88856 -0.3111,-1.33284 -0.6738,-0.52812 -1.3476,-1.05624 -2.0214,-1.58436 -0.2914,-0.63739 -0.5827,-1.2748 -0.8741,-1.91219 z",
        color: '#3B729F',
        size: "1",
        dash: '.'
      },
      1: {
        name: "Sudan",
        path: "m 1135.1413,573.78254 1.1589,-1.31346 1.159,-0.23179 0.9271,-3.24502 0.4636,-1.2362 0,-1.31347 c 0.2322,-0.71267 1.0997,-1.63712 1.9315,-2.54966 l 0.6954,-0.77263 2.936,-0.69536 0.5408,1.46799 1.6225,1.54525 1.3135,1.8543 1.2362,1.2362 2.5497,-0.92715 3.8631,0 1.468,1.8543 4.5585,-0.15452 0.077,-0.77263 3.3996,-2.00883 0.5408,-1.08167 0.4636,-1.00441 1.7771,-0.92715 c 1.5682,1.10743 3.4452,2.21485 4.2494,3.32228 l 2.6269,-0.46357 2.4724,-2.54966 1.468,-3.09051 2.5496,-2.31787 -0.618,-4.3267 -1.468,-1.69978 3.6313,-0.15456 2.4724,-1.08168 -0.3863,3.63134 0.6953,5.40837 4.2495,3.70861 0.2318,1.69977 -0.077,1.31347 0.6181,1.46799",
        color: '#3B729F',
        size: "1",
        dash: '.'
      },
      2: {
        name: "Kashmir",
        path: "m 1403.7369,423.83216 1.639,0 1.0926,-0.3278 0.5464,-1.42045 1.3112,-0.6556 2.076,-0.54632 2.1853,0.65559 3.1687,-0.54633 3.0595,-0.10926 2.5131,0.54632",
        color: '#3B729F',
        size: "1",
        dash: '.'
      },
      3: {
        name: "Jammu",
        path: "m 1385.271,394.11188 c -0.7978,0.6336 -1.5957,1.26717 -2.3935,1.90076 -1.2223,0.3796 -1.4474,1.7298 -0.6659,2.6884 0.5463,-0.21853 1.0926,-0.43706 1.6389,-0.65559 1.6733,2.27561 3.3465,4.55126 5.0198,6.82686 0.8589,0.92105 -0.4741,1.82162 -0.7584,2.67926 0.6504,1.65986 1.2109,3.35415 1.8981,4.9997 1.2227,2.02051 3.14,3.49237 4.8764,5.05274 l 0.089,-2.9823 -0.8499,-2.31788 -0.7726,-0.30905 -0.9272,-1.54525 0.1546,-2.08609 1.5452,-0.69536 6.1038,1.15894 2.0088,0.30905 1.3134,-1.00442 2.8588,-0.46357",
        color: '#3B729F',
        size: "1",
        dash: '.'
      },
      4: {
        name: "Korea",
        path: "m 1662.9603,388.19792 c 0.1932,-1.00441 0.3863,-2.00883 0.5795,-3.01324 0.5812,-0.23536 1.1364,-0.64371 1.7996,-0.53494 1.0246,-0.0115 2.0719,0.1459 3.0684,-0.16285 0.3804,-0.17681 1.2027,0.01 1.0508,-0.60464 0.01,-0.46725 0.021,-0.93451 0.031,-1.40176",
        color: '#3B729F',
        size: "1",
        dash: '.'
      },
      5: {
        name: "Somalia",
        path: "m 1234.9213,603.02797 c 0.2563,0.90027 0.8011,-0.50856 1.202,-0.76486 l 4.4799,-0.9834 1.5297,-2.18531 5.2447,-1.96678 4.6984,0.49169 16.7177,-19.72246",
        color: '#3B729F',
        size: "1",
        dash: '.'
      },
      6: {
        name: "Kashmir-Jammu-China",
        path: "m 1420.0625,415.12502 -1.625,-1.25 -0.75,-1.875 1.4375,-1 -0.125,-0.5625 -0.1875,-0.5625 -0.6875,-0.5 -0.875,-0.1875 -0.5625,0 -0.4375,-0.25 -0.6875,-0.0625 -0.9375,0.25 -0.4375,-0.875 -0.8125,-2.125 -1,-1.0625 -0.3125,-0.875 -0.062,-0.8125 -0.3125,-0.4375",
        color: 'gray',
        size: "1",
        dash: ''
      }
    },
    state_specific:<?php echo json_encode($country_arr); ?>,
    locations:<?php echo json_encode($location_arr); ?>,
    regions: {
      0: {
        name: 'East & Southern Africa',
        states: ["AO", "BW", "BI", "KM", "CD", "ER", "ET", "KE", "LS", "MG", "MU", "SC", "MW", "MZ", "NA", "RW", "ZA", "SS", "SZ", "TZ", "UG", "ZM", "ZW"],
        url: 'javascript: update_charts(0)',
        description: 'Select for regional view'
      },
      1: {
        name: 'West & Central Africa',
        states: ["BJ", "BF", "CM", "CV", "CF", "TD", "CG", "CI", "GQ", "GA", "GM", "GH", "GN", "GW", "LR", "ML", "MR", "NE", "NG", "ST", "SN", "SL", "TG"],
        url: 'javascript: update_charts(1)',
        description: 'Select for regional view'
      },
      2: {
        name: 'Arab States',
        states: ["DZ", "DJ", "EG", "IQ", "JO", "LB", "LY", "MA", "OM", "PS", "SO", "SD", "SY", "TN", "YE"],
        url: 'javascript: update_charts(2)',
        description: 'Select for regional view'
      },
      3: {
        name: 'Asia & the Pacific',
        states: ["AF", "CN", "BD", "BT", "KH", "TW", "IN", "ID", "IR", "JP", "LA", "MY", "MV", "MN", "MM", "NP", "PK", "PG", "PH", "LK", "TH", "TL", "VN", "XX", "FJ"],
        url: 'javascript: update_charts(3)',
        description: 'Select for regional view'
      },
      4: {
        name: 'Eastern Europe & Central Asia',
        states: ["AL", "XK", "AM", "AZ", "BY", "BA", "GE", "KZ", "CS", "KG", "MK", "MD", "RU", "RS", "TJ", "TR", "TM", "UA", "UZ"],
        url: 'javascript: update_charts(4)',
        description: 'Select for regional view'
      },
      5: {
        name: 'Latin America & the Caribbean',
        states: ["AR", "BR", "BO", "CL", "CO", "CR", "CU", "DO", "EC", "SV", "GT", "HT", "HN", "MX", "NI", "PA", "PY", "PE", "UY", "VE", "BS", "TC", "CU", "HT", "DO", "KY", "PR", "VI", "VG", "AI", "AG", "GP", "SX", "BQ", "BL", "KN", "MS", "GP", "TT", "JM"],
        url: 'javascript: update_charts(5)',
        description: 'Select for regional view'
      }
    },
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
  };
</script>
<?php global $base_url; ?>
<script src="<?php echo $base_url; ?>/sites/all/themes/unfpa_global/templates/html5worldmap/worldmap.js"></script>
<div class="topo clearfix">
  <div class="popover">
    <a href="javascript:;" class="btn pencil">Select region, country or territory</a>
    <div class="thepopover" style="display: none;">
      <span class="pinguelo"></span>
      <div id="AreaClickId" class="parent drp_txt">
        <?php
        foreach ($country_list_arr as $key_region => $region) {

          if (isset($key_region)) {
            $id = NULL;
            switch ($key_region) {
              case 'East & Southern Africa':
                $id = 0;
                break;

              case 'West & Central Africa':
                $id = 1;
                break;

              case 'Arab States':
                $id = 2;
                break;

              case 'Asia & the Pacific':
                $id = 3;
                break;

              case 'Eastern Europe & Central Asia':
                $id = 4;
                break;

              case 'Latin America & the Caribbean':
                $id = 5;
                break;
            }
            print '<div class="area">';
            print '<h3> <a href="javascript:update_charts(' . $id . ');">' . $key_region . '</a></h3>';
            print '<ul>';
          }
          if (isset($region)) {
            foreach ($region as $key => $value) {
              print '<li><a href="' . $value['url'] . '">' . $value['name'] . '</a></li>';
            }
          }

          if ($key_region == 'Latin America & the Caribbean') {
            print '<li><a href="' . '/transparency-portal/unfpa-caribbean-sro' . '">' . 'Caribbean SRO' . '</a></li>';
          }if ($key_region == 'Asia & the Pacific') {
            print '<li><a href="' . '/transparency-portal/unfpa-pacific-sro' . '">' . 'Pacific-SRO' . '</a></li>';
          }

          print '</ul></div>';
        }
        ?>
      </div>
    </div>
    <span class="info">Click on a region, country or territory or select from dropdown list</span>
  </div>
</div>
<div id="map"></div>
<div id="map-scale-1">
  <div class="scale"></div>
  <span class="max">Higher</span>
  <span class="min">Lower</span>
</div>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<div class="all_chart_wrapper">
  <?php
  prepare_donut_chart_data_page($data["sub_total_arr"], $data["total_arr"], $data["support_outcomes"]);

  /**
   * This function is used to draw donut chart of Both Core and Non core data.
   */
  function prepare_donut_chart_data_page($arr, $total_arr, $so) {
    $color_array = array('#4495D1', '#F7931D', '#40B879', '#7D79A8', '#C0DB7D');
// Prepare Pie Chart for Both Regular Resources &
// Other REsources- CORE,NON CORE.
    $tmp = array();
    $temp = array();
    foreach ($so as $sokey => $soval) {
      array_push($tmp, $soval['label']);
    }
    $tmp = array_unique($tmp);
    foreach ($tmp as $tmpkey => $tmpval) {
      array_push($temp, $tmpval);
    }

    $budget_total = array();
    foreach ($arr as $year => $graph_activity) {
      $parent_total = array();
      $bud = array();
      foreach ($graph_activity as $graph_activity_key => $graph_activity_value) {
        $tot = 0;
        foreach ($graph_activity_value as $graph_activity_value_key => $graph_activity_value_val) {
          $tot += $graph_activity_value_val;
        }
        $bud[$graph_activity_key] = $tot;
      }
      $parent_number = 1;
      $temp_index = 0;
      $parent_total['P' . $parent_number] = 0;
      foreach ($so as $sokey => $soval) {
        if ($temp[$temp_index] == $soval['label']) {
          if (!isset($bud[$sokey])) {
            $bud[$sokey] = 0;
          }
          $parent_total['P' . $parent_number] = $parent_total['P' . $parent_number] + $bud[$sokey];
        }
        else {
          $temp_index++;
          $parent_number++;
          $parent_total['P' . $parent_number] = 0;
        }
      }
      // Total Year Array Budget.
      $total_year_budget = array_sum($total_arr[$year]);
      $do_chart_cols_arr = array(
        array(
          'id' => 'Sector',
          'label' => 'Sector',
          'pattern' => '',
          'type' => 'string',
        ),
        array(
          'id' => 'Percentage',
          'label' => 'Percentage',
          'pattern' => '',
          'type' => 'number',
        ),
      );
// Array to be converted to json string and used in google chart's area chart.
      $do_chart_rows_arr = array();
      $do_chart_slices_arr = array();
      $i = 0;
      $parent_value_budget_total = 0;
      foreach ($parent_total as $parent_key => $parent_value_budget) {
        $parent_value_budget_total += $parent_value_budget;
      }
      foreach ($parent_total as $parent_key => $parent_value_budget) {
        if (($parent_value_budget / $parent_value_budget_total) * 100 < 0.1) {

          $parent_value_budget = 0;
        }
        array_push($do_chart_rows_arr, array(
          'c' => array(
            array('v' => $so[$parent_key]["label"]),
            array('v' => $parent_value_budget),
          ),
        ));
        $do_chart_slices_arr[$i]['color'] = $color_array[$i];
        $i++;
      }
      ?>
      <script type="text/javascript">
      google.load("visualization", "1", {packages: ["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable({
          cols: <?php echo json_encode($do_chart_cols_arr); ?>,
          rows: <?php echo json_encode($do_chart_rows_arr); ?>});
        if (window.innerWidth > 768) {
          var options = {
            title: <?php echo $year; ?> + ' worldwide programme expenses',
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            pieHole: 0.4,
            chartArea: {width: '85%'},
            slices: <?php echo json_encode($do_chart_slices_arr); ?>
          };
        } else {
          var options = {
            title: <?php echo $year; ?> + ' worldwide programme expenses',
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            pieHole: 0.4,
            legend: {position: 'bottom'},
            chartArea: {width: '85%'},
            slices: <?php echo json_encode($do_chart_slices_arr); ?>
          };
        }
        var formatter = new google.visualization.NumberFormat(
          {pattern: '$###,###,###', negativeColor: 'red', negativeParens: true});
        // Apply formatter to second column.
        formatter.format(data, 1);

        var chart = new google.visualization.PieChart(document.getElementById('donutchart-all-<?php echo $year; ?>'));
        chart.draw(data, options);

        function selectHandler() {
          var selectedItem = chart.getSelection()[0];
          if (selectedItem) {
            reDrawBarChart<?php echo $year; ?>(selectedItem.row);
          }
        }
        google.visualization.events.addListener(chart, 'select', selectHandler);
      }
      </script>
      <?php
    }
  }

  prepareBarChartFromDonut($data["sub_total_arr"], $data["total_arr"], $data["support_outcomes"]);

  /**
   * This function is used to draw bar chart from donut chart
   * of Both Core and Non core data.
   */
  function prepareBarChartFromDonut($arr, $total_arr, $so) {
    $color_array = array(
      '#4495D1', '#1E5985', '#455B7A', '#6CA5D9', '#8FB7E1', '#7587A8',
      '#F7931D', '#C38743', '#EC9E46', '#FCBB75', '#40B879', '#5F7F6C',
      '#5E9E78', '#6FC391', '#7D79A8', '#324053', '#4F4261', '#6A618B',
      '#A9A4C5', '#C0DB7D', '#A2B37C', '#CCE195', '#D8E8AE'
    );
    // Prepare Pie Chart for Both Regular Resources &
    // Other REsources- CORE,NON CORE.
    foreach ($arr as $year => $graph_activity) {
      $bud = array();
      $budget_total = array();
      foreach ($graph_activity as $graph_activity_key => $graph_activity_value) {
        $tot = 0;
        foreach ($graph_activity_value as $graph_activity_value_key => $graph_activity_value_val) {
          $tot += $graph_activity_value_val;
        }
        $bud[$graph_activity_key] = $tot;
      }
      // Total Year Array Budget.
      $total_year_budget = array_sum($total_arr);
      $do_chart_cols_arr = array(
        array(
          'id' => 'Sector',
          'label' => 'Sector',
          'pattern' => '',
          'type' => 'string'
        ),
        array(
          'id' => 'Expenses',
          'label' => 'Expenses',
          'pattern' => '',
          'type' => 'number'
        ),
        array(
          'id' => 'Style',
          'label' => 'Style',
          'role' => 'style',
          'type' => 'string'
        ),
      );
      // Array to be converted to json string and
      // used in google chart's area chart.
      $do_chart_rows_arr = array();
      $do_chart_slices_arr = array();
      $do_chart_rows_arr_bar = array();
      $i = 0;
      foreach ($so as $so_key => $so_val) {
        if (strpos($so_key, 'P') === FALSE) {
          if (($bud[$so_key] === NULL) || ($bud[$so_key] < 0)) {
            $bud[$so_key] = 0;
          }
        }
        else {
          $bud[$so_key] = NULL;
        }
        array_push($do_chart_rows_arr_bar, array('c' => array(
            array('v' => $so_val['outcomes']),
            array('v' => $bud[$so_key]),
            array('v' => $color_array[$i]),
          )
        ));
        $i++;
      }
      ?>

      <script type="text/javascript">
        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(drawBarColors<?php echo $year; ?>);
        function drawBarColors<?php echo $year; ?>() {
          reDrawBarChart<?php echo $year; ?>(0);
        }
        function reDrawBarChart<?php echo $year; ?>(selectedParentID) {
          var bar_chart_rows = <?php echo json_encode($do_chart_rows_arr_bar); ?>;
          var selected_bar_chart_rows = new Array();
          var parent_bar_chart_rows = new Array();
          var j = 0;
          var flag = false;
          for (var i = 0; i < bar_chart_rows.length; i++) {
            if (bar_chart_rows[i]['c'][1]['v'] === null) {
              parent_bar_chart_rows[j] = bar_chart_rows[i]['c'][0]['v'];
              j++;
            }
          }
          j = 0;
          for (var i = 0; i < bar_chart_rows.length; i++) {
            if (bar_chart_rows[i]['c'][1]['v'] === null) {
              flag = false;
            }
            if (flag) {
              selected_bar_chart_rows[j] = (bar_chart_rows[i]);
              j++;
            }
            if (bar_chart_rows[i]['c'][0]['v'] === parent_bar_chart_rows[selectedParentID]) {
              flag = true;
            }
          }
          var data = new google.visualization.DataTable({
            cols: <?php echo json_encode($do_chart_cols_arr); ?>,
            rows: selected_bar_chart_rows});
          var options = {
            title: parent_bar_chart_rows[selectedParentID],
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '50%', left: '40%'},
            legend: {position: "none"},
            bar: {groupWidth: "40"},
            hAxis: {
              title: 'Expenses in USD',
              minValue: 0
            },
          };
          var formatter = new google.visualization.NumberFormat(
            {pattern: '$###,###,###', negativeColor: 'red', negativeParens: true});
          // Apply formatter to second column.
          formatter.format(data, 1);
          var chart = new google.visualization.BarChart(document.getElementById('bchart-all-<?php echo $year; ?>'));
          chart.draw(data, options);
        }
      </script>
      <?php
    }
  }

  prepareDonutChartCore($data["fund_arr_core"], $data["fund_arr"], $data["support_outcomes"]);

  /**
   * This function is used to draw donut chart of Core data.
   */
  function prepareDonutChartCore($arr_fund_core, $total_fund_arr, $so) {
    $color_array = array('#4495D1', '#F7931D', '#40B879', '#7D79A8', '#C0DB7D');
    $tmp = array();
    $temp = array();
    foreach ($so as $sokey => $soval) {
      array_push($tmp, $soval['label']);
    }
    $tmp = array_unique($tmp);
    foreach ($tmp as $tmpkey => $tmpval) {
      array_push($temp, $tmpval);
    }

    // Prepare Pie Chart for Both Regular Resources &
    // Other REsources- CORE,NON CORE.
    foreach ($arr_fund_core as $year => $graph_activity) {
      $bud = array();
      $budget_total = array();
      $parent_total = array();
      foreach ($graph_activity as $graph_activity_key => $graph_activity_value) {
        $tot = 0;
        foreach ($graph_activity_value as $graph_activity_value_key => $graph_activity_value_val) {
          $tot += $graph_activity_value_val;
        }
        $bud[$graph_activity_key] = $tot;
      }
      $parent_number = 1;
      $temp_index = 0;
      $parent_total['P' . $parent_number] = 0;
      foreach ($so as $sokey => $soval) {
        if ($temp[$temp_index] == $soval['label']) {
          if (!isset($bud[$sokey])) {
            $bud[$sokey] = 0;
          }
          $parent_total['P' . $parent_number] = $parent_total['P' . $parent_number] + $bud[$sokey];
        }
        else {
          $temp_index++;
          $parent_number++;
          $parent_total['P' . $parent_number] = 0;
        }
      }
      // Total Year Array Budget.
      $total_year_budget = array_sum($total_fund_arr[$year]["Regular Resources"]);
      $do_chart_cols_arr = array(
        array(
          'id' => 'Sector',
          'label' => 'Sector',
          'pattern' => '',
          'type' => 'string'
        ),
        array(
          'id' => 'Percentage',
          'label' => 'Percentage',
          'pattern' => '',
          'type' => 'number'
        ),
      );
      // Array to be converted to json string and
      // used in google chart's area chart.
      $do_chart_rows_arr = array();
      $do_chart_slices_arr = array();
      $i = 0;
      $parent_value_budget_total = 0;
      foreach ($parent_total as $parent_key => $parent_value_budget) {
        $parent_value_budget_total += $parent_value_budget;
      }
      foreach ($parent_total as $parent_key => $parent_value_budget) {
        if (($parent_value_budget / $parent_value_budget_total) * 100 < 0.1) {

          $parent_value_budget = 0;
        }
// Array nesting is complex owing to to google charts api.
        array_push($do_chart_rows_arr, array('c' => array(
            array('v' => $so[$parent_key]["label"]),
            array('v' => $parent_value_budget)
          ),
        ));
        if (isset($color_array[$i])) {
          $do_chart_slices_arr[$i]['color'] = $color_array[$i];
        }
        $i++;
      }
      ?>
      <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = new google.visualization.DataTable({
            cols: <?php echo json_encode($do_chart_cols_arr); ?>,
            rows: <?php echo json_encode($do_chart_rows_arr); ?>});
          if (window.innerWidth > 768) {
            var options = {
              title: <?php echo $year; ?> + ' worldwide programme expenses' + ' (core)',
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: <?php echo json_encode($do_chart_slices_arr); ?>
            };
          } else {
            var options = {
              title: <?php echo $year; ?> + ' worldwide programme expenses' + ' (core)',
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              legend: {position: 'bottom'},
              chartArea: {width: '85%'},
              slices: <?php echo json_encode($do_chart_slices_arr); ?>
            };
          }
          var formatter = new google.visualization.NumberFormat(
            {pattern: '$###,###,###', negativeColor: 'red', negativeParens: true});
          // Apply formatter to second column.
          formatter.format(data, 1);
          var chart = new google.visualization.PieChart(document.getElementById('donutchart-core-<?php echo $year; ?>'));
          chart.draw(data, options);
          function selectHandler() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              reDrawBarChartCore<?php echo $year; ?>(selectedItem.row);
            }
          }
          google.visualization.events.addListener(chart, 'select', selectHandler);
        }
      </script>
      <?php
    }
  }

  prepareBarChartFromDonutCore($data["fund_arr_core"], $data["total_arr"], $data["support_outcomes"]);

  /**
   * This function is used to draw bar chart from donut chart
   * of Core data.
   */
  function prepareBarChartFromDonutCore($arr, $total_arr, $so) {
    $color_array = array(
      '#4495D1', '#1E5985', '#455B7A', '#6CA5D9', '#8FB7E1',
      '#7587A8', '#F7931D', '#C38743', '#EC9E46', '#FCBB75', '#40B879',
      '#5F7F6C', '#5E9E78', '#6FC391', '#7D79A8', '#324053', '#4F4261',
      '#6A618B', '#A9A4C5', '#C0DB7D', '#A2B37C', '#CCE195', '#D8E8AE'
    );
    $bud = array();
    $budget_total = array();
    foreach ($arr as $year => $graph_activity) {
      foreach ($graph_activity as $graph_activity_key => $graph_activity_value) {
        $tot = 0;
        foreach ($graph_activity_value as $graph_activity_value_key => $graph_activity_value_val) {
          $tot += $graph_activity_value_val;
        }
        $bud[$graph_activity_key] = $tot;
      }
      // Total Year Array Budget.
      $total_year_budget = array_sum($total_arr[$year]);
      $do_chart_cols_arr = array(
        array(
          'id' => 'Sector',
          'label' => 'Sector',
          'pattern' => '',
          'type' => 'string'
        ),
        array(
          'id' => 'Expenses',
          'label' => 'Expenses',
          'pattern' => '',
          'type' => 'number'
        ),
        array(
          'id' => 'Style',
          'label' => 'Style',
          'role' => 'style',
          'type' => 'string'
        ),
      );
// Array to be converted to json string and used in google chart's area chart.
      $do_chart_rows_arr = array();
      $do_chart_slices_arr = array();
      $do_chart_rows_arr_bar = array();
      $i = 0;
      foreach ($so as $so_key => $so_val) {
        if (strpos($so_key, 'P') === FALSE) {
          if (($bud[$so_key] === NULL) || ($bud[$so_key] < 0)) {
            $bud[$so_key] = 0;
          }
        }
        else {
          $bud[$so_key] = NULL;
        }
        array_push($do_chart_rows_arr_bar, array(
          'c' => array(
            array('v' => $so_val['outcomes']),
            array('v' => $bud[$so_key]),
            array('v' => $color_array[$i]),
          ),
        ));
        $i++;
      }
      ?>
      <script type="text/javascript">
        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(drawBarColors<?php echo $year; ?>);
        function drawBarColors<?php echo $year; ?>() {
          reDrawBarChartCore<?php echo $year; ?>(0);
        }
        function reDrawBarChartCore<?php echo $year; ?>(selectedParentID) {
          var bar_chart_rows = <?php echo json_encode($do_chart_rows_arr_bar); ?>;
          var selected_bar_chart_rows = new Array();
          var parent_bar_chart_rows = new Array();
          var j = 0;
          var flag = false;
          for (var i = 0; i < bar_chart_rows.length; i++) {
            if (bar_chart_rows[i]['c'][1]['v'] == null) {
              parent_bar_chart_rows[j] = bar_chart_rows[i]['c'][0]['v'];
              j++;
            }
          }
          j = 0;
          for (var i = 0; i < bar_chart_rows.length; i++) {
            if (bar_chart_rows[i]['c'][1]['v'] == null) {
              flag = false;
            }
            if (flag) {
              selected_bar_chart_rows[j] = (bar_chart_rows[i]);
              j++;
            }
            if (bar_chart_rows[i]['c'][0]['v'] == parent_bar_chart_rows[selectedParentID]) {
              flag = true;
            }
          }
          var data = new google.visualization.DataTable({
            cols: <?php echo json_encode($do_chart_cols_arr); ?>,
            rows: selected_bar_chart_rows});
          var options = {
            title: parent_bar_chart_rows[selectedParentID],
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '50%', left: '40%'},
            legend: {position: "none"},
            bar: {groupWidth: "40"},
            hAxis: {
              title: 'Expenses in USD',
              minValue: 0
            }
          };
          var formatter = new google.visualization.NumberFormat(
            {pattern: '$###,###,###', negativeColor: 'red', negativeParens: true});
          // Apply formatter to second column.
          formatter.format(data, 1);

          var chart = new google.visualization.BarChart(document.getElementById('bchart-core-<?php echo $year; ?>'))
          chart.draw(data, options);
        }
      </script>
      <?php
    }
  }

  prepareDonutChartNonCore($data["fund_arr_noncore"], $data["fund_arr"], $data["support_outcomes"]);

  /**
   * This function is used to draw donut chart of Non core data.
   */
  function prepareDonutChartNonCore($arr_fund_noncore, $total_fund_arr, $so) {
    $color_array = array('#4495D1', '#F7931D', '#40B879', '#7D79A8', '#C0DB7D');
    $tmp = array();
    $temp = array();
    foreach ($so as $sokey => $soval) {
      array_push($tmp, $soval['label']);
    }
    $tmp = array_unique($tmp);
    foreach ($tmp as $tmpkey => $tmpval) {
      array_push($temp, $tmpval);
    }
    $bud = array();
    $budget_total = array();
// Prepare Pie Chart for Other REsources-NON CORE.
    foreach ($arr_fund_noncore as $year => $graph_activity) {
      $parent_total = array();
      foreach ($graph_activity as $graph_activity_key => $graph_activity_value) {
        $tot = 0;
        foreach ($graph_activity_value as $graph_activity_value_key => $graph_activity_value_val) {
          $tot += $graph_activity_value_val;
        }
        $bud[$graph_activity_key] = $tot;
      }
      $parent_number = 1;
      $temp_index = 0;
      $parent_total['P' . $parent_number] = 0;
      foreach ($so as $sokey => $soval) {
        if ($temp[$temp_index] == $soval['label']) {
          if (!isset($bud[$sokey])) {
            $bud[$sokey] = 0;
          }
          $parent_total['P' . $parent_number] = $parent_total['P' . $parent_number] + $bud[$sokey];
        }
        else {
          $temp_index++;
          $parent_number++;
          $parent_total['P' . $parent_number] = 0;
        }
      }
      // Total Year Array Budget.
      $total_year_budget = array_sum($total_fund_arr[$year]["Other Resources"]);
      $do_chart_cols_arr = array(
        array(
          'id' => 'Sector',
          'label' => 'Sector',
          'pattern' => '',
          'type' => 'string'
        ),
        array(
          'id' => 'Percentage',
          'label' => 'Percentage',
          'pattern' => '',
          'type' => 'number'
        ),
      );

      $do_chart_rows_arr = array();
      $do_chart_slices_arr = array();
      $i = 0;
      $parent_value_budget_total = 0;
      foreach ($parent_total as $parent_key => $parent_value_budget) {
        $parent_value_budget_total += $parent_value_budget;
      }
      foreach ($parent_total as $parent_key => $parent_value_budget) {
        if (($parent_value_budget / $parent_value_budget_total) * 100 < 0.1) {
          $parent_value_budget = 0;
        }
        // Array nesting is complex owing to to google charts api.
        array_push($do_chart_rows_arr, array(
          'c' => array(
            array('v' => $so[$parent_key]["label"]),
            array('v' => $parent_value_budget)
          ),
        ));
        if (isset($color_array[$i])) {
          $do_chart_slices_arr[$i]['color'] = $color_array[$i];
        }
        $i++;
      }
      ?>
      <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = new google.visualization.DataTable({
            cols: <?php echo json_encode($do_chart_cols_arr); ?>,
            rows: <?php echo json_encode($do_chart_rows_arr); ?>});
          if (window.innerWidth > 768) {
            var options = {
              title: <?php echo $year; ?> + ' worldwide programme expenses' + ' (non-core)',
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: <?php echo json_encode($do_chart_slices_arr); ?>
            };
          } else {
            var options = {
              title: <?php echo $year; ?> + ' worldwide programme expenses' + ' (non-core)',
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              legend: {position: 'bottom'},
              chartArea: {width: '85%'},
              slices: <?php echo json_encode($do_chart_slices_arr); ?>
            };
          }
          var formatter = new google.visualization.NumberFormat(
            {prefix: '$', negativeColor: 'red', negativeParens: true});
          // Apply formatter to second column.
          formatter.format(data, 1);
          var chart = new google.visualization.PieChart(document.getElementById('donutchart-noncore-<?php echo $year; ?>'));
          chart.draw(data, options);
          function selectHandler() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              reDrawBarChartNonCore<?php echo $year; ?>(selectedItem.row);
            }
          }
          google.visualization.events.addListener(chart, 'select', selectHandler);
        }
      </script>
      <?php
    }
  }

  prepareBarChartFromDonutNonCore($data["fund_arr_noncore"], $data["total_arr"], $data["support_outcomes"]);

  /**
   * This function is used to draw bar chart from donut chart
   * of Non core data.
   */
  function prepareBarChartFromDonutNonCore($arr, $total_arr, $so) {
    $color_array = array(
      '#4495D1', '#1E5985', '#455B7A', '#6CA5D9', '#8FB7E1', '#7587A8',
      '#F7931D', '#C38743', '#EC9E46', '#FCBB75', '#40B879', '#5F7F6C',
      '#5E9E78', '#6FC391', '#7D79A8', '#324053', '#4F4261', '#6A618B',
      '#A9A4C5', '#C0DB7D', '#A2B37C', '#CCE195', '#D8E8AE');
// Prepare Pie Chart for Both Regular Resources & Other REsources- CORE,NON CORE.
    $bud = array();
    $budget_total = array();
    foreach ($arr as $year => $graph_activity) {
      foreach ($graph_activity as $graph_activity_key => $graph_activity_value) {
        $tot = 0;
        foreach ($graph_activity_value as $graph_activity_value_key => $graph_activity_value_val) {
          $tot += $graph_activity_value_val;
        }
        $bud[$graph_activity_key] = $tot;
      }
      // Total Year Array Budget.
      $total_year_budget = array_sum($total_arr[$year]);
      $do_chart_cols_arr = array(
        array('id' => 'Sector', 'label' => 'Sector', 'pattern' => '', 'type' => 'string'),
        array('id' => 'Expenses', 'label' => 'Expenses', 'pattern' => '', 'type' => 'number'),
        array('id' => 'Style', 'label' => 'Style', 'role' => 'style', 'type' => 'string'),
      );
      // Array to be converted to json string and used in google chart's area chart.
      $do_chart_rows_arr = array();
      $do_chart_slices_arr = array();
      $do_chart_rows_arr_bar = array();
      $i = 0;
      foreach ($so as $so_key => $so_val) {
        if (strpos($so_key, 'P') === FALSE) {
          if (($bud[$so_key] === NULL) || ($bud[$so_key] < 0)) {
            $bud[$so_key] = 0;
          }
        }
        else {
          $bud[$so_key] = NULL;
        }
        array_push($do_chart_rows_arr_bar, array('c' => array(
            array('v' => $so_val['outcomes']),
            array('v' => $bud[$so_key]),
            array('v' => $color_array[$i]),
          )
        ));
        $i++;
      }
      ?>
      <script type="text/javascript">
        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(drawBarColors<?php echo $year; ?>);
        function drawBarColors<?php echo $year; ?>() {
          reDrawBarChartNonCore<?php echo $year; ?>(0);
        }
        function reDrawBarChartNonCore<?php echo $year; ?>(selectedParentID) {
          var bar_chart_rows = <?php echo json_encode($do_chart_rows_arr_bar); ?>;
          var selected_bar_chart_rows = new Array();
          var parent_bar_chart_rows = new Array();
          var j = 0;
          var flag = false;
          for (var i = 0; i < bar_chart_rows.length; i++) {
            if (bar_chart_rows[i]['c'][1]['v'] == null) {
              parent_bar_chart_rows[j] = bar_chart_rows[i]['c'][0]['v'];
              j++;
            }
          }
          j = 0;
          for (var i = 0; i < bar_chart_rows.length; i++) {
            if (bar_chart_rows[i]['c'][1]['v'] == null) {
              flag = false;
            }
            if (flag) {
              selected_bar_chart_rows[j] = (bar_chart_rows[i]);
              j++;
            }
            if (bar_chart_rows[i]['c'][0]['v'] == parent_bar_chart_rows[selectedParentID]) {
              flag = true;
            }
          }
          var data = new google.visualization.DataTable({
            cols: <?php echo json_encode($do_chart_cols_arr); ?>,
            rows: selected_bar_chart_rows});
          var options = {
            title: parent_bar_chart_rows[selectedParentID],
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '50%', left: '40%'},
            legend: {position: "none"},
            bar: {groupWidth: "40"},
            hAxis: {
              title: 'Expenses in USD',
              minValue: 0
            },
          };
          var formatter = new google.visualization.NumberFormat(
            {pattern: '$###,###,###', negativeColor: 'red', negativeParens: true});
          // Apply formatter to second column.
          formatter.format(data, 1);

          var chart = new google.visualization.BarChart(document.getElementById('bchart-noncore-<?php echo $year; ?>'))
          chart.draw(data, options);
        }
      </script>
      <?php
    }
  }

  prepareBarChartDataPage($data["fund_arr"]);

  /**
   * This function is used to prepare barchart data for
   * Programme expenses by resource type.
   */
  function prepareBarChartDataPage($arr) {
    $area_chart_cols_arr = array(
      array(
        'id' => 'Year',
        'label' => 'Year',
        'type' => 'string'
      ),
      array(
        'id' => 'core resources',
        'label' => 'core resources',
        'type' => 'number'
      ),
      array(
        'id' => 'non-core resources',
        'label' => 'non-core resources',
        'type' => 'number'
      ),
    );
// Array to be converted to json string and used in google chart's area chart.

    $i = 1;
    $cnt_arr = count($arr);
    foreach ($arr as $year => $funds_cat_arr) {
      $area_chart_rows_arr = array();
      $budget_value_rr = array_sum($funds_cat_arr['Regular Resources']);
      $budget_value_or = array_sum($funds_cat_arr['Other Resources']);
      // Array nesting is complex owing to to google charts api.
      array_push($area_chart_rows_arr, array(
        'c' => array(
          array('v' => $year),
          array('v' => $budget_value_rr),
          array('v' => $budget_value_or),
        ),
      ));
      $i++;
      ?>
      <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart", "bar"]});
        google.setOnLoadCallback(drawChart<?php echo $year; ?>);
        function drawChart<?php echo $year; ?>() {
          var data = new google.visualization.DataTable({
            cols: <?php echo json_encode($area_chart_cols_arr); ?>,
            rows: <?php echo json_encode($area_chart_rows_arr); ?>
          });
          var options = {
            title: 'Programme expenses by resource type',
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            width: '100%',
            vAxis: {minValue: 0, format: '$###,###,###'},
            chartArea: {width: '65%', left: '20%'},
            legend: {position: 'bottom', maxLines: 3, alignment: 'start'},
            bar: {groupWidth: "30%"},
            series: {
              0: {color: '#91A0AE'},
              1: {color: '#E0DECD'}
            },
            areaOpacity: 0.9
          };
          var formatter = new google.visualization.NumberFormat(
            {negativeColor: 'red', negativeParens: true, pattern: '$###,###,###'});
          // Apply formatter to second column.
          formatter.format(data, 1);
          // Apply formatter to third column.
          formatter.format(data, 2);
          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_<?php echo $year; ?>'));
          chart.draw(data, options);
        }
      </script>
      <?php
    }
  }

  prepareBarChartImplemented($data["pa_implemented_arr"]);
  prepareBarChartImplementedCore($data["pa_implemented_arr_c"]);
  prepareBarChartImplementedNonCore($data["pa_implemented_arr_nc"]);

  /**
   * This function is used to prepare bar chart for
   * Programme expenses by implementing agency.
   */
  function prepareBarChartImplemented($arr) {
    $area_chart_cols_arr = array(
      array('id' => 'Year', 'label' => 'Year', 'type' => 'string'),
      array('id' => 'UNFPA', 'label' => 'UNFPA', 'type' => 'number'),
      array('id' => 'GOV', 'label' => 'GOV', 'type' => 'number'),
      array('id' => 'NGO', 'label' => 'NGO', 'type' => 'number'),
      array('id' => 'UN(Other)', 'label' => 'Other UN', 'type' => 'number'),
    );
// Array to be converted to json string and used in google chart's area chart.

    $i = 1;
    $cnt_arr = count($arr);
    foreach ($arr as $year => $imp_arr) {
      $area_chart_rows_arr = array();
      $amount_unfpa = array_sum($imp_arr['UNFPA']);
      $amount_gov = array_sum($imp_arr['GOV']);
      $amount_ngo = array_sum($imp_arr['NGO']);
      $amount_un = array_sum($imp_arr['UN']);
// Array nesting is complex owing to to google charts api.
      array_push($area_chart_rows_arr, array('c' => array(
          array('v' => $year),
          array('v' => $amount_unfpa),
          array('v' => $amount_gov),
          array('v' => $amount_ngo),
          array('v' => $amount_un)
        )
      ));
      $i++;
      ?>
      <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart", "bar"]});
        google.setOnLoadCallback(drawChart<?php echo $year; ?>);
        function drawChart<?php echo $year; ?>() {
          var data = new google.visualization.DataTable({
            cols: <?php echo json_encode($area_chart_cols_arr); ?>,
            rows: <?php echo json_encode($area_chart_rows_arr); ?>
          });
          var options = {
            title: 'Programme expenses by implementing agency',
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            vAxis: {minValue: 0, format: '$###,###,###'},
            chartArea: {width: '65%', left: '20%'},
            legend: {position: 'bottom', maxLines: 3, alignment: 'start'},
            series: {
              0: {color: '#F7931D'},
              1: {color: '#4695D1'},
              2: {color: '#C2DC7F'},
              3: {color: '#7BCAB1'}
            },
            areaOpacity: 0.9,
          };
          var formatter = new google.visualization.NumberFormat(
            {prefix: '$', negativeColor: 'red', negativeParens: true, pattern: '###,###,###'});
          // Apply formatter to second column.
          formatter.format(data, 1);
          // Apply formatter to third column.
          formatter.format(data, 2);
          // Apply formatter to third column.
          formatter.format(data, 3);
          // Apply formatter to third column.
          formatter.format(data, 4);
          var chart = new google.visualization.ColumnChart(document.getElementById('implemented-all-<?php echo $year; ?>'));
          chart.draw(data, options);
        }
      </script>
      <?php
    }
  }

  /**
   * This function is used to prepare bar chart for
   * Programme expenses by implementing agency for Core data.
   */
  function prepareBarChartImplementedCore($arr) {
    $area_chart_cols_arr = array(
      array('id' => 'Year', 'label' => 'Year', 'type' => 'string'),
      array('id' => 'UNFPA', 'label' => 'UNFPA', 'type' => 'number'),
      array('id' => 'GOV', 'label' => 'GOV', 'type' => 'number'),
      array('id' => 'NGO', 'label' => 'NGO', 'type' => 'number'),
      array('id' => 'UN(Other)', 'label' => 'Other UN', 'type' => 'number'),
    );

    $i = 1;
    $cnt_arr = count($arr);
    foreach ($arr as $year => $imp_arr) {
      $area_chart_rows_arr = array();
      $amount_unfpa = array_sum($imp_arr['UNFPA']);
      $amount_gov = array_sum($imp_arr['GOV']);
      $amount_ngo = array_sum($imp_arr['NGO']);
      $amount_un = array_sum($imp_arr['UN']);
      // Array nesting is complex owing to to google charts api.
      array_push($area_chart_rows_arr, array('c' => array(
          array('v' => $year),
          array('v' => $amount_unfpa),
          array('v' => $amount_gov),
          array('v' => $amount_ngo),
          array('v' => $amount_un),
        )
      ));
      $i++;
      ?>
      <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart", "bar"]});
        google.setOnLoadCallback(drawChart<?php echo $year; ?>);
        function drawChart<?php echo $year; ?>() {
          var data = new google.visualization.DataTable({
            cols: <?php echo json_encode($area_chart_cols_arr); ?>,
            rows: <?php echo json_encode($area_chart_rows_arr); ?>
          });
          var options = {
            title: 'Programme expenses by implementing agency (core)',
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            vAxis: {minValue: 0, format: '$###,###,###'},
            chartArea: {width: '65%', left: '20%'},
            legend: {position: 'bottom', maxLines: 3, alignment: 'start'},
            series: {
              0: {color: '#F7931D'},
              1: {color: '#4695D1'},
              2: {color: '#C2DC7F'},
              3: {color: '#7BCAB1'}
            },
            areaOpacity: 0.9,
          };
          var formatter = new google.visualization.NumberFormat(
            {prefix: '$', negativeColor: 'red', negativeParens: true, pattern: '###,###,###'});
          // Apply formatter to second column.
          formatter.format(data, 1);
          // Apply formatter to third column.
          formatter.format(data, 2);
          // Apply formatter to third column.
          formatter.format(data, 3);
          // Apply formatter to third column.
          formatter.format(data, 4);
          var chart = new google.visualization.ColumnChart(document.getElementById('implemented-core-<?php echo $year; ?>'));
          chart.draw(data, options);
        }
      </script>
      <?php
    }
  }

  /**
   * This function is used to prepare bar chart for
   * Programme expenses by implementing agency for Non core data.
   */
  function prepareBarChartImplementedNonCore($arr) {
    $area_chart_cols_arr = array(
      array('id' => 'Year', 'label' => 'Year', 'type' => 'string'),
      array('id' => 'UNFPA', 'label' => 'UNFPA', 'type' => 'number'),
      array('id' => 'GOV', 'label' => 'GOV', 'type' => 'number'),
      array('id' => 'NGO', 'label' => 'NGO', 'type' => 'number'),
      array('id' => 'UN(Other)', 'label' => 'Other UN', 'type' => 'number'),
    );
    $i = 1;
    $cnt_arr = count($arr);
    foreach ($arr as $year => $imp_arr) {
      $area_chart_rows_arr = array();
      $amount_unfpa = array_sum($imp_arr['UNFPA']);
      $amount_gov = array_sum($imp_arr['GOV']);
      $amount_ngo = array_sum($imp_arr['NGO']);
      $amount_un = array_sum($imp_arr['UN']);
      // Array nesting is complex owing to google charts api.
      array_push($area_chart_rows_arr, array('c' => array(
          array('v' => $year),
          array('v' => $amount_unfpa),
          array('v' => $amount_gov),
          array('v' => $amount_ngo),
          array('v' => $amount_un)
        )
      ));
      $i++;
      ?>

      <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart", "bar"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = new google.visualization.DataTable({
            cols: <?php echo json_encode($area_chart_cols_arr); ?>,
            rows: <?php echo json_encode($area_chart_rows_arr); ?>
          });
          var options = {
            title: 'Programme expenses by implementing agency (noncore)',
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            vAxis: {minValue: 0, format: '$###,###,###'},
            chartArea: {width: '65%', left: '20%'},
            legend: {position: 'bottom', maxLines: 3, alignment: 'start'},
            series: {
              0: {color: '#F7931D'},
              1: {color: '#4695D1'},
              2: {color: '#C2DC7F'},
              3: {color: '#7BCAB1'}
            },
            areaOpacity: 0.9,
          };
          var formatter = new google.visualization.NumberFormat(
            {prefix: '$', negativeColor: 'red', negativeParens: true, pattern: '###,###,###'});
          // Apply formatter to second column.
          formatter.format(data, 1);
          // Apply formatter to third column.
          formatter.format(data, 2);
          // Apply formatter to third column.
          formatter.format(data, 3);
          // Apply formatter to third column.
          formatter.format(data, 4);
          var chart = new google.visualization.ColumnChart(document.getElementById('implemented-noncore-<?php echo $year; ?>'));
          chart.draw(data, options);
        }
      </script>
      <?php
    }
  }
  ?>

  <br/>
  <br/>
  <div class = "data donut_chart_container">
    <div id = "donut_chart_tabs" class = "container">
      <ul>
        <li class="active donut_chart_tab" tabfor = "all" ><span>All resources</span></li>
        <li class="donut_chart_tab" tabfor = "core"><span>Core</span></li>
        <li class="donut_chart_tab" tabfor = "noncore"><span>Non - core</span></li>
      </ul>
    </div>
    <?php
    $year_cnt = count($data["year_arr"]);
    $cnt_yr_flag = 1;
    foreach ($data["year_arr"] as $key => $year) {
      ?>
      <div class="donut_chart_wrapper donut_chart_wrapper_<?php
      echo $year;
      if ($year == $last_selected_year) {
        echo ' active';
      }
      ?>">
        <div id="donutchart-all-<?php echo $year; ?>" class="donut_chart all" <?php if ($year == $last_selected_year) { ?>style="visibility: visible;"<?php } ?>></div>
        <div id="donutchart-core-<?php echo $year; ?>" class="donut_chart core"></div>
        <div id="donutchart-noncore-<?php echo $year; ?>" class="donut_chart noncore"></div>
      </div>
      <?php
      $cnt_yr_flag++;
    }
    ?>
  </div>
  <div class="data bchart_wrapper">
    <?php
    $year_cnt = count($data["year_arr"]);
    $cnt_yr_flag = 1;
    foreach ($data["year_arr"] as $key => $year) {
      ?>
      <div class = "bchart_container bchart_container_<?php
      echo $year;
      if ($year == $last_selected_year) {
        echo ' active';
      }
      ?>">
        <div id="bchart-all-<?php echo $year; ?>" class="bchart all" <?php if ($year == $last_selected_year) { ?>style="visibility: visible;"<?php } ?>></div>
        <div id = "bchart-core-<?php echo $year; ?>" class = "bchart core"></div>
        <div id = "bchart-noncore-<?php echo $year; ?>" class = "bchart noncore"></div>
      </div>
      <?php
      $cnt_yr_flag++;
    }
    ?>
  </div>
  <div class="data chart_div_wrapper">
    <?php
    $year_cnt = count($data["year_arr"]);
    $cnt_yr_flag = 1;
    foreach ($data["year_arr"] as $key => $year) {
      ?>
      <div class = "chart_div_container chart_div_container_<?php
      echo $year;
      if ($year == $last_selected_year) {
        echo ' active';
      }
      ?>">
        <div class="chart_div" id="chart_div_<?php echo $year; ?>"></div>
      </div>
      <?php
      $cnt_yr_flag++;
    }
    ?>
  </div>
  <div class="data implementation_chart_wrapper">
    <?php
    $year_cnt = count($data["year_arr"]);
    $cnt_yr_flag = 1;
    foreach ($data["year_arr"] as $key => $year) {
      ?>
      <div class = "implementation_chart_container implementation_chart_container_<?php
      echo $year;
      if ($year == $last_selected_year) {
        echo ' active';
      }
      ?>">
        <div id="implemented-all-<?php echo $year; ?>" class = "implementation_chart all" style = "visibility: visible;" ></div>
        <div id="implemented-core-<?php echo $year; ?>" class = "implementation_chart core" ></div>
        <div id="implemented-noncore-<?php echo $year; ?>" class = "implementation_chart noncore" ></div>
      </div>
      <?php
      $cnt_yr_flag++;
    }
    ?>
  </div>
</div>

<?php $module_path = drupal_get_path('module', 'custom_data_portal'); ?>

<script type = "text/javascript" >
  (function ($) {
    $(document).ready(function () {
      var $active_tab;
      $('#data-portal-template').on("click", '#donut_chart_tabs li', function () {
        $active_tab = $(this);
        switchTab($active_tab);
      });
      $('#data-portal-template').on("mouseenter", '#donut_chart_tabs li', function () {
        $active_tab = $('#donut_chart_tabs li.active');
        switchTab($(this));
      });
      $('#data-portal-template').on("mouseleave", '#donut_chart_tabs li', function () {
        switchTab($active_tab);
      });

      switch (window.location.hash) {
        case '#wca':
          simplemaps_worldmap.load();
          simplemaps_worldmap.hooks.complete = function () {
            update_charts('1');
          }
          break;

        case '#eeca':
          simplemaps_worldmap.load();
          simplemaps_worldmap.hooks.complete = function () {
            update_charts('4');
          }
          break;

        case '#esa':
          simplemaps_worldmap.load();
          simplemaps_worldmap.hooks.complete = function () {
            update_charts('0');
          }
          break;

        case '#as':
          simplemaps_worldmap.load();
          simplemaps_worldmap.hooks.complete = function () {
            update_charts('2');
          }
          break;

        case '#ap':
          simplemaps_worldmap.load();
          simplemaps_worldmap.hooks.complete = function () {
            update_charts('3');
          }
          break;

        case '#lac':
          simplemaps_worldmap.load();
          simplemaps_worldmap.hooks.complete = function () {
            update_charts('5');
          }
          break;
      }
    });
    function switchTab($tab) {
      var chart = $tab.attr('tabfor');
      $('#donut_chart_tabs li').removeClass('active');
      $tab.addClass('active');
      $(".donut_chart").css({"visibility": "hidden"});
      $(".bchart").css({"visibility": "hidden"});
      $('.donut_chart_wrapper.active .donut_chart.' + chart).css({'visibility': 'visible'});
      $('.bchart.' + chart).css({'visibility': 'visible'});
      $(".implementation_chart").css({"visibility": "hidden"});
      $('.implementation_chart_container .implementation_chart.' + chart).css({'visibility': 'visible'});
    }
  }
  )(jQuery);
  function update_charts(id) {
    (function ($) {
      $('.thepopover').hide();
      if (id != null) {
        simplemaps_worldmap.region_zoom(id);
        var selected_region = simplemaps_worldmap_mapdata.regions[id].name;
      } else {
        var selected_region = 'Worldwide';
      }
      $.ajax({
        url: "region-update",
        type: "POST",
        data: {region: selected_region, year: Drupal.settings.data_portal_selected_year}
      }).done(function (html) {
        var parsedArr = $.parseJSON(html);
        var donutchartall = parsedArr.prepareDonutChartDataPageRegion;
        var barchartall = parsedArr.prepareBarChartFromDonutRegion;
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(drawChartAll);
        drawChartAll();
        function drawChartAll() {
          var data = new google.visualization.DataTable({
            cols: donutchartall.do_chart_cols_arr,
            rows: donutchartall.do_chart_rows_arr});
          if (window.innerWidth > 768) {
            var options = {
              title: donutchartall.year + ' ' + selected_region + ' programme expenses',
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: donutchartall.do_chart_slices_arr
            };
          } else {
            var options = {
              title: donutchartall.year + ' ' + selected_region + ' programme expenses',
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              legend: {position: 'bottom'},
              chartArea: {width: '85%'},
              slices: donutchartall.do_chart_slices_arr
            };
          }
          var formatter = new google.visualization.NumberFormat(
            {pattern: '$###,###,###', negativeColor: 'red', negativeParens: true});
          // Apply formatter to second column.
          formatter.format(data, 1);
          var chart = new google.visualization.PieChart(document.getElementById('donutchart-all-' + donutchartall.year));
          chart.draw(data, options);
          function selectHandler() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              reDrawBarChartAll(selectedItem.row);
            }
          }
          google.visualization.events.addListener(chart, 'select', selectHandler);
        }

        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(drawBarColorsAll);
        drawBarColorsAll();
        function drawBarColorsAll() {
          reDrawBarChartAll(0);
        }
        function reDrawBarChartAll(selectedParentID) {
          var bar_chart_rows = barchartall.do_chart_rows_arr_bar;
          var selected_bar_chart_rows = new Array();
          var parent_bar_chart_rows = new Array();
          var j = 0;
          var flag = false;
          for (var i = 0; i < bar_chart_rows.length; i++) {
            if (bar_chart_rows[i]['c'][1]['v'] == null) {
              parent_bar_chart_rows[j] = bar_chart_rows[i]['c'][0]['v'];
              j++;
            }
          }
          j = 0;
          for (var i = 0; i < bar_chart_rows.length; i++) {
            if (bar_chart_rows[i]['c'][1]['v'] == null) {
              flag = false;
            }
            if (flag) {
              selected_bar_chart_rows[j] = (bar_chart_rows[i]);
              j++;
            }
            if (bar_chart_rows[i]['c'][0]['v'] == parent_bar_chart_rows[selectedParentID]) {
              flag = true;
            }
          }
          var data = new google.visualization.DataTable({
            cols: barchartall.do_chart_cols_arr,
            rows: selected_bar_chart_rows});
          var options = {
            title: parent_bar_chart_rows[selectedParentID],
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '50%', left: '40%'},
            legend: {position: "none"},
            bar: {groupWidth: "40"},
            hAxis: {
              title: 'Expenses in USD',
              minValue: 0
            },
          };
          var formatter = new google.visualization.NumberFormat(
            {pattern: '$###,###,###', negativeColor: 'red', negativeParens: true});
          // Apply formatter to second column.
          formatter.format(data, 1);
          var chart = new google.visualization.BarChart(document.getElementById('bchart-all-' + barchartall.year));
          chart.draw(data, options);
        }

        var donutchartcore = parsedArr.prepareDonutChartCoreRegion;
        var barchartcore = parsedArr.prepareBarChartFromDonutCoreRegion;
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(drawChartCore);
        drawChartCore();
        function drawChartCore() {
          var data = new google.visualization.DataTable({
            cols: donutchartcore.do_chart_cols_arr,
            rows: donutchartcore.do_chart_rows_arr});
          if (window.innerWidth > 768) {
            var options = {
              title: donutchartcore.year + ' ' + selected_region + ' programme expenses' + ' (core)',
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: donutchartcore.do_chart_slices_arr
            };
          } else {
            var options = {
              title: donutchartcore.year + ' ' + selected_region + ' programme expenses' + ' (core)',
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              legend: {position: 'bottom'},
              chartArea: {width: '85%'},
              slices: donutchartcore.do_chart_slices_arr
            };
          }
          var formatter = new google.visualization.NumberFormat(
            {pattern: '$###,###,###', negativeColor: 'red', negativeParens: true});
          // Apply formatter to second column.
          formatter.format(data, 1);
          var chart = new google.visualization.PieChart(document.getElementById('donutchart-core-' + donutchartcore.year));
          chart.draw(data, options);
          function selectHandler() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              reDrawBarChartCore(selectedItem.row);
            }
          }
          google.visualization.events.addListener(chart, 'select', selectHandler);
        }

        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(drawBarColorsCore);
        drawBarColorsCore();
        function drawBarColorsCore() {
          reDrawBarChartCore(0);
        }
        function reDrawBarChartCore(selectedParentID) {
          var bar_chart_rows = barchartcore.do_chart_rows_arr_bar;
          var selected_bar_chart_rows = new Array();
          var parent_bar_chart_rows = new Array();
          var j = 0;
          var flag = false;
          for (var i = 0; i < bar_chart_rows.length; i++) {
            if (bar_chart_rows[i]['c'][1]['v'] == null) {
              parent_bar_chart_rows[j] = bar_chart_rows[i]['c'][0]['v'];
              j++;
            }
          }
          j = 0;
          for (var i = 0; i < bar_chart_rows.length; i++) {
            if (bar_chart_rows[i]['c'][1]['v'] == null) {
              flag = false;
            }
            if (flag) {
              selected_bar_chart_rows[j] = (bar_chart_rows[i]);
              j++;
            }
            if (bar_chart_rows[i]['c'][0]['v'] == parent_bar_chart_rows[selectedParentID]) {
              flag = true;
            }
          }
          var data = new google.visualization.DataTable({
            cols: barchartcore.do_chart_cols_arr,
            rows: selected_bar_chart_rows});
          var options = {
            title: parent_bar_chart_rows[selectedParentID],
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '50%', left: '40%'},
            legend: {position: "none"},
            bar: {groupWidth: "40"},
            hAxis: {
              title: 'Expenses in USD',
              minValue: 0
            }
          };
          var formatter = new google.visualization.NumberFormat(
            {pattern: '$###,###,###', negativeColor: 'red', negativeParens: true});
          // Apply formatter to second column.
          formatter.format(data, 1);
          var chart = new google.visualization.BarChart(document.getElementById('bchart-core-' + donutchartcore.year));
          chart.draw(data, options);
        }

        var donutchartnoncore = parsedArr.prepareDonutChartNonCoreRegion;
        var barchartnoncore = parsedArr.prepareBarChartFromDonutNonCoreRegion;
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(drawChartNonCore);
        drawChartNonCore();
        function drawChartNonCore() {
          var data = new google.visualization.DataTable({
            cols: donutchartnoncore.do_chart_cols_arr,
            rows: donutchartnoncore.do_chart_rows_arr});
          if (window.innerWidth > 768) {
            var options = {
              title: donutchartnoncore.year + ' ' + selected_region + ' programme expenses' + ' (non-core)',
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: donutchartnoncore.do_chart_slices_arr
            };
          } else {
            var options = {
              title: donutchartnoncore.year + ' ' + selected_region + ' programme expenses' + ' (non-core)',
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              legend: {position: 'bottom'},
              chartArea: {width: '85%'},
              slices: donutchartnoncore.do_chart_slices_arr
            };
          }
          var formatter = new google.visualization.NumberFormat(
            {prefix: '$', negativeColor: 'red', negativeParens: true});
          // Apply formatter to second column.
          formatter.format(data, 1);
          var chart = new google.visualization.PieChart(document.getElementById('donutchart-noncore-' + donutchartnoncore.year));
          chart.draw(data, options);
          function selectHandler() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              reDrawBarChartNonCore(selectedItem.row);
            }
          }
          google.visualization.events.addListener(chart, 'select', selectHandler);
        }

        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(drawBarColorsNonCore);
        drawBarColorsNonCore();
        function drawBarColorsNonCore() {
          reDrawBarChartNonCore(0);
        }
        function reDrawBarChartNonCore(selectedParentID) {
          var bar_chart_rows = barchartnoncore.do_chart_rows_arr_bar;
          var selected_bar_chart_rows = new Array();
          var parent_bar_chart_rows = new Array();
          var j = 0;
          var flag = false;
          for (var i = 0; i < bar_chart_rows.length; i++) {
            if (bar_chart_rows[i]['c'][1]['v'] == null) {
              parent_bar_chart_rows[j] = bar_chart_rows[i]['c'][0]['v'];
              j++;
            }
          }
          j = 0;
          for (var i = 0; i < bar_chart_rows.length; i++) {
            if (bar_chart_rows[i]['c'][1]['v'] == null) {
              flag = false;
            }
            if (flag) {
              selected_bar_chart_rows[j] = (bar_chart_rows[i]);
              j++;
            }
            if (bar_chart_rows[i]['c'][0]['v'] == parent_bar_chart_rows[selectedParentID]) {
              flag = true;
            }
          }
          var data = new google.visualization.DataTable({
            cols: barchartnoncore.do_chart_cols_arr,
            rows: selected_bar_chart_rows});
          var options = {
            title: parent_bar_chart_rows[selectedParentID],
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '50%', left: '40%'},
            legend: {position: "none"},
            bar: {groupWidth: "40"},
            hAxis: {
              title: 'Expenses in USD',
              minValue: 0
            },
          };
          var formatter = new google.visualization.NumberFormat(
            {pattern: '$###,###,###', negativeColor: 'red', negativeParens: true});
          // Apply formatter to second column.
          formatter.format(data, 1);
          var chart = new google.visualization.BarChart(document.getElementById('bchart-noncore-' + donutchartnoncore.year));
          chart.draw(data, options);
        }

        var barchartAllRegion = parsedArr.prepareBarChartDataPageRegion;
        google.load("visualization", "1", {packages: ["corechart", "bar"]});
        google.setOnLoadCallback(drawChartAllRegion);
        drawChartAllRegion();
        function drawChartAllRegion() {
          var data = new google.visualization.DataTable({
            cols: barchartAllRegion.area_chart_cols_arr,
            rows: barchartAllRegion.area_chart_rows_arr
          });
          var options = {
            title: barchartAllRegion.year + ' ' + selected_region + ' programme expenses by resource type',
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            width: '100%',
            vAxis: {minValue: 0, format: '$###,###,###'},
            chartArea: {width: '65%', left: '20%'},
            legend: {position: 'bottom', maxLines: 3, alignment: 'start'},
            bar: {groupWidth: "30%"},
            series: {
              0: {color: '#91A0AE'},
              1: {color: '#E0DECD'},
            },
            areaOpacity: 0.9,
          };
          var formatter = new google.visualization.NumberFormat(
            {negativeColor: 'red', negativeParens: true, pattern: '$###,###,###'});
          // Apply formatter to second column.
          formatter.format(data, 1);
          // Apply formatter to third column.
          formatter.format(data, 2);
          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_' + barchartAllRegion.year));
          chart.draw(data, options);
        }

        var barchartRegionAll = parsedArr.prepareBarChartImplementedRegion;
        google.load("visualization", "1", {packages: ["corechart", "bar"]});
        google.setOnLoadCallback(drawChartRegionAll);
        drawChartRegionAll();
        function drawChartRegionAll() {
          var data = new google.visualization.DataTable({
            cols: barchartRegionAll.area_chart_cols_arr,
            rows: barchartRegionAll.area_chart_rows_arr
          });
          var options = {
            title: barchartRegionAll.year + ' ' + selected_region + ' programme expenses by implementing agency',
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            vAxis: {minValue: 0, format: '$###,###,###'},
            chartArea: {width: '65%', left: '20%'},
            legend: {position: 'bottom', maxLines: 3, alignment: 'start'},
            series: {
              0: {color: '#F7931D'},
              1: {color: '#4695D1'},
              2: {color: '#C2DC7F'},
              3: {color: '#7BCAB1'}
            },
            areaOpacity: 0.9,
          };
          var formatter = new google.visualization.NumberFormat(
            {prefix: '$', negativeColor: 'red', negativeParens: true, pattern: '###,###,###'});
          // Apply formatter to second column.
          formatter.format(data, 1);
          // Apply formatter to third column.
          formatter.format(data, 2);
          // Apply formatter to third column.
          formatter.format(data, 3);
          // Apply formatter to third column.
          formatter.format(data, 4);
          var chart = new google.visualization.ColumnChart(document.getElementById('implemented-all-' + barchartRegionAll.year));
          chart.draw(data, options);
        }

        var barchartRegionCore = parsedArr.prepareBarChartImplementedCoreRegion;
        google.load("visualization", "1", {packages: ["corechart", "bar"]});
        google.setOnLoadCallback(drawChartRegionCore);
        drawChartRegionCore();
        function drawChartRegionCore() {
          var data = new google.visualization.DataTable({
            cols: barchartRegionCore.area_chart_cols_arr,
            rows: barchartRegionCore.area_chart_rows_arr
          });
          var options = {
            title: barchartRegionCore.year + ' ' + selected_region + ' programme expenses by implementing agency (core)',
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            vAxis: {minValue: 0, format: '$###,###,###'},
            chartArea: {width: '65%', left: '20%'},
            legend: {position: 'bottom', maxLines: 3, alignment: 'start'},
            series: {
              0: {color: '#F7931D'},
              1: {color: '#4695D1'},
              2: {color: '#C2DC7F'},
              3: {color: '#7BCAB1'}
            },
            areaOpacity: 0.9,
          };
          var formatter = new google.visualization.NumberFormat(
            {prefix: '$', negativeColor: 'red', negativeParens: true, pattern: '###,###,###'});
          // Apply formatter to second column.
          formatter.format(data, 1);
          // Apply formatter to third column.
          formatter.format(data, 2);
          // Apply formatter to third column.
          formatter.format(data, 3);
          // Apply formatter to third column.
          formatter.format(data, 4);
          var chart = new google.visualization.ColumnChart(document.getElementById('implemented-core-' + barchartRegionAll.year));
          chart.draw(data, options);
        }

        var barchartRegionNonCore = parsedArr.prepareBarChartImplementedNonCoreRegion;
        google.load("visualization", "1", {packages: ["corechart", "bar"]});
        google.setOnLoadCallback(drawChartRegionNonCore);
        drawChartRegionNonCore();
        function drawChartRegionNonCore() {
          var data = new google.visualization.DataTable({
            cols: barchartRegionNonCore.area_chart_cols_arr,
            rows: barchartRegionNonCore.area_chart_rows_arr
          });
          var options = {
            title: barchartRegionNonCore.year + ' ' + selected_region + ' programme expenses by implementing agency (noncore)',
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            vAxis: {minValue: 0, format: '$###,###,###'},
            chartArea: {width: '65%', left: '20%'},
            legend: {position: 'bottom', maxLines: 3, alignment: 'start'},
            series: {
              0: {color: '#F7931D'},
              1: {color: '#4695D1'},
              2: {color: '#C2DC7F'},
              3: {color: '#7BCAB1'}
            },
            areaOpacity: 0.9,
          };
          var formatter = new google.visualization.NumberFormat(
            {prefix: '$', negativeColor: 'red', negativeParens: true, pattern: '###,###,###'});
          // Apply formatter to second column.
          formatter.format(data, 1);
          // Apply formatter to third column.
          formatter.format(data, 2);
          // Apply formatter to third column.
          formatter.format(data, 3);
          // Apply formatter to third column.
          formatter.format(data, 4);
          var chart = new google.visualization.ColumnChart(document.getElementById('implemented-noncore-' + barchartRegionAll.year));
          chart.draw(data, options);
        }

      }).fail(function () {
        console.log("error");
      });
    })(jQuery);
  }

  (function ($) {
    $('body').on('click', '#map_outer svg', function () {
      update_charts();
    });
  })(jQuery);
</script>
