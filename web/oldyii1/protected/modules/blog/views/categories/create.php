<?php
/* @var $this CategoriesController */
/* @var $model BlogCategories */

$this->breadcrumbs=array(
	'Blog Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BlogCategories', 'url'=>array('index')),
	array('label'=>'Manage BlogCategories', 'url'=>array('admin')),
);
?>

<h1>Create BlogCategories</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>