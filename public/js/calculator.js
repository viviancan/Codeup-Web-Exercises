	
(function(){
	"use strict";

// ========================== VARIABLES ================================//

	var leftDis = document.getElementById("leftDis");
	var middleDis = document.getElementById("middleDis");
	var rightDis = document.getElementById("rightDis");
	var equal = document.getElementById("equal");
	var clearCal = document.getElementById("clear");
	var decimal = document.getElementById("decimal");
	

// ========================== ADD EVENT LISTENER ======================== //

	var numberBtns = document.getElementsByClassName("num");
	for (var i = 0 ; i < numberBtns.length; i++){
		numberBtns[i].addEventListener("click", numberInput); 
	}

	var operBtns = document.getElementsByClassName("oper");
	for (var i = 0 ; i < operBtns.length; i++){
		operBtns[i].addEventListener("click", operInput);
	}

	equal.addEventListener("click", mathOperation);

	clearCal.addEventListener("click", clearCalculator);

	decimal.addEventListener("click", addDecimal);


// ========================== FUNCTIONS ================================ //

	function addDecimal(){
		if (middleDis.innerHTML == ""){
			if (leftDis.innerHTML.indexOf(".") < 0){
				leftDis.innerHTML += ".";	
				}
			}else { 
				if (rightDis.innerHTML.indexOf(".") < 0 ){
					rightDis.innerHTML += ".";
				}
		     };
	}

	function numberInput(){
		if (leftDis.innerText != "" && middleDis.innerText != ""){
			rightDis.innerHTML += this.value;
		}else{
			leftDis.innerHTML += this.value;
		}	
	}

	function operInput(){
		middleDis.innerHTML = this.value;
	}

	function clearCalculator(){
		leftDis.innerText = "";
		middleDis.innerText = "";
		rightDis.innerText = "";
	}

	function mathClear(){
		middleDis.innerText = "";
		rightDis.innerText = "";
	}


// ========================== MATH OPERATIONS ================================ //
	function mathOperation(){
		var mathLeft = parseFloat(leftDis.innerText);
		var mathRight = parseFloat(rightDis.innerText);

		if (middleDis.innerText == "+"){
			leftDis.innerText = mathLeft + mathRight;
			mathClear();

		}else if (middleDis.innerText == "-"){
			leftDis.innerText = mathLeft - mathRight;
			mathClear();

		}else if (middleDis.innerText == "x"){
			leftDis.innerText = mathLeft * mathRight;
			mathClear();

		}else if (middleDis.innerText == "/"){
			leftDis.innerText = mathLeft / mathRight;
			mathClear();
		}else if (middleDis.innerText == "√"){
			leftDis.innerText = Math.sqrt(mathLeft);
			mathClear();
		}else if (middleDis.innerText == "^2"){
			leftDis.innerText = Math.pow(mathLeft, 2);
			mathClear();
		}
	}


})();