// TODO: complete this metho
// If doRounding is true, round the result to the nearest integer.
// Otherwise, output the complete value

(function() {
	"use strict";

	var circle = {
		radius: 3,

		getArea: function (radius) {
			return Math.PI * (circle.radius * circle.radius);
		},

		logInfo: function (doRounding) {
			var area = circle.getArea();
			if (doRounding === true) {
				 area = Math.round(area);
			}

			console.log("Area of a circle with radius: " + this.radius + ", is: " + area);
		}
	};

	// log info about the circle
	console.log("Raw circle information");
	circle.logInfo(false);
	console.log("Circle information rounded to the nearest whole number");
	circle.logInfo(true);

	console.log("=======================================================");



	// TODO: Change the radius of the circle to 5.
	circle.radius = 5;
	// log info about the circle
	console.log("Raw circle information");
	circle.logInfo(false);
	console.log("Circle information rounded to the nearest whole number");
	circle.logInfo(true);
})();
