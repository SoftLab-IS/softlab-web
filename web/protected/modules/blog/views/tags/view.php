<?php
/* @var $this TagsController */
/* @var $model BlogTags */

$this->breadcrumbs=array(
	'Blog Tags'=>array('index'),
	$model->blogTagId,
);

$this->menu=array(
	array('label'=>'List BlogTags', 'url'=>array('index')),
	array('label'=>'Create BlogTags', 'url'=>array('create')),
	array('label'=>'Update BlogTags', 'url'=>array('update', 'id'=>$model->blogTagId)),
	array('label'=>'Delete BlogTags', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->blogTagId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlogTags', 'url'=>array('admin')),
);
?>

<h1>View BlogTags #<?php echo $model->blogTagId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'blogTagId',
		'tag',
	),
)); ?>
