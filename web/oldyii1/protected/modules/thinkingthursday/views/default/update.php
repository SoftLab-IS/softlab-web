<?php
/* @var $this DefaultController */
/* @var $model ThinkingThursday */

$this->breadcrumbs=array(
	'Thinking Thursdays'=>array('index'),
	$model->ttId=>array('view','id'=>$model->ttId),
	'Update',
);

$this->menu=array(
	array('label'=>'List ThinkingThursday', 'url'=>array('index')),
	array('label'=>'Create ThinkingThursday', 'url'=>array('create')),
	array('label'=>'View ThinkingThursday', 'url'=>array('view', 'id'=>$model->ttId)),
	array('label'=>'Manage ThinkingThursday', 'url'=>array('admin')),
);
?>

<h1>Update ThinkingThursday <?php echo $model->ttId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>