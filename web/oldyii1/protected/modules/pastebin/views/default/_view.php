<?php
/* @var $this DefaultController */
/* @var $data Pastebin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pastebinId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pastebinId), array('view', 'id'=>$data->pastebinId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pasteData')); ?>:</b>
	<?php echo CHtml::encode($data->pasteData); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('canExpire')); ?>:</b>
	<?php echo CHtml::encode($data->canExpire); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expireTimestamp')); ?>:</b>
	<?php echo CHtml::encode($data->expireTimestamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isPrivate')); ?>:</b>
	<?php echo CHtml::encode($data->isPrivate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usersFid')); ?>:</b>
	<?php echo CHtml::encode($data->usersFid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('langFid')); ?>:</b>
	<?php echo CHtml::encode($data->langFid); ?>
	<br />

	*/ ?>

</div>