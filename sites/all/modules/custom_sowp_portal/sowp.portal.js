(function ($) {
 var oldURL = document.referrer;
  if (oldURL.indexOf("swop") >= 0) {
      $('.swp').show();
  }
    /*update_map('7');
    update_charts('WORLD');*/

/* Update Map and Chart Data onLoad */
  switch (window.location.hash) {
    /*Population*/
    case '#tp':
      update_map('7');
      break;
    case '#popchange':
      update_map('8');
      break;
      /* Maternal and Newborn Health */
    case '#mmr':
      update_map('14');
      break;
    case '#skilledbirth':
      update_map('15');
      break;
    case '#adolescentbirth':
      update_map('16');
      break;
      /* Sexual and Reproductive Health */
    case '#cpr':
      update_map('17');
      break;
      /* Education */
    case '#2girls':
      update_map('25');
      break;
      /* Fertility */
    case '#fertility':
      update_map('27');
      break;
      /* Life Expectancy */
    case '#lifeexpm':
      update_map('28');
      break;
    case '#lifeexpf':
      update_map('29');
      break;
    default:
      update_map('30');
  }

  update_charts('WORLD');

    $('#sowp_tabs > ul >li').mouseenter(function () {
        $(this).children('ul').show();
    }).mouseleave(function () {
        $(this).children('ul').hide();
    });

    $('#sowp_tabs ul li ul a').click(function () {
        $(this).parent('li').parent('ul').hide();
    });

    $('#sowp-tabs-1 div h3 a').click(function () {
        $('#sowp-tabs-1 div h3 a').removeClass('active');
        $(this).addClass('active');
    });

    if ($(window).width() <= 480) {
        $('#sowp_tabs > ul > li > span > a').attr('href', 'javascript:void(0);');
    }

})(jQuery);

function update_map(id) {
    (function ($) {
        $('.sowp-throbber.ajax-progress-throbber').show();
        $.ajax({
            url: "swop-map-update",
            type: "POST",
            data: {cid: id}
        }).done(function (html) {
            $('.sowp-throbber.ajax-progress-throbber').hide();
            var parsedArr = $.parseJSON(html);
            var country_list = '';
            var region_list = '';
            var color1 = parsedArr.scale_color[0];
            var color2 = parsedArr.scale_color[6];
            var color3 = parsedArr.scale_color[13];
            simplemaps_worldmap_mapdata.state_specific = parsedArr.country_arr;
            simplemaps_worldmap_mapdata.locations = parsedArr.location_arr;
            simplemaps_worldmap_mapdata.main_settings.arrow_color = color2;
            simplemaps_worldmap_mapdata.main_settings.arrow_color_border = color2;
            simplemaps_worldmap.load();
            var $sowp_scale = $('#map-scale-1 .sowp-scale');
            $sowp_scale.css({background: '-moz-linear-gradient(left,  ' + color1 + ' 0%, ' + color2 + ' 50%, ' + color2 + ' 50%, ' + color3 + ' 100%)'});
            $sowp_scale.css({background: '-webkit-gradient(linear, left top, right top, color-stop(0%,' + color1 + '), color-stop(50%,' + color2 + '), color-stop(50%,' + color2 + '), color-stop(100%,' + color3 + '))'});
            $sowp_scale.css({background: '-webkit-linear-gradient(left,  ' + color1 + ' 0%,' + color2 + ' 50%,' + color2 + ' 50%,' + color3 + ' 100%)'});
            $sowp_scale.css({background: '-o-linear-gradient(left,  ' + color1 + ' 0%,' + color2 + ' 50%,' + color2 + ' 50%,' + color3 + ' 100%)'});
            $sowp_scale.css({background: '-ms-linear-gradient(left,  ' + color1 + ' 0%,' + color2 + ' 50%,' + color2 + ' 50%,' + color3 + ' 100%)'});
            $sowp_scale.css({background: 'linear-gradient(to right,  ' + color1 + ' 0%,' + color2 + ' 50%,' + color2 + ' 50%,' + color3 + ' 100%)'});
            $sowp_scale.css({filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr="' + color1 + '", endColorstr="' + color3 + '",GradientType=1 )'});
            $.each(parsedArr.country_list_arr, function (cc, country) {
                if (cc.length == 2) {
                    if (country['name'].indexOf('.') >= 0) {
                        var parts = country['name'].split('.');
                        country_list += '<li><a href="javascript:update_charts_list(\'' + cc + '\',' + country['region'] + ');">' + parts[0] + '<sup>' + parts[1] + '</sup>' + '</a></li>';
                    }
                    else {
                        country_list += '<li><a href="javascript:update_charts_list(\'' + cc + '\',' + country['region'] + ');">' + country['name'] + '</a></li>';
                    }
                }
                if (cc.length != 2) {
                    if (country['name'].indexOf('.') >= 0) {
                        var parts = country['name'].split('.');
                        region_list += '<li><a href="javascript:update_charts_list(\'' + cc + '\',' + country['region'] + ');">' + parts[0] + '<sup>' + parts[1] + '</sup>' + '</a></li>';
                    }
                    else {
                        region_list += '<li><a href="javascript:update_charts_list(\'' + cc + '\',' + country['region'] + ');">' + country['name'] + '</a></li>';
                    }
                }
            });

            $('.map-title h2').html(parsedArr.category_name).attr('id', id);
            $('.map-title h2').css({color: color2});
            $('.popover #country').html(country_list);
            $('.popover #region').html(region_list);

        });
    })(jQuery);
}

function update_charts_list(id, region_id) {
    (function ($) {
        if (region_id != null) {
            simplemaps_worldmap.region_zoom(region_id);
        }
        else {
            simplemaps_worldmap.state_zoom(id);
        }
        update_charts_states(id);
    })(jQuery);
}

function update_charts_region(id) {
    (function ($) {
        simplemaps_worldmap.region_zoom(id);
        //simplemaps_worldmap.refresh();
        $('#sowp-tabs-1 div h3 a').removeClass('active').hide();
        $('#selected-region h3 a').addClass('active').show();
        var $name = '';
        switch (id) {
            case 2:
                $name = '<sup>c</sup>';
                break;
            case 3:
                $name = '<sup>d</sup>';
                break;
            case 5:
                $name = '<sup>e</sup>';
                break;
            default:
                $name = '';
        }
        $('#selected-region h3 a').html(simplemaps_worldmap_mapdata.regions[id].name + $name);
        var selected_region = simplemaps_worldmap_mapdata.regions[id].cc_code;
        update_charts(selected_region);
    })(jQuery);
}

function update_charts_states(id) {
    (function ($) {
        $('.thepopover').hide();
        var old_color;
        selCategory = simplemaps_worldmap_mapdata.state_specific[id];

        var old_color = selCategory.color;

        var static_country_array = Array('AU', 'US', 'CA', 'IS', 'NO', 'GB', 'SA', 'IT', 'FR', 'DE', 'ES', 'PT', 'RO', 'HU', 'IE', 'LT', 'LV', 'EE', 'FI', 'SE', 'DK', 'BE', 'PL', 'NL', 'GR', 'CH', 'AT', 'SI', 'HR', 'CZ', 'RU');
        $('#sowp-tabs-1 div h3 a').removeClass('active').hide();
        $('#selected-region h3 a').addClass('active').show();
        var country_list = '';
        var country_1 = '';
        var country_2 = '';
        var parts = '';

        var count = selCategory.name;
        parts = count.split('.');
        country_1 = parts[0];
        country_2 = parts[1];
        if ($.inArray(id, static_country_array) >= 0) {
            simplemaps_worldmap.state_zoom(id);
        }
        if (count.indexOf('.') >= 0) {
            country_list += country_1 + '<sup>' + country_2 + '</sup>';
        }
        else {
            country_list += selCategory.name;
        }
        $('#selected-region h3 a').html(country_list);
        var active_pid = parseInt($('.map-title h2').attr('id'));
        if (21 <= active_pid && active_pid <= 27) {
            selCategory.color = '#256EBB';
        }
        else {
            selCategory.color = '#6b6b47';
        }
        simplemaps_worldmap.refresh();
        selCategory.color = old_color;
        update_charts(id);
    })(jQuery);
}

function update_charts_locations(id, locPos) {
    (function ($) {
        $('.thepopover').hide();
        var old_color;
        selCategory = simplemaps_worldmap_mapdata.locations[locPos];
        var old_color = selCategory.color;

        var static_country_array = Array('AU', 'US', 'CA', 'IS', 'NO', 'GB', 'SA', 'IT', 'FR', 'DE', 'ES', 'PT', 'RO', 'HU', 'IE', 'LT', 'LV', 'EE', 'FI', 'SE', 'DK', 'BE', 'PL', 'NL', 'GR', 'CH', 'AT', 'SI', 'HR', 'CZ', 'RU');
        $('#sowp-tabs-1 div h3 a').removeClass('active').hide();
        $('#selected-region h3 a').addClass('active').show();
        var country_list = '';
        var country_1 = '';
        var country_2 = '';
        var parts = '';

        var count = selCategory.name;
        parts = count.split('.');
        country_1 = parts[0];
        country_2 = parts[1];
        if ($.inArray(id, static_country_array) >= 0) {
            simplemaps_worldmap.state_zoom(id);
        }
        if (count.indexOf('.') >= 0) {
            country_list += country_1 + '<sup>' + country_2 + '</sup>';
        }
        else {
            country_list += selCategory.name;
        }
        $('#selected-region h3 a').html(country_list);
        var active_pid = parseInt($('.map-title h2').attr('id'));
        if (21 <= active_pid && active_pid <= 27) {
            selCategory.color = '#256EBB';
        }
        else {
            selCategory.color = '#6b6b47';
        }
        simplemaps_worldmap.refresh();
        selCategory.color = old_color;
        update_charts(id);
    })(jQuery);
}

function update_charts(id) {
    (function ($) {
        $.ajax({
            url: "swop-chart-update",
            type: "POST",
            data: {cc: id}
        }).done(function (html) {
            var parsedArr = $.parseJSON(html);
            var population = parsedArr.population_donut_chart;
            google.load("visualization", "1", {packages: ["corechart"]});
            redrawChart();
            function redrawChart() {
                var data = new google.visualization.DataTable({
                    cols: population.do_chart_cols_arr,
                    rows: population.do_chart_rows_arr
                });
                var options = {
                    backgroundColor: 'transparent',
                    pieHole: 0.4,
                    height: 200,
                    legend: {position: 'none'},
                    chartArea: {width: 148, height: 148, top: 10},
                    slices: population.do_chart_slices_arr,
                    tooltip: {
                        isHtml: true,
                        width:148
                    }
                };
                var formatter = new google.visualization.NumberFormat(
                        {pattern: '###,###,###', negativeColor: 'red', negativeParens: true});
                formatter.format(data, 1); // Apply formatter to second column
                var chart = new google.visualization.PieChart(document.getElementById('donutchart-population'));
                chart.draw(data, options);
            }

            //maternal donut chart
            var maternal = parsedArr.maternal_donut_chart;
            if (maternal.do_chart_rows_arr[0]['c'][1]['v'] != 0) {
                drawmatChart();
            }
            else {
                $('#maternal-value').hide();
                $('.maternal-legend').hide();
                $('#donutchart-maternal').html('<div class="no-data-wrapper">No data</div>');
            }
            function drawmatChart() {
                $('#maternal-value').show();
                $('.maternal-legend').show();
                var mat_value = maternal.do_chart_rows_arr[0]['c'][1]['v'];
                $('#maternal-value').removeClass('big-val');
                if (mat_value == 100) {
                    $('#maternal-value').addClass('big-val');
                }
                $('#maternal-value').html(maternal.do_chart_rows_arr[0]['c'][1]['v']);
                var data = new google.visualization.DataTable({
                    cols: maternal.do_chart_cols_arr,
                    rows: maternal.do_chart_rows_arr
                });
                var options = {
                    backgroundColor: 'transparent',
                    pieHole: 0.6,
                    height: 200,
                    legend: {position: 'none'},
                    chartArea: {width: 148, height: 148, top: 10},
                    slices: {
                        0: {color: '#E8B54A'},
                        1: {color: '#A8A9AD'},
                    },
                    pieSliceText: 'none',
                    tooltip: {
                        isHtml: true
                    }
                };
                var formatter = new google.visualization.NumberFormat(
                        {pattern: '###,###,###', negativeColor: 'red', negativeParens: true});
                formatter.format(data, 1); // Apply formatter to second column
                var chart = new google.visualization.PieChart(document.getElementById('donutchart-maternal'));
                chart.draw(data, options);
            }

            //RH donut chart
            var rh = parsedArr.sexual_donut_chart;
            var unmet_value = rh.do_chart_rows_arr_inner[1]['c'][1]['v'] + '% ';
            var cpr_value = rh.do_chart_rows_arr_outer[0]['c'][1]['v'] + '% ';
            if (rh.do_chart_rows_arr_inner[1]['c'][1]['v'] != 0 || rh.do_chart_rows_arr_outer[0]['c'][1]['v'] != 0) {
                drawRhChart();
            }
            else {
                $('#cpr-label').hide();
                $('#unmet-label').hide();
                $('#donutchart-sexual-diff').html('<div class="no-data-wrapper">No data</div>');
            }
            function drawRhChart() {
                $('#cpr-label').show();
                $('#unmet-label').show();
                var innerdata = new google.visualization.DataTable({
                    cols: rh.do_chart_cols_arr,
                    rows: rh.do_chart_rows_arr_inner
                });
                var outerdata = new google.visualization.DataTable({
                    cols: rh.do_chart_cols_arr,
                    rows: rh.do_chart_rows_arr_outer
                });

                $('#unmet').html(unmet_value);
                $('#cpr').html(cpr_value);
                var options = {
                    backgroundColor: 'transparent',
                    height: 200,
                    legend: {position: 'none'},
                    chartArea: {width: 148, height: 148, top: 10},
                    slices: {
                        1: {color: '#81643C', textStyle: {color: '#FFFFFF', fontSize: 14}},
                        0: {color: '#B7B7B7', textStyle: {color: 'transparent'}},
                        2: {color: '#28A49A', textStyle: {color: '#FFFFFF', fontSize: 18}},
                        3: {color: '#B7B7B7', textStyle: {color: 'transparent'}}
                    },
                    pieSliceText: 'value',
                    diff:
                            {
                                innerCircle: {radiusFactor: 0.6, borderFactor: 0},
                                innerdata: {
                                    opacity: 1
                                },
                                outerdata: {
                                    opacity: 1
                                }
                            },
                    tooltip: {
                        trigger:'none'
                    }
                };
                var formatter = new google.visualization.NumberFormat(
                        {pattern: '###,###,###', negativeColor: 'red', negativeParens: true});
                formatter.format(innerdata, 1); // Apply formatter to second column
                var chartDiff = new google.visualization.PieChart(document.getElementById('donutchart-sexual-diff'));
                var diffData = chartDiff.computeDiff(innerdata, outerdata);
                chartDiff.draw(diffData, options);
            }

            //Education Bar chart
            var education = parsedArr.prepareBarChartDataPage;
            google.load("visualization", "1", {packages: ["corechart", "bar"]});
            if (education.do_chart_rows_arr[0]['c'][1]['v'] != null) {
                drawedChart();
            }
            else {
                $('#barchart-education').html('<div class="no-data-wrapper">No data</div>');
            }
            //drawedChart();
            function drawedChart() {
                var data = new google.visualization.DataTable({
                    cols: education.area_chart_cols_arr,
                    rows: education.do_chart_rows_arr
                });
                var options = {
                    height:200,
                    vAxis: {minValue: 0, format: 'percent', textPosition: 'none', gridlines: {count: 1}},
                    chartArea: {width: 148, height: 148, top: 0},
                    bar: {groupWidth: "70%"},
                    series: {
                        0: {
                            color: '#81643C',
                            annotations: {
                                textStyle: {color: '#F5F2EF', fontSize: 30}
                            }
                        },
                    },
                    areaOpacity: 0.9,
                    legend: {position: "none"},
                };
                var formatter = new google.visualization.NumberFormat(
                        {negativeColor: 'red', negativeParens: true, format: 'percent'});
                formatter.format(data, 1); // Apply formatter to second column
                var chart = new google.visualization.ColumnChart(document.getElementById('barchart-education'));
                chart.draw(data, options);
            }

            //for labels under Population section
            var cat_total = parsedArr.cat_total_value;
            var cat_list = '';
            $.each(cat_total, function (index, val) {
                cat_list += '<div><span class="label">' + val.label + ': ' + '</span><span class="value">' + val.value + '</span></div>';
            });
            $('.population-wrapper').html(cat_list);

            //for labels under maternal section
            var mat_total = parsedArr.mat_total_value;
            var cat_list = '';
            $.each(mat_total, function (index, val) {
                if (val.value == null)
                {
                    val.value = '-';
                }
                cat_list += '<div><span class="label">' + val.label + ': ' + '</span><span class="value">' + val.value + '</span></div>';
            });
            $('.maternal-wrapper').html(cat_list);

            //for labels under RH section
            var rh_total = parsedArr.rh_total_value;
            var cat_list = '';
            $.each(rh_total, function (index, val) {
                if (val.value == null)
                {
                    val.value = '-';
                }
                cat_list += '<div><span class="label">' + val.label + ': ' + '</span><span class="value">' + val.value + '</span></div>';
            });
            $('.sexual-wrapper').html(cat_list);
            //for labels under Education section
            var ed_total = parsedArr.ed_total_value;
            var cat_list = '';

            $.each(ed_total, function (index, val) {
                var male_label = Drupal.t('male');
                var female_label = Drupal.t('female');
                if (val.label.match(", " + male_label + "$")) {
                    if (val.value == null)
                    {
                        val.value = '-';
                    }
                    cat_list += '<div><span class="common-label">' + val.label.replace(', ' + male_label, '') + ':</span></div>';
                    cat_list += '<div class="male-label"><span class="label">' + male_label + '</span><span class="value">' + val.value + '</span></div>';
                }
                else if (val.label.match(", " + female_label + "$")) {
                    if (val.value == null)
                    {
                        val.value = '-';
                    }
                    cat_list += '<div class="female-label"><span class="label">' + female_label + '</span><span class="value">' + val.value + '</span></div>';
                }
                else {
                    if (val.value == null)
                    {
                        val.value = '-';
                    }
                    cat_list += '<div><span class="label">' + val.label + ': ' + '</span><span class="value">' + val.value + '</span></div>';
                }
            });
            $('.education-wrapper').html(cat_list);

            //for labels under Fertility section
            var fertility_value = parsedArr.fertility_value;
            var cat_list = '';
            var cat_val = '';
            var fertility_img = '';
            var val_mod;
            $.each(fertility_value, function (index, val) {
                if (val.value == null)
                {
                    val.value = '-';
                    cat_val = 0;
                }
                cat_list = '<div><span class="label">' + val.label + ': ' + '</span><span class="value">' + val.value + '</span></div>';
                cat_val = val.value;
              });
            var cat_rounded = Math.ceil(cat_val);
            for (var i = 1; i <= cat_rounded; i++)
            {
              if (i == cat_rounded)
              {
                val_mod = (cat_val)%(Math.floor(cat_val));
                if(val_mod > 0 & val_mod <= 0.25) {
                  class_name = 'fertility_img_quarter';
                }
                if(val_mod > 0.25 & val_mod <= 0.5)
                {
                  class_name = 'fertility_img_half';
                }
                if(val_mod > 0.5 & val_mod <= 0.99)
                {
                  class_name = 'fertility_img_three_quarter';
                }
                if(val_mod === 0)
                {
                  class_name = 'fertility_img';
                }

                fertility_img += '<div class="fertility '+class_name+'"></div>';
              }
              else {
                fertility_img += '<div class="fertility fertility_img"></div>';
              }
            }
            $('.fertility-wrapper').html(cat_list);
            $('.fertility-val .fert-left').html(fertility_img);
            $('.fertility-val .fert-right').html(cat_val);

            //for labels under expectancy section
            var life_expectancy = parsedArr.life_expectancy;
            var cat_list = '';
            var cat_val = '';
            var i = 1;
            $.each(life_expectancy, function (index, val) {
                var male_label = Drupal.t("male");
                var female_label = Drupal.t("female");
                if (val.label.match(", " + male_label + "$")) {
                    if (val.value == null)
                    {
                        val.value = '-';
                    }
                    cat_list += '<div><span class="common-label">' + val.label.replace(', ' + male_label, '') + ':</span></div>';
                    cat_list += '<div class="male-label"><span class="label">' + male_label + '</span><span class="value">' + val.value + '</span></div>';
                }
                else if (val.label.match(", " + female_label + "$")) {
                    if (val.value == null)
                    {
                        val.value = '-';
                    }
                    cat_list += '<div class="female-label"><span class="label">' + female_label + '</span><span class="value">' + val.value + '</span></div>';
                }
                else {
                    if (val.value == null)
                    {
                        val.value = '-';
                    }
                    cat_list += '<div><span class="label">' + val.label + ': ' + '</span><span class="value">' + val.value + '</span></div>';
                }
                cat_val += '<div class="expectancy-val-' + i + '"><div class="expectancy-left"></div><div class="expectancy-right">' + Math.round(val.value) + '</div></div>';
                i++;
            });
            $('.expactancy-wrapper').html(cat_list);
            $('.expactancy-img').html(cat_val);
        });
    })(jQuery);
}

(function ($) {
    simplemaps_worldmap.hooks.complete = function () {
        $('#map-scale-1').show();
    };
    simplemaps_worldmap.hooks.back = function () {
        $('#sowp-tabs-1 div h3 a').removeClass('active').show();
        $('#selected-region h3 a').addClass('active');
        $('#selected-region h3 a').html('World');
        simplemaps_worldmap.load();
        update_charts('WORLD');
    };

})(jQuery);
