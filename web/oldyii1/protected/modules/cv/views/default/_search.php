<?php
/* @var $this DefaultController */
/* @var $model UsersCvData */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usersCvDataId'); ?>
		<?php echo $form->textField($model,'usersCvDataId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'imageFid'); ?>
		<?php echo $form->textField($model,'imageFid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exportFormatFid'); ?>
		<?php echo $form->textField($model,'exportFormatFid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data'); ?>
		<?php echo $form->textArea($model,'data',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->