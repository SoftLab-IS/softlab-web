<?php
/* @var $this TeamsController */
/* @var $data Teams */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('teamId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->teamId), array('view', 'id'=>$data->teamId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entryDate')); ?>:</b>
	<?php echo CHtml::encode($data->entryDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdByUserFid')); ?>:</b>
	<?php echo CHtml::encode($data->createdByUserFid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teamLeaderId')); ?>:</b>
	<?php echo CHtml::encode($data->teamLeaderId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teamImageId')); ?>:</b>
	<?php echo CHtml::encode($data->teamImageId); ?>
	<br />


</div>