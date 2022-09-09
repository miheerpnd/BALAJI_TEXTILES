<?php

require('../connection.php');
$val = trim($_GET['val']);

$query = mysqli_query($mysql,"SELECT sum(invoice_data.qty) as sum1 from invoice_data inner join invoice on invoice_data.join_id=invoice.id where invoice_data.item = '$val' and invoice.invoice_type = 'BUY'");
$data = mysqli_fetch_assoc($query);

if(empty($data['sum1'])){
    $comp_buy = 0;
}
else{
    $comp_buy = $data['sum1'];
}

$query = mysqli_query($mysql,"SELECT sum(invoice_data.qty) as sum1 from invoice_data inner join invoice on invoice_data.join_id=invoice.id where invoice_data.item = '$val' and invoice.invoice_type = 'SELL'");
$data = mysqli_fetch_assoc($query);

if(empty($data['sum1'])){
    $comp_sell = 0;
}
else{
    $comp_sell = $data['sum1'];
}

if($comp_buy < $comp_sell || $comp_buy == '0'){
    echo '0';
}
else{
    echo ($comp_buy-$comp_sell);
}
?>