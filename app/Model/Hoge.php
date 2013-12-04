<?php
class Hoge extends Model{
	public $name = 'Hoge';
	public $useTable = false;

	public function handan($jikan){
	    if($jikan == '朝'){
			$mes = 'おはよう';
		}elseif($jikan == '夜'){
			$mes = 'こんばんわ';
		}else{
			$mes = 'こんにちは';
		}
		return $mes;
	}

	public function join($data){
	    //性別
		if($data['User']['sex'] == 0){
			$data['User']['sex'] = "男";
		}else{
			$data['User']['sex'] = "女";
		}
		//学年
		switch($data['User']['grade']){
			case 0:
				$data['User']['grade'] = "学部1年";
				break;
			case 1:
				$data['User']['grade'] = "学部2年";
				break;
			case 2:
				$data['User']['grade'] = "学部3年";
				break;
			case 3:
				$data['User']['grade'] = "学部4年";
				break;
			default:
		}
		//好きなもの
		if($data['User']['like']['sports'] == 1){
			$data['User']['like']['sports'] = "運動";
		}else{
			$data['User']['like']['sports'] = "";
		}
		if($data['User']['like']['manga'] == 1){
			$data['User']['like']['manga'] = "漫画";
		}else{
			$data['User']['like']['manga'] = "";
		}
		if($data['User']['like']['girl'] == 1){
			$data['User']['like']['girl'] = "女の子";
		}else{
			$data['User']['like']['girl'] = "";
		}

		return $data;
	}
}
?>