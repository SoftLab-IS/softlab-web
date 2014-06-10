<?php
/* @var $this UsergroupsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Groups',
);

$this->menu=array(
	array('label'=>'Create UserGroups', 'url'=>array('create')),
	array('label'=>'Manage UserGroups', 'url'=>array('admin')),
);
?>

<h1>User Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
