<?php

/* 
 * The Following Content is The demo of a web page 
 * It is done using bare PHP  * 
 * It is owned by DUC LIEM NGUYEN  * 
 * Reachable at cyberliem.civil@gmail.com  * 
 */

function get_items($url) {
	 /* Function Get items will make an API call and return the json result
     * Parameters: $url - string variable cointain the URL to call API
     * Rerturn: Array of decoded json
     */
    
	 if (!strpos($url, 'http://')){
		 $url='http://'.$url;
		 } 
	$opts = array('http' =>
	    array(
	        'method' => 'GET',
	        'max_redirects' => '0',
	        'ignore_errors' => '1'
	    )
	 );
	 
	 $context = stream_context_create($opts);
     $result=file_get_contents($url, false, $context);
	 $decoded = json_decode(trim($result), TRUE);
	 return($decoded);
}

function put_item($url) {
	if (!strpos($url, 'http://')){
		 $url='http://'.$url;
		 } 
	/* Function Get items will make an API call and return the json result
     * Parameters: $url - string variable cointain the URL to call API
     * Rerturn: Array of decoded json
     */	 

	echo($url);
    if (isset($_SESSION["editItem"])) {
		$data=$_SESSION["editItem"];
	
		} 
	$opts = array('http' =>
	    array(
	        'method' => 'PUT',
	        'max_redirects' => '0',
	        'header'  => "Accept: application/json\r\n" . "Content-Type: application/json\r\n",
	        'ignore_errors' => '1',
	        'content' => http_build_query($data)
	    )
	 );
	 
	 $context = stream_context_create($opts);
     $result=file_get_contents($url, false, $context);
	 $decoded = json_decode(trim($result), TRUE);
	 return($decoded);
	}

function get_items_withCURL($url) {
	 /* Function Get items will make an API call and return the json result
	  * It provides higher level of customization with CURL libs
	  * Only call this function if the host has php-curl lib package
      * Parameters: $url - string variable cointain the URL to call API
      * Rerturn: Array of decoded json
      */
    
    //init curl Object
    $curl = curl_init($url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);

    //execute it
    $result = curl_exec($curl);

    //if call fail    
    if ($result === false) {
        $errinfo = curl_getinfo($curl);
        curl_close($curl);
        die('error occured during curl exec. Additioanl info: ' . var_export($errinfo));
    }

    //if call success
    $decoded = json_decode(trim($result), TRUE);
    curl_close($curl);
    return($decoded);   
	}
