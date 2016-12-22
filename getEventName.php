<?php
require_once('dbmodules/getData.php');
require_once('dbmodules/cleanInput.php');
require_once('dbmodules/DBConnect.php');
if (!empty($_GET["kw"]))  {
	$kw=cleanInputs($_GET["kw"]);
	$args=array("kw"=>$kw);
	$dbc=new DBConnect($args);
	echo(json_encode($dbc->randomSearch($kw)));
}
