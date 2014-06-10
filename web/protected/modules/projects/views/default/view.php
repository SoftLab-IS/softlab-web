<?php
/* @var $this DefaultController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Projects', 'url'=>array('index')),
	array('label'=>'Create Projects', 'url'=>array('create')),
	array('label'=>'Update Projects', 'url'=>array('update', 'id'=>$model->projectId)),
	array('label'=>'Delete Projects', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->projectId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Projects', 'url'=>array('admin')),
);
?>

<h1>View Projects #<?php echo $model->projectId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'projectId',
		'name',
		'description',
		'entryDate',
		'startDate',
		'etaDate',
		'priceEstimate',
	),
)); ?>
