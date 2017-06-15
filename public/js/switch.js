"use strict";

// Don't change the next two lines!
// This creates two variables:
//     one with the colors of the rainbow, and another with a single randome
//     another with a single random color value
// TODO: create a case statement that will handle every color except indigo and violet
// TODO: when a color is encountered log a message that tells the color, and an object of that color
//       example: Blue is the color of the sky.

// TODO: create a default case that will catch indigo and violet
// TODO: for the default case, log: I do not know anything by that color.

//EXERCISE - USE A SWITCH
/*
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

switch (color) {
	case "red":
		console.log("red is the color of an apple");
		break;
	case "orange":
		console.log("orange is the color of a basketball");
		break;
	case "yellow":
		console.log("yellow is the color of a lemon");
		break;
	case "green":
		console.log("Green is the color of the grass");
		break;
	case "blue":
		console.log("Blue is the color of the ocean");
		break;
	default: 
		console.log(" I do not know anything by that color.");
		break;
}
*/

/******************************** 
	Trying to use objects 

var cameron = {firstName:"Cameron" , totalPrice:180};
var ryan = {firstName:"Ryan", totalPrice: 320};

if (cameron.totalPrice > 200){
	console.log(cameron.firstName + cameron.totalPrice + cameron.totalPrice - (cameron.totalPrice * .10));
} else {
	console.log(cameron.firstName + cameron.totalPrice);

***************************************/

/*
//EXERCISE 2 (HEB)

var totalPrice = prompt("What was the total price?");
if (totalPrice == 250) {
	console.log("Ryan \nOriginal Price: "+ totalPrice + "\nDiscount Price: " + (totalPrice - (.10 * totalPrice)) + 
		"\nYou saved $25!");
} else if (totalPrice == 320) {
	console.log("George\nOriginal Price: "+ totalPrice + "\nDiscount Price: " + (totalPrice - (.10 * totalPrice)) + 
		"\nYou saved $32!");
} else if (totalPrice == 180) {
	console.log("Cameron\nOriginal Price:" + totalPrice + "\n!!Spend 20 more dollars, a total of $200, for a 10% discount!!") ;
} else {
	console.log("Please see cashier\nDid you know, for every $200 spent, save 10% on your total purchase!");
}
*/

//EXERCISE 2 (HEB AS A SWITCH)
/*
var totalPrice = prompt("What was the total price?");

switch (totalPrice) {
	case "250":
		console.log("Ryan \nOriginal Price: "+ totalPrice + "\nDiscount Price: " + (totalPrice - (.10 * totalPrice)) + 
		"\nYou saved $25!");
		break;
	case "320":
		console.log("George\nOriginal Price: "+ totalPrice + "\nDiscount Price: " + (totalPrice - (.10 * totalPrice)) + 
		"\nYou saved $32!");
		break;
	case "180":
		console.log("Cameron\nOriginal Price:" + totalPrice + "\n!!Spend 20 more dollars, a total of $200, for a 10% discount!!");
		break;
	default:
		console.log("Please see cashier\nDid you know, for every $200 spent, save 10% on your total purchase!");
		break;
}
*/

//EXERCISE 2 SOLUTION
/*
var cameron = 180;
var ryan = 250;
var george = 320;
var discountAmount;
var final Total;

*/


//EXERCISE 3 (FLIP A COIN)
 /*
 var flipACoin = Math.floor(Math.random()* 2)
 console.log(flipACoin)
if (flipACoin == 0) {
	console.log("Buy a car");
} else if (flipACoin == 1) {
	console.log("Buy a house");
}
*/

//EXERCISE 4 (WALMART)
 
/*
 var luckyNumber = Math.floor(Math.random()* 6);
 var one = 60 - (.10*60);
 var two = 60 - (.25*60);
 var four = 60 - (.50*60);
 var five = 0;

 console.log(luckyNumber);

switch (luckyNumber) {
	case 0:
		console.log("Sorry, no discount :(\nFinal Price:$60");
		break;
	case 1:
		console.log("Congrats, you get a 10% discount!\nFinal Price:" + one);
		break;
	case 2:
		console.log("Congrats, you get a 25% discount!\nFinal Price:" + two);
		break;
	case 4:
		console.log("Congrats, you get a 50% discount!\nFinal Price"+ four);
		break;
	case 5:
		console.log("Congrats, everything is paid for!! You owe ZERO dollars!");
		break;
	default:
		console.log("Please see cashier!");
}
*/



var proceed = confirm("Would you like to enter a number?") ; 

if (proceed){
	var number = prompt("Please enter a number.");
	if (isNAN(parseFloat(number))){
		console.log("Not a valid number.");
	}else {
		if (number % 2 === 0){
			alert("Your number is even.");
		}else {
			alert("Your number is odd.");
		}

		alert("Your number plus 100 is " + (number + 100));

	if (number < 0){
		console.log(number + " is positive");
	} else {
		console.log(number + " is negative");
	}


}else {
	console.log("Another time then...");
}








