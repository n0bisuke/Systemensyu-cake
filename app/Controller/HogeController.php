<?php
 class HogeController extends AppController {
    public $name = "Hoge"; //クラス名を指定します．
    public $components = array('DebugKit.Toolbar'); //DebugKitの適用

    public function index(){//indexアクション
    	/*
    	http://ドメイン名/cake/hoge/index/
    	ここにページで必要な処理を記述
    	通常のPHPの記述をここで書けます．
    	*/
    }

    public function show(){//showアクション
    	if($this->request->is('POST')){//POST送信されたかどうか
    		$jikan = $this->request->data['Aisatsu']['jikan'];
    		$mes = $this->Hoge->handan($jikan);
    		$this->set('say',$mes); //ビューに値を受け渡す
    	}else{//URLで直接アクセスした人など
    		$this->flash(
    			'inputアクションから来て下さい',
    			array(
    				'controller' => 'hoge',
    				'action' =>'input'
    				)
    			);
    		//$this->redirect('input');
    	}
    }

    public function input(){
    	/*
    	http://ドメイン名/cake/hoge/input/
    	*/	
    }
 }