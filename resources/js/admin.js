$(document).ready(function(){
  var activator = $("h1.title").html();

  // var disabledStates = $('#state_new option').text() ==
  $(".menu-item:contains('"+ activator +"')").addClass("active");

  var disabledStates = new Array();

  $('#state_id option').each(function() {
    disabledStates.push($(this).text());
  });

  $( "#state_new option" ).each(function() {
    if(jQuery.inArray( $(this).text(), disabledStates) !== -1) {
      $(this).attr("disabled", true);
    };
  });
});

$(".menu-item").click(function(){
  $(".menu-item.active").removeClass("active");
  $(this).addClass("active");
});


$("#town_id").change(function(){
  if($("#town_id option:selected").text() == "New Town") {
    $('.form-newTown').removeClass('form-hidden');
  } else {
    $('.form-newTown').addClass('form-hidden');
  };
});

var selectedState = $("#state_id").children("option:selected").val();
$("#town_id option[data-state='"+selectedState+"']").addClass("town-show").attr("disabled", false);

if($('#town_id option.town-selected').attr('data-state') !== selectedState) {
  $('option.town-selected').removeClass("town-show").attr("disabled", true).attr("selected", null);
};

$("#state_id").change(function(){
  var selectedState = $(this).children("option:selected").val();
  $("#town_id option.town").removeClass('town-show').attr("disabled", true);

  $("#town_id option[data-state='"+selectedState+"']").removeClass("town-show").attr("disabled", true).attr("selected", null);

  $("#town_id option.choose").attr("selected", true);


  if($("#state_id option:selected").text() == "New State") {
    $('.form-newState').removeClass('form-hidden');
  } else {
    $('.form-newState').addClass('form-hidden');
    $("#town_id option[data-state='"+selectedState+"']").addClass("town-show").attr("disabled", false);
  };
});
