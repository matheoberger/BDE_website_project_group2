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

/***/ "./resources/js/insertProduct.js":
/*!***************************************!*\
  !*** ./resources/js/insertProduct.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * La classe insertProduct regroupe les méthodes
 * permettant le chargement depuis l'API de nouveaux
 * articles en les inserant directement en Jquery
 * dans le fichier HTML boutique
 */
var insertProduct =
/*#__PURE__*/
function () {
  function insertProduct() {
    _classCallCheck(this, insertProduct);
  }

  _createClass(insertProduct, [{
    key: "newProduct",
    value: function newProduct(baseArticleNumber, articleNumber) {
      var _this = this;

      this.getProduct(baseArticleNumber, articleNumber).then(function (productList) {
        productList.forEach(_this.createProduct.bind(_this));
      });
      articleNumber += 3;
    }
  }, {
    key: "getProduct",
    value: function getProduct(baseArticleNumber, articleNumber) {
      console.log("getProduct");
      return new Promise(function (resolve) {
        $.get("http://localhost:3000/produits/".concat(baseArticleNumber, "/").concat(articleNumber), function (data, status) {
          resolve(data);
        });
      });
    }
  }, {
    key: "createProduct",
    value: function createProduct(product) {
      console.log(product);
      var productElement = "<div class=\"product\">\n        <a href=\"/article/".concat(product.id_products, "\"><img src=\"").concat(product.image, "\" class=\"product__image\"/></a>\n        <div class=\"product__title\">").concat(product.title, "</div>\n        <div class=\"product__price\"><b>").concat(product.price, "\u20AC</b></div>\n    </div>");
      this.loadProduct(productElement);
    }
  }, {
    key: "loadProduct",
    value: function loadProduct(productElement) {
      $("#js-productContainer").append(productElement);
    }
  }]);

  return insertProduct;
}();

$(document).ready(function () {
  var baseArticleNumber = 0;
  var numberArticleLoad = 3;
  var articleNumber = numberArticleLoad;
  var articleInc = numberArticleLoad;
  var coucou = new insertProduct();
  coucou.newProduct(baseArticleNumber, articleNumber);
  baseArticleNumber += articleInc;
  $(window).scroll(function () {
    console.log("scorl");

    if (Math.round($(window).scrollTop() + $(window).height()) == $(document).height()) {
      console.log(articleNumber);
      coucou.newProduct(baseArticleNumber, articleNumber);
      baseArticleNumber += articleInc;
    }
  });
});

/***/ }),

/***/ 2:
/*!*********************************************!*\
  !*** multi ./resources/js/insertProduct.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Multimedia\Desktop\EXIA\A2\Projet\WEB\BDE_website_project_group2\laravel\resources\js\insertProduct.js */"./resources/js/insertProduct.js");


/***/ })

/******/ });