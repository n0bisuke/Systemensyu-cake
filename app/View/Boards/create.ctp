<?php
	if(empty($checkdata)){//投稿画面①
		echo $this->Form->Create('Board',array('url' => 'create'));
		if(!empty($data)){//編集時
			echo $this->Form->input('Board.id',array(
				'type' => 'hidden',
				'value' => $data['Board']['id']
			));
			echo $this->Form->input('Board.comment',array(
				'label' => '編集内容',
				'type' => 'text',
				'value' => $data['Board']['comment']
			));
		}else{
			echo $this->Form->input('Board.comment',array('label' => '投稿内容','type' => 'text'));
		}
		echo $this->Form->submit('投稿する');
	}else{//確認画面②
		echo $this->Html->tag('h2',$checkdata['Board']['comment']);
		echo "この内容で投稿してよろしいですか?";
		echo $this->Form->Create('Board',array('type' => 'post','url' => 'decide'));
		if(!empty($checkdata['Board']['id'])){ //編集時
			echo $this->Form->input('Board.id',array('value' => $checkdata['Board']['id'],'type' => 'hidden'));
		}
		echo $this->Form->input('Board.comment',array('value' => $checkdata['Board']['comment'],'type' => 'hidden'));
		echo $this->Form->input('Board.user_id',array('value' => 0,'type' => 'hidden'));
		echo $this->Form->input('Board.flag',array('value' => 'decide','type' => 'hidden'));
		echo $this->Form->submit('確定する');
	}
?>