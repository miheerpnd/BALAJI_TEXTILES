$(function() {
  $("#name_val").autocomplete({
    source: "php/autofill/name.php",
    minLength: 1,
    // select: function(event, ui) {
    //   $("#pp").val(ui.item.desp);
    //   return false;
    // }
  })
  .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
    return $( "<li>" )
    .append( '<li>'+item.label+'</li>')
    .appendTo( ul );
 };
});



$(function() {
  $("#mob_val").autocomplete({
    source: "php/autofill/mobile.php",
    minLength: 1,
    select: function(event, ui) {
      if(ui.item.name === ""){

      }else{
        $("#name_val").val(ui.item.name);
      }
      if(ui.item.add === ""){

      }else{
        $("#address_val").val(ui.item.add);
      }
      return false;
    }
  })
  .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
    return $( "<li>" )
    .append( '<li>+91 '+item.label+'</li>')
    .appendTo( ul );
 };
});


$(function() {
  $("#address_val").autocomplete({
    source: "php/autofill/address.php",
    minLength: 1,
    // select: function(event, ui) {
    //   $("#pp").val(ui.item.desp);
    //   return false;
    // }
  })
  .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
    return $( "<li>" )
    .append( '<li>'+item.label+'</li>')
    .appendTo( ul );
 };
});


$(function() {
  $("#cart_item").autocomplete({
    source: "php/autofill/item_name.php",
    minLength: 1,
    // select: function(event, ui) {
    //   $("#pp").val(ui.item.desp);
    //   return false;
    // }
  })
  .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
    return $( "<li>" )
    .append( '<li">'+item.label+'</li>')
    .appendTo( ul );
 };
});



