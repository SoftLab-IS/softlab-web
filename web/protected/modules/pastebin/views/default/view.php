<?php
/* @var $this DefaultController */
/* @var $model Pastebin */

$this->breadcrumbs=array(
	'Pastebins'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Pastebin', 'url'=>array('index')),
	array('label'=>'Create Pastebin', 'url'=>array('create')),
	array('label'=>'Update Pastebin', 'url'=>array('update', 'id'=>$model->pastebinId)),
	array('label'=>'Delete Pastebin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pastebinId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pastebin', 'url'=>array('admin')),
);
?>

<h1>View Pastebin #<?php echo $model->pastebinId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pastebinId',
		'title',
		'pasteData',
		'canExpire',
		'expireTimestamp',
		'isPrivate',
		'usersFid',
		'langFid',
	),
)); ?>
