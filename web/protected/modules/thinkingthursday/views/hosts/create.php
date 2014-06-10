<?php
/* @var $this HostsController */
/* @var $model ThinkingThursdayHosts */

$this->breadcrumbs=array(
	'Thinking Thursday Hosts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ThinkingThursdayHosts', 'url'=>array('index')),
	array('label'=>'Manage ThinkingThursdayHosts', 'url'=>array('admin')),
);
?>

<h1>Create ThinkingThursdayHosts</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>