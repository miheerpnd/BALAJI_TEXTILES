<?php
require('../connection.php');

// Check Invoice Validation

if(isset($_POST['process_type'])){

}else{
    echo 'Invoice : False';
    exit;
}

// Check Customer Existance

if(isset($_POST['c_name'])){
    if(!empty($_POST['c_name'])){

    }else{
        echo 'Customer : False';
        exit;
    }
}else{
    echo 'Customer : False';
    exit;
}

// Cart Validation

if(!empty($_POST['item'])){

}else{
    echo "Cart : False";
    exit;
}

// Customer details

$c_name = $_POST['c_name'];
$c_mobile = $_POST['c_mobile'];
$c_address = $_POST['c_address'];

// Pricing details

$seleret = ((empty($_POST['seleret']))?'0':$_POST['seleret']);
$packing = ((empty($_POST['packing']))?'0':$_POST['packing']);
$coolie = ((empty($_POST['coolie']))?'0':$_POST['coolie']);
$oth = ((empty($_POST['oth']))?'0':$_POST['oth']);
$totalAdd = ((empty($_POST['totalAdd']))?'0':$_POST['totalAdd']);
$totalSub = ((empty($_POST['totalSub']))?'0':$_POST['totalSub']);
$net_worth = $_POST['net_worth'];

// Cart details

$item = $_POST['item'];
$qty = $_POST['qty'];
$rate = $_POST['rate'];
$unit = $_POST['unit'];
$total = $_POST['total'];

// External details

date_default_timezone_set('Asia/Kolkata');

$date = date('Y-m-d');
$time = date('g:i a');
$show_date = date(('j F, Y'));

// Process Type

$invoice_type = $_POST['process_type'];

// First Create a invoice
try{
    $query = mysqli_query($mysql,"INSERT INTO invoice (c_name,c_mob,c_address,seleret,packing,coolie,oth,total_add,total_less,net_worth,time,date,show_date,invoice_type) VALUES ('$c_name','$c_mobile','$c_address','$seleret','$packing','$coolie','$oth','$totalAdd','$totalSub','$net_worth','$time','$date','$show_date','$invoice_type')");
    echo $query->error;
}
catch(exception $e){
    echo "Invoice Database Insertion : False";
    exit;
}
finally{
    // Always runs
}

// Get Last Invoice ID

try{
    $query = mysqli_query($mysql,"SELECT id FROM invoice ORDER BY id DESC LIMIT 1");
    $data = mysqli_fetch_assoc($query);
    $join_id = $data['id'];
}
catch(exception $e){
    echo "Invoice Database Fetching : False ";
    exit;
}
finally{
    // Always runs
}

// Insert Cart data along with invoice

try{
    foreach($item as $index => $key){
        $query = mysqli_query($mysql,"INSERT INTO invoice_data (join_id,item,qty,rate,unit,total) VALUES ('$join_id','$key','$qty[$index]','$rate[$index]','$unit[$index]','$total[$index]')");
    }
}
catch(exception $e){
    echo 'Cart Database Insertion : False';
    exit;
}
finally{
    // Always runs
}

// If Everything Gone Correct Then Final Message

try{
    echo "true";
}
catch(exception $e){
    echo "Something went wrong!";
}
finally{
    
}