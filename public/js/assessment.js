(function (){
	"use strict";

//Problem (1)

	function isNegative (num){
		if (parseInt(num) > -1){
			return true;  	
		} else {
			return false;
		}
	}
	
//Problem 2
	
	var total;
	var grades = [];

	function average (grades){
		for (var i = 0; i < grades.length; i++){
			total += grades[i];
			return total / grades.length;
		}
	}


		
//Problem 3 - not complete!! 

var input = [];

	function countOdds (){
		for (var i = 0; i < input.length; i++){
			if (input[i] % 2 != 0){
				return + "your number is odd";
			}
		}
	}










})();