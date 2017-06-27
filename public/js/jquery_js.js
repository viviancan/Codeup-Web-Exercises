"use strict";

$(document).ready(function(){

//Part I =========================================================
	//alert("The DOM has finished loading!");

/*=========================================================
						Selectors
=========================================================*/

//ID Selectors 
	/*var contents = $("#intro").html();
		alert(contents);*/

//Class Selectors
	
	//$('.codeup').css('border', '1px solid red');

//Element Selectors
	// $('li').css('font-size' , '20px');

	// $('h1, p, li').css('background-color', 'yellow');

	// var contents = $('h1').html();
	// 	alert(contents);

//Multiple Selectors
	//var multipleSelectors = $('hi, p, li');

/*=========================================================
						Mouse Events 
=========================================================*/

$('h1').click(changeColor);

function changeColor (){
	$(this).css('background-color', 'red');	
}

$('p').dblclick(changeFontSize);

function changeFontSize(){
	$(this).css('font-size', '18px');
}

$('li').hover(
	function (){
		$(this).css('color', 'red');
	},
	function (){
		$(this).css('color', 'white');
	}
);
	








});