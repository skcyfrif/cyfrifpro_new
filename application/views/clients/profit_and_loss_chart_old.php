<?php
 
 $dataPoints = array(

	array("x" => 9466650000007, "y" => 3289000),
	array("x" => 9782874000005, "y" => 3830000),
	array("x" => 1009823400000, "y" => 2009000),
	array("x" => 1041359400000, "y" => 2840000),
	array("x" => 1072895400000, "y" => 2396000),
	array("x" => 1104517800000, "y" => 1613000),
	array("x" => 1136053800000, "y" => 1821000),
	array("x" => 1167589800000, "y" => 2000000),
	array("x" => 1199125800000, "y" => 1397000),
	array("x" => 1230748200000, "y" => 2506000),
	array("x" => 1262284200000, "y" => 6704000),
	array("x" => 1293820200000, "y" => 5704000),
	array("x" => 1325356200000, "y" => 4009000),
	array("x" => 1356978600000, "y" => 3026000),
	array("x" => 1388514600000, "y" => 2394000),
	array("x" => 1420050600000, "y" => 1872000),
	array("x" => 1451586600000, "y" => 2140000)
 );
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Company Revenue"
	},
	axisX:{  
		//Try Changing to MMMM
              valueFormatString: "DD MMM"
      },
	axisY: {
		title: "Company Revenue",
		//valueFormatString: "#0,,.",
		//suffix: "mn",
		//prefix: "$"
	},
	data: [{
		type: "spline",
		markerSize: 5,
		//xValueFormatString: "MMM YY",
		yValueFormatString: "#,##0.##",
		xValueType: "dateTime",
		dataPoints: [//array
        { x: new Date(2012, 01), y: 6500},
        { x: new Date(2012, 02), y: 13856},
        { x: new Date(2012, 03), y: 435655},
        { x: new Date(2012, 04), y: 34290},
        { x: new Date(2012, 05), y: 415656},
        { x: new Date(2012, 06), y: 89540},
        { x: new Date(2012, 07), y: 12660},
        { x: new Date(2012, 08), y: 8460},
        { x: new Date(2012, 09), y: 12553},
        { x: new Date(2012, 10), y: 67570}

        ]
	}]
});
 
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>             