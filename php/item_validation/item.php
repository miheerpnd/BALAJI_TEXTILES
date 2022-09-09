<?php
require_once('../connection.php');
if(isset($_GET['data'])){
    $data = trim($_GET['data']);
    $query = mysqli_query($mysql,"SELECT item from invoice_data where item = '$data' limit 1");
    $fetch = mysqli_fetch_row($query);
    if($fetch > 0){
        echo 'true';
    }
    else{
        echo 'false';
    }
}else{
    echo "false";
}