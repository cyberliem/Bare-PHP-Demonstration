<?php
//initiate 
session_start();
//reuse header
include($_SERVER["DOCUMENT_ROOT"] .'/includes/header.html');


if (isset($_SESSION["userName"])) {
    echo'<div class="message message-warning">
        <strong>You already logged in</strong> Please log out first.
        </div>';
}
else {
    include($_SERVER["DOCUMENT_ROOT"] . '/includes/logon.html');
    if (isset($_GET["error"])) {
        echo'<div class="message message-danger">
            <strong>Invalid login details</strong> Please check your username/ password.
            </div>';
    }
}    
echo '</div> </div>';
include($_SERVER["DOCUMENT_ROOT"] .'/includes/footer.html');
