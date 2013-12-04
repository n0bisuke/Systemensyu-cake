<?php //第6回基礎課題1
 class MushupkadaiController extends AppController {
    public $name = "Mushupkadai";
    public $uses = array('Mushupkadai');
    public $components = array('DebugKit.Toolbar'); //DebugKitの適用

    public function index(){
        $output = $this->Mushupkadai->useapi();
        $this->set('output',$output);
    }
 }