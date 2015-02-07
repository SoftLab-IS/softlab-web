<?php
/* @var $this RelationsController */
/* @var $model TtRelationType */

$this->breadcrumbs=array(
	'Tt Relation Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TtRelationType', 'url'=>array('index')),
	array('label'=>'Manage TtRelationType', 'url'=>array('admin')),
);
?>

<h1>Create TtRelationType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>