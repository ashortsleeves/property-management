function handleFileSelect(e) {

  if(!e.target.files || !window.FileReader) return;

  var files = e.target.files;
  var filesArr = Array.prototype.slice.call(files);
  var i=0;
  filesArr.forEach(function(f) {

      var f = files[i];

      if(!f.type.match("image.*")) {
        return;
      }

      var checked = "";

      if(i == 0) {
        var checked = "checked='checked'";
      }

      var reader = new FileReader();
      reader.onload = function (e) {
        var html = "<div class='img-wrap' style='background-image: url(" + e.target.result + ")'><input "+ checked +" type='radio' name='featured' value='"+f.name+"'></div>";
        $('#selectedFiles').append(html);
      }
      reader.readAsDataURL(f);

      i < files.length; i++;
  });
}

$('.form-group-media').on('click', '.media', function(){

  $('.form-group-media').prepend('<a class="btn btn-file" href="#">Add More Images<input name="media[]" type="file" class="media" multiple></a>');
  $(this).parent().addClass('form-hidden');
  $(this).change(handleFileSelect);

});
