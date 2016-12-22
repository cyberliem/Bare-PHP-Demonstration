$(document).ready( function () {
    'use strict';
    
    $('#searchBarText').autocomplete({
		minLength:3,
		source: function (request, response) {
				//callDB.
			 $.ajax({
				dataType: "json",
				method: "get",
				url: "getEventName.php",
				data: {
					kw:request.term
					}
				}	
			).done(function (data, status, request) {
		      console.log(data);
		      response($.map(data, function (value, key) {
                return {
                    label: value.eventTitle,
                    value: value
                }
            }));
            
			}).fail(function(request, status, error) {
                
			}
			);
		},
		select: function(event, ui) {
				console.log(ui);
				event.preventDefault();
				$('#searchBarText').val(ui.item.label);
				var dtOb=ui.item.value;
				var hidTable=$('#hidTable');
				hidTable.empty();
				hidTable.append("<tr><td> <b>Title </b>: "+dtOb["eventTitle"] +"</td></tr>"
									+"<tr><td>  <b>Category </b>: "+dtOb["catDesc"] +"</td></tr>"
									+"<tr><td>  <b>Price </b>: "+dtOb["eventPrice"] +"</td></tr>"
									+"<tr><td>  <b>location</b>: "+dtOb["location"] +"</td></tr>"
									);
				console.log(hidTable);
				hidTable.show();
		},
		change: function(event, ui) {
			$('#hidTable').empty().fadeOut();
		}
    });
});
