<?php
	//pr($user);
	echo $this->Html->link('投稿する','create');
	echo $this->Html->tag('br');
	foreach($data as $key => $value){
		echo $value['User']['name'];
		echo " ";
		echo $value['Board']['comment'];
		echo " ";
		echo $value['Board']['created'];
		echo " ";
		echo $this->Html->link('編集','edit/'.$value['Board']['id']);
		echo " ";
		echo $this->Html->link('×','delete/'.$value['Board']['id']);
		echo $this->Html->tag('br');
	}
	echo $this->Html->tag('hr');
	echo $this->Html->link('ログアウト','logout');
?>