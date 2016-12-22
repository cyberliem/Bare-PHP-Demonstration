<?php 
	$upOne=realpath(dirname(__FILE__). '/..');
	
	require_once($upOne. '/API/API.class.php');
    //initialized $request as empty
    
    function getData($request) { 
		if (!empty($request)) {
	        try {
			    $API = new API($request);
	            return($API->processAPI());
	        } catch (Exception $e) {
	            return( (Array('error' => $e->getMessage())));
	        }
		}
	}
?>
