var map;
var markers = [];

$(function(){

	var mapOptions = {
      center: new google.maps.LatLng(35.068016, 38.997014),
      zoom: 7
    };
    map = new google.maps.Map(document.getElementById("shelter-map"), mapOptions);


    // activate search
    $("btn-search-shelters").click(function(){

		var q = $("btn-search-shelters").val();    	

		$.post('/shelters/search.js', {
			q:q
		}, function(result){

		})


    	return false;
    })




});


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

