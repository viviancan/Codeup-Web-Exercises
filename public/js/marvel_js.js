(function (){
	"use strict";

	var requestMarvel = $.get("http://gateway.marvel.com/v1/public/comics?apikey=c2cb97f16bd66bc3bbcb1a28c1ad29f4");

	requestMarvel.done(function(data){
		console.log(data);
	});

	requestMarvel.fail(function(jqXHR, status, error){
			console.log("Status is: " + status);
			console.log("Error is:" + error);
	});

































})();
