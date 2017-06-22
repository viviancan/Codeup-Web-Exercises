	
(function(){
	"use strict";

// >>>>> VARIABLE ASSIGNMENT <<<<< //

	var leftDis = document.getElementById("leftDis");
	var middleDis= document.getElementById("middleDis");
	var rightDis= document.getElementById("rightDis");

	
// >>>>> FUNCTIONS <<<<< //

	function numberInput(){
		if (leftDis == !" " && middleDis == !" "){
			rightDis.innerHTML = this.value;
		}else{
			leftDis.innerHTML = this.value;
		}	
	}

	function operInput(){
		middleDis.innerHTML = this.value;
	}


// >>>>> ADD EVENT LISTENER <<<<< //

	var numberBtns = document.getElementsByClassName("num");
	for (var i = 0 ; i < numberBtns.length; i++){
		numberBtns[i].addEventListener("click", numberInput); 

		//function(){
		//document.getElementById("leftDis").innerHTML = this.value;
		//}
	};

	var operBtns = document.getElementsByClassName("oper");
	for (var i = 0 ; i < operBtns.length; i++){
		operBtns[i].addEventListener("click", operInput);
	};
	
// >>>>> MATH OPERATIONS <<<<< //




})();