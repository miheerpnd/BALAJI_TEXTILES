<?php

require('./connection.php');

if (!isset($_COOKIE['LOGGEDIN'])) {
  header('location:index.php');
  exit;
}
?>

<!-- Header starts -->
<nav class="navbar bg-secondary navstyle bg-gradient">
<!-- Div row starts -->
<div class="row">
    <!-- colomn 1 -->
    <div class="col-3">

    </div>
    <!-- Colomn 2 -->
    <div class="col-6">
    <div class="dropdown">
  <button class="btn btn-light GoTo dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <b class="bg-primary text-light">&nbsp;(Ctrl + G)&nbsp;</b> Go To
  </button>
  <ul class="dropdown-menu UlGoTo p-0" aria-labelledby="dropdownMenuButton1">
    <!-- Item1 start -->
    <li class="bg-warning card"><a class="dropdown-item" href="home.php"><div class="row">
      <div class="col-8" id="m">
      Home
    </div>
    <div class="col-4 text-light hintGoTo">
    <b class="bg-primary">&nbsp;Ctrl + H&nbsp;</b>
    </div>
  </div></a></li>
  <!-- Item1 end -->
  <!-- Item2 Start -->
  <li class="bg-warning card"><a class="dropdown-item" href="buy.php"><div class="row">
      <div class="col-8">
      Buy
    </div>
    <div class="col-4 text-light hintGoTo">
    <b class="bg-primary">&nbsp;Ctrl + B&nbsp;</b>
    </div>
  </div></a></li>
  <!-- Item2 ends -->
    <!-- Item3 Start -->
    <li class="bg-warning card"><a class="dropdown-item" href="sell.php"><div class="row">
      <div class="col-8">
      Sell
    </div>
    <div class="col-4 text-light hintGoTo">
    <b class="bg-primary">&nbsp;Ctrl + S&nbsp;</b>
    </div>
  </div></a></li>
  <!-- Item3 ends -->
    <!-- Item5 Start -->
    <li class="bg-warning card"><a class="dropdown-item" href="item.php"><div class="row">
      <div class="col-8">
      View All Invoices
    </div>
    <div class="col-4 text-light hintGoTo">
    <b class="bg-primary">&nbsp;Ctrl + L&nbsp;</b>
    </div>
  </div></a></li>
  <!-- Item5 ends -->
  <script>
    function findInvoiceFast(){
    var myModal = document.getElementById("myModal");
    if(myModal.style.display == "block"){
        myModal.style.display = "none";
    }else{
        initialsearch()
        myModal.style.display = "block";
        setTimeout( function() { quick_find_inout_focus(); }, 200);
    }
    }
  </script>
  <!-- Item4 Start -->
  <li class="bg-warning card"><a class="dropdown-item" href="javascript:findInvoiceFast();"><div class="row" >
      <div class="col-8">
      Find Invoice
    </div>
    <div class="col-4 text-light hintGoTo">
    <b class="bg-primary">&nbsp;Ctrl + F&nbsp;</b>
    </div>
  </div></a></li>
  <!-- Item4 ends -->

  <!-- Item6 Start -->
  <li class="bg-warning card"><a class="dropdown-item" href="javascript:focusclick();"><div class="row">
      <div class="col-8">
      Recent Invoice
    </div>
    <div class="col-4 text-light hintGoTo">
    <b class="bg-primary">&nbsp;Ctrl + R&nbsp;</b>
    </div>
  </div></a></li>
  <!-- Item6 ends -->
  </ul>
</div>
    </div>
    <!-- colomn 3 -->
    <div class="col-3" style="text-align: right;">
        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-person"></i>
        </button>
    </div>
</div>


<!-- Div row ends -->
</nav>
<!-- Header ends -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Not now</button>
        <button type="button" onclick="location.href='logoutthis.php'" class="btn btn-danger">Logout</button>
      </div>
    </div>
  </div>
</div>
  <!-- Modal -->




  <!-- Print Modal -->

<!-- Button trigger modal -->
<button type="button" style="display: none;" class="btn btn-primary print_recent_btn" data-bs-toggle="modal" data-bs-target="#stkp">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="stkp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-gradient bg-danger text-light">
        <h3 class="modal-title" id="staticBackdropLabel">Print Preview</h3>
        <button type="button" onclick="location.reload()" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="print_body">


        
      </div>
      <div class="modal-footer bg-gradient bg-danger text-light">
        <button type="button" class="btn btn-sm btn-light" onclick="printContent('print')"><strong class="bg-primary text-light" style="font-size: 13px;">&nbsp;Ctrl + P&nbsp;</strong> Print Invoice</button>
      </div>
    </div>
  </div>
</div>
<script>
    function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
   }
  </script>