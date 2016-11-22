    <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of API
 *
 * @author root
 */
require_once 'includes/DBConnect.php';
require_once ("API/cleanInput.php");
abstract class API {
    /**
     * Property: method
     * The HTTP method this request was made in, either GET, POST, PUT or DELETE
     */
    protected $method = '';
    /**
     * Property: endpoint
     * The Model requested in the URI. eg: /files
     */
    protected $endpoint = '';
    /**
     * Property: args
     * Any additional URI components after the endpoint and table have been removed, in our
     * case, an integer ID for the resource. eg: /<endpoint>/<table>/<arg0>/<arg1>
     * or /<endpoint>/<arg0>
     */
    protected $args = Array();
    /**
     * Property: file
     * Stores the input of the PUT request
     */
     protected $file = Null;

    /**
     * Constructor: __construct
     * Set eader to allow CORS
     * Assemble and pre-process the data
     */
    public function __construct($request) {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");
      
       //set request Method   
        $this->method = $_SERVER['REQUEST_METHOD'];
        if ($this->method == 'POST' && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER)) {
            if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'DELETE') {
                $this->method = 'DELETE';
            } else if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'PUT') {
                $this->method = 'PUT';
            } else {
                throw new Exception("Unexpected Header");
            }
        }
        
        //cleanInput
        switch($this->method) {
        case 'DELETE':
        case 'POST':
            $this->request = cleanInputs($_POST);
            break;
        case 'GET':
            $this->request = cleanInputs($_GET);
            break;
        case 'PUT':
            $this->request = cleanInputs($_GET);
            $this->file = file_get_contents("php://input");
            break;
        default:
            $this->_response('Invalid Method', 405);
            break;
        }
        //bind parameter
        $this->args = $request;
        
        //bind endpoint(method)
        $this->endpoint = array_shift($this->args);
    }
    
    private function view($args) {
        //print_r($args);
        $query=new DBConnect($args);
        return($query->getEvents());
    }
    
    private function viewVenue($args) {
        $query=new DBConnect($args);
        return($query->getVenues());
    }
    
      private function viewCat($args) {
        $query=new DBConnect($args);
        return($query->getCats());
    }
    
    
    public function processAPI(){
        //check if endpoint is a valid method
        if (method_exists($this, $this->endpoint)) {
            return $this->_response($this->{$this->endpoint}($this->args));
        }
        else { 
            return $this->_response("No endpoint: $this->endpoint", 404);
        }
    }
    
    public function _response($data, $status=200) {

        header("HTTP/1.1" . $status . " " . $this->_requestStatus($status));
        header('Content-Type: application/json');
        return json_encode($data);
    }
    
    public function _requestStatus($code) {
        $status= array (
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method not Allowed',
            500 => 'Internal Server error',
            );
        return($status[$code])?$status[$code]:$status[500];
    }
}
