<h1>ユーザー登録フォーム</h1>

<!-- フォーム開始 -->
<?php echo $this->Form->create('User', array(
	'type' => 'post',
	'url' => 'index'
	)); ?>

<p>
<?php echo $this->Form->input('User.firstname',array(
	'label' => "名字"
)); ?>
<?php echo $this->Form->input('User.lastname',array(
	'label' => "名前"
)); ?>
</p>

<!-- ラジオボタン -->
<?php $option = array(0 => '男', 1 => '女'); ?>
<?php $option2 = array('legend' => false, 'value' => 1);?>
<?php echo $this->Form->label('User.sex','性別'); ?>
<?php echo $this->Form->radio('User.sex',$option,$option2); ?>
<?php echo $this->Form->error('User.ssex'); ?>

<!-- セレクトボックス -->
<?php $option = array(0=>'学部1年','学部2年','学部3年','学部4年','修士1年','修士2年',); ?>
<?php echo $this->Form->label('User.grade','学年'); ?>
<?php echo $this->Form->select('User.grade',$option,$option2); ?>
<?php echo $this->Form->error('User.grade'); ?>

<!-- チェックボックス -->
<p>好きなもの</p>
<?php echo $this->Form->checkbox('User.like.sports',array('checked' => true)); ?>
<?php echo $this->Form->label('User.like.sports','運動'); ?>
<?php echo $this->Form->checkbox('User.like.manga',array('checked' => false)); ?>
<?php echo $this->Form->label('User.like.manga','漫画'); ?>
<?php echo $this->Form->checkbox('User.like.girl',array('checked' => true)); ?>
<?php echo $this->Form->label('User.like.girl','女の子'); ?>
<?php echo $this->Form->error('User.like'); ?>

<!-- テキストエリア -->
<?php echo $this->Form->label('User.comment','コメント'); ?>
<?php echo $this->Form->textarea('User.comment'); ?>
<?php echo $this->Form->error('User.comment'); ?>

<!-- パスワード -->
<?php echo $this->Form->label('User.password','パスワード'); ?>
<?php echo $this->Form->password('User.password'); ?>

<!-- 送信ボタン -->
<?php echo $this->Form->submit(); ?>

<!-- フォーム終了 -->
<?php echo $this->Form->end(); ?>