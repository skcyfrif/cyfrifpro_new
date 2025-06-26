<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  animationEnabled: true,
  title:{
    text: "Year: <?php echo $_GET['year'];?>"   
  },
  axisX: {
    interval: 1,
    intervalType: "month",
    valueFormatString: "MMM"
  },
  axisY:{
    title: "Price (in INR)",
    valueFormatString: "₹#0"
  },
  data: [{        
    type: "line",
    markerSize: 12,
    xValueFormatString: "MMM, YYYY",
    yValueFormatString: "₹###.#",
    dataPoints: [        
      <?php echo $dataPoints;?>
    ]
  }]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>