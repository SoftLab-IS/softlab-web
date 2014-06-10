<?php
/* @var $this HostsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Thinking Thursday Hosts',
);

$this->menu=array(
	array('label'=>'Create ThinkingThursdayHosts', 'url'=>array('create')),
	array('label'=>'Manage ThinkingThursdayHosts', 'url'=>array('admin')),
);
?>

<h1>Thinking Thursday Hosts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
