(function (){
	"use strict";

//Problem 1

	function isNegative (num){
		if (num > -1){
			return false;  	
		} else {
			return true;
		}
	}

//Problem 2

	function average (grades){
		var sumOfGrades = 0;

		for (var i = 0; i < grades.length; i++){		
			sumOfGrades += grades[i];
		}
		return (sumOfGrades) / (grades.length);
	}

		
//Problem 3 

	function countOdds (inputNumber){
		var oddCount = 0;

		for (var i = 0; i < inputNumber.length; i++){
			if (input[i] % 2 != 0){
				oddCount++;
			}
		}
		return oddCount;
	}

//Problem 4 

	function convertNameToObject (userName){
		var nameArray = userName.split(" ");

		var nameObject = {
			firstName: nameArray[0],
			lastName: nameArray [1]
		}

		return nameObject;
	}

//Problem 5

	function fiveTo(userNumber){
		var numberList = [];
		for (var i = 5; i < userNumber; i++ ){
			numberList.push(i);
		}
		return numberList; 
	}


//Problem 6


	function upperCaseLastNames(arrayOfNames){

		for(var i = 0; i < arrayOfNames.length; i++){

			arrayOfNames[i].lastName = arrayOfNames[i].lastName.charAt(0).toUpperCase() + arrayOfNames[i].lastName.slice(1);

		}

		return arrayOfNames;
	}















})();