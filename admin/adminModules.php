<?php

session_start();
include($_SERVER["DOCUMENT_ROOT"] .'/includes/header.html');
ini_set('display_errors', 1);

include($_SERVER["DOCUMENT_ROOT"] .'/includes/adminNav.html');
echo '
<div class="separated-line universal-block block-10">
	<h2>
		Welcome, '.$_SESSION['userName'].'.
	</h2>
	<p>
		As an administrator, you can edit any event you want from the list of event. Simply click on Event management tab
	<br/> 
	    The rest of administration modules will be here soon.	
	</p>
	<p>
		
	</p>
</div>';

include($_SERVER["DOCUMENT_ROOT"] .'/includes/footer.html');
