<?php
	class Board extends Model{
		public $name = 'Board';

		public function editdata($id){
			return $this->findById($id);
		}

		public function finduser(){
			$belongsTo = array(
				'User' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
				));
			$this->bindModel(array("belongsTo" => $belongsTo));
			$data = $this->find('all');
			return $data;
		}
	}
?>