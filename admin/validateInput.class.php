<?php

class validateInput {
	public $errors;
	public $request;
	
	public function __construct($input) {
		unset($input["update"]);
		$this->request=$input;
		$this->errors=array();
	}
	
	private function detectSQLInject($temp) {
		return(False);
		}
	
	function basicValidate($name) {
		if (empty($this->request[$name])) {
			$this->errors[$name]="Empty field is not allowed!";
		} 
		else {
			$temp=$this->request[$name];
			if (strip_tags($temp)!=($temp)) {
				$this->errors[$name]="No tags allowed"; 
				}
			else if ($this->detectSQLInject($temp)){
				$this->errors[$name]="The input cotains SQL injection threat";
				}
		}
	}


	function validateDate($start, $end) {
		/* validateDate: Take two arguments. 
		 * check if it is date format
		 * check if the start Date is ealier than end Date
		 */
		$validateDateControl=TRUE;
		if (!($timestamp= strtotime($start))) {
			$this->errors["eventStartDate"]="wrong Date format";
			$validateDateControl=False;
			}
		if (!($timestamp= strtotime($end))) {
			$this->errors["eventEndDate"]="wrong Date format";
			$validateDateControl=False;
			}	
		
		if (($validateDateControl) && (strtotime($end)<strtotime($start))) {
			$this->errors["eventEndDate"]="End Date must not be ealier than Start Date";
		}	
		
	}
	function validatePrice($price) {
		if (!is_numeric($price)) {
			$this->errors["eventPrice"]="Price must be a numerical values";
		}
		else if ($price<0) {
			$this->errors["eventPrice"]="Price must not be negative";	
		}
	}		
	
	function validateDefinedInput($input,$defined,$APItag) {
		/* validateDefinedInput: take input, validate again the defined data in Database
		 * Parameter: $input- user input, 
		 * 			  $defined - the name of entity to validate
		 *			  $APItag - the tag to query data rom Database
		 */	
		$dataArray=get_items($_SERVER['SERVER_NAME'].'/api.php?endpoint=view'.$APItag);
		$validateControl=False;
		foreach ($dataArray as $data) {
			if ($data[$defined]==$input) {
				$validateControl=True;
				}
			} 
		if (!$validateControl) {
			$this->errors[$defined]="The ".$defined." isn't in our database";
			}
	}
		
	function validate() {
		
		foreach ($this->request as $k=>$v) {
			$this->basicValidate($k);
			}
		$this->validateDate($this->request["eventStartDate"],$this->request["eventEndDate"]); 
		$this->validatePrice($this->request["eventPrice"]);
		$this->validateDefinedInput($this->request["venueID"], "venueID", "Venue");
		$this->validateDefinedInput($this->request["catID"], "catID", "Cat");
		
		if (!empty($this->errors)) {
			return(FALSE);
			}
		//validate eventStartDate and eventEndDate
		
		return(TRUE);		
	}

	
}


?>
