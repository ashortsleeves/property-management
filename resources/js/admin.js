$(document).ready(function(){
  var activator = $("h1.title").html();
  $(".menu-item:contains('"+ activator +"')").addClass("active");
});

$(".menu-item").click(function(){
  $(".menu-item.active").removeClass("active");
  $(this).addClass("active");
});




console.log(activator);
