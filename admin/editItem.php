<!DOCTYPE html>
<?php
/* 
 * The Following Content is The demo of a web page 
 * It is done using bare PHP  * 
 * It is owned by DUC LIEM NGUYEN  * 
 * Reachable at cyberliem.civil@gmail.com  * 
 */

   

session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include($_SERVER["DOCUMENT_ROOT"] .'/includes/header.html');

require_once($_SERVER["DOCUMENT_ROOT"].'/API/callAPI.php');
require_once($_SERVER["DOCUMENT_ROOT"] .'/admin/validateInput.php');

if (!isset($_GET['itemID'])) {
    echo "<h3> This item is not on our database </h3>";
}
if (!isset($_SESSION["userName"])) {
     echo'<div class="alert alert-danger">
            You should not be here. Please log in first.
          </div>';
}
else {
	if (empty($_SESSION["editItem"])) {
			$items=get_items($_SERVER['SERVER_NAME'].'/api.php?endpoint=view&eventID='.$_GET['itemID']);
			$item=$items[0];
		}
    else {
		$item=$_SESSION["editItem"]; 
		if (!empty($_SESSION["errors"]));
		}
    $venues=get_items($_SERVER['SERVER_NAME'].'/api.php?endpoint=viewVenue');
    $cats=get_items($_SERVER['SERVER_NAME'].'/api.php?endpoint=viewCat');
  
    //start the form
   
    echo '<form action="update.php" class="form-horizontal" method="POST">
            <fieldset>
                <legend class="item-Title"> Editing Item:'.$item["eventTitle"]. '</legend>
                  

                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="eventTitle"> Event Title </label>  
                        <div class="col-md-7">
                            <input id="eventTitle" name="eventTitle" type="text" value="'.$item["eventTitle"].'" class="form-control input-md">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="Description"> Event Description </label>  
                        <div class="col-md-7">
                            <input id="eventDescription" name="eventDescription" type="text" value="'.$item["eventDescription"].'" class="form-control input-md">
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label class="col-md-2 control-label" for="Description"> Event Start Date </label>  
                        <div class="col-md-7">
                            <input id="eventStartDate" name="eventStartDate" type="date" value="'.$item["eventStartDate"].'" class="form-control input-md">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="eventEndDate"> Event End Date </label>  
                        <div class="col-md-7">
                            <input id="eventEndDate" name="eventEndDate" type="date" value="'.$item["eventEndDate"].'" class="form-control input-md">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="Description"> Event Price </label>  
                        <div class="col-md-7">
                            <input id="eventPrice" name="eventPrice" type="number" value="'.$item["eventPrice"].'" class="form-control input-md">
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="venue">Venue</label>
                      <div class="col-md-7">
                        <select id="venue" name="venue" value="'.$item["venueID"].'" class="form-control">';
                        foreach ($venues as $venue) {
                            if ($venue["venueID"]==$item["venueID"]) {
								$selected="selected";
								}
							else {
								$selected="";
								}	
                            echo '<option '.$selected. ' value="'.$venue["venueID"].'">'.$venue["venueName"].'</option>';
                        }          
                       echo '  
                        </select>
                      </div>
                    </div>
                    
                 
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="category">Category</label>
                      <div class="col-md-7">
                        <select id="category" name="category" value="'.$item["catID"].'" class="form-control">';
                        foreach ($cats as $cat) {
                            if ($cat["catID"]==$item["catID"]) {
								$selected="selected";
								}
							else {
								$selected="";
								}	
                            echo '<option '.$selected.' value="'.$cat["catID"].'">'.$cat["catDesc"].'</option>';
                        }           
                       echo '  
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="update"></label>
                            <div class="col-md-4">
                                <button id="update" name="update" class="btn btn-primary">Update</button>
                            </div>
                    </div>
        </fieldset>
        </form>';
}
    echo '</div> </div>';        
    include ($_SERVER["DOCUMENT_ROOT"] .'/includes/footer.html');
?>  
    
