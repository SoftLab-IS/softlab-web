<?php
/* @var $this TagsController */
/* @var $model BlogTags */

$this->breadcrumbs=array(
	'Blog Tags'=>array('index'),
	$model->blogTagId=>array('view','id'=>$model->blogTagId),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlogTags', 'url'=>array('index')),
	array('label'=>'Create BlogTags', 'url'=>array('create')),
	array('label'=>'View BlogTags', 'url'=>array('view', 'id'=>$model->blogTagId)),
	array('label'=>'Manage BlogTags', 'url'=>array('admin')),
);
?>

<h1>Update BlogTags <?php echo $model->blogTagId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>