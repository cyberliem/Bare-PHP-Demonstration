    <!DOCTYPE html>
<?php
require_once( 'API/callAPI.php');
session_start();
include('includes/header.html');
ini_set('display_errors', 1);
include("includes/searchBar.html");
include("includes/thumbnails.html");
include("includes/intro.html");

echo '<table id="hidTable" class="hidden table table-striped table-bordered fixed">
      </table>';

        
include ('includes/footer.html');
$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

?>  
<script type="text/javascript" src="js/libs/jquery-3.1.1.js"> </script>
<script type="text/javascript" src="js/libs/jquery-ui.js"> </script>
<script type="text/javascript" src="js/JSRequest.js"> </script>
<script type="text/javascript" src="js/jqueryJSON.js"> </script>
<script type="text/javascript" src="js/JqAutoComplete.js"> </script>

