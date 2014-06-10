<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usersId'); ?>
		<?php echo $form->textField($model,'usersId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logoutKey'); ?>
		<?php echo $form->textField($model,'logoutKey',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isActivated'); ?>
		<?php echo $form->textField($model,'isActivated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isLoggedIn'); ?>
		<?php echo $form->textField($model,'isLoggedIn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userDataFid'); ?>
		<?php echo $form->textField($model,'userDataFid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userGroupFid'); ?>
		<?php echo $form->textField($model,'userGroupFid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->