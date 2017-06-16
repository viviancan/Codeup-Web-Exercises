"use strict";
//EXERCISE 1 ***************************************************************

/**
 * TODO:
 * Create a function called 'sayHello' that takes a parameter 'name'.
 * When called, the function should return a message that says hello to the passed in name.
 *
 * Example
 *  > sayHello("codeup") // returns "Hello, codeup!"
**/

function sayHello (name) {
	return "Hello, " + name ;
};

console.log(sayHello("Vivian"));

//EXERCISE 2 ***************************************************************

/**
 * TODO:
 * Call the function 'sayHello' passing the variable 'myNameIs' as a parameter.
 * Store the result of the function call in a variable named 'helloMessage'.
 * console.log 'helloMessage' to check your work
 
**/

var myNameIs = "Vivian" ;
var helloMessage = sayHello(myNameIs);
console.log(helloMessage);



//EXERCISE 3 ***************************************************************

// Don't modify the following line, it generates a random number between 1 and
// 100 and stores it in a variable named random
var random = Math.floor((Math.random() * 100) + 1);

/**
 * TODO:
 * Create a function called 'isOdd' that takes a number as a parameter.
 * The function should use the ternary operator to return a message.
 * The message should contain the number being checked, and whether or not the
 * number is odd
 *
 * Example
 *  > isOdd(42) // returns "42 is not odd!"
 *
 * Call the function 'isOdd' passing the variable 'random' as a parameter.
 * console.log *outside of the function* to check your work
 */


function isOdd (random) {

	return (random % 2 === 0) ? random + " is not odd" : random + " is odd" ;  
};
console.log(isOdd(random));



//EXERCISE 4 ***************************************************************

/**
 * TODO: Create a function named 'calculateTip' to calculate a tip on a bill at a
 * restaurant
 *
 * the function should accept a tip percentage and the total of the bill, and
 * return the amount to tip
 *
 * Example
 *  > calculateTip(0.20, 20) // returns 4
 */



function calculateTip (tipPercentage , billTotal) {
	return "Tip Amount: $" + ((tipPercentage / 100) * billTotal) ;
}
console.log(calculateTip(10 , 400));




//EXERCISE 5 ***************************************************************

/**
 * TODO: use prompt and alert in combination with your calculateTip function to
 * prompt the user for the bill total and a percentage they would like to tip,
 * then display the dollar amount they should tip
 */



var tipPercentage = prompt("What is the tip percentage?");
var billTotal = prompt("What is the total of your bill?");

function calculateTip (tipPercentage , billTotal) {
	return "Tip Amount: $" + ((tipPercentage / 100) * billTotal) ;
}
alert(calculateTip(tipPercentage, billTotal));













