(function(){
	"use strict";

	var planetsString = "Mercury|Venus|Earth|Mars|Jupiter|Saturn|Uranus|Neptune";
	var planetsArray = planetsString.split("|");

	// TODO: Convert planetsString to an array, save it to planetsArray.

	console.log(planetsArray);

	// TODO: Create a string with <br> tags between each planet. console.log() your results.
	//       Why might this be useful?

	planetsString = planetsArray.join("<br>");
	console.log(planetsString);

	// Bonus: Create a second string that would display your planets in an undordered list.
	//        You will need an opening AND closing <ul> tags around the entire string, and <li> tags around each planet.
	//        console.log() your results.

	/*for (var i = 0; i<planetsArray.length; i++){
			console.log(planetsArray[i]);

	}

*/


	planetsString = "<ul><li>";
	
	planetsString += planetsArray.join("</li><li>");
	
	planetsString += "</li></ul>";
	
	
	console.log(planetsString);
	
	document.getElementsByTagName("body")[0].innerHTML = planetsString;

})();
