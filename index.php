<!-- Including Php Files As Well -->
<?php
include('connection.php');

$check_setup_query = mysqli_query($mysql,"SELECT title1, title2 from setting");
$check_setup = mysqli_fetch_array($check_setup_query);
?>
<!-- Html Start -->
<!DOCTYPE html>
<html lang="en">
<head>
 <?php require('includes/style.php'); ?>
 
</head>
<!-- Body Starts -->
<body>
  

  <?php

if(empty($check_setup['title1'])){
  include('setup.php');
  die();
}else if(empty($check_setup['title2'])){
  include('setup.php');
  die();
}else{
  
}

if(isset($_COOKIE['LOGGEDIN'])){
  header('location:home.php');
  exit;
}

?>


<link rel="stylesheet" href="includes/css/index.css">



<body>

<?php
$query = mysqli_query($mysql,"SELECT * from setting");
$data = mysqli_fetch_assoc($query);
?>

    <!-- Body -->
    <div class="row">
        <div class="col-6 center-right">
            <div>
                <h1 class="text-danger"><b style="font-size: 50px; font-family: Arial, Helvetica, sans-serif;"><?=$data['name']?></b></h1>
                <h4 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"><?=$data['slogan']?></h4>
            </div>
        </div>
        <div class="col-6 center-left">
            <div style="width: 100%;">
                <div class="card">
                    <div id="msg">
                
                    </div>
                    <input type="password" id="password" class="input-style" placeholder="Code" maxlength="6" onkeypress="return runScript()">
                    <button id="myBtn" class="btn btn-style bg-danger text-light" onclick="login()" style="margin-top: 25px;"><b>Proceed</b></button>
                    <hr>
                    <p style="width:100%; text-align: center; font-size: 12px;" class="text-secondary">By continuing, you agree our <br> <a href="" onclick="privacy()">Privacy policy</a> and <a href="" onclick="term()">Terms of services.</a></p>
                </div>
                <div class="text-secondary" style="font-size: 10px; text-align: center; width: 70%; margin-top: 25px;">
                    Made by <br> <b style="font-size: 28px;" class="text-primary">miheer.<strong class="text-warning">site</strong></b>
                </div>
            </div>
        </div>
    </div>

    <script>
        function privacy() {
            window.open("privacy.html");
        }

        function term() {
            window.open("term.html");
        }
        function login(){
            let a = document.getElementById('password').value;
            if(a == ""){
                document.getElementById('msg').innerHTML = '<div class="alert alert-warning" role="alert"> Code could not be empty! </div>';
            }
            else if(a.length < '6'){
                document.getElementById('msg').innerHTML = '<div class="alert alert-warning" role="alert"> Code could not be less than 6 digits! </div>';
            }
            else{
                document.getElementById('msg').innerHTML = '';

                                // Ajex calling
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                        if(this.responseText == "true"){
                            window.location.replace("loginthis.php?code="+a);
                        }
                        else{
                            document.getElementById('msg').innerHTML = '<div class="alert alert-danger" role="alert"> '+this.responseText+' </div>'; 
                        }
                        }
                    xhttp.open("GET", "php/login.php?code="+a);
                    xhttp.send();

            }
        }

        function runScript() {
             if (event.key === "Enter") {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("myBtn").click();
            }
        }
    </script>




</body>
<!-- Body Ends -->
</html>
<!-- Html Ends -->
