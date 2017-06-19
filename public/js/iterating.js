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

















