var DisplayInputBoxes= function() {
	var selected=document.getElementById("placeOrder").querySelector('select').value;
	if (selected=="trd") {
		document.getElementById("tradeCustDetails").style.visibility="visible";
		document.getElementById("retCustDetails").style.visibility="hidden";
	} 
	else {
		document.getElementById("tradeCustDetails").style.visibility="hidden";
		document.getElementById("retCustDetails").style.visibility="visible";
	
	}
}

document.getElementById("placeOrder").querySelector('select').addEventListener("change",DisplayInputBoxes);
