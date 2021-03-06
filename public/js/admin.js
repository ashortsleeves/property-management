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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin.js":
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var activator = $("h1.title").html(); // var disabledStates = $('#state_new option').text() ==

  $(".menu-item:contains('" + activator + "')").addClass("active");
  var disabledStates = new Array();
  $('#state_id option').each(function () {
    disabledStates.push($(this).text());
  });
  $("#state_new option").each(function () {
    if (jQuery.inArray($(this).text(), disabledStates) !== -1) {
      $(this).attr("disabled", true);
    }

    ;
  });
});
$(".menu-item").click(function () {
  $(".menu-item.active").removeClass("active");
  $(this).addClass("active");
});
$("#town_id").change(function () {
  if ($("#town_id option:selected").text() == "New Town") {
    $('.form-newTown').removeClass('form-hidden');
  } else {
    $('.form-newTown').addClass('form-hidden');
  }

  ;
});
var selectedState = $("#state_id").children("option:selected").val();
$("#town_id option[data-state='" + selectedState + "']").addClass("town-show").attr("disabled", false);

if ($('#town_id option.town-selected').attr('data-state') !== selectedState) {
  $('option.town-selected').removeClass("town-show").attr("disabled", true).attr("selected", null);
}

;
$("#state_id").change(function () {
  var selectedState = $(this).children("option:selected").val();
  $("#town_id option.town").removeClass('town-show').attr("disabled", true);
  $("#town_id option[data-state='" + selectedState + "']").removeClass("town-show").attr("disabled", true).attr("selected", null);
  $("#town_id option.choose").attr("selected", true);

  if ($("#state_id option:selected").text() == "New State") {
    $('.form-newState').removeClass('form-hidden');
  } else {
    $('.form-newState').addClass('form-hidden');
    $("#town_id option[data-state='" + selectedState + "']").addClass("town-show").attr("disabled", false);
  }

  ;
});

/***/ }),

/***/ 1:
/*!*************************************!*\
  !*** multi ./resources/js/admin.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/ashortsleeves/laravel/property-management/resources/js/admin.js */"./resources/js/admin.js");


/***/ })

/******/ });