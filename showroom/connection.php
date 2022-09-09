<?php
try{
    $mysql = mysqli_connect('localhost','root','mysql','showroom');
}catch(Exception $e){
    echo "Error while connecting to database";
    die();
}

function req($req){
    return (empty($_POST[$req] || $_POST[$req] == ''))?$_POST[$req]:$_GET[$req];
}
function set($req){
    if(isset($_POST[$req])){
        return true;
    }elseif(isset($_GET[$req])){
        return true;
    }else{
        return false;
    }
}