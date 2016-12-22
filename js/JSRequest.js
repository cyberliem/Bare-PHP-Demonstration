var printRequest= function(value) {
	document.getElementById('offers').innerHTML = value;
}


function createRequest() {
	//create Request: create a httpRequest Object for different browsers
	
	if (window.XMLHttpRequest) { // ALl other browser
     httpRequest = new XMLHttpRequest();
	}
  else { // IE, incase grandma want to see your events.
	//first, try with Microsoft XML core service
    try {
        httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
    }
    //if it raise error, try older namespace 
    catch (error) {
        httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
   
  //return it.
  return(httpRequest);
}

function getRequest( url, callbackFunction, configure ) {
  /* GetREquest: pass in an url with its configure and a callback function
   * make HTTP call to url using the configre.
   * Once donce, execute the callbackFunction
   */ 
  
  //create requestObjectfirst
  var httpRequest=createRequest(); 
  
  //if http can't be created
  if (!httpRequest) {
    alert('Can not create a httpRequest Object. Check the server config');
    return false;
  }
  
  //create url with parameter.
  var responseType='';
  if (configure && ("responseType" in configure)) {
      url+='&use'+configure["responseType"]+'=1';
  }		
  
  //get the content asynchronously
  httpRequest.open('get', url, true);
  //mimeType: to overide httpRequest MimeType to stop it from messing up the encoding.
  var mimeType = { "JSON":"application/json",
				   "XML":"text/xml"};
  if ((httpRequest.overrideMimeType) && (configure) && ("reponseType" in configure)) {
    httpRequest.overrideMimeType(mimeType[configure["responseType"]]);
  }
  
  //when the ready stage change  
  httpRequest.onreadystatechange = function() {
    var returnValue;
    if (httpRequest.readyState == 4) {
      if (httpRequest.status == 200) {
		  if ((configure) && ("responseType" in configure)) {
			callbackFunction(httpRequest.responseText, configure["responseType"]);
		  }
		  else {
			callbackFunction(httpRequest.responseText);
		  }
         
      } else {
         alert('HTTP Request unscessful.');
      }
    }
  }
  
  //send a null, since no POST method is used.
  httpRequest.send(null);
}  


var resetOffer = function () {
	//set the reset Offer to 5000 milisecond (5 second)
	getRequest('getOffers.php', printRequest, false);
	setTimeout(resetOffer,5000);
}

//onload, call the request. 
window.onload = resetOffer();

