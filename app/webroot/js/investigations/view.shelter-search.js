var shelter_map;
var shelter_map_markers = [];

$(function(){

	var mapOptions = {
      center: new google.maps.LatLng(35.068016, 38.997014),
      zoom: 7
    };
    shelter_map = new google.maps.Map(document.getElementById("shelter-map"), mapOptions);


    // activate search
    $("btn-search-shelters").click(function(){

		var q = $("btn-search-shelters").val();    	

		//TODO: clear map


		$.post('/shelters/search.js', {
			q:q
		}, function(result){

			//TODO: loop through shelters and create 
			// new google.maps.Marker({
	  //           position: location, 
	  //           map: shelter_map
	  //       });
		});


    	return false;
    })




});