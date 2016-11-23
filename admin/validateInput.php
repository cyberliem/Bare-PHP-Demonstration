<?php

function validate($name) {
	if (empty($request[$name])) {
		$errors[$name]="Empty field is not allowed!");
	} 
	else {
		$temp=$request[$name];
		if (strip_tags($temp)!=($temp)) {
			$error[$name]="No tags allowed"); 
			}
		else if (mysql_real_escape_string($temp)!=$temp){
			$error[$name]="The input cotains SQL injection threat";
			}
	}
}

function validateInput($request) {
	
	foreach ($request as $k=>$v) {
		validate($k);
		}
	if (!empty(errors)) {
		return(FALSE);
		}	
}
	
	



?>
