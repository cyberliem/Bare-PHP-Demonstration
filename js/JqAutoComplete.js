$(document).ready( function () {
    'use strict';
    //start the auto completed
    $('#searchBarText').autocomplete({
		minLength:3,
		//source: the data list for autocomplete to display
		source: function (request, response) {
			//callJson to get data from a prepared php script.
			 $.ajax({
				dataType: "json",
				method: "get",
				url: "getEventName.php",
				data: {
					//pass the keyword from request to the call.
					kw:request.term
					}
				}	
			).done(function (data, status, request) {
			  //when the call is done, it will return a list of object 
		      console.log(data);
		      //map: parse the complex object to label (for option text)
		      //and value (for later processing)
		      response($.map(data, function (value, key) {
                return {
                    label: value.eventTitle,
                    value: value
                }
            }));
            
			}).fail(function(request, status, error) {
				//if fail then alert user, in case he/she still waiting for
				//magic...
                alert("fail AJAX call:"+ status+ " "+ error);
			}
			);
		},
		select: function(event, ui) {
			//select: what hanppen when one of the auto completed has been clicked.
			
			//since our returned object is a map of complex object, stop the default
			event.preventDefault();
			
			//set the value to label for text box (user can process to search).
			$('#searchBarText').val(ui.item.label);
			
			//get the dataObject(dtOb) from ui.
			var dtOb=ui.item.value;
			
			//get the hidden table
			var hidTable=$('#hidTable');
			
			//empty it incase there was previous data
			hidTable.empty();
			
			//append necessary data
			hidTable.append("<tr><td> <b>Title </b>: "+dtOb["eventTitle"] +"</td></tr>"
								+"<tr><td>  <b>Category </b>: "+dtOb["catDesc"] +"</td></tr>"
								+"<tr><td>  <b>Price </b>: "+dtOb["eventPrice"] +"</td></tr>"
								+"<tr><td>  <b>location</b>: "+dtOb["location"] +"</td></tr>"
								+"<tr><td>  <b>Start</b>: "+dtOb["eventStartDate"] +"</td></tr>"
								+"<tr><td>  <b>End</b>: "+dtOb["eventEndDate"] +"</td></tr>"
								+"<tr><td>  <b>Venue</b>: "+dtOb["venueName"] +"</td></tr>"
								+"<tr><td>  <b>Description</b>: "+dtOb["eventDescription"] +"</td></tr>"
								);
			//show it.
			hidTable.show();
		},
		change: function(event, ui) {
			//if the auto complete change, hide the table.
			$('#hidTable').empty().fadeOut();
		}
    });
});
