<?php
try{
    require_once('../connection.php');
$id = $_GET['id'];
$query = mysqli_query($mysql,"DELETE FROM invoice where id = $id");
$query = mysqli_query($mysql,"DELETE FROM invoice_data where join_id = $id");
echo 'true';
}catch(Exception $e){
    echo 'false';
}