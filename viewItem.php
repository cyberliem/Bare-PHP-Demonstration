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

include('includes/header.html');

require_once('dbmodules/getData.php');



if (!isset($_GET['itemID'])) {
    echo "<h3> This item is not on our database </h3>";
}
else {
	$request=array("endpoint"=>"view", "eventID"=>$_GET['itemID']);
    $items=getData($request);
    $item=$items[0];
    if (isset($_GET['success'])) {
	  echo'<div class="message message-success">
                The item has been edited. You may review the item bellow.
              </div>';
		}
    //start the form
    echo ' <form class="form-box" method="GET" action="bookEventsForm.php">
            <fieldset>
                <legend class="item-Title">'.$item["eventTitle"]. '</legend>
                <div class="form-group">
                <label class="universal-block block-4 box-label" for="Content">Venue Name</label>  
                    <div class="universal-block block-4 form-inside">
                        '.$item["venueName"] .'
                    </div>
                </div>
                
                <div class="form-group">
                <label class="universal-block block-4 box-label" for="Content">Location</label>  
                    <div class="universal-block block-4 form-inside">
                        '.$item["location"] .'
                    </div>
                </div>

                <div class="form-group">
                <label class="universal-block block-4 box-label" for="Content">Category</label>  
                    <div class="universal-block block-4 form-inside">
                        '.$item["catDesc"] .'
                    </div>
                </div>
                
                <div class="form-group">
                <label class="universal-block block-4 box-label" for="Content">Event Description</label>  
                    <div class="universal-block block-4 form-inside">
                        '.$item["eventDescription"] .'
                    </div>
                </div>
             
                <div class="form-group">
                <label class="universal-block block-4 box-label" for="Content">Start Date</label>  
                    <div class="universal-block block-4 form-inside">
                        '.$item["eventStartDate"] .'
                    </div>
                </div>
                
                 <div class="form-group">
                <label class="universal-block block-4 box-label" for="Content">End Date</label>  
                    <div class="universal-block block-4 form-inside">
                        '.$item["eventEndDate"] .'
                    </div>
                </div>
                
                 <div class="form-group">
                <label class="universal-block block-4 box-label" for="Content">Price</label>  
                    <div class="universal-block block-4 form-inside">
                        '.$item["eventPrice"] .'
                    </div>
                </div>
                
                <div class="form-group">
                <label class="universal-block block-4 box-label" for="submit"></label>
                    <div class="universal-block block-4">
                    <button id="submit" name="submit" class="button button-primary">Book Now</button>
                    </div>
                </div>
        </fieldset>
        </form>';
}
echo '</div> </div>';        
include ('includes/footer.html');
?>  
