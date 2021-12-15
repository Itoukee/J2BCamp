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

  for (var i in place.address_components) {
    var comp = place.address_components[i];

    for (var j in comp.types) {
      // Some types are ["country", "political"]
      var type_element = document.getElementById(comp.types[j]);

      if (type_element) {
        type_element.value = comp.long_name;
      }
    }
  }
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7O0FBQUEsU0FBU0EsZUFBVCxDQUF5QkMsRUFBekIsRUFBNkI7QUFDekIsTUFBSUMsT0FBTyxHQUFHQyxRQUFRLENBQUNDLGNBQVQsQ0FBd0JILEVBQXhCLENBQWQ7O0FBRUEsTUFBSUMsT0FBSixFQUFhO0FBQ1QsUUFBSUcsWUFBWSxHQUFHLElBQUlDLE1BQU0sQ0FBQ0MsSUFBUCxDQUFZQyxNQUFaLENBQW1CQyxZQUF2QixDQUFvQ1AsT0FBcEMsRUFBNkM7QUFBQ1EsTUFBQUEsS0FBSyxFQUFFLENBQUMsU0FBRDtBQUFSLEtBQTdDLENBQW5CO0FBQ0FKLElBQUFBLE1BQU0sQ0FBQ0MsSUFBUCxDQUFZSSxLQUFaLENBQWtCQyxXQUFsQixDQUE4QlAsWUFBOUIsRUFBNEMsZUFBNUMsRUFBNkRRLGNBQTdEO0FBQ0g7QUFDSjs7QUFFRCxTQUFTQSxjQUFULEdBQTBCO0FBQ3RCLE1BQUlDLEtBQUssR0FBRyxLQUFLQyxRQUFMLEVBQVo7O0FBRUEsT0FBSyxJQUFJQyxDQUFULElBQWNGLEtBQUssQ0FBQ0csa0JBQXBCLEVBQXdDO0FBQ3BDLFFBQUlDLElBQUksR0FBR0osS0FBSyxDQUFDRyxrQkFBTixDQUF5QkQsQ0FBekIsQ0FBWDs7QUFDQSxTQUFLLElBQUlHLENBQVQsSUFBY0QsSUFBSSxDQUFDUixLQUFuQixFQUEwQjtBQUN0QjtBQUNBLFVBQUlVLFlBQVksR0FBR2pCLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QmMsSUFBSSxDQUFDUixLQUFMLENBQVdTLENBQVgsQ0FBeEIsQ0FBbkI7O0FBRUEsVUFBSUMsWUFBSixFQUFrQjtBQUNkQSxRQUFBQSxZQUFZLENBQUNDLEtBQWIsR0FBcUJILElBQUksQ0FBQ0ksU0FBMUI7QUFDSDtBQUNKO0FBQ0o7QUFDSjs7QUFFRGhCLE1BQU0sQ0FBQ0MsSUFBUCxDQUFZSSxLQUFaLENBQWtCWSxjQUFsQixDQUFpQ0MsTUFBakMsRUFBeUMsTUFBekMsRUFBaUQsWUFBWTtBQUN6RHhCLEVBQUFBLGVBQWUsQ0FBQyxpQ0FBRCxDQUFmO0FBQ0gsQ0FGRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9qcy9zZWFyY2hib3guanMiXSwic291cmNlc0NvbnRlbnQiOlsiZnVuY3Rpb24gaW5pdFNlYXJjaElucHV0KGlkKSB7XG4gICAgbGV0IGVsZW1lbnQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChpZCk7XG5cbiAgICBpZiAoZWxlbWVudCkge1xuICAgICAgICBsZXQgYXV0b2NvbXBsZXRlID0gbmV3IGdvb2dsZS5tYXBzLnBsYWNlcy5BdXRvY29tcGxldGUoZWxlbWVudCwge3R5cGVzOiBbJ2dlb2NvZGUnXX0pO1xuICAgICAgICBnb29nbGUubWFwcy5ldmVudC5hZGRMaXN0ZW5lcihhdXRvY29tcGxldGUsICdwbGFjZV9jaGFuZ2VkJywgb25QbGFjZUNoYW5nZWQpO1xuICAgIH1cbn1cblxuZnVuY3Rpb24gb25QbGFjZUNoYW5nZWQoKSB7XG4gICAgbGV0IHBsYWNlID0gdGhpcy5nZXRQbGFjZSgpO1xuXG4gICAgZm9yIChsZXQgaSBpbiBwbGFjZS5hZGRyZXNzX2NvbXBvbmVudHMpIHtcbiAgICAgICAgbGV0IGNvbXAgPSBwbGFjZS5hZGRyZXNzX2NvbXBvbmVudHNbaV1cbiAgICAgICAgZm9yIChsZXQgaiBpbiBjb21wLnR5cGVzKSB7XG4gICAgICAgICAgICAvLyBTb21lIHR5cGVzIGFyZSBbXCJjb3VudHJ5XCIsIFwicG9saXRpY2FsXCJdXG4gICAgICAgICAgICBsZXQgdHlwZV9lbGVtZW50ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoY29tcC50eXBlc1tqXSk7XG5cbiAgICAgICAgICAgIGlmICh0eXBlX2VsZW1lbnQpIHtcbiAgICAgICAgICAgICAgICB0eXBlX2VsZW1lbnQudmFsdWUgPSBjb21wLmxvbmdfbmFtZTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgIH1cbn1cblxuZ29vZ2xlLm1hcHMuZXZlbnQuYWRkRG9tTGlzdGVuZXIod2luZG93LCAnbG9hZCcsIGZ1bmN0aW9uICgpIHtcbiAgICBpbml0U2VhcmNoSW5wdXQoJ3VzZXJfaW5wdXRfYXV0b2NvbXBsZXRlX2FkZHJlc3MnKTtcbn0pOyJdLCJuYW1lcyI6WyJpbml0U2VhcmNoSW5wdXQiLCJpZCIsImVsZW1lbnQiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiYXV0b2NvbXBsZXRlIiwiZ29vZ2xlIiwibWFwcyIsInBsYWNlcyIsIkF1dG9jb21wbGV0ZSIsInR5cGVzIiwiZXZlbnQiLCJhZGRMaXN0ZW5lciIsIm9uUGxhY2VDaGFuZ2VkIiwicGxhY2UiLCJnZXRQbGFjZSIsImkiLCJhZGRyZXNzX2NvbXBvbmVudHMiLCJjb21wIiwiaiIsInR5cGVfZWxlbWVudCIsInZhbHVlIiwibG9uZ19uYW1lIiwiYWRkRG9tTGlzdGVuZXIiLCJ3aW5kb3ciXSwic291cmNlUm9vdCI6IiJ9