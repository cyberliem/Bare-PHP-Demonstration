function changeColour(id, color) {
	document.getElementById(id).style.color=color;
	}

var termChkBox=document.getElementById("termsChkbx");
termsChkbx.addEventListener("click", termClicked);

function termClicked() {
	if (termChkBox.checked){
		changeColour("hasReadTerm", "black");
		var submits=document.getElementsByName("submit");
		document.getElementById("placeOrder").querySelector('input[type=submit]').disabled=false;
	}
	else {
		changeColour("hasReadTerm", "red");
		document.getElementById("placeOrder").querySelector('input[type=submit]').disabled=true;
	}
}



