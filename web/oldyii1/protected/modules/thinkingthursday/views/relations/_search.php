<?php
/* @var $this RelationsController */
/* @var $model TtRelationType */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'relationTypeId'); ?>
		<?php echo $form->textField($model,'relationTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'relationName'); ?>
		<?php echo $form->textField($model,'relationName',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->