$(function(){
  'use strict';

  $('.sparkline1').sparkline('html', {
    type: 'bar',
    barWidth: 5,
    height: 50,
    barColor: '#0083CD',
    chartRangeMin: 0,
    chartRangeMax: 10
  });

  $('.sparkline2').sparkline('html', {
    type: 'bar',
    barWidth: 5,
    height: 50,
    barColor: '#fff',
    lineColor: 'rgba(255,255,255,0.5)',
    chartRangeMin: 0,
    chartRangeMax: 10
  });

  

  // Responsive Mode
  new ResizeSensor($('.br-mainpanel'), function(){
    rs2.configure({
      width: $('#rickshaw2').width(),
      height: $('#rickshaw2').height()
    });
    rs2.render();
  });

  


  var piedata = [
    { label: "Series 1", data: [[1,10]], color: '#677489'},
    { label: "Series 2", data: [[1,30]], color: '#218bc2'},
    { label: "Series 3", data: [[1,90]], color: '#7CBDDF'},
    { label: "Series 4", data: [[1,70]], color: '#5B93D3'},
    { label: "Series 5", data: [[1,80]], color: '#324463'}
  ];

  

  function labelFormatter(label, series) {
    return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
  }

});
