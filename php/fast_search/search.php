<?php

require('../connection.php');
$limit = 10;

if($_GET['method'] == 'false'){
    $query = mysqli_query($mysql,"SELECT * FROM invoice order by id desc limit $limit");
    $i = 1;
    $color = "bg-dark";
    while($data = mysqli_fetch_array($query)){
        if($data['invoice_type'] == "BUY"){
            $color = "bg-success bg-gradient";
        }
        else{
            $color = "bg-danger bg-gradient";
        }
        echo '<tr>
        <td class="text-center rounded text-light '.$color.'">'.$data['invoice_type'].'</td>
        <td class="text-center">'.$data['c_name'].'<b style="font-size:10">('.$data['c_mob'].')<b></td>
        <td class="text-center">'.date_formatter($data['date']).'</td>
        <td class="text-center">'.$data['time'].'</td>
        <td class="text-center">&#8377;&nbsp;'.$data['net_worth'].'</td>
        <td class="text-center"><button class="btn btn-sm btn-dark" onclick="printquickanyhow('.$data['id'].')">Print</button></td>
    </tr>';
    $i++;
    }
    if($i == 1){
        echo '<tr>
        <td class="text-center" colspan="6">No data found!</td></tr>';
    }
}
else{
    if(empty($_GET['val'])){
        $query = mysqli_query($mysql,"SELECT * FROM invoice order by id desc limit $limit");
        $i = 1;
        while($data = mysqli_fetch_array($query)){
            if($data['invoice_type'] == "BUY"){
                $color = "bg-success bg-gradient";
            }
            else{
                $color = "bg-danger bg-gradient";
            }
            echo '<tr>
            <td class="text-center rounded text-light '.$color.'">'.$data['invoice_type'].'</td>
            <td class="text-center">'.$data['c_name'].'<b style="font-size:10">('.$data['c_mob'].')<b></td>
            <td class="text-center">'.date_formatter($data['date']).'</td>
            <td class="text-center">'.$data['time'].'</td>
            <td class="text-center">&#8377;&nbsp;'.$data['net_worth'].'</td>
            <td class="text-center"><button class="btn btn-sm btn-dark" onclick="printquickanyhow('.$data['id'].')">Print</button></td>
        </tr>';
        $i++;
        }
        if($i == 1){
            echo '<tr>
            <td class="text-center" colspan="6">No data found!</td></tr>';
        }
    }else{
        if(trim($_GET['key'] == 'c_mob' || $_GET['key'] == 'c_name')){
            
        $key = $_GET['key'];
        $val = $_GET['val'];
        $query = mysqli_query($mysql,"SELECT * FROM invoice where $key LIKE '%$val%' order by id desc limit $limit");
        $i = 1;
        while($data = mysqli_fetch_array($query)){
            if($data['invoice_type'] == "BUY"){
                $color = "bg-success bg-gradient";
            }
            else{
                $color = "bg-danger bg-gradient";
            }
            echo '<tr>
            <td class="text-center rounded text-light '.$color.'">'.$data['invoice_type'].'</td>
            <td class="text-center">'.$data['c_name'].'<b style="font-size:10">('.$data['c_mob'].')<b></td>
            <td class="text-center">'.date_formatter($data['date']).'</td>
            <td class="text-center">'.$data['time'].'</td>
            <td class="text-center">&#8377;&nbsp;'.$data['net_worth'].'</td>
            <td class="text-center"><button class="btn btn-sm btn-dark" onclick="printquickanyhow('.$data['id'].')">Print</button></td>
        </tr>';
        $i++;
        }
        if($i == 1){
            echo '<tr>
            <td class="text-center" colspan="6">No data found!</td></tr>';
        }
        }
        else{
        
        $key = $_GET['key'];
        $val = $_GET['val'];
        $query = mysqli_query($mysql,"SELECT * FROM invoice where $key = '$val' order by id desc limit $limit");
        $i = 1;
        while($data = mysqli_fetch_array($query)){
            if($data['invoice_type'] == "BUY"){
                $color = "bg-success";
            }
            else{
                $color = "bg-danger";
            }
            echo '<tr>
            <td class="text-center rounded bg-gradient text-light '.$color.'">'.$data['invoice_type'].'</td>
            <td class="text-center">'.$data['c_name'].'<b style="font-size:10">('.$data['c_mob'].')<b></td>
            <td class="text-center">'.date_formatter($data['date']).'</td>
            <td class="text-center">'.$data['time'].'</td>
            <td class="text-center">&#8377;&nbsp;'.$data['net_worth'].'</td>
            <td class="text-center"><button class="btn btn-sm btn-dark" onclick="printquickanyhow('.$data['id'].')">Print</button></td>
        </tr>';
        $i++;
        }
        if($i == 1){
            echo '<tr>
            <td class="text-center" colspan="6">No data found!</td></tr>';
        }
        }
    }
}



function date_formatter($current_date){
    date_default_timezone_set('Asia/Kolkata');
    $date1 = new DateTime($current_date);
    $dateCurrent = date('Y-m-d');
    $date2 = new DateTime($dateCurrent);

    $interval = $date1->diff($date2);

    $diffDays = $interval->d;

    switch( $diffDays ) {
        case 0:
            return "Today";
            break;
        case +1:
            return "Yesterday";
            break;
        case -1:
            return "Tomorrow";
            break;
        default:
            return $current_date;
    }
}

