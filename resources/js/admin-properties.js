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
        var html = "<input "+ checked +" type='radio' name='featured' value='"+f.name+"'><img class='img-preview' src=\"" + e.target.result + "\">" + f.name + "<br clear=\"left\"/>";
        selDiv.innerHTML += html;
      }
      reader.readAsDataURL(f);

      i < files.length; i++;
  });
}
