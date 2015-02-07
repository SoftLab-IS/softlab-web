<?php
/* @var $this HostsController */
/* @var $data ThinkingThursdayHosts */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ttHostId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ttHostId), array('view', 'id'=>$data->ttHostId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullName')); ?>:</b>
	<?php echo CHtml::encode($data->fullName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facebookLink')); ?>:</b>
	<?php echo CHtml::encode($data->facebookLink); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('twitterLink')); ?>:</b>
	<?php echo CHtml::encode($data->twitterLink); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkedInLink')); ?>:</b>
	<?php echo CHtml::encode($data->linkedInLink); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('googlePlusLink')); ?>:</b>
	<?php echo CHtml::encode($data->googlePlusLink); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('aboutMeLink')); ?>:</b>
	<?php echo CHtml::encode($data->aboutMeLink); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hostMemberFid')); ?>:</b>
	<?php echo CHtml::encode($data->hostMemberFid); ?>
	<br />

	*/ ?>

</div>