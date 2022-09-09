<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('includes/style.php'); ?>
    <style>
      body{
        width:100vw;
        height: 100vh;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size: 35px;
        padding: 50px;
      }
      .draw{
        width: 300px;
        height: auto;
        position: fixed;
        bottom:0;
        right:0;
        margin-right:150px;
        padding-top: 10px;
        text-align:center;
        padding-bottom: 10px;
      }
    </style>
  </head>
  <body class="bg-warning">
    <img src="assets/img/error.png" alt="" width="100px" height="100px" style="margin-right:15px; border-radius:15px; border:5px white solid; background-color:black; padding:15px;">
    <u><b>Error while establising a database connection.</b></u>

    <div class="draw bg-primary text-light">
<h3>Contact Us</h3>
<hr>
<p style="font-size:10px;">The light speed</p>  
<h2>+91 9113313764</h2>
    </div>
  </body>
  </html>
