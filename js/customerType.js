//This js Script handle the change on Input box of #placeOrder element

var DisplayInputBoxes= function() {
	//Take the selected value of place Order
	var selected=document.getElementById("placeOrder").querySelector('select').value;
	//If it's trd (trade customter), display the inbox for trade customer
	if (selected=="trd") {
		document.getElementById("tradeCustDetails").style.visibility="visible";
		document.getElementById("retCustDetails").style.visibility="hidden";
	} //set otherwise if not
	else {
		document.getElementById("tradeCustDetails").style.visibility="hidden";
		document.getElementById("retCustDetails").style.visibility="visible";
	
	}
}

//create the event listener 
document.getElementById("placeOrder").querySelector('select').addEventListener("change",DisplayInputBoxes);
