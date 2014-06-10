<?php
/* @var $this CategoriesController */
/* @var $model BlogCategories */

$this->breadcrumbs=array(
	'Blog Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List BlogCategories', 'url'=>array('index')),
	array('label'=>'Create BlogCategories', 'url'=>array('create')),
	array('label'=>'Update BlogCategories', 'url'=>array('update', 'id'=>$model->blogCategoryId)),
	array('label'=>'Delete BlogCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->blogCategoryId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlogCategories', 'url'=>array('admin')),
);
?>

<h1>View BlogCategories #<?php echo $model->blogCategoryId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'blogCategoryId',
		'name',
		'urlLink',
	),
)); ?>
