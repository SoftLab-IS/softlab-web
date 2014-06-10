<?php
/* @var $this CategoriesController */
/* @var $model BlogCategories */

$this->breadcrumbs=array(
	'Blog Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->blogCategoryId),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlogCategories', 'url'=>array('index')),
	array('label'=>'Create BlogCategories', 'url'=>array('create')),
	array('label'=>'View BlogCategories', 'url'=>array('view', 'id'=>$model->blogCategoryId)),
	array('label'=>'Manage BlogCategories', 'url'=>array('admin')),
);
?>

<h1>Update BlogCategories <?php echo $model->blogCategoryId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>