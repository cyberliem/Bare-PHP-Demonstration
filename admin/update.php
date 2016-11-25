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
session_start();
if (empty($_SESSION["userName"])) { 
        echo'<div class="alert alert-danger">
                    You should not be here. Please log in first.
            </div>';
           die;
	}
include($_SERVER["DOCUMENT_ROOT"] . '/includes/header.html');

require_once($_SERVER["DOCUMENT_ROOT"] . '/API/callAPI.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/API/cleanInput.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/includes/DBConnect.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/admin/validateInput.php');
$errors=array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
     	//basic filter. 
	$request=filter_input_array(INPUT_POST);
	
	//' Or ''='
	$validator = new validateInput($request);
	$validator->validate();
		
	if (!empty($validator->errors)) {
		$_SESSION["editItem"]=$request;
		$_SESSION["editItemErrors"]=$errors;  
		}
	else {
		$_SESSION["editItem"]=$request;
                unset($_SESSION["editItemErrors"]);
		$_SESSION["updateProcced"]=TRUE;
                header('Location: /admin/confirmUpdate.php'); 
		
	}
	
	
	/*$dbc=new DBConnect($request);
	$res=$dbc->validateLogin();
	if (!empty($res)) {
		session_start();
		$_SESSION['userID']= $res["userID"];
		$_SESSION['userName']= $res["firstname"];
		// Store the HTTP_USER_AGENT:
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		// Redirect browser /
		header('Location: /loggedIn.php'); 
		exit();
		
	}
	else {
		header('Location: /logon.php?error=1');
	}*/
}

echo '</div> </div>';        
include ($_SERVER["DOCUMENT_ROOT"] . '/includes/footer.html');
?>  
