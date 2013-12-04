<?php
	class BoardsController extends AppController {
		public $name = 'Boards';
		public $uses = array('Board'); //Userモデルを追加
		public $layout = "board"; //board.ctp レイアウトを利用

		public function index(){//トップページ
			$this->layout = "bootstrap";
			$this->set('data',$this->Board->find('all'));
		}

		public function create(){//投稿
			if(!empty($this->request->data['Board']['comment'])){//投稿された
				$this->set("checkdata",$this->request->data);
			}
		}

		public function decide(){//投稿確定
			if(!empty($this->request->data['Board']['flag'])){//保存
				$this->Board->save($this->request->data);
				$this->redirect('index');
			}
		}

		public function edit($id){
			$this->set('data',$this->Board->editdata($id));
			$this->render('create');
		}

		public function delete($id){
			$this->Board->delete($id);
			$this->redirect('index');
		}
	}
?>