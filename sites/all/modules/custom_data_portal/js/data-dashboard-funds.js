(function ($) {

  $(document).ready(function () {
    // Get the latest year.
    var year = Drupal.settings.year;
    // Get data for donut chart - All Resources.
    var donutObjAllResources = Drupal.settings.donut_chart_all_resources;
    // Get data for bar chart - All Resources.
    var barObjAllResources = Drupal.settings.bar_chart_from_donut_chart_all_resources;
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(function () {
      // Prepare donut and bar chart - All Resources. 
      drawChart(donutObjAllResources, barObjAllResources, year);
      reDrawBarChart(0, barObjAllResources);
    });

    // Get data for donut chart - Core.
    var donutObjCore = Drupal.settings.donut_chart_core;
    // Get data for bar chart - Core.
    var barObjCore = Drupal.settings.bar_chart_from_donut_chart_core;
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(function () {
      // Prepare donut and bar chart - Core.
      drawChart(donutObjCore, barObjCore, year);
      reDrawBarChart(0, barObjCore);
    });

    // Get data for donut chart - NonCore.
    var donutObjNonCore = Drupal.settings.donut_chart_noncore;
    // Get data for bar chart - NonCore.
    var barObjNonCore = Drupal.settings.bar_chart_from_donut_chart_noncore;
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(function () {
      // Prepare donut and bar chart - NonCore.
      drawChart(donutObjNonCore, barObjNonCore, year);
      reDrawBarChart(0, barObjNonCore);
    });

    var $active_tab;
    $('#transparency').on('click', '#donut-chart-tabs li', function () {
      $active_tab = $(this);
      switchTab($active_tab);
    });

    $('#transparency').on('mouseenter', '#donut-chart-tabs li', function () {
      $active_tab = $('#donut-chart-tabs li.active');
      switchTab($(this));
    });

    $('#transparency').on('mouseleave', '#donut-chart-tabs li', function () {
      switchTab($active_tab);
    });
  });
  function switchTab($tab) {
    var chart = $tab.attr('tabfor');
    $('#donut-chart-tabs li').removeClass('active');
    $tab.addClass('active');
    $('.donut-chart').css({'visibility': 'hidden'});
    $('.bchart').css({'visibility': 'hidden'});
    $('#donutchart-' + chart).css({'visibility': 'visible'});
    $('.bchart.' + chart).css({'visibility': 'visible'});
  }
})(jQuery);

// Function to prepare donut and bar chart.
function drawChart(donutObj, barObj, year) {
  var data = new google.visualization.DataTable({
    cols: donutObj.donut_chart.cols,
    rows: donutObj.donut_chart.rows});

  var options = {
    title: donutObj.region + ' ' + year + ' programme expenses',
    titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
    pieHole: 0.4,
    legend: {position: 'right'},
    chartArea: {width: '85%'},
    slices: donutObj.donut_chart.color
  };

  var formatter = new google.visualization.NumberFormat({
    pattern: '$###,###,###',
    negativeColor: 'red',
    negativeParens: true
  });
  // Apply formatter to second column.
  formatter.format(data, 1);
  var chart = new google.visualization.PieChart(document.getElementById(donutObj.id));
  chart.draw(data, options);
  function selectHandler() {
    var selectedItem = chart.getSelection()[0];
    if (selectedItem) {
      reDrawBarChart(selectedItem.row, barObj);
    }
  }
  google.visualization.events.addListener(chart, 'select', selectHandler);
}

// Function to prepare bar chart.
function reDrawBarChart(selectedParentID, barObj) {
  var rows = barObj.bar_chart.rows;
  var cols = barObj.bar_chart.cols;
  var selected_bar_chart_rows = new Array();
  var parent_bar_chart_rows = new Array();
  var j = 0;
  var flag = false;
  for (var i = 0; i < rows.length; i++) {
    if (rows[i]['c'][1]['v'] === null) {
      parent_bar_chart_rows[j] = rows[i]['c'][0]['v'];
      j++;
    }
  }
  j = 0;
  for (var i = 0; i < rows.length; i++) {
    if (rows[i]['c'][1]['v'] === null) {
      flag = false;
    }
    if (flag) {
      selected_bar_chart_rows[j] = (rows[i]);
      j++;
    }
    if (rows[i]['c'][0]['v'] === parent_bar_chart_rows[selectedParentID]) {
      flag = true;
    }
  }
  var data = new google.visualization.DataTable({
    cols: cols,
    rows: selected_bar_chart_rows});
  var options = {
    title: parent_bar_chart_rows[selectedParentID],
    titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
    chartArea: {width: '50%', left: '40%'},
    legend: {position: 'none'},
    bar: {groupWidth: '40'},
    hAxis: {
      title: 'Expenses in USD',
      minValue: 0,
      format: 'short'
    }
  };
  var formatter = new google.visualization.NumberFormat({
    pattern: '$###,###,###',
    negativeColor: 'red',
    negativeParens: true
  });
  formatter.format(data, 1);
  var chart = new google.visualization.BarChart(document.getElementById(barObj.id));
  chart.draw(data, options);
}
