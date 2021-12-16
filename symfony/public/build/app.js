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

function updateDom(value, id) {
  var type_element = document.getElementById(id);
  console.log(type_element);

  if (type_element) {
    type_element.value = value;
  }
}

function onPlaceChanged() {
  var place = this.getPlace();

  for (var i in place.address_components) {
    var comp = place.address_components[i];

    for (var j in comp.types) {
      updateDom(comp.long_name, comp.types[j]);
    }
  }

  var lat = place.geometry.location.lat();
  var lng = place.geometry.location.lng();
  updateDom(lat, "lat");
  updateDom(lng, "lng");
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7O0FBQUEsU0FBU0EsZUFBVCxDQUF5QkMsRUFBekIsRUFBNkI7QUFDekIsTUFBSUMsT0FBTyxHQUFHQyxRQUFRLENBQUNDLGNBQVQsQ0FBd0JILEVBQXhCLENBQWQ7O0FBRUEsTUFBSUMsT0FBSixFQUFhO0FBQ1QsUUFBSUcsWUFBWSxHQUFHLElBQUlDLE1BQU0sQ0FBQ0MsSUFBUCxDQUFZQyxNQUFaLENBQW1CQyxZQUF2QixDQUFvQ1AsT0FBcEMsRUFBNkM7QUFBQ1EsTUFBQUEsS0FBSyxFQUFFLENBQUMsU0FBRDtBQUFSLEtBQTdDLENBQW5CO0FBQ0FKLElBQUFBLE1BQU0sQ0FBQ0MsSUFBUCxDQUFZSSxLQUFaLENBQWtCQyxXQUFsQixDQUE4QlAsWUFBOUIsRUFBNEMsZUFBNUMsRUFBNkRRLGNBQTdEO0FBQ0g7QUFDSjs7QUFFRCxTQUFTQyxTQUFULENBQW1CQyxLQUFuQixFQUEwQmQsRUFBMUIsRUFBOEI7QUFDMUIsTUFBSWUsWUFBWSxHQUFHYixRQUFRLENBQUNDLGNBQVQsQ0FBd0JILEVBQXhCLENBQW5CO0FBQ0FnQixFQUFBQSxPQUFPLENBQUNDLEdBQVIsQ0FBWUYsWUFBWjs7QUFFQSxNQUFJQSxZQUFKLEVBQWtCO0FBQ2RBLElBQUFBLFlBQVksQ0FBQ0QsS0FBYixHQUFxQkEsS0FBckI7QUFDSDtBQUNKOztBQUVELFNBQVNGLGNBQVQsR0FBMEI7QUFDdEIsTUFBSU0sS0FBSyxHQUFHLEtBQUtDLFFBQUwsRUFBWjs7QUFDQSxPQUFLLElBQUlDLENBQVQsSUFBY0YsS0FBSyxDQUFDRyxrQkFBcEIsRUFBd0M7QUFDcEMsUUFBSUMsSUFBSSxHQUFHSixLQUFLLENBQUNHLGtCQUFOLENBQXlCRCxDQUF6QixDQUFYOztBQUVBLFNBQUssSUFBSUcsQ0FBVCxJQUFjRCxJQUFJLENBQUNiLEtBQW5CLEVBQTBCO0FBQ3RCSSxNQUFBQSxTQUFTLENBQUNTLElBQUksQ0FBQ0UsU0FBTixFQUFpQkYsSUFBSSxDQUFDYixLQUFMLENBQVdjLENBQVgsQ0FBakIsQ0FBVDtBQUVIO0FBR0o7O0FBQ0QsTUFBSUUsR0FBRyxHQUFHUCxLQUFLLENBQUNRLFFBQU4sQ0FBZUMsUUFBZixDQUF3QkYsR0FBeEIsRUFBVjtBQUNBLE1BQUlHLEdBQUcsR0FBR1YsS0FBSyxDQUFDUSxRQUFOLENBQWVDLFFBQWYsQ0FBd0JDLEdBQXhCLEVBQVY7QUFDQWYsRUFBQUEsU0FBUyxDQUFDWSxHQUFELEVBQU0sS0FBTixDQUFUO0FBQ0FaLEVBQUFBLFNBQVMsQ0FBQ2UsR0FBRCxFQUFNLEtBQU4sQ0FBVDtBQUVIOztBQUVEdkIsTUFBTSxDQUFDQyxJQUFQLENBQVlJLEtBQVosQ0FBa0JtQixjQUFsQixDQUFpQ0MsTUFBakMsRUFBeUMsTUFBekMsRUFBaUQsWUFBWTtBQUN6RC9CLEVBQUFBLGVBQWUsQ0FBQyxpQ0FBRCxDQUFmO0FBQ0gsQ0FGRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9qcy9zZWFyY2hib3guanMiXSwic291cmNlc0NvbnRlbnQiOlsiZnVuY3Rpb24gaW5pdFNlYXJjaElucHV0KGlkKSB7XG4gICAgbGV0IGVsZW1lbnQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChpZCk7XG5cbiAgICBpZiAoZWxlbWVudCkge1xuICAgICAgICBsZXQgYXV0b2NvbXBsZXRlID0gbmV3IGdvb2dsZS5tYXBzLnBsYWNlcy5BdXRvY29tcGxldGUoZWxlbWVudCwge3R5cGVzOiBbJ2dlb2NvZGUnXX0pO1xuICAgICAgICBnb29nbGUubWFwcy5ldmVudC5hZGRMaXN0ZW5lcihhdXRvY29tcGxldGUsICdwbGFjZV9jaGFuZ2VkJywgb25QbGFjZUNoYW5nZWQpO1xuICAgIH1cbn1cblxuZnVuY3Rpb24gdXBkYXRlRG9tKHZhbHVlLCBpZCkge1xuICAgIGxldCB0eXBlX2VsZW1lbnQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChpZCk7XG4gICAgY29uc29sZS5sb2codHlwZV9lbGVtZW50KVxuXG4gICAgaWYgKHR5cGVfZWxlbWVudCkge1xuICAgICAgICB0eXBlX2VsZW1lbnQudmFsdWUgPSB2YWx1ZTtcbiAgICB9XG59XG5cbmZ1bmN0aW9uIG9uUGxhY2VDaGFuZ2VkKCkge1xuICAgIGxldCBwbGFjZSA9IHRoaXMuZ2V0UGxhY2UoKTtcbiAgICBmb3IgKGxldCBpIGluIHBsYWNlLmFkZHJlc3NfY29tcG9uZW50cykge1xuICAgICAgICBsZXQgY29tcCA9IHBsYWNlLmFkZHJlc3NfY29tcG9uZW50c1tpXVxuXG4gICAgICAgIGZvciAobGV0IGogaW4gY29tcC50eXBlcykge1xuICAgICAgICAgICAgdXBkYXRlRG9tKGNvbXAubG9uZ19uYW1lLCBjb21wLnR5cGVzW2pdKVxuXG4gICAgICAgIH1cblxuXG4gICAgfVxuICAgIGxldCBsYXQgPSBwbGFjZS5nZW9tZXRyeS5sb2NhdGlvbi5sYXQoKVxuICAgIGxldCBsbmcgPSBwbGFjZS5nZW9tZXRyeS5sb2NhdGlvbi5sbmcoKVxuICAgIHVwZGF0ZURvbShsYXQsIFwibGF0XCIpXG4gICAgdXBkYXRlRG9tKGxuZywgXCJsbmdcIilcblxufVxuXG5nb29nbGUubWFwcy5ldmVudC5hZGREb21MaXN0ZW5lcih3aW5kb3csICdsb2FkJywgZnVuY3Rpb24gKCkge1xuICAgIGluaXRTZWFyY2hJbnB1dCgndXNlcl9pbnB1dF9hdXRvY29tcGxldGVfYWRkcmVzcycpO1xufSk7Il0sIm5hbWVzIjpbImluaXRTZWFyY2hJbnB1dCIsImlkIiwiZWxlbWVudCIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJhdXRvY29tcGxldGUiLCJnb29nbGUiLCJtYXBzIiwicGxhY2VzIiwiQXV0b2NvbXBsZXRlIiwidHlwZXMiLCJldmVudCIsImFkZExpc3RlbmVyIiwib25QbGFjZUNoYW5nZWQiLCJ1cGRhdGVEb20iLCJ2YWx1ZSIsInR5cGVfZWxlbWVudCIsImNvbnNvbGUiLCJsb2ciLCJwbGFjZSIsImdldFBsYWNlIiwiaSIsImFkZHJlc3NfY29tcG9uZW50cyIsImNvbXAiLCJqIiwibG9uZ19uYW1lIiwibGF0IiwiZ2VvbWV0cnkiLCJsb2NhdGlvbiIsImxuZyIsImFkZERvbUxpc3RlbmVyIiwid2luZG93Il0sInNvdXJjZVJvb3QiOiIifQ==