<?php
/* @var $this DefaultController */
/* @var $model Links */

$this->breadcrumbs=array(
	'Links'=>array('index'),
	$model->name=>array('view','id'=>$model->linkId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Links', 'url'=>array('index')),
	array('label'=>'Create Links', 'url'=>array('create')),
	array('label'=>'View Links', 'url'=>array('view', 'id'=>$model->linkId)),
	array('label'=>'Manage Links', 'url'=>array('admin')),
);
?>

<h1>Update Links <?php echo $model->linkId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>