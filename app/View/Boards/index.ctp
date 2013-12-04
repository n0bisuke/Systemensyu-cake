<?php
	echo $this->Html->link('投稿する','create');
	echo $this->Html->tag('br');
	echo $this->element('showboard',array('data' => $data, 'mes' => 'こんにちは'));
//pr($data);
?>