<?php
/* @var $this DefaultController */
/* @var $data Projects */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('projectId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->projectId), array('view', 'id'=>$data->projectId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entryDate')); ?>:</b>
	<?php echo CHtml::encode($data->entryDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startDate')); ?>:</b>
	<?php echo CHtml::encode($data->startDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('etaDate')); ?>:</b>
	<?php echo CHtml::encode($data->etaDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('priceEstimate')); ?>:</b>
	<?php echo CHtml::encode($data->priceEstimate); ?>
	<br />


</div>