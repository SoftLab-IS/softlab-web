<?php
/* @var $this DefaultController */
/* @var $model ThinkingThursday */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'thinking-thursday-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'topicName'); ?>
		<?php echo $form->textField($model,'topicName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'topicName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eventDate'); ?>
		<?php echo $form->textField($model,'eventDate',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'eventDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abstract'); ?>
		<?php echo $form->textArea($model,'abstract',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'abstract'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->