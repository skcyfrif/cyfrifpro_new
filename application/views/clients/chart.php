<!DOCTYPE html>
<html>
<head> 
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> 
<script type="text/javascript">

window.onload = function () {
  var chart = new CanvasJS.Chart("chartContainer", { 

    zoomEnabled:true,
    zoomType: "xy",

    // title: {
    //   text: "Graph"
    // },
    data: [
      {
        type: "spline",
        dataPoints: [
          <?php  foreach($due as $key){ 

                    $date=date('d M y',strtotime($key->created));
                    echo '{"label":"'.$date.'",y:'.$key->due.',name: "Due"},';
              }
          ?>
        ]
      },
      {
        type: "spline",
        dataPoints: [
          <?php  foreach($received as $key){ 

                    $date=date('d M y',strtotime($key->created));
                    echo '{"label":"'.$date.'",y:'.$key->received.',name: "Received"},';
              }
          ?>
        ]
      },
      {
        type: "spline",
        dataPoints: [
          <?php  foreach($deposited as $key){ 

                    $date=date('d M y',strtotime($key->created));
                    echo '{"label":"'.$date.'",y:'.$key->deposited.',name: "Deposited"},';
              }
          ?>
        ]
      }
    ]
  });
  chart.render(); 
  var current = 0;
var viewportSize = 20;
var xVal = dps.length + 1, yVal = 15;;
var updateChart = function () {
  yVal = yVal +  Math.round(5 + Math.random() *(-5-5))
  chart.options.data[0].dataPoints.push({
    x: xVal++,
    y: yVal
  });

  if(!chart.options.axisX)
    chart.options.axisX = {
      viewportMinimum: null,
      viewportMaximum: null
    };

  chart.options.axisX.viewportMinimum = $(".scroll-bar").slider("option", "value");
  chart.options.axisX.viewportMaximum = chart.options.axisX.viewportMinimum + viewportSize;
  $(".scroll-bar").slider("option", "max", current++);
  chart.render();
};

setInterval(function () {
  updateChart()
}, 500);


var scrollbar = $(".scroll-bar").slider({
  max:6,
  min:0,
  slide: function( event, ui ) {

  }
});
}
</script>
<div class="container-fluid">
  <div class="row-fluid">
      <div id="chartContainer" style="width:100%; height:310px;"></div>  
      <div class="scroll-bar" style="width:100%;"></div>
    </div>
</div>

