<?php
/* @var $this RelationsController */
/* @var $model TtRelationType */

$this->breadcrumbs=array(
	'Tt Relation Types'=>array('index'),
	$model->relationTypeId,
);

$this->menu=array(
	array('label'=>'List TtRelationType', 'url'=>array('index')),
	array('label'=>'Create TtRelationType', 'url'=>array('create')),
	array('label'=>'Update TtRelationType', 'url'=>array('update', 'id'=>$model->relationTypeId)),
	array('label'=>'Delete TtRelationType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->relationTypeId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TtRelationType', 'url'=>array('admin')),
);
?>

<h1>View TtRelationType #<?php echo $model->relationTypeId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'relationTypeId',
		'relationName',
	),
)); ?>
