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

var insertProduct =
/*#__PURE__*/
function () {
  function insertProduct() {
    _classCallCheck(this, insertProduct);
  }

  _createClass(insertProduct, [{
    key: "getProduct",
    value: function getProduct() {
      console.log("coucou");
      var product = $.get("http://10.133.129.113:3000/produits/2/3", function (data, status) {
        console.log("coucou");
        console.log("Data: " + data);
        console.log("dfsdfsdf");
      });
      console.log(product);
    }
  }]);

  return insertProduct;
}();

$(document).ready(function () {
  var coucou = new insertProduct();
  coucou.getProduct();
}); // class insertProduct {
//     $productNumber;
//     newProduct(){
//         const products = $.get("http://10.133.129.113:3000/produits/2/10");
//         const coucou = products.map(item => {
//             return this.insertProduct(item);
//         )};
//     }
//     insertProduct(product) {
//         const { image, title, description } = product;
//         console.log("insertProduct");
//         return (
//           <CustomArticle
//             className="content__article"
//             image={image}
//             title={title}
//             description={description}
//           />
//         );
//       }
// }
// $(window).scroll(function() {
//     if (
//       Math.round($(window).scrollTop() + $(window).height()) ===
//       $(document).height()
//     ) {
//       console.log("scroll");
//       loader.loadNextPage();
//     }
//   });
// class App extends PureComponent {
//   page = 0;
//   loadNextPage() {
//     this.page++;
//     this.productNumber+=4;
//     const products = [1, 2, 3, 4].map(index => ({
//       image: ,
//       title: faker.name.title(),
//       description: faker.lorem.lines()
//     }));
//     const coucou = products.map(item => {
//       return this.insertProduct(item);
//     });
//     // console.log("1", coucou);
//     return coucou;
//     // setTimeout(() => {
//     //   const products = [1, 2, 3, 4].map(index => ({
//     //     image: faker.image.nature(),
//     //     title: faker.name.title(),
//     //     description: faker.lorem.lines()
//     //   }));
//     //   const coucou = products.map(item => {
//     //     return this.insertProduct(item);
//     //   });
//     //   console.log("1", coucou);
//     //   return coucou;
//     // }, 100);
//   }
//   // state = {
//   //   todo: [
//   //     {
//   //       image: faker.image.nature(),
//   //       title: faker.name.title(),
//   //       description: faker.lorem.lines()
//   //     },
//   //     {
//   //       image: "./img/vieil_homme_sourire.jpg",
//   //       title: "Title",
//   //       description: "Description"
//   //     },
//   //     {
//   //       image: "./img/vieil_homme_sourire.jpg",
//   //       title: "Title",
//   //       description: "Description"
//   //     }
//   //   ]
//   // };
//   // renderState() {
//   //   for (const i = 0; i < 1500; i++) {
//   //     this.todo.push({ title: "title" + i, description: "Description" });
//   //     console.log("title" + i);
//   //   }
//   // }
//   insertProduct(product) {
//     const { image, title, description } = product;
//     console.log("insertProduct");
//     return (
//       <CustomArticle
//         className="content__article"
//         image={image}
//         title={title}
//         description={description}
//       />
//     );
//   }
//   render() {
//     return <div className="content">{this.insertProduct()}</div>;
//   }
//   // _renderCards = () => {
//   //   return this.state.todo.map((todo, index) => (
//   //     <CustomArticle
//   //       key={index}
//   //       index={index}
//   //       image={this.image}
//   //       title={todo.title}
//   //       description={todo.description}
//   //       onClick={this.handleClick}
//   //     />
//   //   ));
//   // };
//   // handleClick = indexClicked => {
//   //   const todo = this.state.todo.filter(
//   //     (todo, index) => index !== indexClicked
//   //   );
//   //   this.setState({ todo });
//   // };
// }
// const loader = new App();
// loader.loadNextPage();
// loader.loadNextPage();
// loader.loadNextPage();
// window.scrollTo(0, 0);
// $(window).scroll(function() {
//   if (
//     Math.round($(window).scrollTop() + $(window).height()) ===
//     $(document).height()
//   ) {
//     console.log("scroll");
//     loader.loadNextPage();
//   }
// });
// export default App;

/***/ }),

/***/ 2:
/*!*********************************************!*\
  !*** multi ./resources/js/insertProduct.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\home\Documents\Code\Projet WEB\BDE_website_project_group2\laravel\resources\js\insertProduct.js */"./resources/js/insertProduct.js");


/***/ })

/******/ });