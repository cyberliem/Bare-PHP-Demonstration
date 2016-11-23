<?php
//reuse header
session_start();

if (isset($_SESSION["userName"])) {
    unset($_SESSION["userID"]);
    unset($_SESSION["userName"]);
    unset($_SESSION["agent"]);
    include($_SERVER["DOCUMENT_ROOT"] . '/includes/header.html');
    echo'<div class="alert alert-success">
            <strong>Success!</strong> You have been logged out succesfully .
        </div>';

    echo'<a href="/index.php" class="btn btn-info" role="button">Click here to get back to the main page</a>';
}    
else {
	include($_SERVER["DOCUMENT_ROOT"] . '/includes/header.html');
    echo'<div class="alert alert-warning">
        <strong>No login found</strong> Please log in first.
        </div>';
}
echo '</div> </div>';
include($_SERVER["DOCUMENT_ROOT"] . '/includes/footer.html');
