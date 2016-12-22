$(document).ready(function () {
   'use strict';
    $.ajax({
		dataType: "json",
        method: "get",
        url: "getOffers.php?useJSON=1"}
       )
       .done(function (data, status, request) {
		    var JSONoffer=$('#JSONoffer ');
		    
		    $('.itemTitle',JSONoffer).text(data.eventTitle);
		    $('#JSONoffer .eCat').text("Category: "+ data.catDesc);
		    $('#JSONoffer .ePrice').text("Price: "+data.eventPrice);
				
             console.log(data);
            
       })
       .fail(function(request, status, error) {
                alert("Jquery fail "+ status +": "+ error); 
			}
       );
});

   
