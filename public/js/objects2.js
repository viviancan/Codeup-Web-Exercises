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
		person.firstName = "John" ;
		person.lastName = "Smith" ;
		
		person.sayHello = function () {
			return "Hello from " + person.firstName + " " + person.lastName + "!";
	 };

	 console.log(person.sayHello());

/** TODO: Remember this problem from before?
 *
 * HEB has an offer for the shoppers that buy products amounting to more
 * than $200. Write a JS program, using conditionals, that logs to the
 * browser, how much does Ryan, Cameron and George need to pay. We know that
 * Cameron bought $180, Ryan $250 and George $320. Your program will have to
 * display a line with the name of the person, the amount before the
 * discount, the discount, if any, and the amount after the discount.
 *
 * Uncomment the lines below to create an array of objects where each object
 * represents one shopper. Use a foreach loop to iterate through the array,
 * and console.log the relevant messages for each person
*/
	var discountAmount;
	var finalTotal;

	var shoppers = [
	    {
	    	name: 'Cameron', 
	    	amount: 180
	    },
	    {
	    	name: 'Ryan', 
	    	amount: 250
	    },
	    {
	    	name: 'George', 
	    	amount: 320
	    }
	];

	for (var i = 0; i < shoppers.length ; i++){
		if (shoppers[i].amount>200){
			discountAmount = shoppers[i].amount * .20
			finalTotal = shoppers[i].amount - discountAmount
			console.log("Customer: " + shoppers[i].name + ". Your original bill is: " + shoppers[i].amount + 
				". Your discount amount is: " + discountAmount + ". Your final total is: " + finalTotal);
		} else{
			console.log("Customer: " + shoppers[i].name + ". Your original bill is: " + shoppers[i].amount + 
				". Sorry you did not spend enough for a discount :(");
		}
	}
		
	shoppers.forEach(function(shoppers){
		if (shoppers.amount>200){
			discountAmount = shoppers.amount * .20
			finalTotal = shoppers.amount - discountAmount
			console.log("Customer: " + shoppers.name + ". Your original bill is: " + shoppers.amount + 
				". Your discount amount is: " + discountAmount + ". Your final total is: " + finalTotal);
		} else{
			console.log("Customer: " + shoppers.name + ". Your original bill is: " + shoppers.amount + 
				". Sorry you did not spend enough for a discount :(");
		}
	});

		// todo:
		// Create an array of objects that represent books.
		// Each book should have a title and an author property.
		// The author property should be an object with a firstName and lastName.
		// Be creative and add at least 5 books to the array
		// var books = [todo];
	var books = [
		{
			title: "Hitchhiker's Guide to the Galaxy" ,
			author: {
				firstName: "Douglas",
				lastName: "Adams"
			}
		},
		{
			title: "20,000 Leagues Under the Sea",  
			author: {
				firstName: "Jules",
				lastName: "Verne"
			}
		},
		{
			title: "Dhalgren",
			author: {
				firstName: "Samuel",
				lastName: "Delaney"
			}
		},
		{
			title: "Lord of the Rings",
			author: {
				firstName: "J.R.R.",
				lastName: "Tolkien"
			}
		},
		{
			title: "War of the Worlds",
			author: {
				firstName: "H.G.",
				lastName: "Wells"
			}
		}
	];

		console.log(books);
		

		// todo:
		// Loop through the array of books using .forEach and print out the specified information about each one.
		// start loop here

		// end loop here
	books.forEach(function(book, index){
		console.log("Book #" + (index + 1));
		console.log("Title: " + book.title);
		console.log("Author: " + book.author.firstName + " " + book.author.lastName);
		console.log("---");
	});
	
})();

/*
// BONUS 1 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    Add a property “keywords” that contains an array of possibly genres the book may be categoriezed by
    Add a boolean property “available” and set it to true
    Add a dateAvailable property that has a string of the date/time when the book will be available
    Add a method rent() that... 
        - changes the available property to false if it is not already false
        - sets the dateAvailable to a date exactly two weeks from when the rent() method is called 
        (to do this, research the JS Date object and use methods from it in your code)
    Add a method returned() that...
        - changes the available property to true
        - changes the dateAvailble property to the string “now”

*/
