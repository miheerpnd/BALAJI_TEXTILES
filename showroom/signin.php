<?php
require_once('connection.php');
if(set('type') == false){
    $dataPoints = array(
        array("type" => "error", "status" => "false", "message"=>"Action type not found")
    );
    echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
}elseif(req('type') != 'login_user' || req('type') == null || req('type') == ''){
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
    $password = trim(req('password'));

    $query = mysqli_query($mysql,"SELECT * FROM user where email = '$email' limit 1");
    $data = mysqli_fetch_assoc($query);
    if(empty($data['id']) || $data['id'] == '' || $data['id'] == null){
        $dataPoints = array(
            array("type" => "error", "status" => "false", "message"=>"User does not exists")
        );
        echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
    }else{
        if(password_verify($password,$data['pass'])){
            $dataPoints = array(
                array("type" => "success", "status" => "true", "message"=>"Logged in successfully!", "UserId" => $data['id'])
            );
            echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
        }else{
            $dataPoints = array(
                array("type" => "error", "status" => "false", "message"=>"Wrong password")
            );
            echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
        }
    }
}
    