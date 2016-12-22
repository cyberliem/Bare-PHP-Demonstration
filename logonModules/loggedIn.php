<?php
//reuse header
session_start();
include($_SERVER["DOCUMENT_ROOT"] . '/includes/header.html');

echo'<div class="message message-success">
            <strong>Success!</strong> Hello '.$_SESSION['userName'] .', You has logged in successfully.
          </div>';
          
echo'<a href="/admin/adminModules.php" class="button button-info" role="button">Click here to get back to the main page</a>';     
echo '</div> </div>';
include($_SERVER["DOCUMENT_ROOT"] . '/includes/footer.html');
