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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/filter.js":
/*!********************************!*\
  !*** ./resources/js/filter.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $(".state-check").each(function () {
    var townHide = $(".town-check[data-state='" + $(this).val() + "']");

    if ($(this).is(':checked')) {
      townHide.show();
    } else {
      townHide.hide().children("input").prop("checked", false);
    }
  });
  $(".state-check").click(function () {
    var townHide = $(".town-check[data-state='" + $(this).val() + "']");

    if ($(this).is(':checked')) {
      townHide.show().children("input").prop("disabled", false);
    } else {
      townHide.hide().children("input").prop("disabled", true);
    }
  });
  $('#iconified').on('keyup', function () {
    var input = $(this);

    if (input.val().length === 0) {
      input.addClass('empty');
    } else {
      input.removeClass('empty');
    }
  });
}); // $('.mobile-filter').click(function(){
//   $(this).addClass('hidden');
//   $('.col-filter').addClass('active');
// });

function collapseSection(element) {
  // get the height of the element's inner content, regardless of its actual size
  var sectionHeight = element.scrollHeight; // temporarily disable all css transitions

  var elementTransition = element.style.transition;
  element.style.transition = ''; // on the next frame (as soon as the previous style change has taken effect),
  // explicitly set the element's height to its current pixel height, so we
  // aren't transitioning out of 'auto'

  requestAnimationFrame(function () {
    element.style.height = sectionHeight + 'px';
    element.style.transition = elementTransition; // on the next frame (as soon as the previous style change has taken effect),
    // have the element transition to height: 0

    requestAnimationFrame(function () {
      element.style.height = 0 + 'px';
    });
  }); // mark the section as "currently collapsed"

  element.setAttribute('data-collapsed', 'true');
}

function expandSection(element) {
  // get the height of the element's inner content, regardless of its actual size
  var sectionHeight = element.scrollHeight; // have the element transition to the height of its inner content

  element.style.height = sectionHeight + 'px'; // when the next css transition finishes (which should be the one we just triggered)

  element.addEventListener('transitionend', function (e) {
    // remove this event listener so it only gets triggered once
    element.removeEventListener('transitionend', arguments.callee); // remove "height" from the element's inline styles, so it can return to its initial value

    element.style.height = null;
  }); // mark the section as "currently not collapsed"

  element.setAttribute('data-collapsed', 'true');
}

document.querySelector('.mobile-filter').addEventListener('click', function (e) {
  var section = document.querySelector('.col-filter');
  var isCollapsed = section.getAttribute('data-collapsed') === 'true';

  if (isCollapsed) {
    expandSection(section);
    section.setAttribute('data-collapsed', 'false');
  } else {
    collapseSection(section);
  }
});

/***/ }),

/***/ 2:
/*!**************************************!*\
  !*** multi ./resources/js/filter.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/ashortsleeves/laravel/property-management/resources/js/filter.js */"./resources/js/filter.js");


/***/ })

/******/ });