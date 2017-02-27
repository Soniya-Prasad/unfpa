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
$sum_indicator_3 = array_sum($data["total_indicator_3"]);
$flag_max = true;
foreach ($data["indicator_arr"] as $cc => $result) {
  $cc_code = '';
  $indicator_3 = isset($result[1]) ? $result[1] : 0;
  if ($indicator_3 == 0.00) {
    $res = 0;
  }
  else {
    $res = ($indicator_3 / $sum_indicator_3) * 100;
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
    $temp_desp = "Indicator value : " . number_format($indicator_3, 2);
    $country_arr[$cc]['description'] = ($res == 0) ? '' : $temp_desp;
    $country_arr[$cc]['color'] = ($cc_code != "") ? $cc_code : 'default';
    $country_arr[$cc]['hover_color'] = 'default';
    $temp_url = isset($data["cc_array"][$cc]["url"]) ? $data["cc_array"][$cc]["url"] : '';
    $country_arr[$cc]['url'] = ($res == 0) ? '' : $temp_url;
    $country_arr[$cc]['inactive'] = "no";
    $country_arr[$cc]['hide'] = "no";
  }
  else {
    $location_arr[$cnt]['name'] = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
    $location_arr[$cnt]['description'] = "Indicator value : " . number_format($indicator_3, 2);
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
  var simplemaps_worldmap_mapdata = {
      main_settings: {
          width: 'responsive',
          background_color: '#F1FBFD',
          background_transparent: 'yes',
          label_color: '#d5ddec',
          //border_color: '#759BB4',
          border_color: '#FFFFFF',
          pop_ups: 'detect',
          state_description: 'Indicator value : 0',
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
      state_specific:<?php echo json_encode($country_arr); ?>,
      locations:<?php echo json_encode($location_arr); ?>,
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