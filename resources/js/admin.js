$(document).ready(function(){
  var activator = $("h1.title").html();
  $(".menu-item:contains('"+ activator +"')").addClass("active");
  console.log(activator);
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

$("#state_id").change(function(){
  if($("#state_id option:selected").text() == "New State") {
    $('.form-newState').removeClass('form-hidden');
  } else {
    $('.form-newState').addClass('form-hidden');
  };
});
