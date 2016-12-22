<?php 
    require_once('API/MyAPI.php');
    //initialized $request as empty
    $request=NULL;
    ini_set('display_errors', 1);

    //if POST is sent:
    if (!empty($_POST)) {
        $request['method']='POST';
        echo("here");
    }
    //if GET is sent:
    else if (!empty($_GET)) {
        $request=(filter_input_array(INPUT_GET));
    }
    else {
        //$urlparsed=parse_url(filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING));
        exit("API called invalid");
    }
    echo("here");
    print_r($request);
    if (!empty($request)) {
        try {
		    $API = new MyAPI($request);
            return($API->processAPI());
        } catch (Exception $e) {
            echo json_encode(Array('error' => $e->getMessage()));
        }
    }
?>
