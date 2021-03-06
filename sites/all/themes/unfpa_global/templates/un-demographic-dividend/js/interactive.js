$('#button-facebook').on('click', function(event) {
  var text = "";
  var url = window.location.href;
  var wnd = window.open('http://www.facebook.com/sharer.php?u=' + encodeURIComponent(url) + '&p[summary]=' + encodeURIComponent(text), 'facebook-share-dialog', 'height=436,width=626');
  if(window.focus) { wnd.focus(); }
  return false;
});
$('#button-twitter').on('click', function(event) {
  var text = "Population in Progress - Global working-age population is on the rise";
  var url = window.location.href;
  var wnd = window.open('http://twitter.com/intent/tweet?url=' + encodeURIComponent(url) + '&text=' + encodeURIComponent(text), '', 'height=480,width=640');
  if(window.focus) { wnd.focus(); }
  return false;
});

var worldData = [ 65.12,68.57,72.92,75.68,75.24,73.88,70.13,66.12,64.25,62.51,
                  58.82,54.54,52.22,52.07,53.02,53.46,54,54.99,56.17,57.05,58.47,
                  60.42,61.4,61.59,61.78,62.36,63.3,64.17,64.85,65.46,66.12];

/* 
** INITIALIZATION
*/
var margin      = {top: 20, right: 15, bottom: 30, left: 15},
    width       = 950,
    graphHeight = 300 - margin.top - margin.bottom,
    mapHeight   = 400 - margin.top - margin.bottom,
    year        = 1950,
    minMax      = [],
    years       = [],
    region      = [],
    continent   = [],
    mapChart    = null,
    clickState  = false,
    values,
    countryLineGraph,
    regionLineGraph,
    continentLineGraph,
    continentKey,
    regionKey,
    countryKey;

var x = d3.scale.linear()
  .domain([year, 2100])
  .range([0, width - ((margin.left + margin.right)*2)])
  .clamp(true);

var x2 = d3.scale.linear()
  .domain(d3.extent(worldData, function(d,i) { return i; }))
  .range([0, width - ((margin.left + margin.right)*2)])
  .clamp(true);

var y = d3.scale.linear()
  .domain([0,120])
  .range([graphHeight - margin.top, 0]);

var yAxis = d3.svg.axis()
  .scale(y)
  .tickSize(width,0)
  .tickFormat("")
  .orient("right");

var xAxis = d3.svg.axis()
  .scale(x2)
  .orient("bottom")
  .ticks(40)
  .tickFormat(function(d,i) { return i%2==0 ? d*5+year : null; })
  .tickSize(6, 0)
  .tickPadding(13);

var slideAxis = d3.svg.axis()
  .scale(x2)
  .orient("bottom")
  .ticks(40)
  .tickFormat(function(d,i) { return i%2==0 ? d*5+year : null; })
  .tickSize(10, 0)
  .tickPadding(5);

var line = d3.svg.line()
  .interpolate("basis")
  .x(function(d,i) { return x2(i); })
  .y(function(d) { return y(d); });

var slideControl = d3.select("#slide").append("svg")
  .attr("width", width)
  .attr("height", 50)
 .append("g")
  .attr("width", width - margin.left - margin.right)
  .attr("transform", "translate(" + (margin.left*2) + "," + margin.top + ")");

var tip = d3.tip()
  .attr('class', 'd3-tip container')
  .offset([10, 0])
  .html(function(d,i) {
    return "<div class='row'><div class='col-xs-12'>"
    + "<h4>" + d.values[0].Countries + "</h4>"
    + "<hr/>"
    + "<div class='row'>"
    + "<div class='col-xs-6'><span class='hilite'>" + (Math.round(((d.values[0][year])/10)*2)/2).toFixed(1) + ":</span>10</div>"
    + "<div class='col-xs-6 text-right'><span class='hilite'>" + year + "</span></div>"
    + "</div>"
    + "<hr/>"
    + "<div class='row'>"
    + "<div class='hilite ratio-info col-xs-12'>"
    + "DEPENDENTS TO</div></div>"
    + "<div class='row'>"
    + "<div class='ratio-info col-xs-12'>"
    + "WORKING AGE PEOPLE</div></div>"
    + "</div></div>";
  });

var lineGraph = d3.select("#graph").append("svg")
  .attr("width", width)
  .attr("height", graphHeight + margin.top + margin.bottom)
 .append("g")
  .attr("transform", "translate(" + 0 + "," + margin.top + ")");

/* 
** DATA CALL
*/
d3.csv("data/demographic-transition-meta.csv", function(error, csv) {
  if (error) { console.log('XML load error: ', error); }
  else { 
    
    csv.forEach( function(k){ (k.Countries == k.Region && k.Region == k.Continent) ? continent.push(k) : null; });
    csv.forEach( function(k){ (k.Countries == k.Region && k.Region != k.Continent) ? region.push(k)    : null; });

  }
});

d3.xml("img/newmap-2-4.svg", "image/svg+xml", function(error, xml) {
  if (error) { console.log('XML load error: ', error); }
  else {
    
    d3.csv("data/demographic-transition.csv", function(error, csv) {
      if (error) { console.log('XML load error: ', error); }
      else {
        
        for(var key in csv) {
          for(var key2 in csv[key]) {
            isNaN(+key2) ? null: minMax.push(+csv[key][key2]);
          }
        }
        var valuesMax =  Math.max.apply(Math,minMax);
        var valuesMin =  Math.min.apply(Math,minMax);

        var color = d3.scale.linear()
          .domain([valuesMin, valuesMax])
          .range(["#0590C7", "#F8991D"]);

        var colorClassIncrement = [];
        for (var i = valuesMin; i < 100; i+=(100-valuesMin)/21) {
          colorClassIncrement.push(i)
        };

        var data = d3.nest()
          .key(function(d) { return d.ID; })
          .entries(csv);

        $('#map').append(xml.documentElement);

        var map = d3.select("#map svg");
        var countries = map.selectAll("svg > g")
          .data(data);
        countries.call(tip);

        function brushed() {
          var value = year;
          if (d3.event.sourceEvent) { 
            value = x.invert(d3.mouse(this)[0]);
            brush.extent([value, value]);
          }

          handle.attr("transform", "translate("+(x(value) - 10) +",-22)");
          /*handle2.attr("transform", "translate("+(x(value) - 5) +",-2)");*/

          tip.html(function(d,i) {
              return "<div class='row'><div class='col-xs-12'>"
              + "<h4>" + d.values[0].Countries + "</h4>"
              + "<hr/>"
              + "<div class='row'>"
              + "<div class='col-xs-6'><span class='hilite'>" + (Math.round((d.values[0][5*(Math.round(value/5))]/10)*2)/2).toFixed(1) + ":</span>10</div>"
              + "<div class='col-xs-6 text-right'><span class='hilite'>" + 5*(Math.round(value/5)) + "</span></div>"
              + "</div>"
              + "<hr/>"
              + "<div class='row'>"
              + "<div class='hilite ratio-info col-xs-12'>"
              + "DEPENDENTS TO</div></div>"
              + "<div class='row'>"
              + "<div class='ratio-info col-xs-12'>"
              + "WORKING AGE PEOPLE</div></div>"
              + "</div></div>";
          });

          data.forEach(function(d){
            d3.select("g#"+ d.key)
              .datum(d)
              .attr("class", function(d){

                if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[20]) return "countries countryfill1";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[19]) return "countries countryfill2";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[18]) return "countries countryfill3";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[17]) return "countries countryfill4";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[16]) return "countries countryfill5";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[15]) return "countries countryfill6";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[14]) return "countries countryfill7";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[13]) return "countries countryfill8";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[12]) return "countries countryfill9";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[11]) return "countries countryfill10";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[10]) return "countries countryfill11";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[9]) return "countries countryfill12";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[8]) return "countries countryfill13";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[7]) return "countries countryfill14";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[6]) return "countries countryfill15";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[5]) return "countries countryfill16";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[4]) return "countries countryfill17";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[3]) return "countries countryfill18";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[2]) return "countries countryfill19";
                else if(d.values[0][5*(Math.round(value/5))] >= colorClassIncrement[1]) return "countries countryfill20";
                else return "countryfill21";
              });
          });
        }; //end brushed

        var brush = d3.svg.brush()
          .x(x2)
          .extent([0, 0])
          .on("brush", brushed);

        slideControl.append("g")
          .attr("class", "slideControl")
          .attr("transform", "translate(0," + 0 + ")")
          .call(slideAxis);
      

        var slider = slideControl.append("g")
          .attr("class", "slider")
          .call(brush);

        slider.selectAll(".extent,.resize").remove();

        slider.select(".background")
          .attr("height", 50)
          .attr("y", "-25px");

        var handle = slider.append("g")
          .attr("class", "handle");

        handle.append("image")
          .attr("transform", "translate(0,0)")
          .attr('width', 23)
          .attr('height', 44)
          .attr("xlink:href","img/button.png");
      
        slider.call(brush.event);

        data.forEach(function(d) {

          d3.select("g#"+ d.key)
            .datum(d)
            .attr("class", function(d){
              if(d.values[0][year] >= colorClassIncrement[20]) return "countries countryfill1";
              else if(d.values[0][year] >= colorClassIncrement[19]) return "countries countryfill2";
              else if(d.values[0][year] >= colorClassIncrement[18]) return "countries countryfill3";
              else if(d.values[0][year] >= colorClassIncrement[17]) return "countries countryfill4";
              else if(d.values[0][year] >= colorClassIncrement[16]) return "countries countryfill5";
              else if(d.values[0][year] >= colorClassIncrement[15]) return "countries countryfill6";
              else if(d.values[0][year] >= colorClassIncrement[14]) return "countries countryfill7";
              else if(d.values[0][year] >= colorClassIncrement[13]) return "countries countryfill8";
              else if(d.values[0][year] >= colorClassIncrement[12]) return "countries countryfill9";
              else if(d.values[0][year] >= colorClassIncrement[11]) return "countries countryfill10";
              else if(d.values[0][year] >= colorClassIncrement[10]) return "countries countryfill11";
              else if(d.values[0][year] >= colorClassIncrement[9]) return "countries countryfill12";
              else if(d.values[0][year] >= colorClassIncrement[8]) return "countries countryfill13";
              else if(d.values[0][year] >= colorClassIncrement[7]) return "countries countryfill14";
              else if(d.values[0][year] >= colorClassIncrement[6]) return "countries countryfill15";
              else if(d.values[0][year] >= colorClassIncrement[5]) return "countries countryfill16";
              else if(d.values[0][year] >= colorClassIncrement[4]) return "countries countryfill17";
              else if(d.values[0][year] >= colorClassIncrement[3]) return "countries countryfill18";
              else if(d.values[0][year] >= colorClassIncrement[2]) return "countries countryfill19";
              else if(d.values[0][year] >= colorClassIncrement[1]) return "countries countryfill20";
              else return "countryfill21";
            })
            .on('mouseover.tip', tip.show)
            .on('mouseout.tip', tip.hide)

        });
      }
    });
  }
});