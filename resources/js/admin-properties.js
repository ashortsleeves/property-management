document.addEventListener("DOMContentLoaded", init, false);
var selDiv = "";
function init() {
  document.querySelector('#media').addEventListener('change', handleFileSelect, false);
  selDiv = document.querySelector("#selectedFiles");
}

function handleFileSelect(e) {

  if(!e.target.files || !window.FileReader) return;

  selDiv.innerHTML = "";

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
        var html = "<div class='img-wrap'><input "+ checked +" type='radio' name='featured' value='"+f.name+"'><img class='img-preview' src=\"" + e.target.result + "\"><a class='beleted' href='#'><i class='fas fa-times-circle'></i></a></div><br clear=\"left\"/>"+ f.name;
        selDiv.innerHTML += html;
      }
      reader.readAsDataURL(f);

      i < files.length; i++;
  });
}
