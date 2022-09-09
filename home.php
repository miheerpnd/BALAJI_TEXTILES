<!-- Including Php Files As Well -->
<?php
include('connection.php');
?>
<!-- Html Start -->
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require('includes/style.php'); ?>
</head>
<!-- Body Starts -->

<body style="width: 100vw; height: 100vh;">
  <?php require('includes/header.php'); ?>

  <style>
    hr {
      margin: 20px;
    }
  </style>

  <!-- Breadcumb -->
  <nav style="margin-left: 15px; margin-top: 15px; --bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </nav>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      fetch_normal_kn('BUY', 'kn_1', 'spn_1', 'DAY', 'Today');
      fetch_normal_kn('SELL', 'kn_2', 'spn_2', 'DAY', 'Today');
      fetch_normal_comp('kn_3', 'spn_3', 'DAY', 'Than Yesterday');
    });

    function fetch_normal_kn(mode, id, id2, repo, mess) {
      document.getElementById(id).innerHTML = '<div class="spinner-grow text-dark" role="status" aria-hidden="true"><span class="visually-hidden">Loading...</span></div>';
      document.getElementById(id2).innerHTML = mess;
      let xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById(id).innerHTML = this.responseText;
      }
      xhttp.open("GET", "php/get_rep/get_rep.php?mode=" + mode + "&repo=" + repo);
      xhttp.send();
    }

    function fetch_normal_comp(id, id2, repo, mess) {
      document.getElementById(id).innerHTML = '<div class="spinner-grow text-dark" role="status" aria-hidden="true"><span class="visually-hidden">Loading...</span></div>';
      document.getElementById(id2).innerHTML = mess;
      let xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById(id).innerHTML = this.responseText;
      }
      xhttp.open("GET", "php/get_rep/get_comp.php?repo=" + repo);
      xhttp.send();
    }
  </script>
  <!--  -->
  <div class="row m-0">
    <!-- Row 1 -->
    <div class="col-lg mt-1">
      <div class="card p-3 bg-success bg-gradient">
        <div class="row">
          <div class="col">
            <h3 class="text-light"><b>Purchase&nbsp;<span class="badge btn-sm rounded-pill text-bg-warning" id="spn_1" style="font-size: 12px;">Today</span></b></h3>
          </div>
          <div class="col p-0" style="text-align: right;">
            <div class="dropdown">
              <button type="button" class="bi bi-funnel btn btn-sm btn-outline-light mb-2" data-bs-toggle="dropdown" aria-expanded="false"></button>
              <ul class="dropdown-menu bg-gradient p-0">
                <li><a class="dropdown-item" href="javascript:fetch_normal_kn('BUY','kn_1','spn_1','DAY','Today')">Today</a></li>
                <li><a class="dropdown-item" href="javascript:fetch_normal_kn('BUY','kn_1','spn_1','WEEK','This Week')">This Week</a></li>
                <li><a class="dropdown-item" href="javascript:fetch_normal_kn('BUY','kn_1','spn_1','MONTH','This Month')">This Month</a></li>
                <li><a class="dropdown-item" href="javascript:fetch_normal_kn('BUY','kn_1','spn_1','YEAR','This Year')">This Year</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="s" style="width: 100%; height: 1px; background-color: white;"></div>
        <h1 style="margin: 0;" class="text-dark card mt-3 p-2"><b>&#8377 <strong id="kn_1">0</strong></b><strong style="font-size: 12px;"></strong></h1>
      </div>
    </div>
    <!-- Row 2 -->
    <div class="col-lg mt-1">
      <div class="card p-3 bg-danger bg-gradient">
        <div class="row">
          <div class="col">
            <h3 class="text-light"><b>Sell&nbsp;<span class="badge btn-sm rounded-pill text-bg-warning" id="spn_2" style="font-size: 12px;">Today</span></b></h3>
          </div>
          <div class="col p-0" style="text-align: right;">
            <div class="dropdown">
              <button type="button" class="bi bi-funnel btn btn-sm btn-outline-light mb-2" data-bs-toggle="dropdown" aria-expanded="false"></button>
              <ul class="dropdown-menu bg-gradient p-0">
                <li><a class="dropdown-item" href="javascript:fetch_normal_kn('SELL','kn_2','spn_2','DAY','Today')">Today</a></li>
                <li><a class="dropdown-item" href="javascript:fetch_normal_kn('SELL','kn_2','spn_2','WEEK','This Week')">This Week</a></li>
                <li><a class="dropdown-item" href="javascript:fetch_normal_kn('SELL','kn_2','spn_2','MONTH','This Month')">This Month</a></li>
                <li><a class="dropdown-item" href="javascript:fetch_normal_kn('SELL','kn_2','spn_2','YEAR','This Year')">This Year</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="s" style="width: 100%; height: 1px; background-color: white;"></div>
        <h1 style="margin: 0;" class="text-dark card mt-3 p-2"><b>&#8377 <strong id="kn_2">0</strong></b><strong style="font-size: 13px;"></strong></h1>
      </div>
    </div>
    <!-- Row 3 -->
    <div class="col-lg mt-1">
      <div class="card p-3 bg-dark bg-gradient">
        <div class="row">
          <div class="col-10">
            <h3 class="text-light"><b>Sell : Ratio&nbsp;<span class="badge btn-sm rounded-pill text-bg-warning" id="spn_3" style="font-size: 12px;">Than Last Week</span></b></h3>
          </div>
          <div class="col-2 p-0" style="text-align: right;">
            <div class="dropdown">
              <button type="button" class="bi bi-funnel btn btn-sm btn-outline-light mb-2" data-bs-toggle="dropdown" aria-expanded="false"></button>
              <ul class="dropdown-menu bg-gradient p-0">
                <li><a class="dropdown-item" href="javascript:fetch_normal_comp('kn_3','spn_3','DAY','Than Yesterday')">Than Yesterday</a></li>
                <li><a class="dropdown-item" href="javascript:fetch_normal_comp('kn_3','spn_3','WEEK','Than Last Week')">Than Last Week</a></li>
                <li><a class="dropdown-item" href="javascript:fetch_normal_comp('kn_3','spn_3','MONTH','Than Last month')">Than Last Month</a></li>
                <li><a class="dropdown-item" href="javascript:fetch_normal_comp('kn_3','spn_3','YEAR','Than Last Year')">Than Last Year</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="s" style="width: 100%; height: 1px; background-color: white;"></div>
        <h2 style="margin: 0;" class="text-dark card mt-3 p-2"><b>&#8377 <strong id="kn_3">0 <b class=" bg-warning" style="font-size: 15px;"><i class="bi bi-arrow-up"></i>No Changes</b></strong></b></h2>
      </div>
    </div>
    <!-- Row end -->
  </div>
  <br>
  <hr>
  <!-- Chart Row -->
  <div class="row p-3 text-light">
    <!-- Chart row1 -->
    <div class="col-xl card text-center bg-gradient bg-dark m-2" style="display: flex; justify-content: center; align-items: center;">
    <br>
      <div class="row card pt-2">
        <!-- Chart -->
        <iframe src="php/multi/multi_date_buy.php" title="W3Schools Free Online Web Tutorials" style="height: 390px;"></iframe>
    </div>
      <br>
    </div>
    <!-- Chart row2 -->
    <div class="col-xl card text-center bg-gradient bg-dark m-2" style="display: flex; justify-content: center; align-items: center;">
    <br>
      <div class="row card pt-2">
        <!-- Chart -->
        <iframe src="php/multi/multi_date_sell.php" title="W3Schools Free Online Web Tutorials" style="height: 390px;"></iframe>
    </div>
      <br>
    </div>
  </div>
  
  <div style="width: 100%; text-align: center;" class="bg-dark bg-gradient pt-5">
    <b style="margin: auto;" class="text-light">
      <h1>&copy; 2022, <?= $data['name'] ?></h1>
    </b> <br>
    <b>
      <h5 class="text-light">All Rights Reserved.</h5>
    </b><br><br>
  </div>

  
  <?php require('php/fast_search/fast.php') ?>

</body>
<!-- Body Ends -->

</html>
<!-- Html Ends -->