<?php
/* @var $this DefaultController */
/* @var $model Pastebin */

$this->breadcrumbs=array(
	'Pastebins'=>array('index'),
	$model->title=>array('view','id'=>$model->pastebinId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pastebin', 'url'=>array('index')),
	array('label'=>'Create Pastebin', 'url'=>array('create')),
	array('label'=>'View Pastebin', 'url'=>array('view', 'id'=>$model->pastebinId)),
	array('label'=>'Manage Pastebin', 'url'=>array('admin')),
);
?>

<h1>Update Pastebin <?php echo $model->pastebinId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>