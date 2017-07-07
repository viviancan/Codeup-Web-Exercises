(function() {
	"use strict";

//Ajax request to openWeather API
	// var requestWeather = $.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
	// 	APPID: "6ac2f305a43f171cb8e8ad2076b9a183" , 
	// 	id: 4726206 ,
	// 	units: "imperial",
	// 	cnt: 3
	// });

// //If the request is succusessful, it will call the addWeatherToPage function
// 	requestWeather.done(function(data){
// 		console.log(data);
// 		addWeatherToPage(data);
// 	});

// //If the request fails, error and status will be console logged
// 	requestWeather.fail(function(jqXHR, status, error){
// 			console.log(status);
// 			console.log(error);
// 	});

//addWeatherToPage adds weather to page for each day. calls weatherFormat function for proper formatting
	function addWeatherToPage(data){
		data.list.forEach(function(weather){
			weatherFormat(weather);
		});
	}

//weatherFormat formats all the weather data from the API 
	function weatherFormat(weather){
		var htmlString = "";
		htmlString += "<div class='col-md-4'" +
			"<p>"+ "<strong>" + convertTime(weather.dt) + "</strong>" + "</p>" +
			"<p>" + weather.temp.max + "°" + " / " + weather.temp.min + "°" + "</p>" +
			"<p>" + "<img src='http://openweathermap.org/img/w/" + weather.weather[0].icon + ".png'>" + "</p>" +
			"<p>" + "<strong>" + weather.weather[0].main + "</strong>"+ ": " + weather.weather[0].description + "</p>" +
			"<p>" + "<strong>Humidity: </strong>" + weather.humidity + "</p>" +
			"<p>" + "<strong>Wind: </strong>" + weather.speed + "</td>" + "</p>" +
			"<p>" + "<strong>Pressure: </strong>" + weather.pressure + "</p>" +
			"</div>"

//appends weather data & format into the insertWeather div
		$("#insertWeather").append(htmlString);
	};

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



/*------------------------------------------------------------------------------------------------------------------//	
													MAP INFORMATION 
//------------------------------------------------------------------------------------------------------------------*/

//Sets up orginal map
	function map() {

		//Set default locaton to SATX
		var defLocation = new google.maps.LatLng(29.426791, -98.489602);

		//map options
		var mapOptions = {
			zoom: 4,
			center: defLocation
		};

		//Creates new map with specified map options in 'map' div
		var map = new google.maps.Map(document.getElementById('map'), mapOptions);

		//creates marker at default location 
		var marker = new google.maps.Marker({
			position: defLocation,
			map: map,
			draggable: true,
			title: "Drag me!"
		});

		google.maps.event.addListener(marker, 'dragend', function(){
			$("#insertWeather").html(" ");
			var latMapMarker = this.getPosition().lat();
			var longMapMarker = this.getPosition().lng();

			console.log(latMapMarker);
			console.log(longMapMarker);

			var requestWeather = $.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
				APPID: "6ac2f305a43f171cb8e8ad2076b9a183" , 
				lat: latMapMarker ,
				lon: longMapMarker,
				units: "imperial",
				cnt: 3
			})

			//If the request is succusessful, it will call the addWeatherToPage function
			requestWeather.done(function(data){
				console.log(data);
				// $("#cityName").html(data.city.name);
				addCityName(data.city.name);
				addWeatherToPage(data);
			})

			//If the request fails, error and status will be console logged
			requestWeather.fail(function(jqXHR, status, error){
				console.log(status);
				console.log(error);
			});
		});

		
	}
		map();


	// }); 



/*------------------------------------------------------------------------------------------------------------------//	
					(Version) User inputs latitude and longitude values --> Returns weather forecast
//------------------------------------------------------------------------------------------------------------------*/

	// // Makes submit button clickable
	// $("#submit").click(function(){

	// 	//Resets display divs to empty between clicks
	// 	$("#insertWeather").html(" ");

	// 	//Stores user input of lat/lng into variables
	// 	var latInput = $("#latBox").val(); 
	// 	var longInput = $("#longBox").val();

	// 	console.log("Latitutde: " + latInput + " Longitude: " + longInput);
	// 	console.log("button clicked");

	// 	var requestWeather = $.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
	// 		APPID: "6ac2f305a43f171cb8e8ad2076b9a183" , 
	// 		lat: latInput ,
	// 		lon: longInput,
	// 		units: "imperial",
	// 		cnt: 3
	// 	});

	// 	//If the request is succusessful, it will call the addWeatherToPage function
	// 	requestWeather.done(function(data){
	// 		console.log(data);
	// 		// $("#cityName").html(data.city.name);
	// 		addCityName(data.city.name);
	// 		addWeatherToPage(data);
	// 	});

	// 	//If the request fails, error and status will be console logged
	// 	requestWeather.fail(function(jqXHR, status, error){
	// 		console.log(status);
	// 		console.log(error);
	// 	});

	// }); 





})();