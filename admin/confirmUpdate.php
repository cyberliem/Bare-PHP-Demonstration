<?php

/* 
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
include($_SERVER["DOCUMENT_ROOT"] . '/includes/header.html');

require_once($_SERVER["DOCUMENT_ROOT"] .'/API/callAPI.php');



if (!isset($_SESSION['editItem'])) {
        echo'<div class="alert alert-danger">
                Something is not right.
              </div>';
}
else {  
    
    $item=$_SESSION['editItem'];
       echo'<div class="alert alert-warning">
            Please double check your data before confirm the update.
            (Some of the input has been sanitized for security purpose).
          </div>';
    //start the form
    echo ' <form class="form-horizontal" method="GET">
            <fieldset>
                <legend class="item-Title">'.$item["eventTitle"]. '</legend>
                <div class="form-group">
                <label class="col-md-4 control-label" for="Content">Venue Name</label>  
                    <div class="col-md-4 form-inside">
                        '.$item["venueName"] .'
                    </div>
                </div>
                
                <div class="form-group">
                <label class="col-md-4 control-label" for="Content">Location</label>  
                    <div class="col-md-4 form-inside">
                        '.$item["location"] .'
                    </div>
                </div>

                <div class="form-group">
                <label class="col-md-4 control-label" for="Content">Category</label>  
                    <div class="col-md-4 form-inside">
                        '.$item["catDesc"] .'
                    </div>
                </div>
                
                <div class="form-group">
                <label class="col-md-4 control-label" for="Content">Event Description</label>  
                    <div class="col-md-4 form-inside">
                        '.$item["eventDescription"] .'
                    </div>
                </div>
             
                <div class="form-group">
                <label class="col-md-4 control-label" for="Content">Start Date</label>  
                    <div class="col-md-4 form-inside">
                        '.$item["eventStartDate"] .'
                    </div>
                </div>
                
                 <div class="form-group">
                <label class="col-md-4 control-label" for="Content">End Date</label>  
                    <div class="col-md-4 form-inside">
                        '.$item["eventEndDate"] .'
                    </div>
                </div>
                
                 <div class="form-group">
                <label class="col-md-4 control-label" for="Content">Price</label>  
                    <div class="col-md-4 form-inside">
                        '.$item["eventPrice"] .'
                    </div>
                </div>
                
                <div class="form-group">
                <label class="col-md-4 control-label" for="confirm"></label>
                    <div class="col-md-4">
                    <button id="confirm" name="confirm" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
        </fieldset>
        </form>';
}
echo '</div> </div>';        
include ('includes/footer.html');
?>  