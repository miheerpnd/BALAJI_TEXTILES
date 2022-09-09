<?php
require_once('../connection.php');
try{

    $lim_a = $_POST['lim_a'];
    $lim_b = $_POST['lim_b'];

    // Customer
    if(trim($_POST['customer']) == 'ALL'){
        $customer = '';
    }else{
        $customer = "c_mob = ".$_POST['customer']." and ";
    }
    // Range
    if(empty($_POST['rangeC'])){
        if($_POST['range'] == 'month'){
            $date = 'MONTH(date) = MONTH(NOW()) and YEAR(date) = YEAR(NOW())';
        }elseif($_POST['range'] == 'day'){
            $date = 'DATE(date) = DATE(NOW())';
        }elseif($_POST['range'] == 'week'){
            $date = 'WEEK(date) = WEEK(NOW()) and YEAR(date) = YEAR(NOW())';
        }else{
            $date = 'YEAR(date) = YEAR(NOW())';
        }
    }else{
        $ex = explode('-',$_POST['rangeC']);
        $mon = $ex[1];
        $ye = $ex[0];
        $date = "MONTH(date) = '".$mon."' and YEAR(date) = '".$ye."'";
    }
    if(trim($_POST['item'] == 'ALL')){
        $item = '';
    }else{
        $it = $_POST['item'];
        $item = "and id IN (select join_id from invoice_data where item = '".$it."')";
    }
    if($_POST['mode'] == 'ANY'){
        $mode = "";
    }else{
        $mode = "invoice_type = '".$_POST['mode']."' and ";
    }
    

    $query = mysqli_query($mysql,"SELECT * FROM invoice WHERE $customer $mode $date $item order by id desc limit $lim_a,$lim_b");
    $i = $lim_a+1;
    $picker = 0;
    while($data = mysqli_fetch_array($query)){
    echo '<tr class="input_tabl">';
    $d = new DateTime($data['date']);
      echo '<td class="p-0 pt-1 pb-1 text-center">'.$i.'</td>';
      echo '<td class="p-0 pt-1 pb-1 text-center">'.date_formatter(date_format($d,'d-m-Y')).'</td>';
      echo '<td class="p-0 pt-1 pb-1 text-center">'.$data['time'].'</td>';
      echo '<td class="p-0 pt-1 pb-1 text-center">'.(($data['invoice_type'] == 'BUY')?'<b class="badge bg-success text-wrap">Purchase</b>':'<b class="badge bg-danger text-wrap">SELL</b>').'</td>';
      echo '<td class="p-0 pt-1 pb-1 text-center">'.$data['c_name'].'</td>';
      echo '<td class="p-0 pt-1 pb-1 text-center">+91 '.((empty($data['c_mob']))?'-------------':$data['c_mob']).'</td>';
      echo '<td class="p-0 pt-1 pb-1 text-center">'.((empty($data['c_address']))?'-------------':$data['c_address']).'</td>';
      echo '<td class="p-0 pt-1 pb-1 text-center">₹ '.sprintf('%0.2f', $data['net_worth']).'</td>';
      echo '<td class="p-0 pt-1 pb-1 text-center">    <div class="dropdown dropstart"> <button class="btn-red" type="button" data-bs-toggle="dropdown" aria-expanded="false">    Cancel  </button>  <div class="dropdown-menu">    <b class="text-secondary p-2 ms-2" style="font-size: 12px;">Are you sure?</b>    <hr class="m-1">    <div class="row p-0 m-0 m-auto"><div class="col text-center"><b class="btn btn-sm btn-success text-wrap delete-recor" onclick="cancel('."'".$data['id']."'".')">YES</b></div><div class="col text-center"><b class="btn btn-sm btn-danger text-wrap">NO</b></div></div>  </ul>  </div>      </td>';
      echo '<td class="p-0 pt-1 pb-1 text-center"><button class="btn-black" onclick="printquickanyhow('.$data['id'].')">View</button></td>';
    echo '</tr>';
    $i++;
    $picker++;
    }
    // No data found
    if($picker == 0){
        echo '<tr><td colspan="10" class="text-center">No data found</td></tr>';
    }

    if($picker >= $lim_b){
        $cal = $lim_a+$lim_b; 
        echo '<tr class="input_tabl"><td colspan="10" class="text-center"><a href="javascript:loadmoreat('.$cal.')" class="remove_load">Load More</a></td></tr>';
    }
}catch(Exception $e){
    echo "ERROR : ".$e;
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

?>