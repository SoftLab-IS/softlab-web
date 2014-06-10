<?php
/* @var $this GroupsController */
/* @var $data LinkGroups */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkGroupId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->linkGroupId), array('view', 'id'=>$data->linkGroupId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userFid')); ?>:</b>
	<?php echo CHtml::encode($data->userFid); ?>
	<br />


</div>