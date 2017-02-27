<div class="select-box-container"></div>

<?php

function get_results_color_code($arr, $val) {
  $final_cc = '';
  foreach ($arr as $color_code => $upto_percent) {
    if ($val > $upto_percent) {
      $final_cc = $color_code;
      break;
    }
  }
  return $final_cc;
}

$location_static_array = array('Comoros', 'Maldives', 'Fiji', 'Sao Tome & Principe', 'Seychelles');
$location_static_latlon = array(
  "Comoros" => array("lat" => "-12.1667", "lng" => "44.25", "size" => "16"),
  "Maldives" => array("lat" => "-0.6", "lng" => "73.1", "size" => "16"),
  "Fiji" => array("lat" => "-19", "lng" => "178", "size" => "36"),
  "Sao Tome & Principe" => array("lat" => "0.2", "lng" => "6.6", "size" => "16"),
  "Seychelles" => array("lat" => "-4.5833", "lng" => "55.6667", "size" => "16"),
);
$cnt = 0;

$sum_indicator = array_sum($data["total_indicator"]);
$flag_max = true;
foreach ($data["indicator_arr"] as $cc => $result) {
  $cc_code = '';
  $indicator_id = $data['selected_ind'];
  $indicator = isset($result[$indicator_id]) ? $result[$indicator_id] : 0;
  if ($indicator == 0.00) {
    $res = 0;
  }
  else {
    $res = ($indicator / $sum_indicator) * 100;
  }
  if ($flag_max) {
    $threshold_value = $res;
    $res = ($res / $threshold_value);
    $flag_max = false;
  }
  else {
    $res = ($res / $threshold_value);
  }
  $cc_code = get_results_color_code($data["color_code_array"], $res);
  $country_temp_name = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
  if (!in_array($country_temp_name, $location_static_array)) {
    $country_arr[$cc]['name'] = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
    $temp_desp = "Indicator value : " . number_format($indicator, 2);
    $country_arr[$cc]['description'] = ($res == 0) ? '' : $temp_desp;
    $country_arr[$cc]['color'] = ($cc_code != "") ? $cc_code : 'default';
    $country_arr[$cc]['hover_color'] = 'default';
    $country_arr[$cc]['url'] = isset($data["cc_array"][$cc]["url"]) ? $data["cc_array"][$cc]["url"] : '';
    $country_arr[$cc]['inactive'] = "no";
    $country_arr[$cc]['hide'] = "no";
  }
  else {
    $location_arr[$cnt]['name'] = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
    $location_arr[$cnt]['description'] = "Indicator value : " . number_format($indicator, 2);
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
?>

<script type="text/javascript">
  simplemaps_worldmap_mapdata.state_specific = <?php echo json_encode($country_arr); ?>;
  simplemaps_worldmap_mapdata.locations = <?php echo json_encode($location_arr); ?>;
  simplemaps_worldmap.load();
</script>