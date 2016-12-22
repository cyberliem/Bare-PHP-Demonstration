$(document).ready( function () {
    'use strict';
    var guitarList = ['Baldwin', 'Charvel', 'Columbus', 'Cort','Corbart', 'Corman', 'Fender', 'Gibson'];
    $('#searchBarText').autocomplete({
		minLength:3,
		source: function (request, response) {
				//callDB.
			 $.ajax({
				dataType: "json",
				method: "get",
				url: "getEventsName.php",
				data: {
					kw:request.term
					}
				}	
			).done(function (data, status, request) {
		      response(data);
            
			}).fail(function(request, status, error) {
                
			}
			);
		},
		select: function(event, ui) {
				console.log(ui);
				
				
		}
    });
});
