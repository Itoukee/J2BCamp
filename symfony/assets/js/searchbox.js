function initSearchInput(id) {
    let element = document.getElementById(id);

    if (element) {
        let autocomplete = new google.maps.places.Autocomplete(element, {types: ['geocode']});
        google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
    }
}

function onPlaceChanged() {
    let place = this.getPlace();
}

google.maps.event.addDomListener(window, 'load', function() {
    initSearchInput('user_input_autocomplete_address');
});