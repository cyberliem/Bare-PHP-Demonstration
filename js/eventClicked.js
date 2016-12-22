
var displayPrice= function(totalPrice) {
	/* Display the Price to desired element.
	 * totalPrice: a float if the price is calculated
	 * NaN if the price isn't calculated.
	 */
	var displayString;
	if (isNaN(totalPrice)) { 
		displayString=totalPrice;
		}
	else {
		displayString="£"+totalPrice.toFixed(2).toString();
		}	
	document.getElementById('checkCost').querySelector('input[type=text]').value=displayString;
	};
	
var collectionPrice= function () {
	//get all the radio checkbox in Collection
	var collectionChkbox=document.getElementById('collection').querySelectorAll('input[type=radio]');
	
	//star the loop, return if found the checked radio button
	var i;
	for (i=0; i<collectionChkbox.length; i++) {
		if (collectionChkbox[i].checked) {
			return(parseFloat(collectionChkbox[i].title));
			}
		}
	//default: return 0;
	return 0;	
};
var updateChosenEvents= function()  {
	//eventsChkbox: all the checkboxes in event selection.
	var eventsChkbox=document.getElementById('selectEvent').querySelectorAll('input[type=checkbox]');
				     
	
	/* actually I can pass e.target.nodeName to determine which button has been clicked, 
	 * however, I'm not sure if this is legal in the assignment, 
	 * so I used a loop to check what box is checked and what box is not
	 * The loop is more complexity.
	 */
	 
	//i: index for the loop; boxchecked: if there is at least one box checked.
	var i, boxchecked=false;
	
	//start loop through every checkbox. Calculate the price and check if any box is check
	for (i=0; i<eventsChkbox.length; i++) {
		if (eventsChkbox[i].checked) {
			eventsClicked.addEvent(eventsChkbox[i].value, eventsChkbox[i].title);
			boxchecked=true;
			}
		else {
			eventsClicked.removeEvent(eventsChkbox[i].value);
		}	
	}
	if (boxchecked==false) {
			displayPrice("Nil");
		}
	else {
		//start with total price of events
		var totalPrice=eventsClicked.totalPrice();
		
		//add the the collection price
		totalPrice+=collectionPrice();
		displayPrice(totalPrice);
	}	
};

//entry to clicked event: add event lisnter
//select and collection will listen for any change.
document.getElementById('selectEvent').addEventListener("change", updateChosenEvents);
document.getElementById('collection').addEventListener("change", updateChosenEvents);

//eventsCLick: prototype java script object,
//with its own method and data.
//note that this function is executable-ready
var eventsClicked = (function (){
	//initiate events array empty
	var events= {};
	return {
		//add event: initiate and append an event to the array
		addEvent: function (id, eventPrice) {
			events[id] = {
				id:id, 
				price: parseFloat(eventPrice)
			}
		},
		//delete event from array
		removeEvent: function (id) {
			delete events[id];
			},
		//total price: loop though all the event and calculate the price.	
		totalPrice: function () {
			var total =0;
			var i;
			for (i in events) {
				total+=events[i].price;
				}
			return(total);	
			}
	}
}) ();
