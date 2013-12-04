<?php
	class User extends Model{
		public $name = 'User';

		public $validate = array(
			'name' => array(
				'rule' => array('between',0,10),
				'required' => true,
				'alloEmpty' => false,
				'message' => '10文字以内で必ず入力して下さい'
			),
			'email' => array(
				'rule' => 'email',
				'required' => true,
				'alloEmpty' => false,
				'message' => 'メールアドレスの形式で必ず入力して下さい'
				),
			'password' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'alloEmpty' => false,
				'message' => '必ず入力して下さい'
			)
		);

		public function join($data){
			//性別
			if($data['User']['sex'] == 0){
				$data['User']['sex'] = "男";
			}else{
				$data['User']['sex'] = "女";
			}

			$this->save($data);
		}
	}
?>