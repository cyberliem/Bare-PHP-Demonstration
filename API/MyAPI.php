<?php
require_once 'API.class.php';
class MyAPI extends API
{
    protected $User;
    
    public function __construct($request) {
        parent::__construct($request);
        /*print_r($this);
        if (is_array($request)) {
            foreach ($request as $k => $v) {
               $this->$k=$v;
            }
        //print_r($this);
         * 
         
        }
         * 
         */
    }
}

?>
