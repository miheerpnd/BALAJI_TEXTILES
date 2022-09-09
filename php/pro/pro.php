<?php

require('../connection.php');

$t1 = $_POST['title1'];
$t2 = $_POST['title2'];

$qr = mysqli_query($mysql,"UPDATE setting set title1 = '$t1' , title2 = '$t2'");

if($qr){
    echo 'true';
}
else{
    echo 'Can Not Submit The Data!';
}

?>