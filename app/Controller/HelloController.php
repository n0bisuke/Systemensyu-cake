<?php
 class HelloController extends AppController {
    public $name = "Hello";
    //public $uses = null;
    public $components = array('DebugKit.Toolbar'); //DebugKitの適用

    function index(){
    	//$this->layout=null;

    	if($this->request->is('post')){
    		pr($this->request->data);
    	}
    }
 }