<!doctype html>
<html lang="en">
<?php session_start();
include('includes/header.html');
?>

<div id="wrapper">
	<h1>Book Events</h1>

	<form id="bookingForm" action="javascript:alert('form submitted');" method="get">
		<section id="selectEvent">
			<h2>Select Events</h2>
<?php
include_once('dbmodules/database_conn.php');
$sqlEvents = 'SELECT eventID, eventTitle, eventStartDate, eventEndDate, catDesc, venueName, eventPrice FROM te_events e inner join te_category c on e.catID = c.catID inner join te_venue v on e.venueID = v.venueID WHERE 1 order by eventTitle';
$rsEvents = mysqli_query($conn, $sqlEvents);
while ($event = mysqli_fetch_assoc($rsEvents)) {
	echo "\t<div class='item'>
            <span class='eventTitle'>".filter_var($event['eventTitle'], FILTER_SANITIZE_SPECIAL_CHARS)."</span>
            <span class='eventStartDate'>{$event['eventStartDate']}</span>
            <span class='eventEndDate'>{$event['eventEndDate']}</span>
            <span class='catDesc'>{$event['catDesc']}</span>
            <span class='venueName'>{$event['venueName']}</span>
            <span class='eventPrice'>{$event['eventPrice']}</span>
            <span class='chosen'><input type='checkbox' name='event[]' value='{$event['eventID']}' title='{$event['eventPrice']}' /></span>
      </div>\n";
}
?>
		</section>

		<section id="collection">
			<h2>Collection method</h2>
			<p>Please select whether you want your chosen event(s) to be delivered to your home address (a charge applies for this) or whether you want to collect them yourself.</p>
			<p>
			Home address - &pound;4.99 <input type="radio" name="deliveryType" value="home" title="4.99" checked />&nbsp; | &nbsp;
			Collect from ticket office - no charge <input type="radio" name="deliveryType" value="ticketOffice" title="0" />
			</p>
		</section>

		<section id="checkCost">
			<h2>Total cost</h2>
			Total <input type="text" name="total" size="10" readonly />
		</section>

		<section id="placeOrder">
			<h2>Place order</h2>
			Your details
			Customer Type: <select name="customerType">
				<option value="">Customer Type?</option>
				<option value="ret">Customer</option>
				<option value="trd">Trade</option>
			</select>

			<div id="retCustDetails" class="custDetails">
				Forename <input type="text" name="forename" />
				Surname <input type="text" name="surname" />
			</div>
			<div id="tradeCustDetails" class="custDetails" style="visibility:hidden">
				Company Name <input type="text" name="companyName" />
			</div>
			<p id="hasReadTerm" style="color: #FF0000; font-weight: bold;">I have read and agree to the terms and conditions
			<input type="checkbox" id="termsChkbx" /></p>

			<p><input type="submit" name="submit" value="Order now!" disabled /></p>
		</section>
	</form>
</div>
<?php 
include('includes/footer.html');
?>
<script type="text/javascript" src="/js/hasReadTerm.js"> </script>
<script type="text/javascript" src="/js/eventClicked.js"> </script>
<script type="text/javascript" src="/js/submitClicked.js"> </script>
<script type="text/javascript" src="/js/customerType.js"> </script>
