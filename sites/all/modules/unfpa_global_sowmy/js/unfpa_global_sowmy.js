/**
 * @file
 * UNFPA Global SOWMY Javascript file.
 */

(function ($) {
    $(document).ready(function () {
        $('#sowmy-current-trajectory .details, #sowmy-whatif-trajectory .details').show();
        $('#sowmy-current-trajectory .details, #sowmy-whatif-trajectory .details').mouseenter(function () {
            // Set right default value to move the bubble.
            var rightDefaultValue = 60;
            // For the screen whose width is less than 480, this will return value 40.
            var screenSizeDelta = $(window).width() > 480 ? 40 : 0;
            // This will return value 100 if the move class is assigned to an element.
            var moveClassDelta = $(this).hasClass('move') ? 100 : 0;
            // Add or remove the class move depending on the condition.
            $(this).stop(true, false).animate({right: rightDefaultValue + screenSizeDelta + moveClassDelta}, function () {
                $(this).toggleClass('move');
            });
        });
        // Current Trajectory.
        var currentTrajectoryObj = Drupal.settings.unfpa_global_current_trajectory;
        var current_chart = new google.visualization.ComboChart(document.getElementById(currentTrajectoryObj.id));
        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(function () {
            drawChart(currentTrajectoryObj.rows, currentTrajectoryObj.cols, currentTrajectoryObj.options_array, 2, current_chart);
        });
        // WhatIf Trajectory.
        var whatIfTrajectoryObj = Drupal.settings.unfpa_global_whatif_trajectory;
        var whatif_chart = new google.visualization.ComboChart(document.getElementById(whatIfTrajectoryObj.id));
        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(function () {
            drawChart(whatIfTrajectoryObj.rows, whatIfTrajectoryObj.cols, whatIfTrajectoryObj.options_array, 2, whatif_chart);
        });
        // Pregnencies chart.
        var pregnenciesObj = Drupal.settings.unfpa_global_pregnencies_data;
        var pregnencies_chart = new google.visualization.ColumnChart(document.getElementById(pregnenciesObj.id));
        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(function () {
            drawChart(pregnenciesObj.rows, pregnenciesObj.cols, pregnenciesObj.options_array, 2, pregnencies_chart);
        });
        // Geographic Accessibility.
        var accessibilityObj = Drupal.settings.unfpa_global_accessibility;
        var accessibilty_chart = new google.visualization.ColumnChart(document.getElementById(accessibilityObj.id));
        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(function () {
            drawChart(accessibilityObj.rows, accessibilityObj.cols, accessibilityObj.options_array, 3, accessibilty_chart);
        });
    });
})(jQuery);

/**
 * Callback that creates and populates a data table,instantiates the chart.
 *
 * @param {object} rows
 * @param {object} cols
 * @param {object} options
 * @param {object} maxFormatters
 * @param {object} chart
 */
function drawChart(rows, cols, options, maxFormatters, chart) {
  var data = new google.visualization.DataTable({
      cols: cols,
      rows: rows
    });
  var formatter = new google.visualization.NumberFormat({
      pattern: '###,###,###',
      negativeColor: 'red',
      negativeParens: true
    });

  for (var i = 0; i < maxFormatters; i++) {
    formatter.format(data, i + 1);
  }
  // Draws the chart.
  // You must call this method after any changes that you make to the chart or
  // data to show the changes.
  chart.draw(data, options);
}
