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
	
    $items=get_items($_SERVER['SERVER_NAME'].'/api.php?endpoint=view');
    //retain values in session
    $_SESSION['items']=$items;
}
//else then access variable from SESSION
else {
    $items=$_SESSION['items'];
}


//include("includes/searchBar.html");

include("displayResult.php");
        
include ('includes/footer.html');
$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

?>  
