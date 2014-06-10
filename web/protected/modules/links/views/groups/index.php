<?php
/* @var $this GroupsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Link Groups',
);

$this->menu=array(
	array('label'=>'Create LinkGroups', 'url'=>array('create')),
	array('label'=>'Manage LinkGroups', 'url'=>array('admin')),
);
?>

<h1>Link Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
