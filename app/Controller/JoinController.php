<?php
 class JoinController extends AppController {
    public $name = "Join";
    public $uses = array('Hoge');
    public $components = array('DebugKit.Toolbar'); //DebugKitの適用

    function index(){}//Form

    function result(){//結果
    	if(!empty($this->request->data['User'])){
            $userdata = $this->Hoge->join($this->request->data);
    		$this->set('data', $userdata);
    	}
    }
 }