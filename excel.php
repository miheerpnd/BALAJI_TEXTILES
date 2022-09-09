<?php header("Content-type: application/vnd.ms-excel"); header("Content-Disposition: attachment; filename=bill_report.xls"); ?>
<table border="2px" style="width: 100%;">
    <thead>
            <tr>
                <th colspan="8">
                    <b>Bill Report</b>
                </th>
            </tr>
            <tr>
                <th colspan="8"></th>
            </tr>
        <tr>
            <th>SN.</th>
            <th>Date</th>
            <th>Time</th>
            <th>Trans.</th>
            <th>Customer</th>
            <th>Ph. no.</th>
            <th>Address</th>
            <th>Net worth</th>
        </tr>
    </thead>
    <tbody>
<?php
require_once('php/connection.php');
try{

    // Customer
    if(trim($_GET['customer']) == 'ALL'){
        $customer = '';
    }else{
        $customer = "c_mob = ".$_GET['customer']." and ";
    }
    // Range
    if(empty($_GET['rangeC'])){
        if($_GET['range'] == 'month'){
            $date = 'MONTH(date) = MONTH(NOW()) and YEAR(date) = YEAR(NOW())';
        }elseif($_GET['range'] == 'day'){
            $date = 'DATE(date) = DATE(NOW())';
        }elseif($_GET['range'] == 'week'){
            $date = 'WEEK(date) = WEEK(NOW()) and YEAR(date) = YEAR(NOW())';
        }else{
            $date = 'YEAR(date) = YEAR(NOW())';
        }
    }else{
        $ex = explode('-',$_GET['rangeC']);
        $mon = $ex[1];
        $ye = $ex[0];
        $date = "MONTH(date) = '".$mon."' and YEAR(date) = '".$ye."'";
    }
    if(trim($_GET['item'] == 'ALL')){
        $item = '';
    }else{
        $it = $_GET['item'];
        $item = "and id IN (select join_id from invoice_data where item = '".$it."')";
    }
    if($_GET['mode'] == 'ANY'){
        $mode = "";
    }else{
        $mode = "invoice_type = '".$_GET['mode']."' and ";
    }
    

    $query = mysqli_query($mysql,"SELECT * FROM invoice WHERE $customer $mode $date $item order by id desc");
    $i = 1;
    $picker = 0;
    $buy = 0;
    $sell = 0;
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
      echo '<td class="p-0 pt-1 pb-1 text-center"> '.sprintf('%0.2f', $data['net_worth']).'</td>';
    echo '</tr>';
    if(($data['invoice_type'] == 'BUY')){
        $buy = $buy+$data['net_worth'];
    }else{
        $sell = $sell+$data['net_worth'];
    }
    $i++;
    $picker++;
    }
}catch(Exception $e){
    
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
<tr>
    <td colspan="8"></td>
</tr>
        <tr>
            <td colspan="2">
                <b>Total Purchase</b>
            </td>
            <td colspan="2">
                <b><?=sprintf('%0.2f', $buy)?></b>
            </td>
            <td colspan="2">
                <b>Total Sell</b>
            </td>
            <td colspan="2">
            <b><?=sprintf('%0.2f', $sell)?></b>
            </td>
        </tr>
    </tbody>
</table>