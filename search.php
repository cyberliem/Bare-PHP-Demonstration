<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* searchFeatures is the array contain the key-value pairs
 * key is the display
 * value is the named variable to get input from.
 * to include more search feature, just add in the key value pairs
 * eg: "Location" : "location"
 */

$searchFeatures=["Event title" => "eventTitle", 
                 "Venue"=> "venueName",
                 "Category"=> "catDesc",
                 "Location"=> "location"   
                ];
session_start();
if (isset($_SESSION['previous'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
	unset($_SESSION['items']);
   }
}
//reuse header
include('includes/header.html');

//initiate 
echo '<form action="searchResult.php" class="form-horizontal" method="GET">
      <fieldset>
        <legend>Search</legend>';


foreach ($searchFeatures as $k => $v) {
   echo '<div class="form-group">
            <label class="col-md-4 control-label" for="'.$v .'">'. $k .'</label>  
            <div class="col-md-4">
                <input id="'.$v.'" name="'.$v.'" type="text" class="form-control input-md">
            </div>
        </div>';
}

//display exact matched selection
echo '<div class="form-group">
  <label class="col-md-4 control-label" for="exact_matched">Exact Matched</label>
  <div class="col-md-4">
    <select id="exact_matched" name="exact_matched" value="2" class="form-control">
      <option value="2">Any</option>
      <option value="1">Exact</option>
    </select>
  </div>
</div>';

//display submit button and close the form 
echo '<div class="form-group">
        <label class="col-md-4 control-label" for="submit"></label>
        <div class="col-md-4">
            <button id="Ssubmit" name="Ssubmit" value=1 class="btn btn-primary">Search</button>
        </div>
      </div>

    </fieldset>
</form>';

include ('includes/footer.html');
$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
?>



