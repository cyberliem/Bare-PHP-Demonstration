<?php
//reuse header
include('includes/header.html');

//initiate 
session_start();
echo'<div class="alert alert-success">
            <strong>Success!</strong> Hello '.$_SESSION['userName'] .', You has logged in successfully.
          </div>';
          
echo'<a href="/index.php" class="btn btn-info" role="button">Click here to get back to the main page</a>';     
echo '</div> </div>';
include('includes/footer.html');
