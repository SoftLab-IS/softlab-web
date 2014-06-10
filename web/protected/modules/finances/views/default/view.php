<?php
/* @var $this DefaultController */
/* @var $model Transactions */

$this->breadcrumbs=array(
	'Transactions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Transactions', 'url'=>array('index')),
	array('label'=>'Create Transactions', 'url'=>array('create')),
	array('label'=>'Update Transactions', 'url'=>array('update', 'id'=>$model->transactionId)),
	array('label'=>'Delete Transactions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->transactionId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Transactions', 'url'=>array('admin')),
);
?>

<h1>View Transactions #<?php echo $model->transactionId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'transactionId',
		'name',
		'timestamp',
		'amount',
		'description',
		'userId',
	),
)); ?>
