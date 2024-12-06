<?php
require_once "MyClass.php";

class MyNextClass extends MyClass
{
    public function __construct()  {
        parent::__construct();
        echo __CLASS__ . ' is Created';
        // __FILE__ __FUNCTION__
    }
}