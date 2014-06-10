<?php
/* @var $this HostsController */
/* @var $model ThinkingThursdayHosts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'thinking-thursday-hosts-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fullName'); ?>
		<?php echo $form->textField($model,'fullName',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'fullName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facebookLink'); ?>
		<?php echo $form->textField($model,'facebookLink',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'facebookLink'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'twitterLink'); ?>
		<?php echo $form->textField($model,'twitterLink',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'twitterLink'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'linkedInLink'); ?>
		<?php echo $form->textField($model,'linkedInLink',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'linkedInLink'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'googlePlusLink'); ?>
		<?php echo $form->textField($model,'googlePlusLink',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'googlePlusLink'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aboutMeLink'); ?>
		<?php echo $form->textField($model,'aboutMeLink',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'aboutMeLink'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hostMemberFid'); ?>
		<?php echo $form->textField($model,'hostMemberFid'); ?>
		<?php echo $form->error($model,'hostMemberFid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->