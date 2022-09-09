<?php
require('connection.php');
$query = mysqli_query($mysql,"SELECT app_passkey FROM app");
if(!$query){
    echo "Unable to fetch data!";
}
else{

    $value = mysqli_fetch_array($query);
    if(!password_verify($_GET['code'],$value['app_passkey'])){
        echo "Wrong code!";
    }
    else{
                        setcookie('LOGGEDIN',true,time()+60*60*24*30);
                        setcookie('NAME',"USER",time()+60*60*24*30);
                        header('location:home.php');
                        exit;
    }
}
?>