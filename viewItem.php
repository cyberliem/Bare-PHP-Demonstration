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

include('includes/header.html');

require_once('API/callAPI.php');



if (!isset($_GET['itemID'])) {
    echo "<h3> This item is not on our database </h3>";
}
else {
    $items=get_items($_SERVER['SERVER_NAME'].'/api.php?endpoint=view&eventID='.$_GET['itemID']);
    $item=$items[0];
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
                <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                    <button id="submit" name="submit" class="btn btn-primary">Book Now</button>
                    </div>
                </div>
        </fieldset>
        </form>';
}
echo '</div> </div>';        
include ('includes/footer.html');
?>  
