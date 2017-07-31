(function() {
	"use strict";

/*------------------------------------------------------------------------------------------------
	Maps - Get weather by dragging marker
------------------------------------------------------------------------------------------------*/
	//global marker variable
	var marker;

	var infoWindow = new google.maps.InfoWindow({
		content: "<span> Drag Me</span>"
	})
		
	//Set default locaton to SATX
	var defLocation = new google.maps.LatLng(29.426791, -98.489602);

	//map options
	var mapOptions = {
		zoom: 5,
		center: defLocation,
		mapTypeId: 'roadmap'
	};

	//Creates new map with specified map options in 'map' div
	var map = new google.maps.Map(document.getElementById('map'), mapOptions);

	//Creates draggable marker at default location 
	marker = new google.maps.Marker({
		position: defLocation,
		map: map,
		draggable: true,
		infoWindow: infoWindow
	});

	//opens infowindow on map
	infoWindow.open(map, marker);
	//closes infowindow on map after 3 seconds
	setTimeout(function(){
		infoWindow.close();
	}, '3000');


	google.maps.event.addListener(marker, 'dragend', function(){
		
		var latLng = {
			lat: this.getPosition().lat(),
			lng: this.getPosition().lng()
		}

		//creates new geocoder for marker dragger
		var geocoder = new google.maps.Geocoder();
		
		//reverse geocoding 
		geocoder.geocode( {'location': latLng}, function(results, status){
			if (status == 'OK'){
				console.log(results)
				var address = (results[4].formatted_address)

			} else{
				console.log("Geocode Error" + status);
			}
		$('#searchBox').val(address);
		makeWeatherRequest(latLng.lat, latLng.lng, address);
		})
	});

/*------------------------------------------------------------------------------------------------
	Search Box - Get weather by searching for a location 
------------------------------------------------------------------------------------------------*/
	//targets search box allows for autocomplete
	var input = document.getElementById('searchBox');
	var searchBoxInput = new google.maps.places.SearchBox(input);

	//when enter key is pressed will run geocoding 
	$(input).keypress(function(e) {
		if(e.which == 13) {
			geocodeSearch();
		}
	});	

	//when submit button clicked, geocoding will run
	$("#submit").click(function() {
		geocodeSearch();
	});	

	//will get value in search box, then run geocoding, then make weather request
	function geocodeSearch (){
		var cityValue = $('#searchBox').val();
		var geocoder = new google.maps.Geocoder();
		var geocoderOptions = {
			address: cityValue
		}
		
		geocoder.geocode(geocoderOptions, function(results, status) {
			if (status === 'OK'){
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();	

				makeWeatherRequest(latitude, longitude, results[0].formatted_address);

				map.setCenter(results[0].geometry.location);

				if(!marker) {
					marker = new google.maps.Marker({
						map: map,
						position: results[0].geometry.location	
					});
				}else {
					marker.setPosition(results[0].geometry.location);
				}

			} else { 
				console.log("Geocode Error" + status);
			}
		});
	}

	//makeWeatherRequest makes ajax request to Dark Sky API
	function makeWeatherRequest(latitude, longitude, formatAddress){

		var url = "https://api.forecast.io/forecast/" ;
		var api = "93d4a7fc4b32c97d66299850255244ee";
		var lat = latitude ;
		var lon = longitude;

		//Clears weather display div
		$("#insertWeather").html(" ");

		var requestWeather = $.ajax({
			url: url + api + '/' + lat + ',' + lon + "?units=auto",
			dataType: "jsonp"
		});

		//If the request is succusessful, it will call the addWeatherToPage function
		requestWeather.done(function(data){
			addWeatherToPage(data);
			console.log(data);
			addCityName(formatAddress);
		});

		//If the request fails, error and status will be console logged
		requestWeather.fail(function(jqXHR, status, error){
			console.log(status);
			console.log(error);
		});	
	}

	//convertTime converts timestamp to readble date
	function convertTime(unix){
		var dt = unix * 1000;
		var date = new Date(dt);
		var dayOfTheWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
		var monthName = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
		var formattedDate = dayOfTheWeek[date.getDay()] + ", " + monthName[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();

		 return formattedDate; 
	};

	//addCityName adds city name above weather
	function addCityName(city){
		$("#cityName").html(city);
	};

	//Formats weather data 
	function addWeatherToPage(data){
		var htmlString = "";

		for(var i = 0; i < 3; i++){ 
			htmlString += "<div class='col-md-4'" +
				"<p>" + convertTime(data.daily.data[i].time) + "</p>" +
				"<p>" + data.daily.data[i].apparentTemperatureMax + "°" + " / " + data.daily.data[i].apparentTemperatureMin + "°" + "</p>" +
				"<canvas class='skycons' id='icon"+[i] + "'" + " width='64' height='64' data-icon=" + data.daily.data[i].icon + ">" + "</canvas>" +
				"<p>" + "Humidity: " + (data.daily.data[i].humidity * 100).toFixed(0) + "% " + "</p>" +
				"<p>" + "Precipitation: " + Math.round(data.daily.data[i].precipProbability * 100) + "% " + "</p>" +
				"<p>" + "Pressure: " + data.daily.data[i].pressure + "</p>" +
				"<p>" + data.daily.data[i].summary + "</p>" +
				"</div>"
		}
			//appends weather data & format into the insertWeather div
			$("#insertWeather").append(htmlString);

			//iterates through the canvas with class of .skycons
			for (var i = 0; i < 3; i++){
				var icons = $('.skycons');

				//selects class of skycon and pulls data attribute of each iteration. assigns to variable 'icon'
				var icon = $(icons[i]).data('icon');

				//passes the data attribute (i.e. rainy day) and the iteration into weatherIcon function
				weatherIcon(icon, i);
			}
	};

	//creates new skycons 
	var skycons = new Skycons({"color": "#9a98b5"});
	
	//weatherIcon compares icon string (i.e. 'rainy') with set skycons. If they match, the skycon is added to the approprate canvas
	function weatherIcon(icon, i){
		if (icon === "clear-day") {
			return skycons.add("icon" + i, Skycons.CLEAR_DAY);

		} else if (icon === "clear-night") {
			return skycons.add("icon" + i, Skycons.CLEAR_NIGHT);

		} else if (icon === "rain") {
			return skycons.add("icon"+ i, Skycons.RAIN);

		} else if (icon === "snow") {
			return skycons.add("icon" + i, Skycons.SNOW);

		} else if (icon === "sleet") {
			return skycons.add("icon" + i, Skycons.SLEET);

		} else if (icon === "wind") {
			return skycons.add("icon" + i, Skycons.WIND);

		} else if (icon === "fog") {
			return skycons.add("icon" + i, Skycons.FOG);

		} else if (icon === "cloudy") {
			return skycons.add("icon" + i, Skycons.CLOUDY);

		} else if (icon === "clear-night") {
			return skycons.add("icon" + i, Skycons.CLEAR_NIGHT);

		} else if (icon === "partly-cloudy-day") {
			return skycons.add("icon" + i, Skycons.PARTLY_CLOUDY_DAY);

		} else if (icon === "partly-cloudy-night") {
			return skycons.add("icon" + i, Skycons.PARTLY_CLOUDY_NIGHT);

		} else {
			console.log("Dark Sky icon did not return a matching case");
		}

	}
		skycons.play();
		 

})();
