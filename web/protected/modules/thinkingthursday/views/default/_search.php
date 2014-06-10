<?php
/* @var $this DefaultController */
/* @var $model ThinkingThursday */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ttId'); ?>
		<?php echo $form->textField($model,'ttId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'topicName'); ?>
		<?php echo $form->textField($model,'topicName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eventDate'); ?>
		<?php echo $form->textField($model,'eventDate',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'abstract'); ?>
		<?php echo $form->textArea($model,'abstract',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->