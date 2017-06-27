"use strict" ; 

(function (){

	var mapElement = document.getElementById("map");
	
	var mapOptions = {

		zoom: 20,
		
		center: {
	 		lat:  29.426791,
			lng: -98.489602
		}
		//mapTypeId: google.maps.MapTypeId.SATELLITE
	};


	var map = new google.maps.Map(mapElement, mapOptions);

	var address = "5146 Broadway St, San Antonio, TX 78209 ";

	var geocoder = new google.maps.Geocoder();



	geocoder.geocode({"address": address}, function (results, status) {
		if (status == google.maps.GeocoderStatus.OK){
			map.setCenter(results[0].geometry.location);
		} else {
			alert("Geocoding was not successful - STATUS: " + status);
		}
	});


	// var sorrentos = { lat: 29.474215, lng: -98.46231 }; 
	// var marker = new google.maps.Marker ({
	// 	postion: sorrentos;
	// 	map: map

	// });


})();