<?php
/* @var $this TagsController */
/* @var $data BlogTags */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('blogTagId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->blogTagId), array('view', 'id'=>$data->blogTagId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag')); ?>:</b>
	<?php echo CHtml::encode($data->tag); ?>
	<br />


</div>