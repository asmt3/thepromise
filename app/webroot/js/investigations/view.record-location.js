var survivorLocationMap;
var survivorLocationMarker = false;

$(function(){

	var mapOptions = {
      center: new google.maps.LatLng(35.068016, 38.997014),
      zoom: 7
    };
    survivorLocationMap = new google.maps.Map(document.getElementById("survivor-location-map"), mapOptions);




    // add a click event handler to the map object
    google.maps.event.addListener(survivorLocationMap, "click", function(event)
    {
        // place a marker
        placeSurvivorMarker(event.latLng);



    });

    $("#survivor-location-map-save").click(function(){

    	$.post('/survivorlocations/add', {
    		investigation_id: investigation_id,
    		lat:1,
    		lng:1,
    	}, function(result){

    	})

    	return false;
    });

    $("#survivor-location-map-clear").click(function(){

    	$("#survivor-location-map-controls").hide();

    	return false;
    });


});


function placeSurvivorMarker(location) {
        // first remove all markers if there are any

        if (survivorLocationMarker == false) {
        	// create it
        	survivorLocationMarker = new google.maps.Marker({
	            position: location, 
	            map: survivorLocationMap
	        });
        } else {
        	//move it 
        	survivorLocationMarker.setPosition(location);
        }

        // save the lat lng
        $("#survivor-location-map-lat").val(location.lat());
        $("#survivor-location-map-lng").val(location.lng());

        // allow saving
        $("#survivor-location-map-controls").show();
        

    }