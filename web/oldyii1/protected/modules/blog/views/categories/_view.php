<?php
/* @var $this CategoriesController */
/* @var $data BlogCategories */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('blogCategoryId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->blogCategoryId), array('view', 'id'=>$data->blogCategoryId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urlLink')); ?>:</b>
	<?php echo CHtml::encode($data->urlLink); ?>
	<br />


</div>