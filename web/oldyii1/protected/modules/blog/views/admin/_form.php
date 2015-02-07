<?php
/* @var $this DefaultController */
/* @var $model BlogPost */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'blog-post-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shortText'); ?>
		<?php echo $form->textArea($model,'shortText',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'shortText'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fullArticle'); ?><br />
		<?php $this->widget('application.extensions.tinymce.ETinyMce',
		array(
		'model'=>$model,
		'attribute'=>'fullArticle',
		'editorTemplate'=>'full',
		'htmlOptions'=>array('rows'=>6, 'cols'=>6, 'class'=>'tinymce'),
		)); ?>
		<?php echo $form->error($model,'fullArticle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entryDate'); ?>
		<?php echo date('d.m.y'); ?>
		
		<?php echo $form->error($model,'entryDate'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'isVisible'); ?>
		<?php echo $form->labelEx($model,'isVisible'); ?>
		<?php echo $form->error($model,'isVisible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'authorId'); ?>
		<?php echo Yii::app()->session["name"]; ?>
		<?php echo $form->error($model,'authorId'); ?>
	</div>
<div class="row rememberMe">
	<p>Kategorije:</p>
	<?php
	$selected_type_list = array_keys(CHtml::listData($selectedCategories,'blogCategoryId','name'));
	$list = Chtml::listData($categories,'blogCategoryId','name');
	echo CHtml::checkBoxList('Categories',$selected_type_list,$list); ?>

</div>	
	<div class="row rememberMe">
		<?php echo $form->labelEx($model,'tags'); ?>
		<br>
		<?php $arrayName = array();
			foreach ($tags_name as $key) {
				array_push($arrayName, $key->tag);
		} ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
		    'id'=>'showTags',
		    'name'=>'nesto',
		    'source'=>$arrayName,
		    // additional javascript options for the autocomplete plugin
		    'options'=>array(
		        'minLength'=>'1',
		        'select'=>"js:function(){
		        	$('#setTags').append($('#showTags').val());
		        	$('#setTags').append(',');
		        	this.value = '';
		        }"
		    ),
		    'htmlOptions'=>array(
		        'style'=>'height:20px;',
		    ),
		)); ?>
		<br>
		<?php echo $form->textArea($model,'tags',array(
					'id'=>'setTags',
					'rows'=>6, 'cols'=>40
					)); ?>
		</br>
		<br>
		</br>
		<?php echo $form->error($model,'tags'); ?>
		</br>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<div>

</div>
<?php $this->endWidget(); ?>
</div><!-- form -->