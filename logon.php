<?php
//initiate 
session_start();
//reuse header
include('includes/header.html');


if (isset($_SESSION["userName"])) {
    echo'<div class="alert alert-warning">
        <strong>You already logged in</strong> Please log out first.
        </div>';
}
else {
    include('includes/logon.html');
    if (isset($_GET["error"])) {
        echo'<div class="alert alert-danger">
            <strong>Invalid login details</strong> Please check your username/ password.
            </div>';
    }
}    
echo '</div> </div>';
include('includes/footer.html');
