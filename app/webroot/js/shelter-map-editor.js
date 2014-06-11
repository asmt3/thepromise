
	var map;
	var marker = false;

  function initialize() {
    var mapOptions = {
      center: new google.maps.LatLng(35.068016, 38.997014),
      zoom: 7
    };
    map = new google.maps.Map(document.getElementById("map"), mapOptions);


    // add a click event handler to the map object
    google.maps.event.addListener(map, "click", function(event)
    {
        // place a marker
        placeMarker(event.latLng);

        // display the lat/lng in your form's lat/lng fields
        document.getElementById("ShelterLat").value = event.latLng.lat();
        document.getElementById("ShelterLng").value = event.latLng.lng();
    });

    // if lat lng set, add a marker
    var existingLat = document.getElementById("ShelterLat").value;
    var existingLng = document.getElementById("ShelterLng").value;
    console.log(existingLat && existingLng); 

    if (existingLat && existingLng) {
      var position = new google.maps.LatLng(existingLat, existingLng);
      console.log(position)
      placeMarker(position);
    }



  }
  google.maps.event.addDomListener(window, 'load', initialize);


  function placeMarker(location) {
        // first remove all markers if there are any

        if (marker == false) {
        	// create it
        	marker = new google.maps.Marker({
	            position: location, 
	            map: map
	        });
        } else {
        	//move it 
        	marker.setPosition(location);
        }
        

    }

