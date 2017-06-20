"use strict";

//LOOPING A TRIANGLE ********************************************
for (var start = "#"; start.length < 8; start += "#")
	console.log(start);


//FIZZBUZZ ********************************************

for (var i = 1 ; i <= 100; i++) { 
	if(i % 3 === 0 && i%5 === 0){
		console.log("fizzbuzz");
	} else if (i % 3 === 0){
		console.log( "fizz");
	} else if (i % 5 === 0){
		console.log("buzz");
	} else {
		console.log(i);
	}
}

//CHESS BOARD *****************************************






