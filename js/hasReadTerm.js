//This script handle the the term and condition check box.


function changeColour(id, color) {
	//pass in the element ID, and colour
	//change the element to the colour decided.
	document.getElementById(id).style.color=color;
	}

//initiate the checkbox for temr and condition
var termChkBox=document.getElementById("termsChkbx");
//set the checkbox listener and event handler
termsChkbx.addEventListener("click", termClicked);

function termClicked() {
	//termcliked: event handler for any click on the term condition check box.
	if (termChkBox.checked){
		//if it is check, set colour to black, enbale the submit
		changeColour("hasReadTerm", "black");
		var submits=document.getElementsByName("submit");
		document.getElementById("placeOrder").querySelector('input[type=submit]').disabled=false;
	}
	else {
		//if it is check, set colour to red, disable the submit
		changeColour("hasReadTerm", "red");
		document.getElementById("placeOrder").querySelector('input[type=submit]').disabled=true;
	}
}



