(function(){
//---------------------------------------------------------------------//


	$('button').click(function(){
		$('ul').each(function(){
			$(this).children().last().toggleClass('highlight2');
		})
	})


/*Solution
	Create a button that, when clicked, makes the last li in each ul have a yellow background.

	$('button').click(function(e){
		$('ul').each(function(index,element){
			$(this).children().last().css('background-color', 'yellow');
		})
	});
*/



	

//---------------------------------------------------------------------//

/*
	$('h3').click(function(){
		$('li').toggleClass('bold');		
		
	});
*/

//SOLUTION
	
	$('h3').click(function(){
		$(this).next().children().toggleClass('bold');

	});

//---------------------------------------------------------------------//


//SOLUTION

	$('li').click(function(){
		$(this).parent().children().first().css('color', 'blue');
	});














})();