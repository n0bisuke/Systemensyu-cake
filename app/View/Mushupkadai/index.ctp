<?php
	echo $this->Html->tag('h2', $output['title']);
	foreach($output['content'] as $key => $value){
		echo $this->Html->tag('h3',($key+1).": ".$value['title']);
		echo $this->Html->link($value['link'],$value['link']);
		echo $this->Html->tag('h4',$value['description']);
		echo $this->Html->tag('h4','キーワード:'.$value['keyword']);
	}