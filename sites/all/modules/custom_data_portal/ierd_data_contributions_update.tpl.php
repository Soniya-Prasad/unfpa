<?php
$last_selected_year = $data["selected_year"];
$color_heat_array = array("Low" => "#FFDBB7", "Medium" => "#FFBA75", "High" => "#CD7429", "Highest" => "#522E10");
$location_static_array = array('Comoros', 'Maldives', 'Fiji', 'Sao Tome & Principe', 'Seychelles');
$location_static_latlon = array(
  "Comoros" => array("lat" => "-12.1667", "lng" => "44.25", "size" => "16"),
  "Maldives" => array("lat" => "-0.6", "lng" => "73.1", "size" => "16"),
  "Fiji" => array("lat" => "-19", "lng" => "178", "size" => "36"),
  "Sao Tome & Principe" => array("lat" => "0.2", "lng" => "6.6", "size" => "16"),
  "Seychelles" => array("lat" => "-4.5833", "lng" => "55.6667", "size" => "16"),
);
$cnt = 0;
foreach ($data["dd_array"] as $year => $arr) {
  if ($last_selected_year == $year) {
    foreach ($arr as $cc => $need_arr) {
      $score = $need_arr["score"];
      $color_code = 'default';
      $quadrant = !empty($need_arr["quadrant"]) ? ($need_arr["quadrant"]) : "";
      if (isset($need_arr["quadrant"])) {
        $color_code_key = $need_arr["quadrant"];
        $color_code = !empty($color_code_key) ? $color_heat_array[$color_code_key] : 'default';
      }
      else {
        $color_code = 'default';
      }
      $country_temp_name = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
      if (!in_array($country_temp_name, $location_static_array)) {
        $country_arr[$cc]['name'] = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
        $country_arr[$cc]['description'] = "Score: " . $score . '<br>' . "Level of need: " . $quadrant;
        $country_arr[$cc]['color'] = $color_code;
        $country_arr[$cc]['hover_color'] = 'default';
        $country_arr[$cc]['url'] = isset($data["cc_array"][$cc]["url"]) ? $data["cc_array"][$cc]["url"] : '';
        $country_arr[$cc]['hide'] = "no";
        $country_arr[$cc]['inactive'] = "no";
      }
      else {
        $location_arr[$cnt]['name'] = isset($data["country_code_dropdown"][$cc]) ? $data["country_code_dropdown"][$cc] : $cc;
        $location_arr[$cnt]['description'] = "Score: " . $score . '<br>' . "Level of need: " . $quadrant;
        $location_arr[$cnt]['color'] = $color_code;
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
  simplemaps_worldmap_mapdata.state_specific = <?php echo json_encode($country_arr); ?>;
  simplemaps_worldmap_mapdata.locations = <?php echo json_encode($location_arr); ?>;
  simplemaps_worldmap.load();
</script>
