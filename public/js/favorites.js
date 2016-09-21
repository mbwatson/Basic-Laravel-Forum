/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.l = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };

/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
/******/ 	};

/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};

/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

"use strict";
eval("'use strict';\n\n$('a.favorite').click(function (evt) {\n\tevt.preventDefault();\n\tif ($(this).hasClass('text-muted')) {\n\t\t$(this).attr('title', 'Remove from Favorites').tooltip('fixTitle').tooltip('show');\n\t} else {\n\t\t$(this).attr('title', 'Add to Favorites').tooltip('fixTitle').tooltip('show');\n\t}\n\t$(this).toggleClass(\"text-muted text-danger\");\n\t// $(this).children('i').toggleClass(\"mdi-heart mdi-heart-outline\");\n\t$.ajax({\n\t\tmethod: 'get',\n\t\turl: $(this).attr('href')\n\t}).done(function (msg) {\n\t\tconsole.log(msg['message']);\n\t});\n});//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2Zhdm9yaXRlcy5qcz9mMTg3Il0sInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JztcblxuJCgnYS5mYXZvcml0ZScpLmNsaWNrKGZ1bmN0aW9uIChldnQpIHtcblx0ZXZ0LnByZXZlbnREZWZhdWx0KCk7XG5cdGlmICgkKHRoaXMpLmhhc0NsYXNzKCd0ZXh0LW11dGVkJykpIHtcblx0XHQkKHRoaXMpLmF0dHIoJ3RpdGxlJywgJ1JlbW92ZSBmcm9tIEZhdm9yaXRlcycpLnRvb2x0aXAoJ2ZpeFRpdGxlJykudG9vbHRpcCgnc2hvdycpO1xuXHR9IGVsc2Uge1xuXHRcdCQodGhpcykuYXR0cigndGl0bGUnLCAnQWRkIHRvIEZhdm9yaXRlcycpLnRvb2x0aXAoJ2ZpeFRpdGxlJykudG9vbHRpcCgnc2hvdycpO1xuXHR9XG5cdCQodGhpcykudG9nZ2xlQ2xhc3MoXCJ0ZXh0LW11dGVkIHRleHQtZGFuZ2VyXCIpO1xuXHQvLyAkKHRoaXMpLmNoaWxkcmVuKCdpJykudG9nZ2xlQ2xhc3MoXCJtZGktaGVhcnQgbWRpLWhlYXJ0LW91dGxpbmVcIik7XG5cdCQuYWpheCh7XG5cdFx0bWV0aG9kOiAnZ2V0Jyxcblx0XHR1cmw6ICQodGhpcykuYXR0cignaHJlZicpXG5cdH0pLmRvbmUoZnVuY3Rpb24gKG1zZykge1xuXHRcdGNvbnNvbGUubG9nKG1zZ1snbWVzc2FnZSddKTtcblx0fSk7XG59KTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9mYXZvcml0ZXMuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTsiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }
/******/ ]);