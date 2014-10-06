<?php
/* @var $this DefaultController */
/* @var $data BlogPost */
?>


<div class="view">
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('blogPostId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->blogPostId), array('view', 'id'=>$data->blogPostId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urlLink')); ?>:</b>
	<?php echo CHtml::encode($data->urlLink); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shortText')); ?>:</b>
	<?php echo CHtml::encode($data->shortText); ?>
	<br />

	<b><?php echo $data->getAttributeLabel('fullArticle'); ?>:</b>
	<?php echo CHtml::encode($data->fullArticle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entryDate')); ?>:</b>
	<?php echo CHtml::encode($data->entryDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isVisible')); ?>:</b>
	<?php echo CHtml::encode($data->isVisible); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('authorId')); ?>:</b>
	<?php echo CHtml::encode($data->authorId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tags')); ?>:</b>
	<?php echo CHtml::encode($data->tags); ?>
	<br />

	*/ ?>

</div>