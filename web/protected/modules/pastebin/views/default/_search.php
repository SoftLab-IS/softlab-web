<?php
/* @var $this DefaultController */
/* @var $model Pastebin */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pastebinId'); ?>
		<?php echo $form->textField($model,'pastebinId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pasteData'); ?>
		<?php echo $form->textArea($model,'pasteData',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'canExpire'); ?>
		<?php echo $form->textField($model,'canExpire'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expireTimestamp'); ?>
		<?php echo $form->textField($model,'expireTimestamp',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isPrivate'); ?>
		<?php echo $form->textField($model,'isPrivate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usersFid'); ?>
		<?php echo $form->textField($model,'usersFid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'langFid'); ?>
		<?php echo $form->textField($model,'langFid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->