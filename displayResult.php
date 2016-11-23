<?php

/*
 * The Following Content is The demo of a web page 
 * It is done using bare PHP  * 
 * It is owned by DUC LIEM NGUYEN  * 
 * Reachable at cyberliem.civil@gmail.com  * 
 */
$display=10;
//set items to display each row:
$rowDisplay=4;
//start blocks of thumbnails
//start blocks of thumbnails
$nItems=0;
for ($i=0; $i<count($items); $i++) {
	if (!isset($items[$i]["display"])) {
		$items[$i]["display"]=TRUE;
		$nItems++;
	}
	else if ($items[$i]["display"]==TRUE) {
		$nItems++;
		}
}

    if ($nItems > $display) { // More than 1 page.
        $nPages = ceil ($nItems/$display);
       
    } else {
        $nPages = 1;
    }
    
//if use has sellected the page, starting pagenumber will be set
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $startPage=$_GET['page'];
    $startItem = ($_GET['page']-1)*$display;
}
//else it will be set to 0
else { 
        $startPage=1;
	$startItem = 0;
}

$toDisplay= ["Event Title", 
			 "Venue Name", 
			 "Location", 
			 "Category", 
			 "Start Date",
			 "End Date",
			 "Price"];

if (isset($_SESSION["userID"])) {
	$showEdit=TRUE;
	array_push($toDisplay, "Edit");
	}
else {
	$showEdit=FALSE;
	}	
  
echo ' <div class="row">  
       <table id="view" class="table table-striped table-bordered fixed" cellspacing="0" width="100%">
       <thead>
            <tr>';
            foreach ($toDisplay as $x) {
				echo '<th>'.$x.'</th>';
				}
echo '</tr>
        </thead>
        <tbody>';
$itemDisplay= min([$startPage*$display, $nItems]);
$j=$startItem; 
$i=0;
while (($i<$itemDisplay) && ($j<count($items))) {
    while (($j<count($items)) && ($items[$j]["display"]==FALSE))  {
		$j++;
		}
    $item=$items[$j];    
    
    $cellLink='/viewItem.php?itemID='.$item["eventID"];
    $editLink='/admin/editItem.php?itemID='.$item["eventID"];

    echo'<tr>
         
            <td> <a href="'.$cellLink.'">' . $item['eventTitle']. '</a> </td>
            <td>'. $item['venueName']. '</td>
            <td>'. $item['location']. '</td>
            <td>'. $item['catDesc']. '</td>
            <td>'. $item['eventStartDate']. '</td>
            <td>'. $item['eventEndDate']. '</td>
            <td>'. $item['eventPrice']. '</td> ';
    if (isset($_SESSION["userID"])) {
		echo'<td> <a href="'.$editLink.'">Edit</a> </td>';
		} 
    echo'
      </tr>';
	$i++;
	$j++;
}
echo '</tbody> </table>';

$startItem=$i;


// Make the links to other pages, if necessary.
if ($nPages > 1) {
    echo '<div class="pagination-block">
        <ul class="pagination">';
    

    // If it's not the first page, make a    Previous button:
    if ($startPage != 1) {
        echo '<li> <a class="btn btn-primary" href="'.$_SERVER["PHP_SELF"].'?page='.($startPage-1).'">Previous</a> </li>';
    }
    // Make all the numbered pages:
  
    for ($i = 1; $i <= $nPages; $i++) {
        if ($i != $startPage) {
            echo '<li> <a href="'.$_SERVER["PHP_SELF"].'?page=' . $i .'">'. $i .' </a> </li>';
        } else {
            echo '<li> <a>'.$i .'</a></li>';
        }
    } // End of FOR loop.

    // If it's not the last page, make a Next button:
    if ($startPage != $nPages) {
        echo '<li> <a class="btn btn-primary" href="'.$_SERVER["PHP_SELF"].'?page=' . ($startPage + 1) . '">Next</a> </li>';
    }

    echo '</ul> </div>'; // Close the paragraph.
	
} // End of links section.

echo '</div> </div>';
