(function(){
	"use strict";

//TODO:Create person object, store it in a variable named person

//TODO: Create firstName and lastName properties in your person object, and assign your name to them

/**
 * TODO:
 * Add a sayHello method to the person object that returns a greeting using
 * the firstName and lastName properties.
 * console.log the returned message to check your work
 * Example >>> person.sayHello() // returns "Hello from Rick Sanchez!"
 */


	 var person = {}
		person.firstName = "John " ;
		person.lastName = "Smith" ;
		
		person.sayHello = function () {
			return "Hello from " + person.firstName + person.lastName + "!";
	 };

	 console.log(person.sayHello());




})();
