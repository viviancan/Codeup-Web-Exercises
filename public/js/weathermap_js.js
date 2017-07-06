(function() {
	"use strict";

	// var requestWeather = $.get("http://api.openweathermap.org/data/2.5/weather", {
	// 	APPID: "6ac2f305a43f171cb8e8ad2076b9a183" , 
	// 	q: "San Antonio, TX",
	// 	units: "imperial"
	// });

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
			$("#insertWeather").append(
				"<tr>" +
				"<th>" + "Day ()" + "</th>" + 
				"</tr>" +

				"<tr>" + 
				"<td>" + weather.temp.max + "°" + " / " + weather.temp.min + "°" + "</td>" +
				"</tr>" +

				"<tr>" +
				"<td>" + "<img src='http://openweathermap.org/img/w/" + weather.weather[0].icon + ".png'>" +
				"</td>"+
				"</tr>"+

				"<tr>" + 
				"<td>" +  weather.weather[0].main + ": " + weather.weather[0].description + "</td>" +
				"</tr>" +

				"<tr>" + 
				"<td>" + "<strong>Humidity: </strong>" + weather.humidity + "</td>" +
				"</tr>" +

				"<tr>" + 
				"<td>" + "<strong>Wind: </strong>" + weather.speed + "</td>" +
				"</tr>" +

				"<tr>" + 
				"<td>" + "<strong>Pressure: </strong>" + weather.pressure + "</td>" +
				"</tr>"



			)
		});
	};


})();