	(function() {
		"use strict";

		// TODO: Create an ajax GET request for /data/inventory.json

		// TODO: Take the data from inventory.json and append it to the products table
		//       HINT: Your data should come back as a JSON object; use console.log() to inspect
		//             its contents and fields
		//       HINT: You will want to target #insertProducts for your new HTML elements


		// $("#ajax").click(function(){
		// 	$.get('/data/inventory.json').done(function(data) {
		// 		console.log(data);

		// 		data.forEach(function(objectTool){
		// 		$('#insertProducts').append('<tr><td>'+ objectTool.title + '</td>' + '<td>' + objectTool.quantity+'</td>' 
		// 			+ '<td>'+ objectTool.price + '</td>' + '<td>'+ objectTool.categories + '</td></tr>');
		// 		})
		// 	})
		// });


//Solution//
		var request = $.get("/data/inventory.json");

		$("#ajax").click(function(){
			request.done(function (data, status){
				console.log(data);
				addToolsToPage(data);
			});
		});



		request.fail(function(jqXHR, status, error){
			console.log(status);
			console.log(error);
		});

		function addToolsToPage(data){
			data.forEach(function(tool){
				$("#insertProducts").append(
					"<tr>" + 
					"<td>" + tool.title + "</td>" +
					"<td>" + tool.quantity + "</td>" +
					"<td>" + tool.price + "</td>" +
					"<td>" + tool.categories.join(", ") + "</td>" +
					"</tr>"
				);
			});
			

		};

	})();