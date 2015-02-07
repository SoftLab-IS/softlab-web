<?php
/* @var $this GroupsController */
/* @var $model LinkGroups */

$this->breadcrumbs=array(
	'Link Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LinkGroups', 'url'=>array('index')),
	array('label'=>'Manage LinkGroups', 'url'=>array('admin')),
);
?>

<h1>Create LinkGroups</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>