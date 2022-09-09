<?php
require('../connection.php');
date_default_timezone_set('Asia/Kolkata');
if(isset($_GET['repo'])){
    $mode = $_GET['mode'];
    if($_GET['repo'] == "DAY"){
        $query = mysqli_query($mysql,"SELECT sum(net_worth) as net from invoice where invoice_type = '$mode' and DATE(date) = DATE(NOW())");
    }elseif($_GET['repo'] == "WEEK"){
        $query = mysqli_query($mysql,"SELECT sum(net_worth) as net from invoice where invoice_type = '$mode' and WEEK(date) = WEEK(NOW()) AND YEAR(date) = YEAR(NOW())");
    }
    elseif($_GET['repo'] == "MONTH"){
        $query = mysqli_query($mysql,"SELECT sum(net_worth) as net from invoice where invoice_type = '$mode' and MONTH(date) = MONTH(NOW()) AND YEAR(date) = YEAR(NOW())");
    }else{
        $query = mysqli_query($mysql,"SELECT sum(net_worth) as net from invoice where invoice_type = '$mode' and YEAR(date) = YEAR(NOW())");
    }
    $data = mysqli_fetch_assoc($query);
    echo sprintf('%0.2f', $data['net']);
}else{
    echo "0";
}