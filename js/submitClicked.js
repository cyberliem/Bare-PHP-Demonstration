//This script monitor the submitt button
//validate two conditions for the submit
//block it if the conditions are not met.

var inputTyped= function() {
	/* inputTypeD: return the status of visible input box
	 * true if all visible boxes are check
	 * false if one of them is still empty
	 */
	//first, get all the customer detail inside place order
	var inputBoxes=document.getElementById("placeOrder").querySelectorAll('.custDetails');
	 
	var i, control=true;
	var inputText,j ;
	
	for (i=0; i< inputBoxes.length; i++) {
		//if it's not hidden, it have to be not empty.
		if (inputBoxes[i].style.visibility!="hidden") {
			inputText=inputBoxes[i].querySelectorAll('input[type=text]');
			for (j=0; j<inputText.length; j++) {
				//if after removing all white space character if the length is 0
				//that mean it's not legal.
				if (inputText[j].value.replace(/\s/g, "").length == 0) {
					control=false;
				}
			}
		}
	}
	
	return(control);
}

var boxchecked= function() {
	/* boxchecked: return the status of all the event check boxes
	 * true if at least one of the box is checked
	 * false if all of them is still empty
	 */
	var eventsChkbox=document.getElementById('selectEvent').querySelectorAll('input[type=checkbox]');
				     
	var i, Control=false;
	
	//start loop through every checkbox. If a box is check, the control is true.
	for (i=0; i<eventsChkbox.length; i++) {
		if (eventsChkbox[i].checked) {
			 Control=true;
		}
	}	
	return( Control);
}

var validation= function (e) {
	//validation: passing the event, validate and block it, or let it happen.
	if ((!boxchecked()) || (!inputTyped())) {
		//if no box checked or all the input hasn't been type, block the submission and alert user.
		e.preventDefault();
		alert("Submit fail. You must check at least one event and fill in all the customer detail");
	}
}

//create the listener for the submit button.
document.getElementById("placeOrder").querySelector('input[type=submit]').addEventListener("click",validation);
