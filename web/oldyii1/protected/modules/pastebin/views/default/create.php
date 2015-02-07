<?php
/* @var $this DefaultController */
/* @var $model Pastebin */

$this->breadcrumbs=array(
	'Pastebins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pastebin', 'url'=>array('index')),
	array('label'=>'Manage Pastebin', 'url'=>array('admin')),
);
?>

<h1>Create Pastebin</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>