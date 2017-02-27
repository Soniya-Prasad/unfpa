<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<h1>Programme Activities</h1>
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

<?php
prepareDonutChartDataPagePA($data["sub_total_arr"], $data["total_arr"], $data["support_outcomes"], $data["support_outcomes_with_parent"], $data["pa_country_name"], $data["pa_year"]);

function prepareDonutChartDataPagePA($arr, $total_arr, $so_old, $so, $country, $year) {
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

  $budget_total = array();
  $ischartdrawn = false;
// Prepare Pie Chart for Both Regular Resources & Other REsources- CORE,NON CORE.
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
        'type' => 'string'
      ),
      array(
        'id' => 'Percentage',
        'label' => 'Percentage',
        'pattern' => '',
        'type' => 'number'
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
      if ($parent_value_budget < 0) {
        $parent_value_budget = 0;
      }
      array_push($do_chart_rows_arr, array('c' => array(
          array('v' => $so[$parent_key]["label"]),
          array('v' => $parent_value_budget)
        )
      ));
      $do_chart_slices_arr[$i]['color'] = $color_array[$i];
      $i++;
    }
    $is_all_parents_zero = TRUE;
    foreach ($do_chart_rows_arr as $key => $val) {
      if ($val['c'][1]['v'] != 0) {
        $is_all_parents_zero = false;
      }
    }

    if (!$is_all_parents_zero) {

      $ischartdrawn = TRUE;
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
              title: "<?php echo $country . " " . $year; ?>" + " programme expenses",
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: <?php echo json_encode($do_chart_slices_arr); ?>
            };
          } else {
            var options = {
              title: "<?php echo $country . " " . $year; ?>" + " programme expenses",
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
  if (!$ischartdrawn) {
    ?>
    <script type="text/javascript">
      (function ($) {
        $(window).load(function () {
          document.getElementById('donutchart-all-<?php echo $year; ?>').innerHTML = '<div class="no-data-big">No data for ' + '<?php echo $country . ' ' . $year; ?>' + ' programme expenses</div>';
        });
      })(jQuery);
    </script>
    <?php
  }
}

prepareBarChartFromDonutPA($data["sub_total_arr"], $data["total_arr"], $data["support_outcomes"], $data["support_outcomes_with_parent"]);

function prepareBarChartFromDonutPA($arr, $total_arr, $so_old, $so) {
  $color_array = array(
    '#4495D1', '#1E5985', '#455B7A', '#6CA5D9', '#8FB7E1', '#7587A8',
    '#F7931D', '#C38743', '#EC9E46', '#FCBB75', '#40B879', '#5F7F6C',
    '#5E9E78', '#6FC391', '#7D79A8', '#324053', '#4F4261', '#6A618B',
    '#A9A4C5', '#C0DB7D', '#A2B37C', '#CCE195', '#D8E8AE'
  );
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
      if (strpos($so_key, 'P') === false) {
        if (!isset($bud[$so_key])) {
          $bud[$so_key] = 0;
        }
        if (($bud[$so_key] === null) || ($bud[$so_key] < 0)) {
          $bud[$so_key] == NULL;
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
    $is_all_parents_zero = TRUE;
    $active_parent = -1;
    foreach ($do_chart_rows_arr_bar as $key => $val) {
      if ($val['c'][1]['v'] === null) {
        $active_parent++;
      }
      if ($val['c'][1]['v'] != 0) {
        $is_all_parents_zero = false;
        break;
      }
    }
    if (!$is_all_parents_zero) {
      ?>
      <script type="text/javascript">
        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(drawBarColors<?php echo $year; ?>);
        function drawBarColors<?php echo $year; ?>() {
          reDrawBarChart<?php echo $year; ?>(<?php echo $active_parent; ?>);
        }
        function reDrawBarChart<?php echo $year; ?>(selectedParentID) {
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
              viewWindowMode: "explicit", 
              viewWindow:{ min: 0 },
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
}

prepareDonutChartCoreActivities($data["fund_arr_core"], $data["fund_arr"], $data["support_outcomes"], $data["support_outcomes_with_parent"], $data["pa_country_name"], $data["pa_year"]);

/**
 * This function is used to prepare Pie Chart for Regular Resources - CORE.
 *
 */
function prepareDonutChartCoreActivities($arr_fund_core, $total_fund_arr, $so_old, $so, $country, $year) {
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
  $ischartdrawn = false;
// Prepare Pie Chart for Both Regular Resources & Other REsources- CORE,NON CORE.
  foreach ($arr_fund_core as $year => $graph_activity) {
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
      if ($parent_value_budget < 0) {
        $parent_value_budget = 0;
      }
      array_push($do_chart_rows_arr, array('c' => array(
          array('v' => $so[$parent_key]["label"]),
          array('v' => $parent_value_budget)
        )
      ));

      $do_chart_slices_arr[$i]['color'] = $color_array[$i];
      $i++;
    }
    $is_all_parents_zero = TRUE;
    foreach ($do_chart_rows_arr as $key => $val) {
      if ($val['c'][1]['v'] != 0) {
        $is_all_parents_zero = false;
      }
    }
    if (!$is_all_parents_zero) {
      $ischartdrawn = TRUE;
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
              title: "<?php echo $country . " " . $year; ?>" + " programme expenses" + " (core)",
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: <?php echo json_encode($do_chart_slices_arr); ?>
            };
          } else {
            var options = {
              title: "<?php echo $country . " " . $year; ?>" + " programme expenses" + " (core)",
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
  if (!$ischartdrawn) {
    ?>
    <script type="text/javascript">
      (function ($) {
        $(window).load(function () {
          document.getElementById('donutchart-core-<?php echo $year; ?>').innerHTML = '<div class="no-data-big">No data for ' + '<?php echo $country . ' ' . $year; ?>' + ' programme expenses (core)</div>';
        });
      })(jQuery);
    </script>
    <?php
  }
}

prepareBarChartFromDonutCorePA($data["fund_arr_core"], $data["total_arr"], $data["support_outcomes"], $data["support_outcomes_with_parent"]);

function prepareBarChartFromDonutCorePA($arr, $total_arr, $so_old, $so) {
  $color_array = array(
    '#4495D1', '#1E5985', '#455B7A', '#6CA5D9', '#8FB7E1',
    '#7587A8', '#F7931D', '#C38743', '#EC9E46', '#FCBB75', '#40B879',
    '#5F7F6C', '#5E9E78', '#6FC391', '#7D79A8', '#324053', '#4F4261',
    '#6A618B', '#A9A4C5', '#C0DB7D', '#A2B37C', '#CCE195', '#D8E8AE'
  );
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
      if (strpos($so_key, 'P') === false) {
        if (!isset($bud[$so_key])) {
          $bud[$so_key] = 0;
        }
        if (($bud[$so_key] === null) || ($bud[$so_key] < 0)) {
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
    $is_all_parents_zero = TRUE;
    $active_parent = -1;
    foreach ($do_chart_rows_arr_bar as $key => $val) {
      if ($val['c'][1]['v'] === null) {
        $active_parent++;
      }
      if ($val['c'][1]['v'] != 0) {
        $is_all_parents_zero = false;
        break;
      }
    }
    if (!$is_all_parents_zero) {
      ?>
      <script type="text/javascript">
        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(drawBarColors<?php echo $year; ?>);
        function drawBarColors<?php echo $year; ?>() {
          reDrawBarChartCore<?php echo $year; ?>(<?php echo $active_parent; ?>);
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
          var chart = new google.visualization.BarChart(document.getElementById('bchart-core-<?php echo $year; ?>'));
          chart.draw(data, options);
        }
      </script>
      <?php
    }
  }
}

// Prepare Pie Chart for Other Resources - NON CORE.
prepareDonutChartNonCoreActivities($data["fund_arr_noncore"], $data["fund_arr"], $data["support_outcomes"], $data["support_outcomes_with_parent"], $data["pa_country_name"], $data["pa_year"]);

/**
 * This function is used to prepare Pie Chart for Regular Resources - CORE.
 *
 */
function prepareDonutChartNonCoreActivities($arr_fund_noncore, $total_fund_arr, $so_old, $so, $country, $year) {
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
  $ischartdrawn = false;
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
      if ($parent_value_budget < 0) {
        $parent_value_budget = 0;
      }
      array_push($do_chart_rows_arr, array('c' => array(
          array('v' => $so[$parent_key]["label"]),
          array('v' => $parent_value_budget)
        )
      ));
      $do_chart_slices_arr[$i]['color'] = $color_array[$i];
      $i++;
    }
    $is_all_parents_zero = TRUE;
    foreach ($do_chart_rows_arr as $key => $val) {
      if ($val['c'][1]['v'] != 0) {
        $is_all_parents_zero = false;
      }
    }
    if (!$is_all_parents_zero) {
      $ischartdrawn = TRUE;
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
              title: "<?php echo $country . " " . $year; ?>" + " programme expenses" + " (non-core)",
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: <?php echo json_encode($do_chart_slices_arr); ?>
            };
          } else {
            var options = {
              title: "<?php echo $country . " " . $year; ?>" + " programme expenses" + " (non-core)",
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
  if (!$ischartdrawn) {
    ?>
    <script type="text/javascript">
      (function ($) {
        $(window).load(function () {
          document.getElementById('donutchart-noncore-<?php echo $year; ?>').innerHTML = '<div class="no-data-big">No data for ' + '<?php echo $country . ' ' . $year; ?>' + ' programme expenses (non-core)</div>';
        });
      })(jQuery);
    </script>
    <?php
  }
}

prepareBarChartFromDonutNonCorePA($data["fund_arr_noncore"], $data["total_arr"], $data["support_outcomes"], $data["support_outcomes_with_parent"]);

function prepareBarChartFromDonutNonCorePA($arr, $total_arr, $so_old, $so) {
  $color_array = array(
    '#4495D1', '#1E5985', '#455B7A', '#6CA5D9', '#8FB7E1',
    '#7587A8', '#F7931D', '#C38743', '#EC9E46', '#FCBB75', '#40B879',
    '#5F7F6C', '#5E9E78', '#6FC391', '#7D79A8', '#324053', '#4F4261',
    '#6A618B', '#A9A4C5', '#C0DB7D', '#A2B37C', '#CCE195', '#D8E8AE'
  );
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
      if (strpos($so_key, 'P') === false) {
        if (!isset($bud[$so_key])) {
          $bud[$so_key] = 0;
        }
        if (($bud[$so_key] === null) || ($bud[$so_key] < 0)) {
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
    $is_all_parents_zero = TRUE;
    $active_parent = -1;
    foreach ($do_chart_rows_arr_bar as $key => $val) {
      if ($val['c'][1]['v'] === null) {
        $active_parent++;
      }
      if ($val['c'][1]['v'] != 0) {
        $is_all_parents_zero = false;
        break;
      }
    }
    if (!$is_all_parents_zero) {
      ?>
      <script type="text/javascript">
        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(drawBarColors<?php echo $year; ?>);
        function drawBarColors<?php echo $year; ?>() {
          reDrawBarChartNonCore<?php echo $year; ?>(<?php echo $active_parent; ?>);
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
            vAxis: {minValue: 0, format: '$###,###,###', viewWindowMode: "explicit", viewWindow: {min: 0}},
            hAxis: {
              title: 'Expenses in USD',
              minValue: 0,
              viewWindowMode: "explicit", viewWindow: {min: 0}
            },
          };
          var formatter = new google.visualization.NumberFormat(
            {pattern: '$###,###,###', negativeColor: 'red', negativeParens: false});
          // Apply formatter to second column.
          formatter.format(data, 1);
          var chart = new google.visualization.BarChart(document.getElementById('bchart-noncore-<?php echo $year; ?>'));
          chart.draw(data, options);
        }
      </script>
      <?php
    }
  }
}

prepareBarChart($data["fund_arr"]);

function prepareBarChart($arr) {
  $area_chart_cols_arr = array(
    array('id' => 'Year', 'label' => 'Year', 'type' => 'string'),
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
  $i = 1;
  $cnt_arr = count($arr);
  foreach ($arr as $year => $funds_cat_arr) {
    $area_chart_rows_arr = array();
    $budget_value_rr = array_sum($funds_cat_arr['Regular Resources']);
    $budget_value_or = array_sum($funds_cat_arr['Other Resources']);
    $budget_value_rr = ($budget_value_rr > 0) ? $budget_value_rr : 0;
    $budget_value_or = ($budget_value_or > 0) ? $budget_value_or : 0;
// Array nesting is complex owing to to google charts api.
    array_push($area_chart_rows_arr, array('c' => array(
        array('v' => $year),
        array('v' => $budget_value_rr),
        array('v' => $budget_value_or)
      )
    ));
    $i++;
    $is_all_parents_zero = TRUE;
    foreach ($area_chart_rows_arr as $key => $val) {
      if (($val['c'][1]['v'] != 0) || ($val['c'][2]['v'] != 0)) {
        $is_all_parents_zero = false;
      }
    }
    if (!$is_all_parents_zero) {
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
            title: 'Programme expenses by resource type',
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            hAxis: {titleTextStyle: {color: '#333'}, textPosition: 'out'},
            vAxis: {minValue: 0, format: '$###,###,###', viewWindowMode: "explicit", viewWindow: {min: 0}},
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
            {prefix: '$', negativeColor: 'red', negativeParens: true, pattern: '###,###,###'});
          // Apply formatter to second column.
          formatter.format(data, 1);
          // Apply formatter to third column.
          formatter.format(data, 2);
          var chart = new google.charts.Bar(document.getElementById('chart_div_<?php echo $year; ?>'));
          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_' +<?php echo $year; ?>));
          chart.draw(data, options);
        }
      </script>
      <?php
    }
  }
}

prepareBarChartImplementedActivities($data["pa_implemented_arr"]);
prepareBarChartImplementedCoreActivities($data["pa_implemented_arr_c"]);
prepareBarChartImplementedNonCoreActivities($data["pa_implemented_arr_nc"]);

function prepareBarChartImplementedActivities($arr) {
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
    $amount_unfpa = isset($imp_arr['UNFPA']) ? array_sum($imp_arr['UNFPA']) : 0;
    $amount_gov = isset($imp_arr['GOV']) ? array_sum($imp_arr['GOV']) : 0;
    $amount_ngo = isset($imp_arr['NGO']) ? array_sum($imp_arr['NGO']) : 0;
    $amount_un = isset($imp_arr['UN']) ? array_sum($imp_arr['UN']) : 0;
    $amount_unfpa = ($amount_unfpa > 0) ? $amount_unfpa : 0;
    $amount_gov = ($amount_gov > 0) ? $amount_gov : 0;
    $amount_ngo = ($amount_ngo > 0) ? $amount_ngo : 0;
    $amount_un = ($amount_un > 0) ? $amount_un : 0;
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
    $is_all_parents_zero = TRUE;
    foreach ($area_chart_rows_arr as $key => $val) {
      if (($val['c'][1]['v'] != 0) || ($val['c'][2]['v'] != 0) || ($val['c'][3]['v'] != 0) || ($val['c'][4]['v'] != 0)) {
        $is_all_parents_zero = false;
      }
    }
    if (!$is_all_parents_zero) {
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
            title: 'Programme expenses by implementing agency',
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '65%', left: '20%'},
            vAxis: {minValue: 0, format: '$###,###,###', viewWindowMode: "explicit", viewWindow: {min: 0}},
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
    else {
      ?>
      <script type="text/javascript">
        (function ($) {
          $(window).load(function () {
            document.getElementById('implemented-all-<?php echo $year; ?>').innerHTML = '<div class="no-data-small">No data for Programme expenses by implementing agency</div>';
          });
        })(jQuery);
      </script>
      <?php
    }
  }
}

function prepareBarChartImplementedCoreActivities($arr) {
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
    // Array to be converted to json string and used in google chart's area chart.
    $area_chart_rows_arr = array();
    $amount_unfpa = isset($imp_arr['UNFPA']) ? array_sum($imp_arr['UNFPA']) : 0;
    $amount_gov = isset($imp_arr['GOV']) ? array_sum($imp_arr['GOV']) : 0;
    $amount_ngo = isset($imp_arr['NGO']) ? array_sum($imp_arr['NGO']) : 0;
    $amount_un = isset($imp_arr['UN']) ? array_sum($imp_arr['UN']) : 0;
    $amount_unfpa = ($amount_unfpa > 0) ? $amount_unfpa : 0;
    $amount_gov = ($amount_gov > 0) ? $amount_gov : 0;
    $amount_ngo = ($amount_ngo > 0) ? $amount_ngo : 0;
    $amount_un = ($amount_un > 0) ? $amount_un : 0;
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
    $is_all_parents_zero = TRUE;
    foreach ($area_chart_rows_arr as $key => $val) {
      if (($val['c'][1]['v'] != 0) || ($val['c'][2]['v'] != 0) || ($val['c'][3]['v'] != 0) || ($val['c'][4]['v'] != 0)) {
        $is_all_parents_zero = false;
      }
    }
    if (!$is_all_parents_zero) {
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
            title: 'Programme expenses by implementing agency (core)',
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '65%', left: '20%'},
            vAxis: {minValue: 0, format: '$###,###,###', viewWindowMode: "explicit", viewWindow: {min: 0}},
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
          ;
        }
      </script>
      <?php
    }
    else {
      ?>
      <script type="text/javascript">
        (function ($) {
          $(window).load(function () {
            document.getElementById('implemented-core-<?php echo $year; ?>').innerHTML = '<div class="no-data-small">No data for Programme expenses by implementing agency (core)</div>';
          });
        })(jQuery);
      </script>
      <?php
    }
  }
}

function prepareBarChartImplementedNonCoreActivities($arr) {
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
    // Array to be converted to json string and used in google chart's area chart.
    $area_chart_rows_arr = array();
    $amount_unfpa = isset($imp_arr['UNFPA']) ? array_sum($imp_arr['UNFPA']) : 0;
    $amount_gov = isset($imp_arr['GOV']) ? array_sum($imp_arr['GOV']) : 0;
    $amount_ngo = isset($imp_arr['NGO']) ? array_sum($imp_arr['NGO']) : 0;
    $amount_un = isset($imp_arr['UN']) ? array_sum($imp_arr['UN']) : 0;
    $amount_unfpa = ($amount_unfpa > 0) ? $amount_unfpa : 0;
    $amount_gov = ($amount_gov > 0) ? $amount_gov : 0;
    $amount_ngo = ($amount_ngo > 0) ? $amount_ngo : 0;
    $amount_un = ($amount_un > 0) ? $amount_un : 0;
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
    $is_all_parents_zero = TRUE;
    foreach ($area_chart_rows_arr as $key => $val) {
      if (($val['c'][1]['v'] != 0) || ($val['c'][2]['v'] != 0) || ($val['c'][3]['v'] != 0) || ($val['c'][4]['v'] != 0)) {
        $is_all_parents_zero = false;
      }
    }
    if (!$is_all_parents_zero) {
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
            chartArea: {width: '65%', left: '20%'},
            vAxis: {minValue: 0, format: '$###,###,###', viewWindowMode: "explicit", viewWindow: {min: 0}},
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
    else {
      ?>
      <script type="text/javascript">
        (function ($) {
          $(window).load(function () {
            document.getElementById('implemented-noncore-<?php echo $year; ?>').innerHTML = '<div class="no-data-small">No data for Programme expenses by implementing agency (noncore)</div>';
          });
        })(jQuery);
      </script>
      <?php
    }
  }
}
?>

<div class="data donut_chart_container">
  <div id="donut_chart_tabs" class="container">
    <ul>
      <li class="active donut_chart_tab" tabfor="all"><span>All resources</span></li>
      <li class="donut_chart_tab" tabfor="core"><span>Core</span></li>
      <li class="donut_chart_tab" tabfor="noncore"><span>Non-core</span></li>
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
<div id="map-box-wrapper">
  <div class="pa-container" id="pa-activity">
    <?php
    $parent = array();
    $par_des = array();
    if (is_array($data["activities"])) {
      foreach ($data["activities"] as $year => $arr) {
        if ($year == $last_selected_year) {
          ?>
          <div class="program-year-wrapper program-wrapper-<?php echo $year; ?>" style="<?php if ($last_selected_year == $year) { ?>display:block<?php
          }
          else {
            ?>display:none<?php } ?>;">
            <h2><?php echo $data['pa_country_name']; ?> <?php echo $year; ?> Programme Activities data </h2>
            <?php
            foreach ($arr as $cc => $country_code) {
              ?>
              <?php
              foreach ($country_code as $outid_id => $out_arr) {
                ?>
                <div class = "program-child-wrapper">
                  <div class="program-parent-title"><?php echo $outid_id; ?> </div>
                  <div class="program-parent-wrapper">
                    <div class="program-title-wrapper">
                      <div class="programs-program-description">
                        <?php
                        foreach ($out_arr as $act_id => $act_arr) {
                          $description = $data["support_outcomes"][$act_id]["par_des"];
                        }
                        echo $description;
                        ?>
                      </div>
                    </div>
                    <div class="program-data-wrapper">
                      <div class="projects-project-spec">
                        <div class="projects-project-divider"></div>
                        <div class="projects-project-spec-key">Total Spending:</div>
                        <div class="projects-project-spec-value">
                          <?php
                          $total = 0;
                          foreach ($out_arr as $outcome => $outcome_arr) {
                            $sub_total_budget = array();
                            $sub_total_budget = array_sum($outcome_arr["budget"]);
                            $total += $sub_total_budget;
                          }
                          echo '$' . round($total);
                          ?>
                        </div>
                        <div class="projects-project-divider"></div>
                        <div class="projects-project-spec-key">Implemented by:</div>
                        <div class="projects-project-spec-value">
                          <?php
                          $num_implementer_budget = array();
                          $num_calc_percentage = array();
                          foreach ($out_arr as $outcome => $outcome_arr) {
                            $c = 0;
                            $cnt_implement = $outcome_arr["implemented_by"];
                            krsort($outcome_arr["implemented_by"]);
                            foreach ($outcome_arr["implemented_by"] as $implementer => $sub_tot) {
                              ?>
                              <?php
                              $implementer_budget = array_sum($sub_tot);
                              $calc_percentage = ($implementer_budget / $total) * 100;
                              if (isset($num_implementer_budget[$implementer])) {
                                $num_implementer_budget[$implementer] += $implementer_budget;
                              }
                              else {
                                $num_implementer_budget[$implementer] = $implementer_budget;
                              }
                              if (isset($num_calc_percentage[$implementer])) {
                                $num_calc_percentage[$implementer] += $calc_percentage;
                              }
                              else {
                                $num_calc_percentage[$implementer] = $calc_percentage;
                              }
                              ?>
                              <?php
                              $c++;
                            }
                          }
                          $i = 0;
                          foreach ($num_implementer_budget as $implementer => $value) {
                            echo $implementer . " $" . round($num_implementer_budget[$implementer]) . " (<span class='row$i'>" . round($num_calc_percentage[$implementer]) . "%</span>) <br />";
                            $i++;
                          }
                          ?>
                        </div>
                        <div class="projects-project-divider"></div>
                        <div class="projects-project-spec-key">Funded by:</div>
                        <div class="projects-project-spec-value">
                          <?php
                          $sub_total_budget = array_sum($act_arr["budget"]);
                          ksort($act_arr["funded_by"]);
                          $nc_sum_array = array();
                          $c_sum_array = array();
                          foreach ($out_arr as $act_id => $act_arr) {
                            foreach ($act_arr["funded_by"] as $funder => $sub_tot) {
                              $funder_percentage = (array_sum($sub_tot) / $total) * 100;
                              if ($funder != 'CORE') {
                                $nc_sum_array[] = $funder_percentage;
                              }
                              else {
                                $c_sum_array[] = $funder_percentage;
                              }
                            }
                          }
                          ?>
                          <?php if (count($c_sum_array) > 0) { ?>
                            Core Resources (<span class='r2'><?php echo round(array_sum($c_sum_array)) . "%"; ?></span>) <br />
                          <?php } ?>
                          <?php if (count($nc_sum_array) > 0) { ?>
                            Non-core Resources (<span class='r1'><?php echo round(array_sum($nc_sum_array)) . "%"; ?></span>) <br />
                          <?php } ?>
                        </div>
                        <div class="projects-project-divider"></div>
                      </div>
                    </div>
                  </div>
                  <?php foreach ($out_arr as $act_id => $act_arr) {
                    ?>
                    <div class="program-wrapper">
                      <div class="program-title-wrapper">
                        <div class="programs-program-title">
                          <?php
                          echo $data["support_outcomes"][$act_id]["label"];
                          ?>
                        </div>
                        <div class="programs-program-description">
                          <?php echo $data["support_outcomes"][$act_id]["des"];
                          ?>
                        </div>
                      </div>
                      <div class="program-data-wrapper">
                        <div class="projects-project-spec">
                          <div class="projects-project-divider"></div>
                          <div class="projects-project-spec-key">Total Spending:</div>
                          <div class="projects-project-spec-value">
                            <?php
                            $sub_total_budget = array_sum($act_arr["budget"]);
                            echo '$' . round($sub_total_budget);
                            ?>
                          </div>
                          <div class="projects-project-divider"></div>
                          <div class="projects-project-spec-key">Implemented by:</div>
                          <div class="projects-project-spec-value">
                            <?php
                            $c = 0;
                            $cnt_implement = $act_arr["implemented_by"];
                            krsort($act_arr["implemented_by"]);
                            foreach ($act_arr["implemented_by"] as $implementer => $sub_tot) {
                              $implementer_budget = array_sum($sub_tot);
                              $calc_percentage = ($implementer_budget / $sub_total_budget) * 100;
                              $num_implementer_budget = round($implementer_budget);
                              $num_calc_percentage = round($calc_percentage);
                              if ($c == $cnt_implement) {
                                echo $implementer . " $" . $num_implementer_budget . " (<span class='row$c'>" . $num_calc_percentage . "%</span>)";
                              }
                              else {
                                echo $implementer . " $" . $num_implementer_budget . " (<span class='row$c'>" . $num_calc_percentage . "%</span>) <br />";
                              }
                              $c++;
                            }
                            ?>
                          </div>
                          <div class="projects-project-divider"></div>
                          <div class="projects-project-spec-key">Funded by:</div>
                          <div class="projects-project-spec-value projects-project-spec-title">
                            <?php
                            $sub_total_budget = array_sum($act_arr["budget"]);
                            ksort($act_arr["funded_by"]);
                            $nc_sum_array = array();
                            $c_sum_array = array();
                            foreach ($act_arr["funded_by"] as $funder => $sub_tot) {
                              $funder_percentage = (array_sum($sub_tot) / $sub_total_budget) * 100;
                              if ($funder != 'CORE') {
                                $nc_sum_array[] = round($funder_percentage);
                              }
                              else {
                                $c_sum_array[] = round($funder_percentage);
                              }
                            }
                            ?>
                            <?php if (count($c_sum_array) > 0) { ?>
                              Core Resources (<span class='r2'><?php echo array_sum($c_sum_array) . "%"; ?></span>) <br />
                            <?php } ?>
                            <?php if (count($nc_sum_array) > 0) { ?>
                              Non-core Resources (<span class='r1'><?php echo array_sum($nc_sum_array) . "%"; ?></span>) <br />
                            <?php } ?>
                          </div>
                          <div class="projects-project-divider"></div>
                        </div>
                      </div> <!-- program-data-wrapper Ends -->
                    </div>	<!-- program-wraper Ends -->
                    <?php
                  }
                  ?>
                </div>
                <?php
              }
            }
            ?>
          </div> <!-- program-wraper each year Ends -->
          <?php
        }
      }
    }
    ?>
  </div> <!-- pa-container Ends -->
</div>
<script type="text/javascript">
  (function ($) {
    $(document).ready(function () {
      var $active_tab;
      $('#donut_chart_tabs li').on({click: function () {
          $active_tab = $(this);
          switchTab($active_tab);
        }, mouseenter: function () {
          $active_tab = $('#donut_chart_tabs li.active');
          switchTab($(this));
        }, mouseleave: function () {
          switchTab($active_tab);
        }
      });
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
  })(jQuery);
</script>
