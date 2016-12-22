    <?php

/**
 * API for Tyne Event database.
 *
 * @Cyberliem
 */
$upOne=realpath(dirname(__FILE__). '/..'); 
require_once ($upOne. '/dbmodules/DBConnect.php');
require_once ($upOne.'/dbmodules/cleanInput.php');

class API {
    //The HTTP method this request was made in, either GET, POST, PUT or DELETE
    protected $method = '';
    
    //The end point method to call to Database
    protected $endpoint = '';
    
    //Any additional URI components act as arguments for API function
    protected $args = Array();
	
	//Additional arguments for PUT request.
	protected $file;
    /**
     * Constructor: __construct
     * Set eader to allow CORS
     * Assemble and pre-process the data
     */
    public function __construct($request) {
             
      
        //bind parameter
        $this->args = $request;
        
        //bind endpoint(method)
        $this->endpoint = ($this->args["endpoint"]);
        unset($this->args["endpoint"]);
    }
    
    private function view($args) {
        //print_r($args);
        
        $query=new DBConnect($args);
        return($query->getEvents());
    }
    
    private function putItem() {
		$query=new DBConnect($this->file);
		return($query->updateEvent());
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
		return $data;
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
