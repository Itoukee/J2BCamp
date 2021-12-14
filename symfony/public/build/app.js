(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/js/searchbox.js":
/*!********************************!*\
  !*** ./assets/js/searchbox.js ***!
  \********************************/
/***/ (() => {

function initSearchInput(id) {
  var element = document.getElementById(id);

  if (element) {
    var autocomplete = new google.maps.places.Autocomplete(element, {
      types: ['geocode']
    });
    google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
  }
}

function onPlaceChanged() {
  var place = this.getPlace();
}

google.maps.event.addDomListener(window, 'load', function () {
  initSearchInput('user_input_autocomplete_address');
});

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./assets/js/searchbox.js"));
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7O0FBQUEsU0FBU0EsZUFBVCxDQUF5QkMsRUFBekIsRUFBNkI7QUFDekIsTUFBSUMsT0FBTyxHQUFHQyxRQUFRLENBQUNDLGNBQVQsQ0FBd0JILEVBQXhCLENBQWQ7O0FBRUEsTUFBSUMsT0FBSixFQUFhO0FBQ1QsUUFBSUcsWUFBWSxHQUFHLElBQUlDLE1BQU0sQ0FBQ0MsSUFBUCxDQUFZQyxNQUFaLENBQW1CQyxZQUF2QixDQUFvQ1AsT0FBcEMsRUFBNkM7QUFBQ1EsTUFBQUEsS0FBSyxFQUFFLENBQUMsU0FBRDtBQUFSLEtBQTdDLENBQW5CO0FBQ0FKLElBQUFBLE1BQU0sQ0FBQ0MsSUFBUCxDQUFZSSxLQUFaLENBQWtCQyxXQUFsQixDQUE4QlAsWUFBOUIsRUFBNEMsZUFBNUMsRUFBNkRRLGNBQTdEO0FBQ0g7QUFDSjs7QUFFRCxTQUFTQSxjQUFULEdBQTBCO0FBQ3RCLE1BQUlDLEtBQUssR0FBRyxLQUFLQyxRQUFMLEVBQVo7QUFDSDs7QUFFRFQsTUFBTSxDQUFDQyxJQUFQLENBQVlJLEtBQVosQ0FBa0JLLGNBQWxCLENBQWlDQyxNQUFqQyxFQUF5QyxNQUF6QyxFQUFpRCxZQUFXO0FBQ3hEakIsRUFBQUEsZUFBZSxDQUFDLGlDQUFELENBQWY7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL3NlYXJjaGJveC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJmdW5jdGlvbiBpbml0U2VhcmNoSW5wdXQoaWQpIHtcbiAgICBsZXQgZWxlbWVudCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKGlkKTtcblxuICAgIGlmIChlbGVtZW50KSB7XG4gICAgICAgIGxldCBhdXRvY29tcGxldGUgPSBuZXcgZ29vZ2xlLm1hcHMucGxhY2VzLkF1dG9jb21wbGV0ZShlbGVtZW50LCB7dHlwZXM6IFsnZ2VvY29kZSddfSk7XG4gICAgICAgIGdvb2dsZS5tYXBzLmV2ZW50LmFkZExpc3RlbmVyKGF1dG9jb21wbGV0ZSwgJ3BsYWNlX2NoYW5nZWQnLCBvblBsYWNlQ2hhbmdlZCk7XG4gICAgfVxufVxuXG5mdW5jdGlvbiBvblBsYWNlQ2hhbmdlZCgpIHtcbiAgICBsZXQgcGxhY2UgPSB0aGlzLmdldFBsYWNlKCk7XG59XG5cbmdvb2dsZS5tYXBzLmV2ZW50LmFkZERvbUxpc3RlbmVyKHdpbmRvdywgJ2xvYWQnLCBmdW5jdGlvbigpIHtcbiAgICBpbml0U2VhcmNoSW5wdXQoJ3VzZXJfaW5wdXRfYXV0b2NvbXBsZXRlX2FkZHJlc3MnKTtcbn0pOyJdLCJuYW1lcyI6WyJpbml0U2VhcmNoSW5wdXQiLCJpZCIsImVsZW1lbnQiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiYXV0b2NvbXBsZXRlIiwiZ29vZ2xlIiwibWFwcyIsInBsYWNlcyIsIkF1dG9jb21wbGV0ZSIsInR5cGVzIiwiZXZlbnQiLCJhZGRMaXN0ZW5lciIsIm9uUGxhY2VDaGFuZ2VkIiwicGxhY2UiLCJnZXRQbGFjZSIsImFkZERvbUxpc3RlbmVyIiwid2luZG93Il0sInNvdXJjZVJvb3QiOiIifQ==