"use strict";

$(document).ready(function() {

	$('#showFaq').click(function(event){
	 	event.preventDefault();
	 	$('dd').toggleClass('invisible');
	})

	// $('dt').click(function(){
	// 	$(this).css('background-color','yellow');
	// })

	$('dt').click(function(event){
		event.preventDefault();
		$(this).toggleClass('highlight');
	})

	$('button').click(function(){
		$('ul li:last-child').toggleClass('highlight2')

		//css('background-color','yellow');
	})


 });
