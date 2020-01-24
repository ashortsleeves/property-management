/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin-properties.js":
/*!******************************************!*\
  !*** ./resources/js/admin-properties.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

document.addEventListener("DOMContentLoaded", init, false);
var selDiv = "";

function init() {
  document.querySelector('#media').addEventListener('change', handleFileSelect, false);
  selDiv = document.querySelector("#selectedFiles");
}

function handleFileSelect(e) {
  if (!e.target.files || !window.FileReader) return;
  selDiv.innerHTML = "";
  var files = e.target.files;
  var filesArr = Array.prototype.slice.call(files);
  var i = 0;
  filesArr.forEach(function (f) {
    var f = files[i];

    if (!f.type.match("image.*")) {
      return;
    }

    var checked = "";

    if (i == 0) {
      var checked = "checked='checked'";
    }

    var reader = new FileReader();

    reader.onload = function (e) {
      var html = "<div class='img-wrap' style='background-image: url(" + e.target.result + ")'><input " + checked + " type='radio' name='featured' value='" + f.name + "'></div>";
      selDiv.innerHTML += html;
    };

    reader.readAsDataURL(f);
    i < files.length;
    i++;
  });
} // var selDiv = "";
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

/***/ }),

/***/ 3:
/*!************************************************!*\
  !*** multi ./resources/js/admin-properties.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/ashortsleeves/laravel/property-management/resources/js/admin-properties.js */"./resources/js/admin-properties.js");


/***/ })

/******/ });