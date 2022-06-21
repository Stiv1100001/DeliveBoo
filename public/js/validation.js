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

/***/ "./resources/js/validation.js":
/*!************************************!*\
  !*** ./resources/js/validation.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function checkLength(string) {
  var length = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 1;
  var max = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;

  if (max) {
    return string.length === length;
  } else {
    return string.length >= length;
  }
}

var btnSubmitRegister = document.getElementById("btn-submit-register");
var btnSubmitDishCreate = document.getElementById("btn-submit-dish-create");
var btnSubmitDishEdit = document.getElementById("btn-submit-dish-edit");

if (btnSubmitRegister) {
  btnSubmitRegister.addEventListener("click", function (event) {
    event.preventDefault();
    var form = document.getElementById("form");
    var errorDiv = document.getElementById("error");
    var errorMessage = document.getElementById("error-message");
    errorDiv.classList.add("d-none");
    errorMessage.innerHTML = "";
    var inputs = form.elements;
    var errors = [];

    if (!checkLength(inputs.name_restaurant.value.trim())) {
      errors.push("Il nome del ristorante è obbligatorio");
    }

    if (!inputs.email.value.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
      errors.push("La mail è obbligatoria e deve essere una mail corretta");
    }

    if (!checkLength(inputs.password.value.trim(), 8)) {
      errors.push("La password è obbligatorio e deve essere almeno 8 caratteri");
    }

    if (!checkLength(inputs.password_confirmation.value.trim(), 8)) {
      errors.push("La password va confermata");
    }

    if (inputs.password.value.trim() !== inputs.password_confirmation.value.trim()) {
      errors.push("Le password devono corrispondere");
    }

    if (!checkLength(inputs.address.value.trim())) {
      errors.push("L'indirizzo è obbligatorio");
    }

    if (!checkLength(inputs.vat_number.value.trim(), 11, true)) {
      errors.push("La Partita Iva è obbligatoria e di 11 caratteri");
    }

    if (inputs.image_url.value == "") {
      errors.push("Devi caricare una immagine per il tuo ristorante");
    }

    var checkboxes = document.querySelectorAll('input[type="checkbox"]');

    if (!Array.prototype.slice.call(checkboxes).some(function (x) {
      return x.checked;
    })) {
      errors.push("Almeno una tipologia deve essere selezionata");
    }

    if (errors.length) {
      errorMessage.innerHTML += "<ul>";
      errors.forEach(function (e) {
        errorMessage.innerHTML += "<li>".concat(e, "</li>");
      });
      errorMessage.innerHTML += "</ul>";
      errorDiv.classList.remove("d-none");
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    } else {
      form.submit();
    }
  });
}

if (btnSubmitDishCreate) {
  btnSubmitDishCreate.addEventListener("click", function (event) {
    event.preventDefault();
    var form = document.getElementById("form");
    var errorDiv = document.getElementById("error");
    var errorMessage = document.getElementById("error-message");
    errorDiv.classList.add("d-none");
    errorMessage.innerHTML = "";
    var inputs = form.elements;
    var errors = [];

    if (!checkLength(inputs.name.value.trim())) {
      errors.push("Il nome è obbligatorio");
    }

    if (!inputs.price.value || isNaN(inputs.price.value) || parseFloat(inputs.price.value) < 0) {
      errors.push("Il prezzo è obbligatorio e deve esere positivo");
    }

    if (errors.length) {
      errorMessage.innerHTML += "<ul>";
      errors.forEach(function (e) {
        errorMessage.innerHTML += "<li>".concat(e, "</li>");
      });
      errorMessage.innerHTML += "</ul>";
      errorDiv.classList.remove("d-none");
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    } else {
      form.submit();
    }
  });
}

if (btnSubmitDishEdit) {
  btnSubmitDishEdit.addEventListener("click", function (event) {
    event.preventDefault();
    var form = document.getElementById("form");
    var errorDiv = document.getElementById("error");
    var errorMessage = document.getElementById("error-message");
    errorDiv.classList.add("d-none");
    errorMessage.innerHTML = "";
    var inputs = form.elements;
    var errors = [];

    if (!checkLength(inputs.name.value.trim())) {
      errors.push("Il nome è obbligatorio");
    }

    if (!inputs.price.value || isNaN(inputs.price.value) || parseFloat(inputs.price.value) < 0) {
      errors.push("Il prezzo è obbligatorio");
    }

    if (errors.length) {
      errorMessage.innerHTML += "<ul>";
      errors.forEach(function (e) {
        errorMessage.innerHTML += "<li>".concat(e, "</li>");
      });
      errorMessage.innerHTML += "</ul>";
      errorDiv.classList.remove("d-none");
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    } else {
      form.submit();
    }
  });
}

/***/ }),

/***/ 2:
/*!******************************************!*\
  !*** multi ./resources/js/validation.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\esercizi boolean\DeliveBoo\resources\js\validation.js */"./resources/js/validation.js");


/***/ })

/******/ });