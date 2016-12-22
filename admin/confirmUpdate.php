<?php

/* 
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
$upOne=realpath(dirname(__FILE__). '/..'); 
include($upOne. '/includes/header.html');

require_once($upOne .'/API/callAPI.php');
require_once($upOne .'/dbmodules/getData.php');

if (!isset($_SESSION['editItem'])) {
        echo'<div class="message message-danger">
                Something is not right.
              </div>';
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
	$tryPut=put_item($_SERVER['SERVER_NAME'].'/api.php?endpoint=putItem');
	if ($tryPut) {
		$itemID=$_SESSION['editItem']['eventID'];
		unset($_SESSION['editItem']);
		unset($_SESSION['items']);	
		header('Location: /viewItem.php?itemID='.$itemID.'&success=1'); 
		}
	} 
else {  
    
    $item=$_SESSION['editItem'];
    $request=array("endpoint"=>"viewVenue", "venueID"=>$item["venueID"]);
	$venue=getData($request)[0];
	$request=array("endpoint"=>"viewCat", "catID"=>$item["catID"]);
    $cat=getData($request)[0];
    
	$item["venueName"]=$venue["venueName"]; 
	$item["location"]=$venue["location"];
    $item["catDesc"]=$cat["catDesc"];
    
  
       echo'<div class="message message-warning">
            Please double check your data before confirm the update.
            (Some of the input has been sanitized for security purpose).
          </div>';
    //start the form
    echo ' <form class="form-box" method="POST">
            <fieldset>
            
                <legend class="item-Title">'."Confirm update". '</legend>
                
                <div class="form-group">
                <label class="universal-block block-4 box-label" for="Content">Event Title</label>  
                    <div class="universal-block block-4 form-inside">
                        '.$item["eventTitle"] .'
                    </div>
                </div>
                
                
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
                <label class="universal-block block-4 box-label" for="confirm"></label>
                    <div class="universal-block block-4">
                    <button id="confirm" name="confirm" class="button button-primary">Confirm</button>
                    </div>
                </div>
        </fieldset>
        </form>';
}
echo '</div> </div>';        
include ($upOne .'/includes/footer.html');
?>  
