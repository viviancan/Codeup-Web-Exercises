// (function() {
// 	"use strict";
// /*------------------------------------------------------------------------------------------------
// 	Weather Functions
// ------------------------------------------------------------------------------------------------*/
// 	//addWeatherToPage adds weather to page for each day. calls weatherFormat function for proper formatting
// 	function addWeatherToPage(data){
// 		data.list.forEach(function(weather){
// 			weatherFormat(weather);
// 		});
// 	}

// 	//weatherFormat formats all the weather data from the API 
// 	function weatherFormat(weather){
// 		var htmlString = "";
// 		htmlString += "<div class='col-md-4'" +
// 			"<p>" + "<strong>" + convertTime(weather.dt) + "</strong>" + "</p>" +
// 			"<p>" + weather.temp.max + "°" + " / " + weather.temp.min + "°" + "</p>" +
// 			"<p>" + "<img src='http://openweathermap.org/img/w/" + weather.weather[0].icon + ".png'>" + "</p>" +
// 			"<p>" + "<strong>" + weather.weather[0].main + "</strong>"+ ": " + weather.weather[0].description + "</p>" +
// 			"<p>" + "<strong>Humidity: </strong>" + weather.humidity + "</p>" +
// 			"<p>" + "<strong>Wind: </strong>" + weather.speed + "</td>" + "</p>" +
// 			"<p>" + "<strong>Pressure: </strong>" + weather.pressure + "</p>" +
// 			"</div>"

// 		//appends weather data & format into the insertWeather div
// 		$("#insertWeather").append(htmlString);
// 	};

// 	//convertTime converts timestamp to readble date
// 	function convertTime(unix){
// 		var dt = unix * 1000;
// 		var date = new Date(dt);
// 		var dayOfTheWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
// 		var monthName = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
// 		var formattedDate = dayOfTheWeek[date.getDay()] + ", " + monthName[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();

// 		return formattedDate; 
// 	};

// 	//addCityName adds city name above weather
// 	function addCityName(city){
// 		$("#cityName").html(city);
// 	};


// /*------------------------------------------------------------------------------------------------
// 	Maps - Get weather by dragging marker
// ------------------------------------------------------------------------------------------------*/
// 	//global marker variable
// 	var marker;
		
// 	//Set default locaton to SATX
// 	var defLocation = new google.maps.LatLng(29.426791, -98.489602);

// 	//map options
// 	var mapOptions = {
// 		zoom: 5,
// 		center: defLocation,
// 		mapTypeId: 'roadmap'
// 	};

// 	//Creates new map with specified map options in 'map' div
// 	var map = new google.maps.Map(document.getElementById('map'), mapOptions);

// 	//Creates draggable marker at default location 
// 	marker = new google.maps.Marker({
// 		position: defLocation,
// 		map: map,
// 		draggable: true,
// 		title: "Drag me!"
// 	});


// 	google.maps.event.addListener(marker, 'dragend', function(){
		
// 		var latLng = {
// 			lat: this.getPosition().lat(),
// 			lng: this.getPosition().lng()
// 		}

// 		//creates new geocoder for marker dragger
// 		var geocoder = new google.maps.Geocoder();
		
// 		//reverse geocoding 
// 		geocoder.geocode( {'location': latLng}, function(results, status){
// 			if (status == 'OK'){
// 				console.log(results)
// 				var address = (results[4].formatted_address)

// 			} else{
// 				console.log("Geocode Error" + status);
// 			}
// 		$('#searchBox').val(address);
// 		getWeather(latLng.lat, latLng.lng, address);
// 		})
// 	});


// /*------------------------------------------------------------------------------------------------
// 	Maps - Get weather by search box
// ------------------------------------------------------------------------------------------------*/
// 	//targets search box allows for autocomplete
// 	var input = document.getElementById('searchBox');
// 	var searchBoxInput = new google.maps.places.SearchBox(input);

// 	//when enter key is pressed will run geocoding 
// 	$(input).keypress(function(e) {
// 		if(e.which == 13) {
// 			geocodeSearch();
// 		}
// 	});	

// 	//when submit button clicked, geocoding will run
// 	$("#submit").click(function() {
// 		geocodeSearch();
// 	});	


// 	//will get value in search box, then run geocoding, then make weather request
// 	function geocodeSearch (){
// 		var cityValue = $('#searchBox').val();
// 		var geocoder = new google.maps.Geocoder();
// 		var geocoderOptions = {
// 			address: cityValue
// 		}
		
// 		geocoder.geocode(geocoderOptions, function(results, status) {
// 			if (status === 'OK'){
// 				var latitude = results[0].geometry.location.lat();
// 				var longitude = results[0].geometry.location.lng();	

// 				getWeather(latitude, longitude, results[0].formatted_address);

// 				map.setCenter(results[0].geometry.location);

// 				if(!marker) {
// 					marker = new google.maps.Marker({
// 						map: map,
// 						position: results[0].geometry.location	
// 					});
// 				}else {
// 					marker.setPosition(results[0].geometry.location);
// 				}

// 			} else { 
// 				console.log("Geocode Error" + status);
// 			}
// 		});
// 	}


// })();

	var url = "https://api.forecast.io/forecast/" ;
	var api = "0dc7b340325888719faf0e2f66b95c1d";
	var lat = "29.426791" ;
	var lon = "-98.489602";

	function makeAjaxRequest(){
			var requestWeather = $.ajax({
				url: url + api + '/' + lat + ',' + lon + "?units=auto",
				dataType: "jsonp"
			});


			//If the request is succusessful, it will call the addWeatherToPage function
			requestWeather.done(function(data){
				addWeatherToPage(data);
				console.log(data);
				// addCityName(formatAddress);
				// addWeatherToPage(data);
			})

			//If the request fails, error and status will be console logged
			requestWeather.fail(function(jqXHR, status, error){
				console.log(status);
				console.log(error);
			});	
	}

	makeAjaxRequest();


	//convertTime converts timestamp to readble date
	function convertTime(unix){
		var dt = unix * 1000;
		var date = new Date(dt);
		var dayOfTheWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
		var monthName = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
		var formattedDate = dayOfTheWeek[date.getDay()] + ", " + monthName[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();

		return formattedDate; 
	};

	function addWeatherToPage(data){
		var htmlString = "";

		for(var i = 0; i < 3; i++){

			htmlString += "<div class='col-md-4'" +
				"<p>" + convertTime(data.daily.data[i].time) + "</p>" +
				"<p>" + data.daily.data[i].apparentTemperatureMax + "°" + " / " + data.daily.data[i].apparentTemperatureMin + "°" + "</p>" +
				"<p>" + data.daily.icon + " icon" + "</p>" +
				"<p>" + "Humidity: " + data.daily.data[i].humidity * 100 + "% " + "</p>" +
				"<p>" + "Precipitation : " + data.daily.data[i].precipProbability * 100 + "% " + "</p>" +
				"<p>" + "Pressure: " + data.daily.data[i].pressure + "</p>" +
				"<p>" + data.daily.data[i].summary + "</p>" +
				"</div>"

			//appends weather data & format into the insertWeather div
		}
			$("#insertWeather").append(htmlString);
	};



	// //addCityName adds city name above weather
	// function addCityName(city){
	// 	$("#cityName").html(city);
	// };








