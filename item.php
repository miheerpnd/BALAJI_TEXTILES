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
      -webkit-box-shadow: inset 0 0 0px #000;
      -moz-box-shadow: inset 0 0 0px #000;
      box-shadow: inset 0 0 0px #000;
    }

    .style11 select:focus {
      -webkit-box-shadow: inset 0 0 0px #000;
      -moz-box-shadow: inset 0 0 0px #000;
      box-shadow: inset 0 0 0px #000;
    }
  </style>
</head>
<!-- Body Starts -->

<body class="bg-light">
  <?php require('includes/header.php'); ?>


  <div class="row ui raised segment mt-4" style="width: 95%; margin: auto;">
    <!-- Filter -->
    <div style="display: flex; justify-content: right; align-items: center;">
      <div class="btn-group" style="text-align: right;">
        <button class="btn-blue" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Filter"><i class="bi bi-funnel"></i> Filter Search</button>
        <form class="dropdown-menu p-3" style="width: 50vw;" class="needs-validation" id="MyFormy" action="javascript:void(0)" onsubmit="submitok()" autocomplete="off" novalidate>
          <h3>Search Filter</h3>
          <hr>
          <div class="row">
            <div class="col">
              <label for="">Customer</label>&nbsp;<input type="checkbox" id="forC" onclick="for_C()">
              <input type="text" class="input-meterial form-control" onkeydown="Check_Filter()" onkeyup="Check_Filter()" id="customer_forC" name="customer" style="width: 100%;" value="ALL" placeholder="Search here" readOnly required>
              <br>
              <label for="">Select Range</label>
              <div class="style11">
                <select name="range" id="range" class="input-meterial form-select">
                  <option value="month">This Month</option>
                  <option value="day">Today</option>
                  <option value="week">This Week</option>
                  <option value="year">This Year</option>
                </select>
              </div>
              <br>
              <label for="">Transaction type</label>
              <div class="style11">
                <select name="mode" id="mode" class="input-meterial form-select">
                  <option value="ANY">ANY</option>
                  <option value="SELL">SELL</option>
                  <option value="BUY">PURCHASE</option>
                </select>
              </div>
            </div>
            <div class="col">
              <label for="">Item</label>&nbsp;<input type="checkbox" id="forI" onclick="for_I()">
              <input type="text" class="input-meterial form-control" onkeydown="Check_Filter1()" onkeyup="Check_Filter1()" id="item_forI" name="item" style="width: 100%;" value="ALL" placeholder="Search here" readOnly required>
              <br>
              <label for="">Custom Range</label>&nbsp;<input type="checkbox" id="forR" onclick="for_R()">
              <input type="month" class="input-meterial form-control" onchange="Check_Filter2()" onkeydown="Check_Filter2()" onkeyup="Check_Filter2()" id="range_forR" name="rangeC" style="width: 100%;" readOnly required>
              <br>
              <br>
              <input type="hidden" id="lim_a" name="lim_a">
              <input type="hidden" id="lim_b" name="lim_b">
              <div id="sub_div" class="text-center"><button class="btn bg-gradient btn-primary" style="width: 100%;" id="submitButtony">Apply & search</button></div>
            </div>
          </div>
        </form>
      </div>
      <div class="dropdown ms-2">
        <button class="btn-yellow" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Export"><i class="bi bi-folder-symlink"></i></button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-title">
              <h5 class="text-dark ms-2">Export As</h5>
            </a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript:excel()">Excel Format</a></li>
        </ul>
      </div>
    </div>
    <br>
    <!-- Filter -->
    <div class="row mt-3 m-auto overflow-auto">
<div class="row m-0 ps-3 pe-3" style="overflow: scoll;">
<table class="table table-striped table-bordered rounded" style="overflow: hidden;">
  <thead>
    <tr>
      <th class="bg-secondary text-light text-center">SN.</th>
      <th class="bg-secondary text-light text-center">Date</th>
      <th class="bg-secondary text-light text-center">Time</th>
      <th class="bg-secondary text-light text-center">Trans.</th>
      <th class="bg-secondary text-light text-center">Customer</th>
      <th class="bg-secondary text-light text-center">Ph. no.</th>
      <th class="bg-secondary text-light text-center">Address</th>
      <th class="bg-secondary text-light text-center">Net worth</th>
      <th class="bg-secondary text-light text-center">Action</th>
      <th class="bg-secondary text-light text-center">View</th>
    </tr>
  </thead>
  <tbody id="data_were">

  </tbody>
</table>
</div>
    </div>
    <!-- # -->


    <!-- This is last -->
  </div>

  <?php require('php/fast_search/fast.php') ?>
  <script>
    function excel(){
      let customer = document.getElementById('customer_forC').value;
      let range = document.getElementById('range').value;
      let mode = document.getElementById('mode').value;
      let item = document.getElementById('item_forI').value;
      let rangeC = document.getElementById('range_forR').value;
      window.location.replace('excel.php?customer='+customer+"&range="+range+"&mode="+mode+"&item="+item+"&rangeC="+rangeC);
    }

    window.onload = function(){
      $('#submitButtony').click();
    }
    function for_C() {
      if (document.getElementById('forC').checked == true) {
        document.getElementById('customer_forC').readOnly = false;
        document.getElementById('customer_forC').value = "";
        document.querySelector('#sub_div').innerHTML = '<div class="alert alert-danger p-2" role="alert">Invalid filter parameters</div>';
      } else {
        document.getElementById('customer_forC').readOnly = true;
        document.getElementById('customer_forC').value = "ALL";
        document.querySelector('#sub_div').innerHTML = '<button class="btn bg-gradient btn-primary" style="width: 100%;" id="submitButtony">Apply & search</button>';
      }
    }

    function for_I() {
      if (document.getElementById('forI').checked == true) {
        document.getElementById('item_forI').readOnly = false;
        document.getElementById('item_forI').value = "";
        document.querySelector('#sub_div').innerHTML = '<div class="alert alert-danger p-2" role="alert">Invalid filter parameters</div>';
      } else {
        document.getElementById('item_forI').readOnly = true;
        document.getElementById('item_forI').value = "ALL";
        document.querySelector('#sub_div').innerHTML = '<button class="btn bg-gradient btn-primary" style="width: 100%;" id="submitButtony">Apply & search</button>';
      }
    }

    function for_R() {
      if (document.getElementById('forR').checked == true) {
        document.getElementById('range_forR').readOnly = false;
        document.getElementById('range_forR').value = "";
        document.querySelector('#sub_div').innerHTML = '<div class="alert alert-danger p-2" role="alert">Invalid filter parameters</div>';
      } else {
        document.getElementById('range_forR').readOnly = true;
        document.getElementById('range_forR').value = "ALL";
        document.querySelector('#sub_div').innerHTML = '<button class="btn bg-gradient btn-primary" style="width: 100%;" id="submitButtony">Apply & search</button>';
      }
    }



    function Check_Filter() {
      document.querySelector('#sub_div').innerHTML = '<div class="spinner-grow" role="status">  <span class="visually-hidden">Loading...</span></div>';
      if (document.querySelector('#customer_forC').value === "" || document.querySelector('#customer_forC').value === null) {
        document.querySelector('#sub_div').innerHTML = '<div class="alert alert-danger p-2" role="alert">Invalid filter parameters</div>';
      } else {
        document.querySelector('#sub_div').innerHTML = '<div class="spinner-grow" role="status">  <span class="visually-hidden">Loading...</span></div>';
        let xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          if (this.responseText === 'true') {
            document.querySelector('#sub_div').innerHTML = '<button class="btn bg-gradient btn-primary" style="width: 100%;" id="submitButtony">Apply & search</button>';
          } else {
            document.querySelector('#sub_div').innerHTML = '<div class="alert alert-danger p-2" role="alert">Invalid filter parameters</div>';
          }
        }
        xhttp.open("GET", "php/item_validation/phone.php?data=" + document.querySelector('#customer_forC').value);
        xhttp.send();
      }
    }

    function Check_Filter1() {
      if (document.querySelector('#item_forI').value === "" || document.querySelector('#customer_forC').value === null) {
        document.querySelector('#sub_div').innerHTML = '<div class="alert alert-danger p-2" role="alert">Invalid filter parameters</div>';
      } else {
        document.querySelector('#sub_div').innerHTML = '<div class="spinner-grow" role="status">  <span class="visually-hidden">Loading...</span></div>';
        let xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          if (this.responseText === 'true') {
            document.querySelector('#sub_div').innerHTML = '<button class="btn bg-gradient btn-primary" style="width: 100%;" id="submitButtony">Apply & search</button>';
          } else {
            document.querySelector('#sub_div').innerHTML = '<div class="alert alert-danger p-2" role="alert">Invalid filter parameters</div>';
          }
        }
        xhttp.open("GET", "php/item_validation/item.php?data=" + document.querySelector('#item_forI').value);
        xhttp.send();
      }
    }

    function Check_Filter2() {
      document.querySelector('#sub_div').innerHTML = '<div class="spinner-grow" role="status">  <span class="visually-hidden">Loading...</span></div>';
      if (document.querySelector('#range_forR').value === "" || document.querySelector('#customer_forC').value === null) {
        document.querySelector('#sub_div').innerHTML = '<div class="alert alert-danger p-2" role="alert">Invalid filter parameters</div>';
      } else {
        document.querySelector('#sub_div').innerHTML = '<button class="btn bg-gradient btn-primary" style="width: 100%;" id="submitButtony">Apply & search</button>';
      }
    }

    function loadmoreat(new_lim_a){
      document.getElementById('lim_a').value = new_lim_a;
      document.getElementById('lim_b').value = 50;
      var form = $("#MyFormy");
      var url = form.attr('action');
      $.ajax({
        type: "POST",
        url: "php/search_report/search.php",
        data: form.serialize(),
        success: function(data) {
          $('#data_were').append(data);
        },
        error: function(data) {
          // Some error in ajax call
          alert("Something is wrong");
        }
      });
    }

    function submitok() {
      document.getElementById('lim_a').value = 0;
      document.getElementById('lim_b').value = 50;
      var form = $("#MyFormy");
      var url = form.attr('action');
      $.ajax({
        type: "POST",
        url: "php/search_report/search.php",
        data: form.serialize(),
        success: function(data) {
          document.getElementById('data_were').innerHTML = data;
        },
        error: function(data) {
          // Some error in ajax call
          alert("Something is wrong");
        }
      });
    }

    $(function() {
      $("#customer_forC").autocomplete({
          source: "php/autofill/mobile.php",
          minLength: 1
        })
        .data("ui-autocomplete")._renderItem = function(ul, item) {
          return $("<li>")
            .append('<li>+91 ' + item.label + '</li>')
            .appendTo(ul);
        };
    });

    $(function() {
      $("#item_forI").autocomplete({
          source: "php/autofill/item_name.php",
          minLength: 1
        })
        .data("ui-autocomplete")._renderItem = function(ul, item) {
          return $("<li>")
            .append('<li">' + item.label + '</li>')
            .appendTo(ul);
        };
    });

    function cancel(id){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    if(this.responseText === 'true'){
      
    }else{

    }
    }
    xhttp.open("GET", "php/cancel/cancel.php?id="+id);
    xhttp.send();
    }

    $(document).on('click', '.delete-recor', function(){
        $(this).closest('.input_tabl').remove();
    })

    $(document).on('click', '.remove_load', function(){
        $(this).closest('.input_tabl').remove();
    })
  </script>
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

    .ui-menu-item>a.ui-corner-all {
      display: block;
      padding: 3px 15px;
      clear: both;
      font-weight: normal;
      line-height: 18px;
      color: #555555;
      text-decoration: none;
    }

    .ui-state-hover,
    .ui-state-active {
      color: #ffffff;
      text-decoration: none;
      background-color: #0088cc;
      border-radius: 0px;
      -webkit-border-radius: 0px;
      -moz-border-radius: 0px;
      background-image: none;
    }
  </style>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>
</body>
<!-- Body Ends -->

</html>
<!-- Html Ends -->