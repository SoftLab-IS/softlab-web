<?php
/* @var $this TeamsController */
/* @var $model Teams */

$this->breadcrumbs=array(
	'Teams'=>array('index'),
	$model->name=>array('view','id'=>$model->teamId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Teams', 'url'=>array('index')),
	array('label'=>'Create Teams', 'url'=>array('create')),
	array('label'=>'View Teams', 'url'=>array('view', 'id'=>$model->teamId)),
	array('label'=>'Manage Teams', 'url'=>array('admin')),
);
?>

<h1>Update Teams <?php echo $model->teamId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>