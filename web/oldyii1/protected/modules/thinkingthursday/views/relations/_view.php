<?php
/* @var $this RelationsController */
/* @var $data TtRelationType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('relationTypeId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->relationTypeId), array('view', 'id'=>$data->relationTypeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relationName')); ?>:</b>
	<?php echo CHtml::encode($data->relationName); ?>
	<br />


</div>