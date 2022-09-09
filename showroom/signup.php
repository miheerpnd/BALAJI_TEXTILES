<?php
require_once('connection.php');
if(set('type') == false){
    $dataPoints = array(
        array("type" => "error", "status" => "false", "message"=>"Action type not found")
    );
    echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
}elseif(req('type') != 'create_user' || req('type') == null || req('type') == ''){
    $dataPoints = array(
        array("type" => "error", "status" => "false", "message"=>"Action type is incorrect")
    );
    echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
}elseif(set('email') == false || req('email') == '' || req('email') == null){
    $dataPoints = array(
        array("type" => "error", "status" => "false", "message"=>"Email Not found")
    );
    echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
}elseif(set('password') == false || req('password') == '' || req('password') == null){
    $dataPoints = array(
        array("type" => "error", "status" => "false", "message"=>"Password not found")
    );
    echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
}else{
    $email = trim(req('email'));
    $temp = req('password');
    $password = password_hash($temp, PASSWORD_DEFAULT);
    $date = date("Y/m/d");

    $query = mysqli_query($mysql,"SELECT * FROM user where email = '$email' limit 1");
    $data = mysqli_fetch_assoc($query);
    if(!empty($data['id']) || $data['id'] != ''){
        $dataPoints = array(
            array("type" => "error", "status" => "false", "message"=>"User already exists")
        );
        echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
    }else{
        $query = mysqli_query($mysql,"INSERT INTO user (email,pass,created_at) VALUES ('$email','$password','$date')");
        if(!$query){
            $dataPoints = array(
                array("type" => "error", "status" => "false", "message"=>"Unable to create an account")
            );
            echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
        }else{
            $dataPoints = array(
                array("type" => "success", "status" => "true", "message"=>"Account created successfully!")
            );
            echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
        }
    }
}
    