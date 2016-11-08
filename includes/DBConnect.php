<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DBConnect{
    protected $User = 'root';
    protected $Password = 'l1i2e3m4';
    public $Host= 'localhost';
    protected $Name = 'tyneEvents';
    protected $args; 
    protected $dbc;
    
    public function __construct($args) {
        $this->args=$args;
        //create PDO object
        $this->dbc = new PDO("mysql:host=$this->Host;dbname=$this->Name", $this->User, $this->Password);
        $this->dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function validateLogin() {
		$username=$this->args["username"];
		$pass=$this->args["pass"];
		$sttstr="SELECT userID, firstname,surname FROM te_users WHERE username='$username' AND passwordHash=SHA1('$pass')";
		$stmt= $this->dbc->prepare($sttstr); 
        //if the table is sent
        // $stmt->bindParam(':s', $temp, PDO::PARAM_INT);
        $temp=1;
        $stmt->execute();
        
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        //echo gettype($result);
        return($result);
		}
		
    public function updateStatement($k, $v, $mode) {
		if ($mode==1) {
			return ($k. " = '".$v."' AND");
			}
		else if ($mode=2) {
			return ($k. " LIKE "."'%".$v."%'"." AND");
			}	
		else return(" AND");	
		}
    
    public function getEvents() {
        $sttstr="SELECT eventID, eventTitle, venueName, location, catDesc, eventDescription, eventStartDate, eventEndDate, eventPrice ";
        $sttstr.="FROM te_events JOIN te_category ON te_events.catID= te_category.catID ";
        $sttstr.="JOIN te_venue ON te_events.venueID=te_venue.venueID ";
        $mode=1;
        if (array_key_exists("exact_matched", $this->args)) {
			$mode = $this->args["exact_matched"];
			unset($this->args["exact_matched"]);
			}
        if (!(empty($this->args))) {
            $sttstr.=" WHERE ";
            foreach ($this->args as $k=>$v) {
				$sttstr.= $this->updateStatement($k, $v, $mode);
            }
            $sttstr= substr($sttstr, 0, -3);
           
        }
        
        //echo($sttstr);               
        $stmt= $this->dbc->prepare($sttstr); 
        //if the table is sent
              
        
        // $stmt->bindParam(':s', $temp, PDO::PARAM_INT);
        $temp=1;
        $stmt->execute($this->args);
        
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        //echo gettype($result);
        return($result);
        
    }
    
    public function callQuery(){
        //print_r($this->args);
        //Prepare statement string
        if (array_key_exists("table", $this->args)) { 
           $table=array_shift($this->args); 
        }
        //else call die
        else {
            die("Unable to conduct Content searching");
        }
        
        $sttstr="SELECT * FROM ". $table;
        
        //if there are more args
        if (!(empty($this->args))) {
            $sttstr.=" WHERE ";
            foreach ($this->args as $k=>$v) {
                $sttstr.= $k. "= :".$k." AND";
            }
            $sttstr= substr($sttstr, 0, -3);
        }
        
  
                     
        $stmt= $dbc->prepare($sttstr); 
        //if the table is sent
              
        
        // $stmt->bindParam(':s', $temp, PDO::PARAM_INT);
        $temp=1;
        $stmt->execute($this->args);
        
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        //echo gettype($result);
        return($result);
    }
 }

?>
