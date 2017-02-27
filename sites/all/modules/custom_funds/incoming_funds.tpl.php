<?php
/**
 * @file
 * Displays Template for Data Funds page block.
 */
?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<div class="select_wrapper">
  <div class="year_wrapper">
    <label for="year">Year: </label>
    <select id ="year_dropdown" name="year" onchange="update_funds()">
      <?php
      $query = db_select('incoming_funds', 'i');
      $query->fields('i', array('year'));
      $query->orderBy('i.year', "DESC");
      $result = $query->distinct()->execute()->fetchAll();
      foreach ($result as $key => $value) {
        $year = $value->year;
        if ($key == 0) {
          print '<option value="' . $year . '" selected="selected">' . $year . '</option>';
        }
        else {
          print '<option value="' . $year . '">' . $year . '</option>';
        }
      }
      ?>
    </select>
  </div>
</div>

<!-- Incoming funds -->
<div class = "data donut_chart_container">
  <div id = "donut_chart_tabs1" class = "container donut_chart_tabs">
    <ul>
      <li class = "active donut_chart_tab" tabfor = "1 by-donor"><span>By Donor</span></li>
      <li class = "donut_chart_tab" tabfor = "1 by-fund"><span>By Funds</span></li>
    </ul>
  </div>
  <div class="donut_chart_wrapper">
    <div id="donutchart-by-donor" class="donut_chart1 by-donor" style="visibility: visible;"></div>
    <div id="donutchart-by-fund" class="donut_chart1 by-fund"></div>
  </div>
</div>
<div class = "bchart_container">
  <div id = "bchart-by-donor" class = "bchart1 by-donor" style = "visibility: visible;" > </div>
  <div id = "bchart-by-fund" class = "bchart1 by-fund" > </div>
</div>

<!-- Disbursement -->
<div class = "data donut_chart_container">
  <div id = "donut_chart_tabs2" class = "container donut_chart_tabs">
    <ul>
      <li class = "active donut_chart_tab" tabfor = "2 by-org"><span>By Organization</span></li>
      <li class = "donut_chart_tab" tabfor = "2 by-funds"><span>By Funds</span></li>
    </ul>
  </div>
  <div class="donut_chart_wrapper">
    <div id="donutchart-by-org-dis" class="donut_chart2 by-org" style="visibility: visible;"></div>
    <div id="donutchart-by-fund-dis" class="donut_chart2 by-funds"></div>
  </div>
</div>
<div class = "bchart_container" >
  <div id = "bchart-by-org-dis" class = "bchart2 by-org" style = "visibility: visible;" > </div>
  <div id = "bchart-by-fund-dis" class = "bchart2 by-funds" > </div>
</div>

<!-- Expenditure -->
<div class = "data donut_chart_container">
  <div id = "donut_chart_tabs3" class = "container donut_chart_tabs">
    <ul>
      <li class = "active donut_chart_tab" tabfor = "3 by-org-exp"><span>By Organization</span></li>
      <li class = "donut_chart_tab" tabfor = "3 by-fund-exp"><span>By Funds</span></li>
    </ul>
  </div>
  <div class="donut_chart_wrapper">
    <div id="donutchart-by-org-exp" class="donut_chart3 by-org-exp" style="visibility: visible;"></div>
    <div id="donutchart-by-fund-exp" class="donut_chart3 by-fund-exp"></div>
  </div>
</div>
<div class = "bchart_container" >
  <div id = "bchart-by-org-exp" class = "bchart3 by-org-exp" style = "visibility: visible;" > </div>
  <div id = "bchart-by-fund-exp" class = "bchart3 by-fund-exp" > </div>
</div>
<div id="disclaimer-block">
  <sup>1</sup><b>Incoming funds:</b> Funds received in the selected year.<br />
  <sup>2</sup><b>Disbursements:</b>Payments made to Participating Agencies during the selected year.<br />
  <sup>3</sup><b>Expenditures:</b>Funds spent during the selected year.<br />
</div>
<script type = "text/javascript" >
  (function ($) {
    $(document).ready(function () {
      var $active_tab;
      $('#funds-template').on("click", '.donut_chart_tabs li', function () {
        $active_tab = $(this);
        switchTab($active_tab);
      });
      $('#funds-template').on("mouseenter", '.donut_chart_tabs li', function () {
        $active_tab = $(this).siblings('.active');
        switchTab($(this));
      });
      $('#funds-template').on("mouseleave", '.donut_chart_tabs li', function () {
        switchTab($active_tab);
      });
      update_funds();
    });
    function switchTab($tab) {
      var chart = $tab.attr('tabfor').split(" ");
      $('#donut_chart_tabs' + chart[0] + ' li').removeClass('active');
      $tab.addClass('active');
      $('.donut_chart' + chart[0]).css({'visibility': 'hidden'});
      $('.bchart' + chart[0]).css({'visibility': 'hidden'});
      $('.donut_chart' + chart[0] + '.' + chart[1]).css({'visibility': 'visible'});
      $('.bchart' + chart[0] + '.' + chart[1]).css({'visibility': 'visible'});
    }
  })(jQuery);
  function update_funds() {
    (function ($) {
      var sel_year = $('#year_dropdown').val();
      $.ajax({
        url: "chart-update",
        type: "POST",
        data: {year: sel_year}
      }).done(function (html) {
        var parsedArr = $.parseJSON(html);
        // Incoming Funds
        var incoming_funds = parsedArr.DonutChartIncFunds;
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(redrawChartOrg);
        redrawChartOrg();
        function redrawChartOrg() {
          var data = new google.visualization.DataTable({
            cols: incoming_funds.do_chart_cols_arr,
            rows: incoming_funds.do_chart_rows_arr});
          if (window.innerWidth > 768) {
            var options = {title: $('<div>Incoming Funds' + String.fromCharCode(185) + '</div>').html(),
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: incoming_funds.do_chart_slices_arr
            };
          }
          else {
            var options = {title: $('<div>Incoming Funds' + String.fromCharCode(185) + '</div>').html(),
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              legend: {position: 'bottom'},
              chartArea: {width: '85%'},
              slices: incoming_funds.do_chart_slices_arr
            };
          }

          var formatter = new google.visualization.NumberFormat({
            pattern: '$###,###,###',
            negativeColor: 'red',
            negativeParens: true
          });

          formatter.format(data, 1); // Apply formatter to second column
          var chart = new google.visualization.PieChart(document.getElementById('donutchart-by-donor'));
          chart.draw(data, options);
          $("text").filter(function () {
            return $(this).text() === options.title;
          }).attr({'x': '0', 'y': '40'});
          function selectHandler() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              redrawBarColorsDonor(selectedItem.row, incoming_funds.do_chart_rows_arr[selectedItem.row]['c'][0]['v']);
            }
          }
          google.visualization.events.addListener(chart, 'select', selectHandler);
        }

        var bar_incoming_funds = parsedArr.BarChartIncFunds;
        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(drawBarColorsDonor);
        drawBarColorsDonor();
        function drawBarColorsDonor() {
          redrawBarColorsDonor(0, incoming_funds.do_chart_rows_arr[0]['c'][0]['v']);
        }
        function redrawBarColorsDonor(selectedParentID, selectedParentTitle) {
          var bar_chart_rows = bar_incoming_funds.do_chart_rows_arr;
          var data = new google.visualization.DataTable({
            cols: bar_incoming_funds.do_chart_cols_arr,
            rows: bar_chart_rows[selectedParentID]});
          var options = {title: selectedParentTitle, titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '50%', left: '40%'},
            legend: {position: "none"},
            bar: {groupWidth: "40"},
            hAxis: {
              title: 'Income in 1000 USD',
              minValue: 0
            },
          };

          var formatter = new google.visualization.NumberFormat({
            pattern: '$###,###,###',
            negativeColor: 'red',
            negativeParens: true
          });

          formatter.format(data, 1); // Apply formatter to second column
          var chart = new google.visualization.BarChart(document.getElementById('bchart-by-donor'));
          chart.draw(data, options);
        }
        var Inc_funds = parsedArr.DonutChartFundsIncFunds;
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(ajaxChartFundIncFund);
        ajaxChartFundIncFund();
        function ajaxChartFundIncFund() {
          var data = new google.visualization.DataTable({
            cols: Inc_funds.do_chart_cols_arr,
            rows: Inc_funds.do_chart_rows_arr});
          if (window.innerWidth > 768) {
            var options = {title: $('<div>Incoming Funds' + String.fromCharCode(185) + '</div>').html(),
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: Inc_funds.do_chart_slices_arr
            };
          }
          else {
            var options = {title: $('<div>Incoming Funds' + String.fromCharCode(185) + '</div>').html(),
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              legend: {position: 'bottom'},
              chartArea: {width: '85%'},
              slices: Inc_funds.do_chart_slices_arr
            };
          }

          var formatter = new google.visualization.NumberFormat({
            pattern: '$###,###,###',
            negativeColor: 'red',
            negativeParens: true
          });

          formatter.format(data, 1); // Apply formatter to second column
          var chart = new google.visualization.PieChart(document.getElementById('donutchart-by-fund'));
          chart.draw(data, options);
          $("text").filter(function () {
            return $(this).text() === options.title;
          }).attr({'x': '0', 'y': '40'});
          function selectHandler() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              reDrawBarChartFund(selectedItem.row, Inc_funds.do_chart_rows_arr[selectedItem.row]['c'][0]['v']);
            }
          }
          google.visualization.events.addListener(chart, 'select', selectHandler);
        }
        var Inc_funds_bar = parsedArr.BarChartFundsIncFunds;
        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(ajaxBarColorsFund);
        ajaxBarColorsFund();
        function ajaxBarColorsFund() {
          reDrawBarChartFund(0, Inc_funds.do_chart_rows_arr[0]['c'][0]['v']);
        }
        function reDrawBarChartFund(selectedParentID, selectedParentTitle) {
          var bar_chart_rows = Inc_funds_bar.do_chart_rows_arr;
          var data = new google.visualization.DataTable({
            cols: Inc_funds_bar.do_chart_cols_arr,
            rows: bar_chart_rows[selectedParentID]});
          var options = {
            title: selectedParentTitle,
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '50%', left: '40%'},
            legend: {position: "none"},
            bar: {groupWidth: "40"},
            hAxis: {
              title: 'Income in 1000 USD',
              minValue: 0
            },
          };

          var formatter = new google.visualization.NumberFormat({
            pattern: '$###,###,###',
            negativeColor: 'red',
            negativeParens: true
          });

          formatter.format(data, 1); // Apply formatter to second column
          var chart = new google.visualization.BarChart(document.getElementById('bchart-by-fund'));
          chart.draw(data, options);
        }
        //Ajax Disbursement
        var disbursement = parsedArr.DonutChartDisbursement;
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(drawChartOrgDisbursement);
        drawChartOrgDisbursement();
        function drawChartOrgDisbursement() {
          var data = new google.visualization.DataTable({
            cols: disbursement.do_chart_cols_arr,
            rows: disbursement.do_chart_rows_arr});
          if (window.innerWidth > 768) {
            var options = {
              title: $('<div>Disbursement' + String.fromCharCode(178) + '</div>').html(),
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: disbursement.do_chart_slices_arr
            };
          }
          else {
            var options = {
              title: $('<div>Disbursement' + String.fromCharCode(178) + '</div>').html(),
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              legend: {position: 'bottom'},
              chartArea: {width: '85%'},
              slices: disbursement.do_chart_slices_arr
            };
          }

          var formatter = new google.visualization.NumberFormat({
            pattern: '$###,###,###',
            negativeColor: 'red',
            negativeParens: true
          });

          formatter.format(data, 1); // Apply formatter to second column
          var chart = new google.visualization.PieChart(document.getElementById('donutchart-by-org-dis'));
          chart.draw(data, options);
          $("text").filter(function () {
            return $(this).text() === options.title;
          }).attr({'x': '0', 'y': '40'});
          function selectHandler() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              reDrawBarChartOrgDis(selectedItem.row, disbursement.do_chart_rows_arr[selectedItem.row]['c'][0]['v']);
            }
          }
          google.visualization.events.addListener(chart, 'select', selectHandler);
        }
        var dis_bar = parsedArr.BarChartDisbursement;
        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(drawBarColorsDisbursement);
        drawBarColorsDisbursement();
        function drawBarColorsDisbursement() {
          reDrawBarChartOrgDis(0, disbursement.do_chart_rows_arr[0]['c'][0]['v']);
        }
        function reDrawBarChartOrgDis(selectedParentID, selectedParentTitle) {
          var bar_chart_rows = dis_bar.do_chart_rows_arr;
          var data = new google.visualization.DataTable({
            cols: dis_bar.do_chart_cols_arr,
            rows: bar_chart_rows[selectedParentID]});
          var options = {
            title: selectedParentTitle,
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '50%', left: '40%'},
            legend: {position: "none"},
            bar: {groupWidth: "40"},
            hAxis: {
              title: 'Disbursement in 1000 USD',
              minValue: 0
            },
          };

          var formatter = new google.visualization.NumberFormat({
            pattern: '$###,###,###',
            negativeColor: 'red',
            negativeParens: true
          });

          formatter.format(data, 1); // Apply formatter to second column
          var chart = new google.visualization.BarChart(document.getElementById('bchart-by-org-dis'));
          chart.draw(data, options);
        }
        var disbursement_donut = parsedArr.DonutChartOrgDisbursement;
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(drawChartFundDisbursement);
        drawChartFundDisbursement();
        function drawChartFundDisbursement() {
          var data = new google.visualization.DataTable({
            cols: disbursement_donut.do_chart_cols_arr,
            rows: disbursement_donut.do_chart_rows_arr});
          if (window.innerWidth > 768) {
            var options = {
              title: $('<div>Disbursement' + String.fromCharCode(178) + '</div>').html(),
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: disbursement_donut.do_chart_slices_arr
            };
          }
          else {
            var options = {
              title: $('<div>Disbursement' + String.fromCharCode(178) + '</div>').html(),
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              legend: {position: 'bottom'},
              chartArea: {width: '85%'},
              slices: disbursement_donut.do_chart_slices_arr
            };
          }

          var formatter = new google.visualization.NumberFormat({
            pattern: '$###,###,###',
            negativeColor: 'red',
            negativeParens: true
          });

          formatter.format(data, 1); // Apply formatter to second column
          var chart = new google.visualization.PieChart(document.getElementById('donutchart-by-fund-dis'));
          chart.draw(data, options);
          $("text").filter(function () {
            return $(this).text() === options.title;
          }).attr({'x': '0', 'y': '40'});
          function selectHandler() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              reDrawBarChartFundDis(selectedItem.row, disbursement_donut.do_chart_rows_arr[selectedItem.row]['c'][0]['v']);
            }
          }
          google.visualization.events.addListener(chart, 'select', selectHandler);
        }
        var disbursement_bar = parsedArr.BarChartOrgDisbursement;
        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(drawBarColorsDisburesment);
        drawBarColorsDisburesment();
        function drawBarColorsDisburesment() {
          reDrawBarChartFundDis(0, disbursement_donut.do_chart_rows_arr[0]['c'][0]['v']);
        }
        function reDrawBarChartFundDis(selectedParentID, selectedParentTitle) {
          var bar_chart_rows = disbursement_bar.do_chart_rows_arr;
          var data = new google.visualization.DataTable({
            cols: disbursement_bar.do_chart_cols_arr,
            rows: bar_chart_rows[selectedParentID]});
          var options = {
            title: selectedParentTitle,
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '50%', left: '40%'},
            legend: {position: "none"},
            bar: {groupWidth: "40"},
            hAxis: {
              title: 'Disbursement in 1000 USD',
              minValue: 0
            },
          };

          var formatter = new google.visualization.NumberFormat({
            pattern: '$###,###,###',
            negativeColor: 'red',
            negativeParens: true
          });

          formatter.format(data, 1); // Apply formatter to second column
          var chart = new google.visualization.BarChart(document.getElementById('bchart-by-fund-dis'));
          chart.draw(data, options);
        }

        // Expenditure
        var expenditure_donut = parsedArr.DonutChartExpenditure;
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(drawChartOrgExpenditure);
        drawChartOrgExpenditure();
        function drawChartOrgExpenditure() {
          var data = new google.visualization.DataTable({
            cols: expenditure_donut.do_chart_cols_arr,
            rows: expenditure_donut.do_chart_rows_arr});
          if (window.innerWidth > 768) {
            var options = {
              title: $('<div>Expenditure' + String.fromCharCode(179) + '</div>').html(),
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: expenditure_donut.do_chart_slices_arr
            };
          }
          else {
            var options = {
              title: $('<div>Expenditure' + String.fromCharCode(179) + '</div>').html(),
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              tooltip: {isHtml: true}, // CSS styling affects only HTML tooltips.
              legend: {position: 'bottom'},
              chartArea: {width: '85%'},
              slices: expenditure_donut.do_chart_slices_arr
            };
          }

          var formatter = new google.visualization.NumberFormat({
            pattern: '$###,###,###',
            negativeColor: 'red',
            negativeParens: true
          });

          formatter.format(data, 1); // Apply formatter to second column
          var chart = new google.visualization.PieChart(document.getElementById('donutchart-by-org-exp'));
          chart.draw(data, options);
          $("text").filter(function () {
            return $(this).text() === options.title;
          }).attr({'x': '0', 'y': '40'});
          function selectHandler() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              reDrawBarChartOrgExp(selectedItem.row, expenditure_donut.do_chart_rows_arr[selectedItem.row]['c'][0]['v']);
            }
          }
          google.visualization.events.addListener(chart, 'select', selectHandler);
        }
        var expenditure_bar = parsedArr.BarChartExpenditure;
        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(drawBarColorsExpenditure);
        drawBarColorsExpenditure();
        function drawBarColorsExpenditure() {
          reDrawBarChartOrgExp(0, expenditure_donut.do_chart_rows_arr[0]['c'][0]['v']);
        }
        function reDrawBarChartOrgExp(selectedParentID, selectedParentTitle) {
          var bar_chart_rows = expenditure_bar.do_chart_rows_arr;
          var data = new google.visualization.DataTable({
            cols: expenditure_bar.do_chart_cols_arr,
            rows: bar_chart_rows[selectedParentID]});
          var options = {
            title: selectedParentTitle,
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '50%', left: '40%'},
            legend: {position: "none"},
            bar: {groupWidth: "40"},
            hAxis: {
              title: 'Expenditure in 1000 USD'
            },
          };

          var formatter = new google.visualization.NumberFormat({
            pattern: '$###,###,###',
            negativeColor: 'red',
            negativeParens: true
          });

          formatter.format(data, 1); // Apply formatter to second column
          var chart = new google.visualization.BarChart(document.getElementById('bchart-by-org-exp'));
          chart.draw(data, options);
        }

        var exp_donut = parsedArr.DonutChartFundsExpenditure;
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(ajaxChartFundExp);
        ajaxChartFundExp();
        function ajaxChartFundExp() {
          var data = new google.visualization.DataTable({
            cols: exp_donut.do_chart_cols_arr,
            rows: exp_donut.do_chart_rows_arr});
          if (window.innerWidth > 768) {
            var options = {
              title: $('<div>Expenditure' + String.fromCharCode(179) + '</div>').html(),
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              chartArea: {width: '85%'},
              slices: exp_donut.do_chart_slices_arr
            };
          }
          else {
            var options = {
              title: $('<div>Expenditure' + String.fromCharCode(179) + '</div>').html(),
              titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
              pieHole: 0.4,
              legend: {position: 'bottom'},
              chartArea: {width: '85%'},
              slices: exp_donut.do_chart_slices_arr
            };
          }

          var formatter = new google.visualization.NumberFormat({
            pattern: '$###,###,###',
            negativeColor: 'red',
            negativeParens: true
          });

          formatter.format(data, 1); // Apply formatter to second column
          var chart = new google.visualization.PieChart(document.getElementById('donutchart-by-fund-exp'));
          chart.draw(data, options);
          $("text").filter(function () {
            return $(this).text() === options.title;
          }).attr({'x': '0', 'y': '40'});
          function selectHandler() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              reDrawBarChartFundExp(selectedItem.row, exp_donut.do_chart_rows_arr[selectedItem.row]['c'][0]['v']);
            }
          }
          google.visualization.events.addListener(chart, 'select', selectHandler);
        }

        var exp_bar = parsedArr.BarChartFundsExpenditure;
        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        google.setOnLoadCallback(ajaxBarColorsExp);
        ajaxBarColorsExp();
        function ajaxBarColorsExp() {
          reDrawBarChartFundExp(0, exp_donut.do_chart_rows_arr[0]['c'][0]['v']);
        }
        function reDrawBarChartFundExp(selectedParentID, selectedParentTitle) {
          var bar_chart_rows = exp_bar.do_chart_rows_arr;
          var data = new google.visualization.DataTable({
            cols: exp_bar.do_chart_cols_arr,
            rows: bar_chart_rows[selectedParentID]});
          var options = {
            title: selectedParentTitle,
            titleTextStyle: {color: '#5a5047', fontSize: 16, bold: true},
            chartArea: {width: '50%', left: '40%'},
            legend: {position: "none"},
            bar: {groupWidth: "40"},
            hAxis: {
              title: 'Expenditure in 1000 USD'
            },
          };

          var formatter = new google.visualization.NumberFormat({
            pattern: '$###,###,###',
            negativeColor: 'red',
            negativeParens: true
          });

          formatter.format(data, 1); // Apply formatter to second column
          var chart = new google.visualization.BarChart(document.getElementById('bchart-by-fund-exp'));
          chart.draw(data, options);
        }

      }
      ).fail(function () {
        console.log("error");
      });
    })(jQuery);
  }
</script>