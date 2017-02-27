/**
 * @file
 * Override the default Main settings, borders,
 * state_specific, location, regions, continent
 * for Simple Maps.
 */

var simplemaps_worldmap_mapdata = {
  main_settings: {
    width: 'responsive',
    background_color: '#F1FBFD',
    background_transparent: 'yes',
    label_color: '#d5ddec',
    border_color: '#FFFFFF',
    state_description: '',
    state_color: '#CCC',
    state_hover_color: '#C0DC7D',
    state_url: '',
    all_states_inactive: 'no',
    location_description: 'Location description',
    location_color: '#CCC',
    location_opacity: '1',
    location_url: 'http://unfpa.org',
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
    zoom: 'yes',
    js_hooks: 'yes',
    url_new_tab: 'no',
    link_text: 'Click here'
  },
  borders: {
    0: {
      name: "Kosovo",
      path: "m 1102.2181,356.79763 c 0.5294,-0.2112 1.0339,-0.50801 1.5795,-0.66507 0.1655,-0.015 0.3311,-0.0301 0.4966,-0.0451 0.2412,-0.40621 0.7189,-0.71819 0.7435,-1.21625 0.1369,-0.46302 -0.1218,-1.25401 0.5593,-1.26271 0.4044,0.0263 0.7119,0.45452 1.0766,0.64452 0.864,0.61148 1.7281,1.22297 2.5921,1.83444 0.1186,0.24999 0.081,0.69395 0.2971,0.82277 0.4109,0.0171 0.8218,0.0342 1.2327,0.0513 0.2215,0.43031 0.4416,0.86059 0.068,1.27022 -0.2595,0.50535 -0.5191,1.01069 -0.7786,1.51606 -1.1851,0.35969 -2.3733,0.70944 -3.5511,1.09265 -0.1457,0.40354 -0.098,1.14952 -0.3688,1.33167 -0.2994,-0.13489 -0.7582,-0.12751 -0.7406,-0.54515 -0.1037,-0.44428 -0.2074,-0.88856 -0.3111,-1.33284 -0.6738,-0.52812 -1.3476,-1.05624 -2.0214,-1.58436 -0.2914,-0.63739 -0.5827,-1.2748 -0.8741,-1.91219 z",
      color: '#3B729F',
      size: "1",
      dash: '.'
    },
    1: {
      name: "Sudan",
      path: "m 1135.1413,573.78254 1.1589,-1.31346 1.159,-0.23179 0.9271,-3.24502 0.4636,-1.2362 0,-1.31347 c 0.2322,-0.71267 1.0997,-1.63712 1.9315,-2.54966 l 0.6954,-0.77263 2.936,-0.69536 0.5408,1.46799 1.6225,1.54525 1.3135,1.8543 1.2362,1.2362 2.5497,-0.92715 3.8631,0 1.468,1.8543 4.5585,-0.15452 0.077,-0.77263 3.3996,-2.00883 0.5408,-1.08167 0.4636,-1.00441 1.7771,-0.92715 c 1.5682,1.10743 3.4452,2.21485 4.2494,3.32228 l 2.6269,-0.46357 2.4724,-2.54966 1.468,-3.09051 2.5496,-2.31787 -0.618,-4.3267 -1.468,-1.69978 3.6313,-0.15456 2.4724,-1.08168 -0.3863,3.63134 0.6953,5.40837 4.2495,3.70861 0.2318,1.69977 -0.077,1.31347 0.6181,1.46799",
      color: '#3B729F',
      size: "1",
      dash: '.'
    },
    2: {
      name: "Kashmir",
      path: "m 1403.7369,423.83216 1.639,0 1.0926,-0.3278 0.5464,-1.42045 1.3112,-0.6556 2.076,-0.54632 2.1853,0.65559 3.1687,-0.54633 3.0595,-0.10926 2.5131,0.54632",
      color: '#3B729F',
      size: "1",
      dash: '.'
    },
    3: {
      name: "Jammu",
      path: "m 1385.271,394.11188 c -0.7978,0.6336 -1.5957,1.26717 -2.3935,1.90076 -1.2223,0.3796 -1.4474,1.7298 -0.6659,2.6884 0.5463,-0.21853 1.0926,-0.43706 1.6389,-0.65559 1.6733,2.27561 3.3465,4.55126 5.0198,6.82686 0.8589,0.92105 -0.4741,1.82162 -0.7584,2.67926 0.6504,1.65986 1.2109,3.35415 1.8981,4.9997 1.2227,2.02051 3.14,3.49237 4.8764,5.05274 l 0.089,-2.9823 -0.8499,-2.31788 -0.7726,-0.30905 -0.9272,-1.54525 0.1546,-2.08609 1.5452,-0.69536 6.1038,1.15894 2.0088,0.30905 1.3134,-1.00442 2.8588,-0.46357",
      color: '#3B729F',
      size: "1",
      dash: '.'
    },
    4: {
      name: "Korea",
      path: "m 1662.9603,388.19792 c 0.1932,-1.00441 0.3863,-2.00883 0.5795,-3.01324 0.5812,-0.23536 1.1364,-0.64371 1.7996,-0.53494 1.0246,-0.0115 2.0719,0.1459 3.0684,-0.16285 0.3804,-0.17681 1.2027,0.01 1.0508,-0.60464 0.01,-0.46725 0.021,-0.93451 0.031,-1.40176",
      color: '#3B729F',
      size: "1",
      dash: '.'
    },
    5: {
      name: "Somalia",
      path: "m 1234.9213,603.02797 c 0.2563,0.90027 0.8011,-0.50856 1.202,-0.76486 l 4.4799,-0.9834 1.5297,-2.18531 5.2447,-1.96678 4.6984,0.49169 16.7177,-19.72246",
      color: '#3B729F',
      size: "1",
      dash: '.'
    },
    6: {
      name: "Kashmir-Jammu-China",
      path: "m 1420.0625,415.12502 -1.625,-1.25 -0.75,-1.875 1.4375,-1 -0.125,-0.5625 -0.1875,-0.5625 -0.6875,-0.5 -0.875,-0.1875 -0.5625,0 -0.4375,-0.25 -0.6875,-0.0625 -0.9375,0.25 -0.4375,-0.875 -0.8125,-2.125 -1,-1.0625 -0.3125,-0.875 -0.062,-0.8125 -0.3125,-0.4375",
      color: 'gray',
      size: "1",
      dash: ''
    }
  },
  state_specific: {},
  locations: {},
  regions: {
    0: {
      name: 'Africa',
      states: ["DZ", "AO", "BJ", "BW", "BF", "BI", "CV", "CM", "CF", "TD", "KM", "CG", "CI", "CD", "DJ", "EG", "GQ", "ER", "ET", "GA", "GM", "GH", "GF", "GN", "GW", "KE", "LS", "LR", "LY", "MG", "MW", "ML", "MR", "MA", "MZ", "NA", "NE", "NG", "RW", "ST", "SN", "SC", "SL", "SO", "ZA", "SS", "SD", "SZ", "TG", "TN", "UG", "TZ", "ZM", "ZW"],
      url: 'javascript:void(0)',
      description: 'Selfect for regional view'
    },
    1: {
      name: 'Asia & the Pacific',
      states: ["AF", "BH", "BD", "BT", "BN", "KH", "CN", "CY", "FJ", "IN", "RI", "IR", "IQ", "JP", "JO", "KZ", "KW", "KG", "LA", "LB", "MY", "MV", "MH", "FM", "MN", "MM", "NR", "NP", "KP", "OM", "PH", "QA", "WS", "SA", "SG", "SB", "KR", "LK", "SY", "TJ", "TH", "TL", "TO", "TR", "TM", "TV", "AE", "UZ", "VU", "VN", "YE"],
      url: 'javascript:void(0)',
      description: 'Select for regional view'
    },
    2: {
      name: 'Eastern Europe & Central Asia',
      states: ["AL", "AM", "AZ", "BY", "BA", "BG", "HR", "CZ", "EE", "GE", "HU", "LV", "LT", "MK", "CS", "PL", "MD", "RO", "RU", "RS", "SK", "SI", "UA"],
      url: 'javascript:void(0)',
      description: 'Select for regional view'
    },
    3: {
      name: 'Latin America & the Caribbean',
      states: ["AG", "AR", "BS", "BB", "BZ", "BO", "BR", "CL", "CO", "CR", "CU", "DM", "DO", "EC", "SV", "GD", "GT", "GY", "HT", "HN", "JM", "MX", "NI", "PA", "PY", "PE", "KN", "LC", "VC", "SR", "TT", "UY", "VE"],
      url: 'javascript:void(0)',
      description: 'Select for regional view'
    },
    4: {
      name: 'Western Europe and Others',
      states: ["AD", "AT", "AU", "BE", "CA", "DK", "FI", "FR", "DE", "GR", "IS", "IE", "IL", "IT", "LI", "LU", "MT", "MC", "NL", "NZ", "NO", "PT", "SM", "ES", "SE", "CH", "UK", "US"],
      url: 'javascript:void(0)',
      description: 'Select for regional view'
    },
  },
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
};
(function ($) {
  // Set flag to check whether new blocks appended in regions block.
  ifNewRegionBlocks = false;
  // Get all regions with color according to board members.
  AllRegions = simplemaps_worldmap_mapdata.regions;
  // Show filter on map load.
  simplemaps_worldmap.hooks.complete = function () {
    $('.executive-board-filter-container').show();
  };

  $(document).ready(function () {

    // Trigger click radion button on click labels click.
    $('#board-members-map-filters label').click(function () {
      $(this).siblings('div').find('.iCheck-helper').click();
    });
    // Get the default year.
    var year = $('#year').val();
    // Show the active year.    
    (year !== 'year') ? $('.year').html(year) : "";
    // Get the default filter.
    var filter = $('#board-members-map-filters input.active').val();
    // Generate map with default year and filter.
    mapRegionsColorUpdate(filter, year);
    // Generate Region info blocks with default year and filter.
    regionDescriptionBlock(filter, year);

    // Year drop down change event.
    $('#year').on('change', function () {
      // Get the active filter.
      var filter = $('#board-members-map-filters input.active').val();
      // Get the selected year.
      var year = $(this).val();
      // Show the selected year. 
      (year !== 'year') ? $('.year').html(year) : "";
      // Generate map with selected year and active filter.
      mapRegionsColorUpdate(filter, year);
      // Generate Region info blocks with selected year and active filter.
      regionDescriptionBlock(filter, year);

    });
    // Filter click event.
    $('#board-members-map-filters .iCheck-helper').click(function () {
      // Make all filters inactive.
      $('#board-members-map-filters input').removeClass('active');
      // Make the current filter active.
      $(this).siblings('input').addClass('active');
      // Get active filter.
      var filter = $(this).siblings('input').val();
      // Get selected year.
      var year = $('#year').val();
      // Generate map with selected filter and active year.
      mapRegionsColorUpdate(filter, year);
      // Generate Region info blocks with selected filter and active year.
      regionDescriptionBlock(filter, year);
    });
  });
// Function to generate region info blocks in bottom section according to year and filter.
  function regionDescriptionBlock(filter, year) {
    // Get description for active year.
    var AllRegionsdata = Drupal.settings.mapdata[year];
    // Hide all blocks.
    $("div.region-info-block").empty();
    // Case with filter 'All' to get description for all regions of the active year.
    if (filter == 'all') {
      $.each(AllRegionsdata, function (filterKey, value) {
        // Get region block description array.
        //Regionsdata = (AllRegionsdata[filterKey] !== undefined) ? AllRegionsdata[filterKey].description : "";
        Regionsdata = AllRegionsdata[filterKey].description;
        if (Regionsdata !== "") {
          $.each(Regionsdata, function (key, value) {
            // Format year.
            var year = (value.start_year == value.end_year) ? '(' + value.start_year + ')' : '(' + value.start_year + '-' + value.end_year + ')';
            // Generate region info block with country name, region name and year.
            $("div.region-info-block").append("<div class='exbo-region-columns region-" + filterKey + "'><div class='country-title'>" + value.country_name + "</div><div class='regional-group'>Regional Group: " + value.region_name + "</div><div class='time-mandate'>Time of mandate: " + year + "</div></div>");
          });
        }
      });
    }
    else {
      // Case if filter is not All to get desciption for particular region according to the active filter.
      Regionsdata = (AllRegionsdata[filter] !== undefined) ? AllRegionsdata[filter].description : "";
      //Regionsdata = AllRegionsdata[filter].description;
      if (Regionsdata !== "") {
        $.each(Regionsdata, function (key, value) {
          // Format year.
          var year = (value.start_year == value.end_year) ? '(' + value.start_year + ')' : '(' + value.start_year + '-' + value.end_year + ')';
          // Generate region info block with country name, region name and year.
          $("div.region-info-block").append("<div class='exbo-region-columns region-" + filter + "'><div class='country-title'>" + value.country_name + "</div><div>Regional Group: " + value.region_name + "</div><div>Time of mandate: " + year + "</div></div>");
        });
      }
    }

    // Masonry effect for region blocks.
    var masonryOptions = {
      itemSelector: '.exbo-region-columns',
      // Other masonry options.
      stagger: 30,
      transitionDuration: '0.2s',
      resize: true,
      percentPosition: true
    };
    // Initialize Masonry.
    var $grid = $('.region-info-block').masonry(masonryOptions);

    if (ifNewRegionBlocks) {
      // Destroy old masonry effect.
      $grid.masonry('destroy');
      // Apply masonry effect on new blocks.
      $grid.masonry(masonryOptions);
    }
    else {
      // Masonry effect for default blocks.
      $grid.masonry(masonryOptions);
    }
    // Set flag.
    ifNewRegionBlocks = !ifNewRegionBlocks;

  }

// Function to generate map according to year and filter.
  function mapRegionsColorUpdate(filter, year) {
    // Show the loading image while loading map.
    $(".loader").show().delay(500).fadeOut();
    // Get region color for active year.
    var AllRegionsdata = Drupal.settings.mapdata[year];
    if (AllRegionsdata !== undefined) {
      // Case if filter is 'All' to color all regions of the active year.
      if (filter == 'all') {
        $.each(AllRegions, function (key, value) {
          // Get region wise color code for active year.
          AllRegions[key]['color'] = (AllRegionsdata[key] !== undefined) ? AllRegionsdata[key].color : "";
        });
      }
      else {
        // Case if filter is not All to color particular region according to the active filter.
        $.each(AllRegions, function (key, value) {
          // Get region wise color code for active year and active filter.
          AllRegions[key]['color'] = (filter == key && AllRegionsdata[key] !== undefined) ? AllRegionsdata[key].color : "";
        });
      }
      // Pass the regions with color.
      simplemaps_worldmap_mapdata.regions = AllRegions;
      // Reload the map to show the regions color according to active year and filter.
      simplemaps_worldmap.load();
    }
  }
})(jQuery);
