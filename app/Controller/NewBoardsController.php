<?php
	class NewBoardsController extends AppController {
		public $name = 'NewBoards';
		public $layout = "bootstrap"; //board.ctp レイアウトを利用
		public $uses = array('Board','User'); //Userモデルを追加
		/****認証周り*****/
		public $components = array(
			'DebugKit.Toolbar', //デバッグきっと
			'Auth' => array( //ログイン機能を利用する
				'authenticate' => array(
					'Form' => array(
						'userModel' => 'User',
						'fields' => array('username' => 'email','password' => 'password')
					)
				),
				//ログイン後の移動先
				'loginRedirect' => array('controller' => 'new_boards', 'action' => 'index'),
				//ログアウト後の移動先
				'logoutRedirect' => array('controller' => 'new_boards', 'action' => 'login'),
				//ログインページのパス
				'loginAction' => array('controller' => 'new_boards', 'action' => 'login'),
				//未ログイン時のメッセージ
				'authError' => 'あなたのお名前とパスワードを入力して下さい。',
			)
		);

		public function beforeFilter(){//login処理の設定
			parent::beforeFilter();//親クラスを継承
		 	$this->Auth->allow('login','logout','useradd');//ログインしないで、アクセスできるアクションを登録する
		 	$this->set('user',$this->Auth->user()); // ctpで$userを使えるようにする 。
		}

		public function login(){//ログイン
			if($this->request->is('post')){//POST送信なら
				if($this->Auth->login()){//ログイン成功なら
					//$this->Session->delete('Auth.redirect'); //前回ログアウト時のリンクを記録させない
					return $this->redirect($this->Auth->redirect()); //Auth指定のログインページへ移動
				}else{ //ログイン失敗なら
					$this->Session->setFlash(__('ユーザ名かパスワードが違います'), 'default', array(), 'auth');
				}
			}
		}

		public function logout(){
			$this->Auth->logout();
			$this->Session->destroy(); //セッションを完全削除
			$this->Session->setFlash(__('ログアウトしました'));
			$this->redirect(array('action' => 'login'));
		}

		public function useradd(){
			//POST送信なら
			if($this->request->is('post')) {
				//パスワードとパスチェックの値をハッシュ値変換
				$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
				$this->request->data['User']['pass_check'] = AuthComponent::password($this->request->data['User']['pass_check']);
				//入力したパスワートとパスワードチェックの値が一致
				if($this->request->data['User']['pass_check'] === $this->request->data['User']['password']){		
					$this->User->create();//ユーザーの作成
					$mse = ($this->User->save($this->request->data))? '新規ユーザーを追加しました' : '登録できませんでした。やり直して下さい';
					$this->Session->setFlash(__($mes));
				}else{
					$this->Session->setFlash(__('パスワード確認の値が一致しません．'));
				}
				$this->redirect(array('action' => 'login'));//リダイレクト	
			}
		}


		public function index(){//トップページ
			$data = $this->Board->finduser('all');
			//pr($data);
			$this->set('data',$data);
		}

		public function create(){//投稿
			if(!empty($this->request->data['Board']['comment'])){//投稿された
				$this->set("checkdata",$this->request->data);
			}
		}

		public function decide(){//投稿確定
			if(!empty($this->request->data['Board']['flag'])){//保存
				$this->request->data['Board']['user_id'] = $this->Auth->user('id');
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