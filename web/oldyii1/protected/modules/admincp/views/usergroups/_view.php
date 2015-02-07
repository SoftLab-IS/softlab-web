<?php
/* @var $this UsergroupsController */
/* @var $data UserGroups */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('userGroupId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->userGroupId), array('view', 'id'=>$data->userGroupId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frontendAccess')); ?>:</b>
	<?php echo CHtml::encode($data->frontendAccess); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('backendAccess')); ?>:</b>
	<?php echo CHtml::encode($data->backendAccess); ?>
	<br />


</div>