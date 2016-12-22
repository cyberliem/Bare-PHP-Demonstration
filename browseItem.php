    <!DOCTYPE html>
<?php
require_once('API/callAPI.php');
session_start();
include('includes/header.html');
ini_set('display_errors', 1);

if (isset($_SESSION['previous'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
	unset($_SESSION['items']);
   }
}

if ((!empty($_SESSION['items'])) && (array_key_exists('error', $_SESSION['items']))) {
    unset($_SESSION['items']);
}

//if the items array isn't set then I
//in which case the call shall be made to API

if (empty($_SESSION['items'])) 
{    //call API
	
    $items=get_items('X');
    //retain values in session
    $_SESSION['items']=$items;
}
//else then access variable from SESSION
else {
    $items=$_SESSION['items'];
}
if (isset($_SESSION['userName'])) {
	include($_SERVER["DOCUMENT_ROOT"] .'/includes/adminNav.html');
}

//include("includes/searchBar.html");
echo '<legend class="item-Title"> Welcome to our events directory</legend>';
if (isset($_SESSION['userName'])) {
		echo '<div class="separated-line universal-block block-10 info">
			Click on edit button on any line to start editing the event, or <a href="/search.php">search</a> for a particular event to edit.
			
			
		  </div>';
}		  
include("displayResult.php");
		  


include ('includes/footer.html');
$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

?>  
