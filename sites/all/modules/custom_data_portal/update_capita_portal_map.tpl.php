<?php
$res_type = $data["selected_resource_type"];
$last_selected_year = $data["selected_year"]; // For display block on the last year show Program activities
$selected_activity_list = $data['selected_activity_list'];

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

function removeText($str_pop) {
  $val = str_replace("mil", "", $str_pop);
  $val = trim($val) * 1000000;
  return $val;
}

$location_static_array = array('Comoros', 'Maldives', 'Fiji', 'Sao Tome & Principe', 'Seychelles', 'Cape Verde');
$location_static_latlon = array(
  "Comoros" => array("lat" => "-12.1667", "lng" => "44.25", "size" => "16"),
  "Maldives" => array("lat" => "-0.6", "lng" => "73.1", "size" => "16"),
  "Fiji" => array("lat" => "-19", "lng" => "178", "size" => "36"),
  "Sao Tome & Principe" => array("lat" => "0.333", "lng" => "6.73", "size" => "16"),
  "Seychelles" => array("lat" => "-4.5833", "lng" => "55.6667", "size" => "16"),
  "Cape Verde" => array("lat" => "15.1111", "lng" => "-23.6167", "size" => "16"),
);
$cnt = 0;
foreach ($data["map_data"] as $year => $spending_arr) {
  if ($last_selected_year == $year) {
    $threshold_value = max($data["max_spending"][$year]);
    $total_year_spending = array_sum($data["total_spending"][$year]);
    foreach ($spending_arr as $cc => $total_spending) {
      $cc_code = '';
      $total_spending = array_sum($total_spending);
      $country_pop = removeText($data["cc_array"][$cc]["population"]);
      $percapita_spending = $total_spending / $country_pop;
      $actual_country_spending_percentage = ($percapita_spending / $threshold_value) * 100;
      $cc_code = get_color_code($data["color_code_array"], $actual_country_spending_percentage);
      foreach ($selected_activity_list as $key => $value) {
        if (count($selected_activity_list) > 10) {
          $selected_activity = 'All';
        }
        elseif (count($selected_activity_list) > 1) {
          $selected_activity = $value;
        }
        else {
          $selected_activity = $key;
        }
      }
      $country_temp_name = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
      if (!in_array($country_temp_name, $location_static_array)) {
        $country_arr[$cc]['name'] = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
        $country_arr[$cc]['description'] = "Expenses per 1000 people $" . round($percapita_spending * 1000);
        $country_arr[$cc]['color'] = ($cc_code != "") ? $cc_code : 'default';
        $country_arr[$cc]['hover_color'] = 'default';
        $country_arr[$cc]['url'] = isset($data["cc_array"][$cc]["url"]) ? $data["cc_array"][$cc]["url"] : '';
        $country_arr[$cc]['hide'] = "no";
        $country_arr[$cc]['inactive'] = "no";
      }
      else {
        $location_arr[$cnt]['name'] = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
        $location_arr[$cnt]['description'] = "Expenses per 1000 people $" . round($percapita_spending * 1000);
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
?>

<script type="text/javascript">
  (function ($) {
      $('#activities-wrapper').slideUp(2000);
      $('#active-activities').html("<?php echo $selected_activity . ' ' . $res_type . ' expenses per 1000 people in USD'; ?>");
  })(jQuery);
  simplemaps_worldmap_mapdata.state_specific = <?php echo json_encode($country_arr); ?>;
  simplemaps_worldmap_mapdata.locations = <?php echo json_encode($location_arr); ?>;
  simplemaps_worldmap.load();
</script>