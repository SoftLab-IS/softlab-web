<?php
/* @var $this DefaultController */
/* @var $data Links */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->linkId), array('view', 'id'=>$data->linkId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('directRedirectUrl')); ?>:</b>
	<?php echo CHtml::encode($data->directRedirectUrl); ?>
	<br />


</div>