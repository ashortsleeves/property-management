$(document).ready(function(){
  $(".state-check").each(function(){
        var townHide = $(".town-check[data-state='"+$(this).val()+"']");
    if ($(this).is(':checked')){
      townHide.show();
    } else {
      townHide.hide().children( "input" ).prop("checked", false);
    }
  });
  
  $(".state-check").click(function(){
    var townHide = $(".town-check[data-state='"+$(this).val()+"']");

    if ($(this).is(':checked')){
      townHide.show().children( "input" ).prop("disabled", false);
    } else {
      townHide.hide().children( "input" ).prop("disabled", true);
    }
  });
});
