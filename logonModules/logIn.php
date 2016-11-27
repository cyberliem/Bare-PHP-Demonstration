<!DOCTYPE html>
<?php
/* 
 * The Following Content is The demo of a web page 
 * It is done using bare PHP  * 
 * It is owned by DUC LIEM NGUYEN  * 
 * Reachable at cyberliem.civil@gmail.com  * 
 */

   
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include($_SERVER["DOCUMENT_ROOT"] . '/includes/header.html');

require_once($_SERVER["DOCUMENT_ROOT"] . '/API/callAPI.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/API/DBConnect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$request=(filter_input_array(INPUT_POST));
	$dbc=new DBConnect($request);
	$res=$dbc->validateLogin();
	if (!empty($res)) {
		session_start();
		$_SESSION['userID']= $res["userID"];
		$_SESSION['userName']= $res["firstname"];
		// Store the HTTP_USER_AGENT:
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		// Redirect browser /
		header('Location: /logonModules/loggedIn.php'); 
		exit();
		
	}
	else {
		header('Location: /logonModules/logon.php?error=1');
	}
}

echo '</div> </div>';        
include ('includes/footer.html');
?>  
