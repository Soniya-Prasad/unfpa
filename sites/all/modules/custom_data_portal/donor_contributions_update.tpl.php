<?php

/**
 * @file
 * Displays the top 20 donor bar chart and updated worldmap data.
 */
$last_selected_year = $data["selected_year"];

/**
 * Fetches the color code from the color code array based on percentage value.
 *
 * @param array $arr
 *    Contains color-code and percentage value.
 * @param string $val
 *    Contains the value for a donor.
 *
 * @return string
 *   Color code for the specific donor.
 */
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

$location_static_array = array(
  'Comoros',
  'Maldives',
  'Fiji',
  'Sao Tome & Principe',
  'Seychelles',
);
$location_static_latlon = array(
  "Comoros" => array("lat" => "-12.1667", "lng" => "44.25", "size" => "16"),
  "Maldives" => array("lat" => "-0.6", "lng" => "73.1", "size" => "16"),
  "Fiji" => array("lat" => "-19", "lng" => "178", "size" => "36"),
  "Sao Tome & Principe" => array("lat" => "0.2", "lng" => "6.6", "size" => "16"),
  "Seychelles" => array("lat" => "-4.5833", "lng" => "55.6667", "size" => "16"),
);
$cnt = 0;
$sum_total_commitments = array_sum($data["total_commitments"]);
$flag_max = TRUE;
foreach ($data["dd_array"] as $year => $arr) {
  if ($last_selected_year == $year) {
    foreach ($arr as $cc => $donor) {
      $cc_code = '';
      $commitments = isset($donor["commitments"]) ? $donor["commitments"] : 0;
      $payments_received = isset($donor["payments_received"]) ? $donor["payments_received"] : 0;
      if ($commitments == 0) {
        $res = 0;
      }
      else {
        $res = ($commitments / $sum_total_commitments) * 100;
      }
      if ($flag_max) {
        $threshold_value = $res;
        $res = ($res / $threshold_value) * 100;
        $flag_max = FALSE;
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
        $country_arr[$cc]['url'] = isset($data["cc_array"][$cc]["url"]) ? $data["cc_array"][$cc]["url"] : '';
        $country_arr[$cc]['hide'] = "no";
        $country_arr[$cc]['inactive'] = "no";
      }
      else {
        $location_arr[$cnt]['name'] = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
        $location_arr[$cnt]['description'] = "Contributions $ " . number_format($commitments);
        $location_arr[$cnt]['color'] = ($cc_code != "") ? $cc_code : 'default';
        $location_arr[$cnt]['hover_color'] = 'default';
        $location_arr[$cnt]['url'] = isset($data["cc_array"][$cc]["url"]) ? $data["cc_array"][$cc]["url"] : '';
        $location_arr[$cnt]['type'] = "circle";
        $location_arr[$cnt]['size'] = $location_static_latlon[$country_temp_name]["size"];
        $location_arr[$cnt]['lat'] = $location_static_latlon[$country_temp_name]["lat"];
        $location_arr[$cnt]['lng'] = $location_static_latlon[$country_temp_name]["lng"];
        $cnt++;
      }
    }
  }
}

preparehorizontalbarchart($data['chart_array'], $data["selected_res_type"], $last_selected_year);
?>
<script type="text/javascript">
  simplemaps_worldmap_mapdata.state_specific = <?php echo json_encode($country_arr); ?>;
  simplemaps_worldmap_mapdata.locations = <?php echo json_encode($location_arr); ?>;
  simplemaps_worldmap.load();
</script>
<?php

/**
 * The function below prepare the horizontal bar graph for the top 20 donors.
 *
 * @param array $arr_chart
 *    Contains the Chart Data.
 * @param string $res_type
 *    Type of Charts "Core, Non-core, Both".
 * @param string $last_selected_year
 *    Contain the year value for the chart.
 */
function preparehorizontalbarchart($arr_chart, $res_type, $last_selected_year) {
  switch ($res_type) {
    case '1':
      $chart_title = 'Top 20 donors to UNFPA core resources';
      $options_array = array(
        'title' => $chart_title,
        'vAxis' => array(
          'title' => 'Donors',
          'titleTextStyle' => array('color' => '#4B8BCD'),
        ),
        'hAxis' => array('format' => '###,###,###$'),
        'chartArea' => array(
          "width" => "60%",
          "height" => "75%",
          "left" => "20%",
        ),
        'colors' => array('#91A0AE'),
      );
      $label_res_type = "Core";
      $bar_chart_cols_arr = array(
        array(
          'id' => 'Country',
          'label' => 'Country',
          'pattern' => '',
          'type' => 'string',
        ),
        array(
          'id' => $label_res_type,
          'label' => $label_res_type,
          'pattern' => '',
          'type' => 'number',
        ),
      );
      // Array to be converted to json string and used in google chart's area
      // chart.
      $bar_chart_rows_arr = array();
      foreach ($arr_chart as $year => $bar_data) {
        // Show data for only selected year.
        if ($year == $last_selected_year) {
          $i = 0;
          foreach ($bar_data as $arr) {
            if ($i < 20) {
              array_push($bar_chart_rows_arr, array(
                'c' => array(
                  array('v' => $arr["cc"]),
                  array('v' => round($arr["donation"], 0, PHP_ROUND_HALF_UP)),
                ),
              ));
            }
            $i++;
          }
        }
      }
      break;

    case '2':
      $chart_title = 'Top 20 donors to UNFPA non-core resources';
      $options_array = array(
        'title' => $chart_title,
        'vAxis' => array('title' => 'Donors', 'titleTextStyle' => array('color' => '#4B8BCD')),
        'hAxis' => array('format' => '###,###,###$'),
        'chartArea' => array(
          "width" => "60%",
          "height" => "75%",
          "left" => "20%",
        ),
        'colors' => array('#E0DECD'),
      );
      $label_res_type = "Non Core";
      $bar_chart_cols_arr = array(
        array(
          'id' => 'Country',
          'label' => 'Country',
          'pattern' => '',
          'type' => 'string',
        ),
        array(
          'id' => $label_res_type,
          'label' => $label_res_type,
          'pattern' => '',
          'type' => 'number',
        ),
      );
      // Array to be converted to json string and used in google chart's area
      // chart.
      $bar_chart_rows_arr = array();
      foreach ($arr_chart as $year => $bar_data) {
        // Show data for only selected year.
        if ($year == $last_selected_year) {
          $i = 0;
          foreach ($bar_data as $arr) {
            if ($i < 20) {
              array_push($bar_chart_rows_arr, array(
                'c' => array(
                  array('v' => $arr["cc"]),
                  array('v' => round($arr["donation"], 0, PHP_ROUND_HALF_UP)),
                ),
              ));
            }
            $i++;
          }
        }
      }
      break;

    case '3':
      $chart_title = 'Top 20 donors to UNFPA core and non-core resources';
      $options_array = array(
        'title' => $chart_title,
        "isStacked" => TRUE,
        'vAxis' => array(
          'title' => 'Donors',
          'titleTextStyle' => array('color' => '#4B8BCD'),
        ),
        'hAxis' => array('format' => '###,###,###$'),
        'chartArea' => array(
          "width" => "60%",
          "height" => "75%",
          "left" => "20%",
        ),
        'colors' => array('#91A0AE', '#E0DECD'),
      );
      $label_res_type = "Core";
      $label_res_type_nc = "Non Core";
      $bar_chart_cols_arr = array(
        array(
          'id' => 'Country',
          'label' => 'Country',
          'pattern' => '',
          'type' => 'string',
        ),
        array(
          'id' => $label_res_type,
          'label' => $label_res_type,
          'pattern' => '',
          'type' => 'number',
        ),
        array(
          'id' => $label_res_type_nc,
          'label' => $label_res_type_nc,
          'pattern' => '',
          'type' => 'number',
        ),
      );
      // Array to be converted to json string and used in google chart's area
      // chart.
      $bar_chart_rows_arr = array();
      foreach ($arr_chart as $year => $bar_data) {
        // Show data for only selected year.
        if ($year == $last_selected_year) {
          $i = 0;
          foreach ($bar_data as $arr) {
            if ($i < 20) {
              array_push($bar_chart_rows_arr, array(
                'c' => array(
                  array('v' => $arr["cc"]),
                  array('v' => round($arr["donation_c"], 0, PHP_ROUND_HALF_UP)),
                  array('v' => round($arr["donation_nc"], 0, PHP_ROUND_HALF_UP)),
                ),
              ));
            }
            $i++;
          }
        }
      }
      break;
  }
  ?>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
    google.load("visualization", "1", {packages: ["corechart"]});
    drawChart();
    function drawChart() {
        var data = new google.visualization.DataTable({
            cols: <?php echo json_encode($bar_chart_cols_arr); ?>,
            rows: <?php echo json_encode($bar_chart_rows_arr); ?>});
        var options = <?php echo json_encode($options_array); ?>;
        var formatter = new google.visualization.NumberFormat(
                {negativeColor: 'red', negativeParens: true, pattern: '$###,###,###'});
        formatter.format(data, 1); // Apply formatter to second column
  <?php if ($res_type == 3) { ?>
          formatter.format(data, 2); // Apply formatter to third column
  <?php } ?>
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
  </script>
  <?php
}
