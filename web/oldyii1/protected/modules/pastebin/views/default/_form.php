<?php
/* @var $this DefaultController */
/* @var $model Pastebin */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pastebin-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pasteData'); ?>
		<?php echo $form->textArea($model,'pasteData',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'pasteData'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'canExpire'); ?>
		<?php echo $form->textField($model,'canExpire'); ?>
		<?php echo $form->error($model,'canExpire'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expireTimestamp'); ?>
		<?php echo $form->textField($model,'expireTimestamp',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'expireTimestamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isPrivate'); ?>
		<?php echo $form->textField($model,'isPrivate'); ?>
		<?php echo $form->error($model,'isPrivate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usersFid'); ?>
		<?php echo $form->textField($model,'usersFid'); ?>
		<?php echo $form->error($model,'usersFid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'langFid'); ?>
		<?php echo $form->textField($model,'langFid'); ?>
		<?php echo $form->error($model,'langFid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->