
<?php
/* 
 * The Following Content is The demo of a web page 
 * It is done using bare PHP  * 
 * It is owned by DUC LIEM NGUYEN  * 
 * Reachable at cyberliem.civil@gmail.com  * 
 */

require_once($_SERVER["DOCUMENT_ROOT"].'/API/callAPI.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/API/cleanInput.php');
session_start();
include($_SERVER["DOCUMENT_ROOT"].'/includes/header.html');

function compareDate($criteriaDate, $eventDate, $choice) {
	if (!empty($criteriaDate)) {
		if ($choice==1) {
			if (strtotime($eventDate)<strtotime($criteriaDate)) {
				return FALSE;
				}
		}
		else if ($choice==2) {
			if (strtotime($eventDate)>strtotime($criteriaDate)) {
				return FALSE;
				}
		}		
	}
	
	return TRUE;
	}

function filterItem($item, $criteria) {
	if (!empty($criteria ["price-min"])) {
		if ($item["eventPrice"]<$criteria["price-min"]) {
			return FALSE;
		}
	}
	
	if (!empty($criteria ["price-max"])) {
		if ($item["eventPrice"]>$criteria[	"price-max"]) {
			return FALSE;
		}
	}
	if (!compareDate($criteria["dateStart"],$item["eventStartDate"], $criteria["startChoice"])) {
		return FALSE;
		}
	if (!compareDate($criteria["dateEnd"],$item["eventEndDate"], $criteria["endChoice"])) {
		return FALSE;
		}
	return(TRUE);
	}
	
if (isset($_SESSION['previous'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
	unset($_SESSION['items']);
   }
}
if (isset($_GET["Ssubmit"])) {
	unset($_SESSION["items"]);
	unset($_GET["Ssubmit"]);
	}

if (empty($_GET)) {
    echo '<div class="alert alert-warning">
            <strong>Warning!</strong> No information has been given yet to search.
          </div>';
}
else if ((isset($_GET["filter"])) &&($_GET["filter"]==1)) {
	 
	 if (empty($_SESSION["searchStr"])) {
		echo '<div class="alert alert-warning">
            <strong>Warning!</strong> To be able to use filter you have to enable Session
          </div>';
		}
	else {
		$items=$_SESSION["items"];
		$criteria =(filter_input_array(INPUT_GET));
		for ($i=0; $i<count($items); $i++) {
			$items[$i]["display"]=filterItem($items[$i],$criteria);
		}
			
		$_SESSION["items"]=$items;
		
		include($_SERVER['DOCUMENT_ROOT'].'/includes/filter.html');
		include($_SERVER['DOCUMENT_ROOT'].'/displayResult.php');
		}	
	}
else if (!empty($_SESSION["items"])) {
	$items=$_SESSION["items"];
	include($_SERVER['DOCUMENT_ROOT'].'/includes/filter.html');
    include($_SERVER['DOCUMENT_ROOT'].'/displayResult.php');
	}
else if ((!empty($_GET)) && (!isset($_GET["filter"]))) {
	$request=(filter_input_array(INPUT_GET));
	unset($request["Ssubmit"]);
    $request=cleanInputs($request);;   
    $url=$_SERVER['SERVER_NAME'].'/api.php?endpoint=view';
    
    foreach ($request as $k=>$v) {
        if ($v!=NULL) {
        $url.='&'.$k.'='.str_replace(' ', '+', $v);;
        }
    }
    $items=get_items($url);
	$_SESSION["searchStr"]=$url;
    $_SESSION["items"]=$items;
    include($_SERVER['DOCUMENT_ROOT'].'/includes/filter.html');
    include($_SERVER['DOCUMENT_ROOT'].'/displayResult.php');
}
$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
 include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.html');

?>
<script type="text/javascript" src="/js/priceSlider.js"> </script>
