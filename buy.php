<!-- Including Php Files As Well -->
<?php
include('connection.php');
?>
<!-- Html Start -->
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require('includes/style.php'); ?>
  <style>
    input{
    border-radius: 7px;
    padding: 10px;
    font-size: 22px;
    -webkit-box-shadow:inset 0 0 5px #000;
       -moz-box-shadow:inset 0 0 5px #000;
            box-shadow:inset 0 0 5px #000;
    }
    input:focus{ 
        outline: none;
    }
    select{
      border-radius: 7px;
    padding: 10px;
    font-size: 22px;
    -webkit-box-shadow:inset 0 0 5px #000;
       -moz-box-shadow:inset 0 0 5px #000;
            box-shadow:inset 0 0 5px #000;
    }

    .style11 select:focus{
      border-color: rgba(0, 0, 0, 0);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0) inset, 0 0 0 0;
  outline: 0 none;
  border-radius: 7px;
    -webkit-box-shadow:inset 0 0 3px #000;
       -moz-box-shadow:inset 0 0 3px #000;
            box-shadow:inset 0 0 3px #000;
  outline: 2px solid black;
    }

textarea:focus,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="time"]:focus,
input[type="week"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="color"]:focus,
.uneditable-input:focus {   
  border-color: rgba(0, 0, 0, 0);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0) inset, 0 0 0 0;
  outline: 0 none;
  border-radius: 7px;
    -webkit-box-shadow:inset 0 0 3px #000;
       -moz-box-shadow:inset 0 0 3px #000;
            box-shadow:inset 0 0 3px #000;
  outline: 2px solid black;
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.float-mess{
  position: fixed;
  margin-top: 85px;
  width: 100vw;
  text-align: center;
  font-size: 40px;
  font-family: 'Courier New', Courier, monospace;
}
  </style>
</head>
<!-- Body Starts -->

<body onload="set_focus_to_name()">

<div class="float-mess">
  <strong class="bg-success bg-gradient text-light">&nbsp;BUY&nbsp;</strong>
</div>

  <?php require('includes/header.php'); ?>

  <form  id="MyForm" action="javascript:void(0)" onsubmit="return false;" autocomplete="off">

  <!-- Breadcumb -->
  <nav style="margin-left: 15px; margin-top: 15px; --bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb" style="margin: 0;">
      <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Buy</li>
    </ol>
  </nav>

  <div class="row">
    <div class="col-8 p-4">

      <h3 style="margin-top: 0px;"><b><div class="row">
      <div class="col">
      CUSTOMER DETAILS
      </div>
      </div></b></h3>

      <!-- row again customer details -->
      <div class="ui raised segment">
      <div class="row m-auto">
        <div class="col">
          <label for="">Name <b class="text-danger">*</b> <strong class="bg-primary text-light">&nbsp;Ctrl + ?&nbsp;</strong></label>
          <input type="text" class="form-control n-i1" name="c_name" id="name_val" placeholder="Name" aria-label="Name">
        </div>
        <div class="col">
          <label for="">Ph. no.</label>
          <input type="text" class="form-control n-i2" name="c_mobile" id="mob_val" maxlength="10" placeholder="Mobile number" aria-label="Mobile Number">
        </div>
      </div>
      <br>

      <div class="row m-auto">
        <div class="col">
          <label for="">Address</label>
          <input type="text" class="form-control n-i3" name="c_address" id="address_val" placeholder="Address" aria-label="Address">
        </div>
      </div>
      </div>

      
      <h3 style="margin-top: 15px;"><b><div class="row">
        <div class="col">
        CART PREVIEW <strong class="bg-primary text-light" style="font-size: 13px;">&nbsp;Ctrl + <i><b style="font-size: 20px;">+</b></i>&nbsp;</strong>
        </div>
        <div class="col" style="text-align: right;">
        <button class="btn btn-sm btn-primary" id="add_data_to_cart" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"> + ADD TO CART</button>
        </div>
      </div></b></h3>

      
      <div class="ui raised segment">
      <div class="row m-auto">
        <div class="col">
          <table class="table dataTable-bottom table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th class="text-center bg-dark bg-gradient text-light">#</th>
                <th class="text-center bg-dark bg-gradient text-light">ITEM</th>
                <th class="text-center bg-dark bg-gradient text-light">QTY</th>
                <th class="text-center bg-dark bg-gradient text-light">RATE</th>
                <th class="text-center bg-dark bg-gradient text-light">UNIT</th>
                <th class="text-center bg-dark bg-gradient text-light">TOTAL</th>
                <th class="text-center bg-dark bg-gradient text-light">ACTION</th>
              </tr>
            </thead>
            <tbody id="tbl">
              
            </tbody>
          </table>
        </div>
      </div>
      </div>

    </div>

    <!-- Next to row -->
    <div class="col-4 p-4">

    <!-- Pricing -->
    <h3><p>PRICING</p></h3>
    <div class="ui segment raised">
      <div class="row m-auto">
        <div class="col">
          <label for="">SELERET</label>
          <input type="number" name="seleret" onkeyup="seleret_func()" id="seleret_val" step="any" class="form-control n-i4">
        </div>
        <div class="col">
          <label for="">PACKING</label>
          <input type="number" name="packing" id="packing_val" onkeyup="packing_func()" step="any" class="form-control n-i5">
        </div>        
      </div>
      <hr>
      <div class="row m-auto">
        <div class="col">
          <label for="">Coolie</label>
          <input type="number" name="coolie" id="coolie_val" onkeyup="coolie_func()" step="any" class="form-control n-i6">
        </div>
        <div class="col">
          <label for="">Oth</label>
          <input type="number" name="oth" id="oth_val" step="any" onkeyup="oth_func()" class="form-control n-i7">
        </div>
      </div>
      <hr>
      <div class="row m-auto">
      <div class="col">
          <label for="">Σ ADD</label>
          <input type="number" name="totalAdd" id="total_add_val" onkeyup="total_add_func()" step="any" class="form-control n-i8">
        </div>
        <div class="col">
          <label for="">Σ LESS <strong class="bg-primary text-light">&nbsp;Ctrl + .&nbsp;</strong></label>
          <input type="number" name="totalSub" id="total_less_val" onkeyup="total_less_func()" step="any" class="form-control n-i9">
        </div>
      </div>
      <hr>
      

      <div class="row m-auto">
        <div class="col">
        <h3 style="margin: 0;"><b>NET WORTH</b></h3>
        </div>
        <div class="col" style="text-align: right;">
        <h3 style="margin: 0;" class="text-success"><b>&#8377 <strong id="net_worth_text">0</strong></b></h3>
        <input type="number" step="any" style="display: none;" name="net_worth" id="net_worth_input">
        <input type="hidden" name="process_type" id="process_type" value="BUY">
        </div>
      </div>
      <hr>
      
      
      <div class="row m-auto">
        <button class="btn btn-sm bg-gradient btn-dark" id="submitButton">
          Buy & PRINT <strong class="bg-primary text-light" style="font-size: 13px;">&nbsp;Ctrl + P&nbsp;</strong>
        </button>
      </div>
    </div>
    </div>
  </div>

  </form>

  <!-- Off Canvas -->

  

<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-body small">
    <div class="">
      <div class="row">
        <div class="col">
          <label for="">Item <strong class="bg-primary text-light" style="font-size: 13px;">&nbsp;Tab&nbsp;</strong></label>
          <input type="text" id="cart_item" class="form-control n-e1" placeholder="Product">
        </div>
        <div class="col">
          <label for="">Qty</label>
          <input type="number"  step="any" class="form-control n-e2" onkeyup="cart_sum()" id="cart_qty" placeholder="0">
        </div>
        <div class="col">
          <label for="">Rate</label>
          <input type="number" step="any" class="form-control n-e3" onkeyup="cart_sum()" id="cart_rate" placeholder="0.00">
        </div>
        <div class="col">
          <label for="">Unit</label>
          <div class="style11">
          <select id="cart_unit" class="form-select n-e4">
            <option value="PCS">PCS</option>
            <option value="PACK">PACK</option>
            <option value="DOZEN">DOZEN</option>
          </select>
          </div>
        </div>
        <div class="col">
          <label for="">Total</label>
          <input type="number" step="any" id="cart_total" class="form-control n-e5" placeholder="0.00">
        </div>
      </div>
      </div>
      <div class="row text-center">
        <div class="col m-auto mt-4">
        <button class="btn btn-success n-e6" id="btn-add-data" onclick="add_data_cart()" data-bs-dismiss="offcanvas">
          ADD DATA
        </button> <strong class="bg-primary text-light" style="font-size: 13px;">&nbsp;Enter&nbsp;</strong>
        </div>
      </div>
  </div>





  <script>
    document.addEventListener('keydown', function(e){
      if(e.keyCode == 13){
        // E series

        // 1 - 2
        if ($(".n-e1").is(":focus")) {
          e.preventDefault();
          var cart_item = document.querySelector('#cart_item').value;
      var cart_qty = document.querySelector('#cart_qty').value;
      var cart_rate = document.querySelector('#cart_rate').value;
      var cart_unit = document.querySelector('#cart_unit').value;
      var cart_total = document.querySelector('#cart_total').value;
      
      if(cart_item === '' || cart_qty === '' || cart_rate === '' || cart_total === ''){
        $('.n-e2').focus();
      }
      else{
        $('#btn-add-data').click();
      }
         
        }
        // 2 - 3
        else if ($(".n-e2").is(":focus")) {
          e.preventDefault();
          var cart_item = document.querySelector('#cart_item').value;
      var cart_qty = document.querySelector('#cart_qty').value;
      var cart_rate = document.querySelector('#cart_rate').value;
      var cart_unit = document.querySelector('#cart_unit').value;
      var cart_total = document.querySelector('#cart_total').value;
      
      if(cart_item === '' || cart_qty === '' || cart_rate === '' || cart_total === ''){
        $('.n-e3').focus();
      }
      else{
        $('#btn-add-data').click();
      }
         
        }
        // 3 - 4
        else if ($(".n-e3").is(":focus")) {
          e.preventDefault();
          var cart_item = document.querySelector('#cart_item').value;
      var cart_qty = document.querySelector('#cart_qty').value;
      var cart_rate = document.querySelector('#cart_rate').value;
      var cart_unit = document.querySelector('#cart_unit').value;
      var cart_total = document.querySelector('#cart_total').value;
      
      if(cart_item === '' || cart_qty === '' || cart_rate === '' || cart_total === ''){
        $('.n-e4').focus();
      }
      else{
        $('.n-e4').focus();
      }
         
        }
        // 4 - 5
        else if ($(".n-e4").is(":focus")) {
          e.preventDefault();
          var cart_item = document.querySelector('#cart_item').value;
      var cart_qty = document.querySelector('#cart_qty').value;
      var cart_rate = document.querySelector('#cart_rate').value;
      var cart_unit = document.querySelector('#cart_unit').value;
      var cart_total = document.querySelector('#cart_total').value;
      
      if(cart_item === '' || cart_qty === '' || cart_rate === '' || cart_total === ''){
        $('.n-e5').focus();
      }
      else{
        $('.n-e5').focus();
      }
         
        }
        // 5 - 6
        else if ($(".n-e5").is(":focus")) {
          e.preventDefault();

          var cart_item = document.querySelector('#cart_item').value;
      var cart_qty = document.querySelector('#cart_qty').value;
      var cart_rate = document.querySelector('#cart_rate').value;
      var cart_unit = document.querySelector('#cart_unit').value;
      var cart_total = document.querySelector('#cart_total').value;
      
      if(cart_item === '' || cart_qty === '' || cart_rate === '' || cart_total === ''){

      }
      else{
        $('#btn-add-data').click();
      }
          
         
        }
      }
    });



  </script>
</div>


  <script src="js/autofill.js"></script>

  <script>
    // Important
    document.addEventListener("keydown", function (e) {
  if (e.altKey && e.keyCode == 187) {
    e.preventDefault();
    $('#add_data_to_cart').click();
    setTimeout( function() { focusme(); }, 500);
  }

  function focusme(){
    $('#cart_item').focus();
  }
});

document.addEventListener("keydown", function (e) {
  if (e.ctrlKey && e.keyCode == 187) {
    e.preventDefault();
    $('#add_data_to_cart').click();
    setTimeout( function() { focusme(); }, 500);
  }

  function focusme(){
    $('#cart_item').focus();
  }
});
  </script>

  <script>
    document.addEventListener('keydown', function(e){
      if(e.keyCode == 13){
        // 1 -2
        if ($(".n-i1").is(":focus")) {
          e.preventDefault();
         $('.n-i2').focus();
        }
        // 2 - 3
        else if ($(".n-i2").is(":focus")) {
          e.preventDefault();
         $('.n-i3').focus();
        }
        // 3 - 4
        else if ($(".n-i3").is(":focus")) {
          e.preventDefault();
          $('#add_data_to_cart').click();
          setTimeout( function() { focusme(); }, 500);
        }
        // 4 - 5
        else if ($(".n-i4").is(":focus")) {
          e.preventDefault();
         $('.n-i5').focus();
        }
        // 5 - 6
        else if ($(".n-i5").is(":focus")) {
          e.preventDefault();
         $('.n-i6').focus();
        }
        // 6 - 7
        else if ($(".n-i6").is(":focus")) {
          e.preventDefault();
         $('.n-i7').focus();
        }
        // 7 - 8
        else if ($(".n-i7").is(":focus")) {
          e.preventDefault();
         $('.n-i8').focus();
        }
        // 2 - 3
        else if ($(".n-i8").is(":focus")) {
          e.preventDefault();
         $('.n-i9').focus();
        }        
      }
      if(e.shiftKey && e.keyCode == 13){
        $('#btn-add-data').click();
      }
    });

    document.addEventListener('keydown', function(e){
      if(e.altKey && e.keyCode == 191){
        e.preventDefault();
        $('#name_val').focus();
      }
      if(e.ctrlKey && e.keyCode == 191){
        e.preventDefault();
        $('#name_val').focus();
      }
    });
  </script>
  
  <script>
    function add_data_cart(){

      var cart_item = document.querySelector('#cart_item').value;
      var cart_qty = document.querySelector('#cart_qty').value;
      var cart_rate = document.querySelector('#cart_rate').value;
      var cart_unit = document.querySelector('#cart_unit').value;
      var cart_total = document.querySelector('#cart_total').value;
      
      if(cart_item === '' || cart_qty === '' || cart_rate === '' || cart_total === ''){
        launch_toast('Unable to add');
      }else{
        let temp_append_total = parseFloat(document.querySelector('#cart_total').value);
        if(isNaN(temp_append_total)===true){
          temp_append_total = 0;
        }
        let temp_append_net = parseFloat(document.querySelector('#net_worth_input').value);
        if(isNaN(temp_append_net)===true){
          temp_append_net = 0;
        }

        let temp_append_sum = temp_append_total+temp_append_net;
        
        document.querySelector('#net_worth_text').innerHTML = temp_append_sum;
        document.querySelector('#net_worth_input').value = temp_append_sum;


        $('#tbl').append('<tr class="input_table">\
                <td class="text-center">#</td>\
                <td class="text-center">'+document.querySelector('#cart_item').value+'<input class="special_input" id="item" type="hidden" name="item[]" value="'+document.querySelector('#cart_item').value+'"></td>\
                <td class="text-center">'+document.querySelector('#cart_qty').value+'<input class="special_input" type="hidden" name="qty[]" value="'+document.querySelector('#cart_qty').value+'"></td>\
                <td class="text-center">'+document.querySelector('#cart_rate').value+'<input class="special_input" type="hidden" name="rate[]" value="'+document.querySelector('#cart_rate').value+'"></td>\
                <td class="text-center">'+document.querySelector('#cart_unit').value+'<input class="special_input" type="hidden" name="unit[]" value="'+document.querySelector('#cart_unit').value+'"></td>\
                <td class="text-center">'+document.querySelector('#cart_total').value+'<input class="special_input" type="hidden" name="total[]" value="'+document.querySelector('#cart_total').value+'"></td>\
                <td class="text-center "><i class="bi bi-trash text-danger delete-record" style="cursor: pointer;" onclick="less_from_total('+"'"+parseFloat(document.querySelector('#cart_total').value)+"'"+')"></i></td>\
              </tr>');


      document.querySelector('#cart_item').value = "";
      document.querySelector('#cart_qty').value = "";
      document.querySelector('#cart_rate').value = "";
      document.querySelector('#cart_unit').value = "PCS";
      document.querySelector('#cart_total').value = "";
      }
      }

      function less_from_total(less_from_total){
        let temp_less_from_total_net = parseFloat(document.querySelector('#net_worth_input').value);
        if(isNaN(temp_less_from_total_net)===true){
          temp_less_from_total_net = 0;
        }
        let less_from_total_sum = temp_less_from_total_net-less_from_total;

        document.querySelector('#net_worth_text').innerHTML = less_from_total_sum;
        document.querySelector('#net_worth_input').value = less_from_total_sum;

      }
  </script>

  <script>
    // Seleret
    let seleret_last = 0;
    function seleret_func(){
      let seleret_value = parseFloat(document.querySelector('#seleret_val').value);
      if(isNaN(seleret_value) === true){
        seleret_value = 0
      }
      let seleret_net = parseFloat(document.querySelector('#net_worth_input').value);
      if(isNaN(seleret_net) === true){
        seleret_net = 0;
      }
      let seleret_sum = 0;
      if(seleret_last===0){
        seleret_sum = (seleret_net+seleret_value)-seleret_last;
        seleret_last = seleret_value;
      }else{
        seleret_sum = (seleret_net+seleret_value)-seleret_last;
        seleret_last = seleret_value;
      }
      document.querySelector('#net_worth_text').innerHTML = seleret_sum;
      document.querySelector('#net_worth_input').value = seleret_sum;
    }
    // Packling
    let packing_last = 0;
    function packing_func(){
      let packing_value = parseFloat(document.querySelector('#packing_val').value);
      if(isNaN(packing_value) === true){
        packing_value = 0
      }
      let packing_net = parseFloat(document.querySelector('#net_worth_input').value);
      if(isNaN(packing_net) === true){
        packing_net = 0;
      }
      let packing_sum = 0;
      if(packing_last===0){
        packing_sum = (packing_net+packing_value)-packing_last;
        packing_last = packing_value;
      }else{
        packing_sum = (packing_net+packing_value)-packing_last;
        packing_last = packing_value;
      }
      document.querySelector('#net_worth_text').innerHTML = packing_sum;
      document.querySelector('#net_worth_input').value = packing_sum;
    }
    // Coolie
    let coolie_last = 0;
    function coolie_func(){
      let coolie_value = parseFloat(document.querySelector('#coolie_val').value);
      if(isNaN(coolie_value) === true){
        coolie_value = 0
      }
      let coolie_net = parseFloat(document.querySelector('#net_worth_input').value);
      if(isNaN(coolie_net) === true){
        coolie_net = 0;
      }
      let coolie_sum = 0;
      if(coolie_last===0){
        coolie_sum = (coolie_net+coolie_value)-coolie_last;
        coolie_last = coolie_value;
      }else{
        coolie_sum = (coolie_net+coolie_value)-coolie_last;
        coolie_last = coolie_value;
      }
      document.querySelector('#net_worth_text').innerHTML = coolie_sum;
      document.querySelector('#net_worth_input').value = coolie_sum;
    }
    // Oth
    let oth_last = 0;
    function oth_func(){
      let oth_value = parseFloat(document.querySelector('#oth_val').value);
      if(isNaN(oth_value) === true){
        oth_value = 0
      }
      let oth_net = parseFloat(document.querySelector('#net_worth_input').value);
      if(isNaN(oth_net) === true){
        oth_net = 0;
      }
      let oth_sum = 0;
      if(oth_last===0){
        oth_sum = (oth_net+oth_value)-oth_last;
        oth_last = oth_value;
      }else{
        oth_sum = (oth_net+oth_value)-oth_last;
        oth_last = oth_value;
      }
      document.querySelector('#net_worth_text').innerHTML = oth_sum;
      document.querySelector('#net_worth_input').value = oth_sum;
    }
    // total add
    let total_add_last = 0;
    function total_add_func(){
      let total_add_value = parseFloat(document.querySelector('#total_add_val').value);
      if(isNaN(total_add_value) === true){
        total_add_value = 0
      }
      let total_add_net = parseFloat(document.querySelector('#net_worth_input').value);
      if(isNaN(total_add_net) === true){
        total_add_net = 0;
      }
      let total_add_sum = 0;
      if(total_add_last===0){
        total_add_sum = (total_add_net+total_add_value)-total_add_last;
        total_add_last = total_add_value;
      }else{
        total_add_sum = (total_add_net+total_add_value)-total_add_last;
        total_add_last = total_add_value;
      }
      document.querySelector('#net_worth_text').innerHTML = total_add_sum;
      document.querySelector('#net_worth_input').value = total_add_sum;
    }
    // total less
    let total_less_last = 0;
    function total_less_func(){
      let total_less_value = parseFloat(document.querySelector('#total_less_val').value);
      if(isNaN(total_less_value) === true){
        total_less_value = 0
      }
      let total_less_net = parseFloat(document.querySelector('#net_worth_input').value);
      if(isNaN(total_less_net) === true){
        total_less_net = 0;
      }
      let total_less_sum = 0;
      if(total_less_last===0){
        total_less_sum = (total_less_net-total_less_value)+total_less_last;
        total_less_last = total_less_value;
      }else{
        total_less_sum = (total_less_net-total_less_value)+total_less_last;
        total_less_last = total_less_value;
      }
      document.querySelector('#net_worth_text').innerHTML = total_less_sum;
      document.querySelector('#net_worth_input').value = total_less_sum;
    }


    document.addEventListener('keydown', function(e){
    if(e.altKey && e.keyCode == 190){
      e.preventDefault();
      $('#total_less_val').focus();
    }
    if(e.ctrlKey && e.keyCode == 190){
      e.preventDefault();
      $('#total_less_val').focus();
    }
  });
  </script>

  <script>
    $(document).on('click', '.delete-record', function(){
        $(this).closest('.input_table').remove();
    })
  </script>

  <script>
    function set_focus_to_name(){
      $('.n-i1').focus();

    }
  </script>

  <!-- TOAST MESSAGE -->

  <script>
  function launch_toast(message) {
    document.getElementById('desc').innerHTML = message;
    var x = document.getElementById("toast")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
}
</script>

<script>
  function cart_sum(){
    let cart_sum_qty = parseFloat(document.querySelector('#cart_qty').value);
    let cart_sum_rate = parseFloat(document.querySelector('#cart_rate').value);
    let cart_sum_total = parseFloat(document.querySelector('#cart_total').value);

    let cart_sum_value = cart_sum_qty*cart_sum_rate;
    document.querySelector('#cart_total').value = cart_sum_value;
  }
</script>

  <div id="toast" class="bg-danger"><div id="img">Error</div><div id="desc" class="text-light">Cart Is Empty</div></div>
<style>


/* pmmpa */
.ui-menu .ui-menu-item a {
  font-size: 12px;
}
.ui-autocomplete {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1051 !important;
  float: left;
  display: none;
  min-width: 160px;
  _width: 160px;
  padding: 4px 0;
  margin: 2px 0 0 0;
  list-style: none;
  background-color: #ffffff;
  border-color: #ccc;
  border-color: rgba(0, 0, 0, 0.2);
  border-style: solid;
  border-width: 1px;
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  border-radius: 2px;
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
  *border-right-width: 2px;
  *border-bottom-width: 2px;
}
.ui-menu-item > a.ui-corner-all {
    display: block;
    padding: 3px 15px;
    clear: both;
    font-weight: normal;
    line-height: 18px;
    color: #555555;
    text-decoration: none;
}
.ui-state-hover, .ui-state-active {
      color: #ffffff;
      text-decoration: none;
      background-color: #0088cc;
      border-radius: 0px;
      -webkit-border-radius: 0px;
      -moz-border-radius: 0px;
      background-image: none;
}
/* pampa */
  #toast {
    visibility: hidden;
    max-width: 50px;
    height: 50px;
    /*margin-left: -125px;*/
    margin: auto;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;

    position: fixed;
    z-index: 1;
    left: 0;right:0;
    bottom: 30px;
    font-size: 17px;
    white-space: nowrap;
}
#toast #img{
	width: 70px;
	height: 50px;
    
    float: left;
    
    padding-top: 16px;
    padding-bottom: 16px;
    
    box-sizing: border-box;

    
    background-color: red;
    color: #fff;
}
#toast #desc{

    
    color: #fff;
   
    padding: 16px;
    
    overflow: hidden;
	white-space: nowrap;
}

#toast.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes expand {
    from {min-width: 50px} 
    to {min-width: 350px}
}

@keyframes expand {
    from {min-width: 50px}
    to {min-width: 350px}
}
@-webkit-keyframes stay {
    from {min-width: 350px} 
    to {min-width: 350px}
}

@keyframes stay {
    from {min-width: 350px}
    to {min-width: 350px}
}
@-webkit-keyframes shrink {
    from {min-width: 350px;} 
    to {min-width: 50px;}
}

@keyframes shrink {
    from {min-width: 350px;} 
    to {min-width: 50px;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 60px; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 60px; opacity: 0;}
}
</style>


<script>
  
  $(() => {
        // function will get executed 
        // on click of submit button
        $("#submitButton").click(function(ev) {
          let check_barrier_one = document.querySelector('#name_val').value;

        if(check_barrier_one === ''){
          launch_toast("Please provide customer's name");
        }else if( $('#item').length ){
          var form = $("#MyForm");
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: "php/submit_form/insert.php",
                data: form.serialize(),
                success: function(data) {
                  console.log(data);
                  focusclick()
                },
                error: function(data) {
                    // Some error in ajax call
                    alert("some Error");
                }
            });
        }else{
          launch_toast('Cart Is Empty');
        }
        });
    });
</script>

<script>
  document.addEventListener('keyup', function(e){
    if(e.altKey && e.keyCode == 80){
      $('#submitButton').click();
    }
    if(e.ctrlKey && e.keyCode == 80){
      $('#submitButton').click();
    }
  });
</script>

<?php require('php/fast_search/fast.php') ?>

</body>
<!-- Body Ends -->

</html>
<!-- Html Ends -->










