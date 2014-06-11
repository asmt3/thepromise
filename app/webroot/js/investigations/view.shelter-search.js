var shelter_map = false;
var shelter_map_markers = [];
var shelter_map_infowindows = [];





$(function(){

	var mapOptions = {
      center: new google.maps.LatLng(35.068016, 38.997014),
      zoom: 7
    };

    shelter_map = new google.maps.Map(document.getElementById("shelter-map"), mapOptions);


    // activate search
    $("#btn-search-shelters").click(function(){

		var q = $("#query-search-shelters").val();    	

		//TODO: clear map
		$(shelter_map_markers).each(function(){
			this.setMap(null);
		});

		shelter_map_infowindows = [];


		$.post('/shelters/search', {
			address:q
		}, function(result){

			result = $.parseJSON(result);

			console.log(result);

			if (result.shelters.length) {
				$(result.shelters).each(function(){

					var marker = new google.maps.Marker({
			            position: new google.maps.LatLng(this.Shelter.lat, this.Shelter.lng),
			            map: shelter_map,
			            title: this.Shelter.name
			            
			        });

			        var shelter_info = $('#shelter-info-template').clone();


			        // clean data
			        if (this.Shelter.free_spaces == null || this.Shelter.capacity == null) {
			        	var capacity = 'unknown';
			        } else {
			        	var capacity = this.Shelter.free_spaces + '/' + this.Shelter.capacity;
			        }

			        if (this.Shelter.address == null || this.Shelter.address == "") {
			        	var address = 'unknown';
			        } else {
			        	var address = this.Shelter.address;
			        }


			        shelter_info.find('.name td').text(this.Shelter.name);
			        shelter_info.find('.capacity td').text(capacity);
			        shelter_info.find('.address td').text(address);
			        

			        if (this.Shelter.email == null) {
			        	shelter_info.find('.email').hide();
			        } else {
			        	shelter_info.find('.email td a').text(this.Shelter.email);
						shelter_info.find('.email td a').attr('href', 'mailto:' + this.Shelter.email);	
			        }

			        if (this.Shelter.phone == null) {
						shelter_info.find('.phone').hide();
			        } else {
			        	shelter_info.find('.phone td a').text(this.Shelter.phone);
						shelter_info.find('.phone td a').attr('href', 'tel:' + this.Shelter.email);
			        }
			        //console.log(shelter_info.html());
			        shelter_info.find('a.btn').attr('href', '/investigations/refer/' + this.Shelter.id + '/' + investigation_id);
			        

					// set refer url



			        var infowindow = new google.maps.InfoWindow({
					      content: shelter_info.html()
					  });

					google.maps.event.addListener(marker, 'click', function() {
						$(shelter_map_infowindows).each(function(){
							this.close();
						})
						infowindow.open(shelter_map, marker);
					});



					shelter_map_markers.push(marker);
					shelter_map_infowindows.push(infowindow);

				});

				// open first
				shelter_map_infowindows[0].open(shelter_map, shelter_map_markers[0]);
			}

		});


    	return false;
    })




});