<?php
/* @var $this RelationsController */
/* @var $model TtRelationType */

$this->breadcrumbs=array(
	'Tt Relation Types'=>array('index'),
	$model->relationTypeId=>array('view','id'=>$model->relationTypeId),
	'Update',
);

$this->menu=array(
	array('label'=>'List TtRelationType', 'url'=>array('index')),
	array('label'=>'Create TtRelationType', 'url'=>array('create')),
	array('label'=>'View TtRelationType', 'url'=>array('view', 'id'=>$model->relationTypeId)),
	array('label'=>'Manage TtRelationType', 'url'=>array('admin')),
);
?>

<h1>Update TtRelationType <?php echo $model->relationTypeId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>