<?php
/* @var $this DefaultController */
/* @var $model ThinkingThursday */

$this->breadcrumbs=array(
	'Thinking Thursdays'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ThinkingThursday', 'url'=>array('index')),
	array('label'=>'Manage ThinkingThursday', 'url'=>array('admin')),
);
?>

<h1>Create ThinkingThursday</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>