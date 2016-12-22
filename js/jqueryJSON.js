$(document).ready(function () {
   'use strict';
   //full-fat Ajax: a full AJAX request
    $.ajax({
		//specific data type, method, url and construct the data array
		//for ajax request
		dataType: "json",
        method: "get",
        url: "getOffers.php",
        data: {
				useJSON:1
			}
        }
       )
       .done(function (data, status, request) {
		   //once ajax call is done, display it to relevant element
		    
		    var JSONoffer=$('#JSONoffer ');
		    
		    $('.itemTitle',JSONoffer).text(data.eventTitle);
		    $('#JSONoffer .eCat').text("Category: "+ data.catDesc);
		    $('#JSONoffer .ePrice').text("Price: "+data.eventPrice);
				
                        
       })
       .fail(function(request, status, error) {
		   //once ajax call fail, alert user.
                alert("Jquery fail "+ status +": "+ error); 
			}
       );
});

   
