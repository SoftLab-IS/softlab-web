<?php
/* @var $this GroupsController */
/* @var $model LinkGroups */

$this->breadcrumbs=array(
	'Link Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->linkGroupId),
	'Update',
);

$this->menu=array(
	array('label'=>'List LinkGroups', 'url'=>array('index')),
	array('label'=>'Create LinkGroups', 'url'=>array('create')),
	array('label'=>'View LinkGroups', 'url'=>array('view', 'id'=>$model->linkGroupId)),
	array('label'=>'Manage LinkGroups', 'url'=>array('admin')),
);
?>

<h1>Update LinkGroups <?php echo $model->linkGroupId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>