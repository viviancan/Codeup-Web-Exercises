(function(){
    "use strict";

    // TODO: Create an array of 4 people's names using literal array notation, in a variable called 'names'.

var names = ['David' , 'Lonetta', 'Ari', 'Miriam'];
	for (var i = 0; i < names.length; i++){
		console.log("(1)The name is: " + names[i]);
	}

names.forEach(function(element, index, array){
	console.log("(2)The name is: " + element);
}
	)

})();

// BONUS ACTIIVTY***************************************************** 
//NOT COMPLETE!!!

var userF = confirm("Are you converting from Farenheight to Celsius?");
var userC;

if (userF == true){
	var userInput = prompt("Please enter temperature in degrees F.")
	alert("The temperature in Celsius is : " + (userInput - 32)*(5/9));

} else confirm("Are you converting from Celsius to Far");














