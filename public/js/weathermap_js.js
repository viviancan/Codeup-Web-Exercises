(function() {
	"use strict";


	var requestWeather = $.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
		APPID: "6ac2f305a43f171cb8e8ad2076b9a183" , 
		id: 4726206 ,
		units: "imperial",
		cnt: 3
	});

	requestWeather.done(function(data){
		console.log(data);
		addWeatherToPage(data);
	});

	requestWeather.fail(function(jqXHR, status, error){
			console.log(status);
			console.log(error);
	});

	function addWeatherToPage(data){
		data.list.forEach(function(weather){
			weatherFormat(weather);
		});
	}

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

		$("#insertWeather").append(htmlString);
	};

	function convertTime(unix){
		var dt = unix * 1000;
		var date = new Date(dt);
		var dayOfTheWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
		var monthName = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
		var formattedDate = dayOfTheWeek[date.getDay()] + ", " + monthName[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();

		return formattedDate; 
	}


		function map() {
				//Creates new geocoder
				var geocoder = new google.maps.Geocoder();

				//Set default locaton to SATX
				var defLocation = {lat: 29.426791, lng: -98.489602};

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
					map: map
				});
		 }
		  map();








})();