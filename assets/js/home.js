document.addEventListener("keydown", function (e) {
  if (e.ctrlKey && e.keyCode == 71) {
    e.preventDefault();
    $('#dropdownMenuButton1').click();
  }
  if (e.altKey && e.keyCode == 71) {
    e.preventDefault();
    $('#dropdownMenuButton1').click();
  }
});

document.addEventListener("keydown", function (e) {
  if (e.ctrlKey && e.keyCode == 72) {
    e.preventDefault();
    window.location.href = 'home.php';
  }
  if (e.altKey && e.keyCode == 72) {
    e.preventDefault();
    window.location.href = 'home.php';
  }
});

document.addEventListener("keydown", function (e) {
  if (e.ctrlKey && e.keyCode == 66) {
    e.preventDefault();
    window.location.href = 'buy.php';
  }
  if (e.altKey && e.keyCode == 66) {
    e.preventDefault();
    window.location.href = 'buy.php';
  }
});

document.addEventListener("keydown", function (e) {
  if (e.ctrlKey && e.keyCode == 83) {
    e.preventDefault();
    window.location.href = 'sell.php';
  }
  if (e.altKey && e.keyCode == 83) {
    e.preventDefault();
    window.location.href = 'sell.php';
  }
});


document.addEventListener("keydown", function (e) {
  if (e.ctrlKey && e.keyCode == 76) {
    e.preventDefault();
    window.location.href = 'item.php';
  }
  if (e.altKey && e.keyCode == 76) {
    e.preventDefault();
    window.location.href = 'item.php';
  }
});

function focusclick(){
  $('.print_recent_btn').click();
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("print_body").innerHTML = this.responseText;
    }
  xhttp.open("GET", "php/load_print/print.php");
  xhttp.send();
}


document.addEventListener("keydown", function (e) {
if (e.ctrlKey && e.keyCode == 82) {
  e.preventDefault();
  setTimeout( function() { focusclick(); }, 200);
}
if (e.altKey && e.keyCode == 82) {
  e.preventDefault();
  setTimeout( function() { focusclick(); }, 200);
}
});

document.addEventListener("keydown", function (e) {
  if (e.ctrlKey && e.keyCode == 80) {
    e.preventDefault();
    if($('#print_chk_inp').length){
      printContent('print');
    } 
  }
  if (e.altKey && e.keyCode == 80) {
    e.preventDefault();
    if($('#print_chk_inp').length){
      printContent('print');
    } 
  }
});
