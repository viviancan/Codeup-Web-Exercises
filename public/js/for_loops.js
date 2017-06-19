"use strict";

// DO-WHILE LOOPS *****************************************************
// I felt really proud of these few lines of code!


// This is how you get a random number between 50 and 100
var allCones = Math.floor(Math.random() * 50) + 50;

// This is how you get a random number between 1 and 5
var cones;
console.log("You have to sell " + allCones + " before you go home!! >:|")

do {
	cones = Math.floor(Math.random() * 5) + 1;
	if (cones > allCones){
		console.log("Sorry we dont have " + cones + " cones available"); 
		continue;	
	}
	console.log( cones + " cones sold ");
	allCones = allCones - cones;

} while (allCones > 0) ;

console.log("I sold all my ice cream! I hate this job! I should go to Codeup!!!")




//MULTIPLICATION TABLE *************************************************
/*
var userNum = prompt("Please choose a number between 1 and 10");

var i = 0;

while (i <= 9){
	i++
	console.log( userNum + " x " + i + " = " +  (userNum*i))
}
// ^^^This is totally wrong - did not use a FOR LOOP - UGH!!! ^^^^^^^^^^ //
*/





//MULTIPLICATION TABLE 2.0 - FOR LOOPS ***********************************
/*
var userNum = prompt("Please choose a number between 1 and 10");



for (var i = 1; i <= 10; i++) {

	console.log(userNum + " x " + i + " = " +  (userNum*i));
}
*/	

//FOR LOOPS WITH RANDOM NUMBER GENERATOR ***********************************

//var randomNumber;
//
//for (var i = 1; i <= 10; i++){
//	randomNumber = Math.floor(Math.random() * (200 - 20)) + 20;
//	
//	if (randomNumber % 2 == 0) {
//		console.log(randomNumber + " is even");
//	} else {
//		console.log(randomNumber + " is odd...");
//	}

//LOOP - FOLLOW THE PATTERN ***********************************

//var output;
//var stringNumber;
//
//for (var i = 1; i <= 10; i++){
//	stringNumber = i.toString();
//	stringNumber = stringNumber.substr(stringNumber.length -1);
//	output = i.toString().
//
//
//	console.log(i.toString().repeat(i));
//

//LOOP -  ***********************************
/*
for (var i = 100; i >= 5; i++){
	console.log(i)
}
*/













