(function(){
	"use strict";

	var request = $.get("/data/blog.json");
		
	request.done(function(data, status){
		console.log(data);
		addBlogPost(data);
	});


	request.fail(function(jqXHR, status, error){
		console.log(status);
		console.log(error);
	});


	function addBlogPost(data){
		data.forEach(function(post){
			$("#posts").append(
				"<h1>" + post.date + "</h1>" +
				"<h2>" + post.title + "</h2>" +
				"<p class=content>"+ post.content + "</p>" +
				"<div class=category>"+ "Categories: " + post.categories.join(", ") + "</div>" 
			);
		});
	};





})();