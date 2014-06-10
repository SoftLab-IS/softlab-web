<?php
/* @var $this DefaultController */
/* @var $model Projects */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entryDate'); ?>
		<?php echo $form->textField($model,'entryDate',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'entryDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'startDate'); ?>
		<?php echo $form->textField($model,'startDate',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'startDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'etaDate'); ?>
		<?php echo $form->textField($model,'etaDate',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'etaDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'priceEstimate'); ?>
		<?php echo $form->textField($model,'priceEstimate',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'priceEstimate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->