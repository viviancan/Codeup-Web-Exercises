"use strict";

//Write a function called `identity(input)` that takes in an argument called input and returns that input.

function identity (input) {
	return "The input is " + input ; 
}
console.log(identity(42));

//Write a function called `getRandomNumber(min, max)` that returns a random number between min and max values sent to that funciton call.

function getRandomNumber(min, max) {
	return Math.floor(Math.random() * (max - min)) + min;
}
console.log(getRandomNumber(2, 10));

//Write a function called `first(input)` that returns the first character in the provided string. 

function first(input) {
	return "The first character is " + input.charAt(0);
}
console.log(first("Dog"));

//Write a fuction called `last(input)` that returns the last character of a string

function last(input) {
	return "The last character is " + input.charAt(input.length -1);
}
console.log(last("Dog"));


//Write a function called `rest(input)` that returns everything but the first character of a string.

function rest(input) {
	return "Everything but the first character is " + input.substring(1);
}
console.log(rest("Dog"));

//Write a function called `reverse(input)` that takes a string and returns it reversed.

var splitString; 
var reverseArray;
var joinArray;

function reverse(input) {
	splitString = input.split("");
	reverseArray = splitString.reverse("");
	joinArray = reverseArray.join("");
	return "The string reversed is " + joinArray;
}
console.log(reverse("GoCodeup"));

//Write a function called `isNumeric(input)` that takes an input and returns a boolean if the input is numeric.

function isNumeric(input){
	return isNaN(input) ;
}
console.log(isNumeric(20));

//Write a function called `count(input)` that takes in a string and returns the number of characters.

function count(input){
	return "There are " + input.length + " characters.";
}
console.log(count("Education"));

//Write a function called `add(a, b)` that returns the sum of a and b

function add(a, b){
	return (a + b); 
}
console.log(add(5,10));


//Write a function called `subtract(a, b)` that return the difference between the two inputs.

function subtract(a, b){
	return "The differece of a and b is " + (a - b); 
}
console.log(subtract(5,10));

//Write multiply(a, b) that returns the product

function multiply(a, b){
	return "The product of a and b is " + (a * b); 
}
console.log(multiply(5,10));

//Write a divide(numerator, denominator) function that returns a divided by b

function divide(numerator, denominator){
	return "The quotient is " + (numerator/denominator); 
}
console.log(divide(5,10));

//Write a remainder(number, divisor) function that returns the remainder left over when dividing `number` by the `divisor`

function remainder(number, divisor){
	return "The remainder is " + (number % divisor); 
}
console.log(remainder(10,3));

//Write the function `square(a)` that takes in a number and returns the number multiplied by itself.

function square(a){
	return (a * a); 
}
console.log(square(5));


//# Super Duper Gold-Star Bonus ********************************************************************

//Write a function called sumOfSquares(a, b) that uses only 
//>your add() function and your square function and not + or * operators

var squareA;
var squareB;
function sumOfSquares (a, b){
	squareA = square(a);
	squareB = square(b);
	return "The sum of squares is " + add(squareA, squareB);
}
console.log(sumOfSquares(4,2));


//Write a function called doMath(operator, a, b) that takes 3 parameters. 
//The first parameter is the name of the math function you want to apply. 
//a and b are the two numbers to run that function on.

var add = add()
var subtract = subtract();
var multiply = multiply();
var divide = divide();
function doMath(operator, a , b){
	return 
}








