<?php
/* @var $this GroupsController */
/* @var $model LinkGroups */

$this->breadcrumbs=array(
	'Link Groups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List LinkGroups', 'url'=>array('index')),
	array('label'=>'Create LinkGroups', 'url'=>array('create')),
	array('label'=>'Update LinkGroups', 'url'=>array('update', 'id'=>$model->linkGroupId)),
	array('label'=>'Delete LinkGroups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->linkGroupId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LinkGroups', 'url'=>array('admin')),
);
?>

<h1>View LinkGroups #<?php echo $model->linkGroupId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'linkGroupId',
		'name',
		'userFid',
	),
)); ?>
