<?php
require('../connection.php');
date_default_timezone_set('Asia/Kolkata');
if(isset($_GET['repo'])){
    $mode = "SELL";
    if($_GET['repo'] == "DAY"){
        $query1 = mysqli_query($mysql,"SELECT sum(net_worth) as net from invoice where invoice_type = '$mode' and DATE(date) = DATE(NOW())");
        $query2 = mysqli_query($mysql,"SELECT sum(net_worth) as net from invoice where invoice_type = '$mode' and DATE(date) = DATE(NOW())-1");
    }elseif($_GET['repo'] == "WEEK"){
        $query1 = mysqli_query($mysql,"SELECT sum(net_worth) as net from invoice where invoice_type = '$mode' and WEEK(date) = WEEK(NOW()) and YEAR(date) = YEAR(NOW())");
        $query2 = mysqli_query($mysql,"SELECT sum(net_worth) as net from invoice where invoice_type = '$mode' and WEEK(date) = WEEK(NOW())-1 and YEAR(date) = YEAR(NOW())");      
    }
    elseif($_GET['repo'] == "MONTH"){
        $query1 = mysqli_query($mysql,"SELECT sum(net_worth) as net from invoice where invoice_type = '$mode' and MONTH(date) = MONTH(NOW()) and YEAR(date) = YEAR(NOW())");
        $query2 = mysqli_query($mysql,"SELECT sum(net_worth) as net from invoice where invoice_type = '$mode' and MONTH(date) = MONTH(NOW())-1 and YEAR(date) = YEAR(NOW())");      
    }else{
        $query1 = mysqli_query($mysql,"SELECT sum(net_worth) as net from invoice where invoice_type = '$mode' and YEAR(date) = YEAR(NOW())");
        $query2 = mysqli_query($mysql,"SELECT sum(net_worth) as net from invoice where invoice_type = '$mode' and YEAR(date) = YEAR(NOW())-1");      
    }

    $data1 = mysqli_fetch_assoc($query1);
    $data2 = mysqli_fetch_assoc($query2);
    if(empty($data1['net'])){
        $d1 = 0;
    }
    else{
        $d1 = $data1['net'];
    }

    if(empty($data2['net'])){
        $d2 = 0;
    }
    else{
        $d2 = $data2['net'];
    }
    
    $data = sprintf('%0.2f', $d1) - sprintf('%0.2f', $d2);
    if($data < 0){
        echo sprintf('%0.2f', $data).' <b class="text-light bg-danger"  style="font-size: 13px;"><i class="bi bi-arrow-down"></i>Decreased</b>';
    }elseif($data > 0){
        echo sprintf('%0.2f', $data).' <b class="text-light bg-success"  style="font-size: 13px;"><i class="bi bi-arrow-up"></i>Increased</b>';
    }else{
        echo sprintf('%0.2f', $data).' <b class="text-dark bg-warning"  style="font-size: 13px;"><i class="bi bi-arrow-up"></i>No Changes</b>';
    }
}else{
    echo sprintf('%0.2f', $data).' <b class="text-dark bg-warning"  style="font-size: 13px;"><i class="bi bi-arrow-up"></i>No Changes</b>';
}