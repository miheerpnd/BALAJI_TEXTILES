<!-- The Modal -->
<div id="myModal" class="myModal">
  <!-- Modal content -->
  <div class="myModal-content">
    <!-- Modal items -->
    <div class="row m-auto">
        <div class="col">
            <select name="" id="quick_find_select" class="form-select">
            <option value="c_name">By Customer Name</option>
            <option value="c_mob">By phone number</option>
                <option value="id">By Bill No.</option>
            </select>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="find invoice" onkeyup="hiegher_fast_search()" id="quick_find_inout" autocomplete="off">
        </div>
    </div>
    <hr>
    <div class="row m-auto overflow-auto">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Customer</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">Net_worth</th>
                    <th class="text-center">Print</th>
                </tr>
            </thead>
            <tbody id="fast_results_fetch">
                
            </tbody>
        </table>
    </div>
  </div>

</div>

<script>
function initialsearch(){
    let xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("fast_results_fetch").innerHTML = this.responseText;
    }
  xhttp.open("GET", "php/fast_search/search.php?method=false");
  xhttp.send();
}

function hiegher_fast_search(){
  let key_fast_search = document.querySelector('#quick_find_select').value;
  let value_fast_search = document.querySelector('#quick_find_inout').value;

  let xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("fast_results_fetch").innerHTML = this.responseText;
    }
  xhttp.open("GET", "php/fast_search/search.php?method=true&key="+key_fast_search+'&val='+value_fast_search);
  xhttp.send();
}

 function printquickanyhow(id){
    $('.print_recent_btn').click();
  let xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("print_body").innerHTML = this.responseText;
    }
  xhttp.open("GET", "php/load_print/print.php?id="+id);
  xhttp.send();
}

</script>





<script>
    
document.addEventListener("keydown", function (e) {
  if(e.ctrlKey && e.keyCode == 70){
    e.preventDefault();
    var myModal = document.getElementById("myModal");
    if(myModal.style.display == "block"){
        myModal.style.display = "none";
    }else{
        initialsearch()
        myModal.style.display = "block";
        setTimeout( function() { quick_find_inout_focus(); }, 200);
    }
  }
  if(e.altKey && e.keyCode == 70){
    e.preventDefault();
    var myModal = document.getElementById("myModal");
    if(myModal.style.display == "block"){
        myModal.style.display = "none";
    }else{
        initialsearch()
        myModal.style.display = "block";
        setTimeout( function() { quick_find_inout_focus(); }, 200);
    }
  }
});

function quick_find_inout_focus(){
    $('#quick_find_inout').focus();
}


    var myModal = document.getElementById("myModal");
    // When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == myModal) {
    myModal.style.display = "none";
  }
}
</script>

<style>
    /* The Modal (background) */
.myModal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 100; /* Sit on top */
  padding-top: 70px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100vw; /* Full width */
  height: 100vh; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.3); /* Black w/ opacity */
    
}

/* Modal Content */
.myModal-content{
  position: absolute;
  background-color: #fefefe;
  padding: 12px;
  right: 20px;
  border: 1px solid #888;
  width: auto;
  border: 2px solid black;
  border-radius: 7px;
}
 
</style>
