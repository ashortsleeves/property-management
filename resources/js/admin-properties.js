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
        var html = "<div class='img-wrap' style='background-image: url(" + e.target.result + ")'><input "+ checked +" type='radio' name='featured' value='"+f.name+"'></div>";
        selDiv.innerHTML += html;
      }
      reader.readAsDataURL(f);

      i < files.length; i++;
  });
}

// var selDiv = "";
// var storedFiles = [];
//
// document.addEventListener("DOMContentLoaded", init, false);
//
// function init() {
//   document.querySelector('#media').addEventListener('change', handleFileSelect, false);
//   selDiv = document.querySelector("#selectedFiles");
// 	document.querySelector('#propertyForm').addEventListener('submit', handleForm, false);
// }
//
// function handleFileSelect(e) {
//
//   // if(!e.target.files || !window.FileReader) return;
//   //
//   // selDiv.innerHTML = "";
//
//   var files = e.target.files;
//   var filesArr = Array.prototype.slice.call(files);
//   var x=0;
//
//   filesArr.forEach(function(f) {
//
//       // var f = files[x];
//
//       if(!f.type.match("image.*")) {
//         return;
//       }
//       storedFiles.push(f);
//
//       var checked = "";
//
//       if(x == 0) {
//         var checked = "checked='checked'";
//       }
//
//
//       var reader = new FileReader();
//
//       reader.onload = function (e) {
//         var html = "<div class='img-wrap' style='background-image: url(" + e.target.result + ")'><input "+ checked +" type='radio' name='featured' value='"+f.name+"'></div>";
//         selDiv.innerHTML += html;
//       }
//
//       reader.readAsDataURL(f);
//
//       x < files.length; x++;
//   });
// }
//
// function handleForm(e) {
//   e.preventDefault();
//   var data = new FormData();
//
//   for(var i=0, len=storedFiles.length; i<len; i++) {
//     data.append('media[]', storedFiles[i]);
//   }
//
//   var xhr = new XMLHttpRequest();
//   xhr.open('POST', 'handler.cfm', true);
//
//   xhr.onload = function(e) {
//     if(this.status == 200) {
//       console.log(e.currentTarget.responseText);
//       alert(e.currentTarget.responseText + ' items uploaded.');
//     }
//   }
//
//   xhr.send(data);
// }
