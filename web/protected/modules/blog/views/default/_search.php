<?php
/* @var $this DefaultController */
/* @var $model BlogPost */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'blogPostId'); ?>
		<?php echo $form->textField($model,'blogPostId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'urlLink'); ?>
		<?php echo $form->textField($model,'urlLink',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shortText'); ?>
		<?php echo $form->textArea($model,'shortText',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fullText'); ?>
		<?php echo $form->textArea($model,'fullText',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entryDate'); ?>
		<?php echo $form->textField($model,'entryDate',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isVisible'); ?>
		<?php echo $form->textField($model,'isVisible'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'authorId'); ?>
		<?php echo $form->textField($model,'authorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tags'); ?>
		<?php echo $form->textArea($model,'tags',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->