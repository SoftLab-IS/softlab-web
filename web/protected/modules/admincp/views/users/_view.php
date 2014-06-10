<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usersId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usersId), array('view', 'id'=>$data->usersId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salt')); ?>:</b>
	<?php echo CHtml::encode($data->salt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logoutKey')); ?>:</b>
	<?php echo CHtml::encode($data->logoutKey); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isActivated')); ?>:</b>
	<?php echo CHtml::encode($data->isActivated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isLoggedIn')); ?>:</b>
	<?php echo CHtml::encode($data->isLoggedIn); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('userDataFid')); ?>:</b>
	<?php echo CHtml::encode($data->userDataFid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userGroupFid')); ?>:</b>
	<?php echo CHtml::encode($data->userGroupFid); ?>
	<br />

	*/ ?>

</div>