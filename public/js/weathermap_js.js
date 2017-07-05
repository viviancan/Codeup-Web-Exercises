(function() {
	"use strict";

	var requestWeather = $.get("http://api.openweathermap.org/data/2.5/weather", {
		APPID: "6ac2f305a43f171cb8e8ad2076b9a183" , 
		q: "San Antonio, TX"
	});

	requestWeather.done(function(data){
		console.log(data);
	});

	requestWeather.fail(function(jqXHR, status, error){
			console.log("Status is: " + status);
			console.log("Error is:" + error);
	});

	function addWeatherToPage(){

	}
























})();