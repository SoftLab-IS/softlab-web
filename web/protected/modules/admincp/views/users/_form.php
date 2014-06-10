<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'salt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logoutKey'); ?>
		<?php echo $form->textField($model,'logoutKey',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'logoutKey'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isActivated'); ?>
		<?php echo $form->textField($model,'isActivated'); ?>
		<?php echo $form->error($model,'isActivated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isLoggedIn'); ?>
		<?php echo $form->textField($model,'isLoggedIn'); ?>
		<?php echo $form->error($model,'isLoggedIn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userDataFid'); ?>
		<?php echo $form->textField($model,'userDataFid'); ?>
		<?php echo $form->error($model,'userDataFid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userGroupFid'); ?>
		<?php echo $form->textField($model,'userGroupFid'); ?>
		<?php echo $form->error($model,'userGroupFid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->