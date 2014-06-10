<?php
/* @var $this DefaultController */
/* @var $data UsersCvData */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usersCvDataId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usersCvDataId), array('view', 'id'=>$data->usersCvDataId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imageFid')); ?>:</b>
	<?php echo CHtml::encode($data->imageFid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exportFormatFid')); ?>:</b>
	<?php echo CHtml::encode($data->exportFormatFid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />


</div>