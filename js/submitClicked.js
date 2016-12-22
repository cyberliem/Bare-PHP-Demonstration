var inputTyped= function() {
	var inputBoxes=document.getElementById("placeOrder").querySelectorAll('.custDetails');
	 
	var i, control=true;
	var inputText,j ;
	for (i=0; i< inputBoxes.length; i++) {
		if (inputBoxes[i].style.visibility!="hidden") {
			inputText=inputBoxes[i].querySelectorAll('input[type=text]');
			for (j=0; j<inputText.length; j++) {
				if (inputText[j].value.replace(/\s/g, "").length == 0) {
					control=false;
				}
			}
		}
	}
	
	return(control);
}

var boxchecked= function() {
	var eventsChkbox=document.getElementById('selectEvent').querySelectorAll('input[type=checkbox]');
				     
	var i, Control=false;
	
	//start loop through every checkbox.
	for (i=0; i<eventsChkbox.length; i++) {
		if (eventsChkbox[i].checked) {
			 Control=true;
		}
	}	
	return( Control);
}

var validation= function (e) {
	if ((!boxchecked()) || (!inputTyped())) {
		e.preventDefault();
		alert("Submit fail. You must check at least one event and fill in all the customer detail");
	}
}

document.getElementById("placeOrder").querySelector('input[type=submit]').addEventListener("click",validation);
