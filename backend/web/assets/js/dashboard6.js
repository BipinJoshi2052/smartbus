/*
Template Name: Material Pro Admin
Author: Themedesigner
Email: niravjoshi87@gmail.com
File: js
*/
$(function () {
   "use strict";
   // ==============================================================
   // Sales overview
   // ==============================================================
   var chart2 = new Chartist.Bar('.amp-pxl', {
      labels: salesOverview.labels,
      series: salesOverview.series,
   }, {
     /* seriesBarDistance: 5,
      barDistance: 5,
      barWidth: 80,*/
      axisX: {
         // On the x-axis start means top and end means bottom
         position: 'end',
         showGrid: false
      },
      axisY: {
         // On the y-axis start means left and end means right
         position: 'start',
      },
      // high: '50',
      // low: '0',
      plugins: [
         Chartist.plugins.tooltip()
      ]
   });


   // ==============================================================
   // Our visitor
   // ==============================================================

   var chart = c3.generate({
      bindto: '#top-cities',
      data: {
         columns: topCities.stats,

         type: 'donut',
         onclick: function (d, i) {
            // console.log("onclick", d, i);
         },
         onmouseover: function (d, i) {
            // console.log("onmouseover", d, i);
         },
         onmouseout: function (d, i) {
            // console.log("onmouseout", d, i);
         }
      },
      donut: {
         label: {
            show: false
         },
         title: topCities.title,
         width: 20,

      },

      legend: {
         hide: true
         //or hide: 'data1'
         //or hide: ['data1', 'data2']
      },
      color: {
         //    pattern: ['#eceff1', '#745af2', '#26c6da', '#1e88e5']
      }
   });


   // ==============================================================
   // sparkline charts
   // ==============================================================
   var sparklineLogin = function () {
      var sparkOptions = {
         type: 'bar',
         width: '100%',
         height: '80',
         barWidth: '4',
         resize: true,
         barSpacing: '2',
         barColor: 'rgba(139, 195, 74, 1)'
      };
      $(function () {
         $("#spark-customers").sparkline(members.customers.stats, {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#26c6da',
            fillColor: '#26c6da',
            maxSpotColor: '#26c6da',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#26c6da'
         });
         $("#spark-vendors").sparkline(members.vendors.stats, {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#009efb',
            fillColor: '#009efb',
            minSpotColor: '#009efb',
            maxSpotColor: '#009efb',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#009efb'
         });
         $("#spark-agents").sparkline(members.agents.stats, {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#7460ee',
            fillColor: '#7460ee',
            maxSpotColor: '#7460ee',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#7460ee'
         });
      });

      $(function () {
         $('.spark-total-sales').sparkline(totals.sales.stats, ($.extend(sparkOptions, {barColor: totals.sales.color})));
         $('.spark-bookings').sparkline(totals.bookings.stats, ($.extend(sparkOptions, {barColor: totals.bookings.color})));
         $('.spark-departures').sparkline(totals.departures.stats, ($.extend(sparkOptions, {barColor: totals.departures.color})));

      });

      $(function () {
         $("#monthchart").sparkline([5, 6, 2, 9, 4, 7, 10, 12], {
            type: "bar",
            height: "35",
            barWidth: "4",
            resize: !0,
            barSpacing: "4",
            barColor: "#1e88e5"
         });
         $("#lastmonthchart").sparkline([5, 6, 2, 9, 4, 7, 10, 12], {
            type: "bar",
            height: "35",
            barWidth: "4",
            resize: !0,
            barSpacing: "4",
            barColor: "#7460ee"
         });

      });

   };
   var sparkResize;

   $(window).resize(function (e) {
      clearTimeout(sparkResize);
      sparkResize = setTimeout(sparklineLogin, 500);
   });
   sparklineLogin();
});