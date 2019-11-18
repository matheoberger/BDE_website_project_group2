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

/***/ "./resources/js/insertDataToEvent.js":
/*!*******************************************!*\
  !*** ./resources/js/insertDataToEvent.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

console.debug("Element from : insertDataToEvent.js");
var gallery = document.getElementById("js-picture-gallery");
/**
 * La classe insertImage regroupe les méthodes
 * permettant le chargement depuis l'API de nouvelles
 * images en les inserant directement en Jquery
 * dans le fichier HTML event
 */

var Image =
/*#__PURE__*/
function () {
  function Image(_ref, button) {
    var _this = this;

    var url = _ref.url,
        comments = _ref.comments,
        nbrlike = _ref.nbrlike,
        id_pictures = _ref.id_pictures;

    _classCallCheck(this, Image);

    this.id_pictures = id_pictures;
    this.closed = false;
    /** L'insertion dynamique des éléments HTML
     *  Chaque pages est chargé avec un id qui lui est propre lié à ses éléments
     */

    this.divs = "<article>\n            <section>\n            <div class=\"public_img\">\n\n        <img src=\"/".concat(url, "\" alt=\"party\">\n        <form action='/report/").concat(this.id_pictures, "' methode=\"get\">\n        <button type=\"submit\" class=\"btn add_comment\">Signalez</button></form>\n            </section>\n            <aside>\n        <p>Likes : <p id=\"js-number-likes-").concat(this.id_pictures, "\">").concat(nbrlike, "</p></p>\n\n\n        ").concat(button) + function () {
      if (registered) {
        return "<i id=\"js-like-".concat(id_pictures, "\" class=\"fa fa-thumbs-up\"></i><form id=\"").concat(_this.id, "\" >\n                <input type=\"text\" name=\"description\" />\n                <button type=\"submit\" class=\"btn add_comment\">Ajouter un commentaire</button>\n\n                </form>");
      } else {
        return "";
      }
    }() + "\n        <div class=\"comments\" id=\"comments_id\">Commentaires :<br>\n        ";

    comments.forEach(function (e) {
      _this.addComment(e);
    });
  }
  /* ajoute un commentaire à l'élément DOM */


  _createClass(Image, [{
    key: "addComment",
    value: function addComment(_ref2) {
      var description = _ref2.description,
          id_users = _ref2.id_users;
      console.log(this.submitted);

      if (!this.submitted) {
        this.divs += "<div class=\"comment\">".concat(id_users, " : ").concat(description, "</div>");
        return;
      }

      var div = document.createElement("div");
      div.className = "comment";
      div.innerText = "".concat(id_users, " : ").concat(description);
      console.log(div);
      document.getElementById("comments_id").appendChild(div);
    } //Fait une requête AJAX pour disliker

    /* Liker une photo */

  }, {
    key: "like",
    value: function like(object) {
      var id = this.id_pictures;
      $.post("http://localhost:8000/likePicture/", object, function (data, status) {
        if (status == "success") {
          document.getElementById("js-number-likes-".concat(id)).innerText = Number(document.getElementById("js-number-likes-".concat(id)).innerText) + 1;
        }
      });
    } //Fait une requête AJAX pour liker

  }, {
    key: "dislike",
    value: function dislike(object) {
      var id = this.id_pictures;
      $.post("http://localhost:8000/dislikePicture/", object, function (data, status) {
        if (status == "success") {
          document.getElementById("js-number-likes-".concat(id)).innerText = Number(document.getElementById("js-number-likes-".concat(id)).innerText) - 1;
        }
      });
    } //Fait une requête AJAX pour poster un commentaire

  }, {
    key: "postComment",
    value: function postComment(object) {
      var img = this;
      $.post("http://localhost:8000/comment/", object, function (data, status) {
        if (status == "success") {
          img.addComment({
            description: object.description,
            id_users: id_user
          });
        }
      }.bind(this));
    }
    /* Ajoute l'élément image au DOM */

  }, {
    key: "submitElement",
    value: function submitElement() {
      var _this2 = this;

      this.submitted = true;
      gallery.innerHTML += this.element;

      if (registered) {
        console.log(document.getElementById(this.id));
        /* Si utilisateur inscrit, ajouter le script d
        e handle pour ajouter un commentaire */

        document.getElementById(this.id).addEventListener("submit", function (e) {
          console.log(e);
          e.preventDefault();
          var object = {
            description: e.target.description.value,
            _token: token,
            event: id,
            picture: _this2.id_pictures
          };

          _this2.postComment(object); //console.log(object);

        }); //Si utilisateur inscrit, ajouter le script de handle pour like/dislike une photo

        document.getElementById("js-like-".concat(this.id_pictures)).onclick = function (e) {
          var object = {
            _token: token,
            picture: _this2.id_pictures,
            event: id
          };

          if (document.getElementById("js-like-".concat(_this2.id_pictures)).classList.toggle("img--activated")) {
            _this2.like(object); //like

          } else {
            _this2.dislike(object); //dislike

          }
        };
      }
    }
  }, {
    key: "id",
    get: function get() {
      return "js-form-".concat(this.id_pictures);
    }
  }, {
    key: "element",
    get: function get() {
      return this.divs + "</aside></div></div>";
    }
  }]);

  return Image;
}();

$.get("http://localhost:3000/event/".concat(id), function (data, status) {
  /*console.debug(data);
  console.debug(status);*/
  data.forEach(function (element) {
    //console.log(button);
    if (!button) {
      var button = "";
    }

    var currentImg = new Image(element, button);
    currentImg.submitElement();
  });
});

/***/ }),

/***/ 3:
/*!*************************************************!*\
  !*** multi ./resources/js/insertDataToEvent.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Cthulhu\Documents\Programmation\Laravel\laravel\resources\js\insertDataToEvent.js */"./resources/js/insertDataToEvent.js");


/***/ })

/******/ });