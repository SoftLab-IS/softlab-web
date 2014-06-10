<?php
/* @var $this DefaultController */
/* @var $model ThinkingThursday */

$this->breadcrumbs=array(
	'Thinking Thursdays'=>array('index'),
	$model->ttId,
);

$this->menu=array(
	array('label'=>'List ThinkingThursday', 'url'=>array('index')),
	array('label'=>'Create ThinkingThursday', 'url'=>array('create')),
	array('label'=>'Update ThinkingThursday', 'url'=>array('update', 'id'=>$model->ttId)),
	array('label'=>'Delete ThinkingThursday', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ttId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ThinkingThursday', 'url'=>array('admin')),
);
?>

<h1>View ThinkingThursday #<?php echo $model->ttId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ttId',
		'topicName',
		'eventDate',
		'abstract',
	),
)); ?>
