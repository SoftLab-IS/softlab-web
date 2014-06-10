<?php
/* @var $this DefaultController */
/* @var $data ThinkingThursday */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ttId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ttId), array('view', 'id'=>$data->ttId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('topicName')); ?>:</b>
	<?php echo CHtml::encode($data->topicName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eventDate')); ?>:</b>
	<?php echo CHtml::encode($data->eventDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abstract')); ?>:</b>
	<?php echo CHtml::encode($data->abstract); ?>
	<br />


</div>