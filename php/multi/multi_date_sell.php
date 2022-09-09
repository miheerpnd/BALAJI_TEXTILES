<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
require('../connection.php');

$query = mysqli_query($mysql,"SELECT CURDATE() as a, CURDATE()-1 as b, CURDATE()-2 as c, CURDATE()-3 as d, CURDATE()-4 as e");
$data = mysqli_fetch_assoc($query);

$date1 = new DateTime($data['a']);
$date2 = new DateTime($data['b']);
$date3 = new DateTime($data['c']);
$date4 = new DateTime($data['d']);
$date5 = new DateTime($data['e']);

$date_1 = $data['a'];
$date_2 = $data['b'];
$date_3 = $data['c'];
$date_4 = $data['d'];
$date_5 = $data['e'];

$query1 = mysqli_query($mysql,"SELECT sum(net_worth) as a FROM invoice WHERE invoice_type = 'SELL' and date = '$date_1'");
$data1 = mysqli_fetch_assoc($query1);

$query2 = mysqli_query($mysql,"SELECT sum(net_worth) as a FROM invoice WHERE invoice_type = 'SELL' and date = '$date_2'");
$data2 = mysqli_fetch_assoc($query2);

$query3 = mysqli_query($mysql,"SELECT sum(net_worth) as a FROM invoice WHERE invoice_type = 'SELL' and date = '$date_3'");
$data3 = mysqli_fetch_assoc($query3);

$query4 = mysqli_query($mysql,"SELECT sum(net_worth) as a FROM invoice WHERE invoice_type = 'SELL' and date = '$date_4'");
$data4 = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($mysql,"SELECT sum(net_worth) as a FROM invoice WHERE invoice_type = 'SELL' and date = '$date_5'");
$data5 = mysqli_fetch_assoc($query5);

$dataPoints = array(
	array("y" => (empty($data5['a']))?0:$data5['a'], "label" => date_format($date5,"d-m-Y")),
	array("y" => (empty($data4['a']))?0:$data4['a'], "label" => date_format($date4,"d-m-Y")),
	array("y" => (empty($data3['a']))?0:$data3['a'], "label" => date_format($date3,"d-m-Y")),
	array("y" => (empty($data2['a']))?0:$data2['a'], "label" => date_format($date2,"d-m-Y")),
	array("y" => (empty($data1['a']))?0:$data1['a'], "label" => date_format($date1,"d-m-Y"))
);

?>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Sell report"
	},
	axisY: {
		title: "Progress Of Trans. In Rupee"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>

<script>
    <?php require('../../assets/js/chart.php') ?>
</script>

</body>
</html>