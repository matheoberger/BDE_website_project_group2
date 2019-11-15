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

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\resources\\js\\insertProduct.js: Unexpected token (18:0)\n\n\u001b[0m \u001b[90m 16 | \u001b[39m\u001b[90m     */\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 17 | \u001b[39m    newProduct(articleIndex\u001b[33m,\u001b[39m articleNumber) {\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 18 | \u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<\u001b[39m \u001b[33mHEAD\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    | \u001b[39m\u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 19 | \u001b[39m\u001b[33m===\u001b[39m\u001b[33m===\u001b[39m\u001b[33m=\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 20 | \u001b[39m        \u001b[36mif\u001b[39m (\u001b[32m\"\"\u001b[39m) {\u001b[0m\n\u001b[0m \u001b[90m 21 | \u001b[39m            $(\u001b[32m\"js-spinner\"\u001b[39m)\u001b[33m.\u001b[39maddClass(\u001b[32m\"spinner__display\"\u001b[39m)\u001b[33m;\u001b[39m\u001b[0m\n    at Parser.raise (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:6932:17)\n    at Parser.unexpected (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:8325:16)\n    at Parser.parseExprAtom (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:9584:20)\n    at Parser.parseExprSubscripts (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:9167:23)\n    at Parser.parseMaybeUnary (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:9147:21)\n    at Parser.parseExprOps (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:9013:23)\n    at Parser.parseMaybeConditional (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:8986:23)\n    at Parser.parseMaybeAssign (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:8932:21)\n    at Parser.parseExpression (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:8882:23)\n    at Parser.parseStatementContent (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:10742:23)\n    at Parser.parseStatement (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:10613:17)\n    at Parser.parseBlockOrModuleBlockBody (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:11189:25)\n    at Parser.parseBlockBody (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:11176:10)\n    at Parser.parseBlock (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:11160:10)\n    at Parser.parseFunctionBody (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:10179:24)\n    at Parser.parseFunctionBodyAndFinish (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:10149:10)\n    at Parser.parseMethod (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:10103:10)\n    at Parser.pushClassMethod (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:11593:30)\n    at Parser.parseClassMemberWithIsStatic (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:11513:12)\n    at Parser.parseClassMember (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:11455:10)\n    at withTopicForbiddingContext (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:11410:14)\n    at Parser.withTopicForbiddingContext (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:10488:14)\n    at Parser.parseClassBody (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:11387:10)\n    at Parser.parseClass (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:11361:22)\n    at Parser.parseStatementContent (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:10655:21)\n    at Parser.parseStatement (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:10613:17)\n    at Parser.parseBlockOrModuleBlockBody (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:11189:25)\n    at Parser.parseBlockBody (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:11176:10)\n    at Parser.parseTopLevel (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:10544:10)\n    at Parser.parse (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:12053:10)\n    at parse (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\parser\\lib\\index.js:12104:38)\n    at parser (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:168:34)\n    at normalizeFile (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:102:11)\n    at runSync (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\core\\lib\\transformation\\index.js:44:43)\n    at runAsync (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\core\\lib\\transformation\\index.js:35:14)\n    at process.nextTick (D:\\home\\jambon\\Documents\\Code\\CESI\\BDE_website_project_group2\\laravel\\node_modules\\@babel\\core\\lib\\transform.js:34:34)");

/***/ }),

/***/ 2:
/*!*********************************************!*\
  !*** multi ./resources/js/insertProduct.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\home\jambon\Documents\Code\CESI\BDE_website_project_group2\laravel\resources\js\insertProduct.js */"./resources/js/insertProduct.js");


/***/ })

/******/ });