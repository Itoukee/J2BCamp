function initSearchInput(id) {
    let element = document.getElementById(id);

    if (element) {
        let autocomplete = new google.maps.places.Autocomplete(element, {types: ['geocode']});
        google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
    }
}

function onPlaceChanged() {
    let place = this.getPlace();

    for (let i in place.address_components) {
        let comp = place.address_components[i]
        for (let j in comp.types) {
            // Some types are ["country", "political"]
            let type_element = document.getElementById(comp.types[j]);

            if (type_element) {
                type_element.value = comp.long_name;
            }
        }
    }
}

google.maps.event.addDomListener(window, 'load', function () {
    initSearchInput('user_input_autocomplete_address');
});