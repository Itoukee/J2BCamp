function initSearchInput(id) {
    let element = document.getElementById(id);

    if (element) {
        let autocomplete = new google.maps.places.Autocomplete(element, {types: ['geocode']});
        google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
    }
}

function updateDom(value, id) {
    let type_element = document.getElementById(id);
    console.log(type_element)

    if (type_element) {
        type_element.value = value;
    }
}

function onPlaceChanged() {
    let place = this.getPlace();
    for (let i in place.address_components) {
        let comp = place.address_components[i]

        for (let j in comp.types) {
            updateDom(comp.long_name, comp.types[j])

        }


    }
    let lat = place.geometry.location.lat()
    let lng = place.geometry.location.lng()
    updateDom(lat, "lat")
    updateDom(lng, "lng")

}

google.maps.event.addDomListener(window, 'load', function () {
    initSearchInput('user_input_autocomplete_address');
});