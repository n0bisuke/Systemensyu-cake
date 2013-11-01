<?php
 class HelloController extends AppController {
    public $name = "Hello";
    //public $uses = null;
    public $components = array('DebugKit.Toolbar'); //DebugKitの適用

    function index(){
    	echo "aaaa";
    }
 }