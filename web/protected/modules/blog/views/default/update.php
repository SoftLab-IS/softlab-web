<?php
/* @var $this DefaultController */
/* @var $model BlogPost */

$this->breadcrumbs=array(
	'Blog Posts'=>array('index'),
	$model->name=>array('view','id'=>$model->blogPostId),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlogPost', 'url'=>array('index')),
	array('label'=>'Create BlogPost', 'url'=>array('create')),
	array('label'=>'View BlogPost', 'url'=>array('view', 'id'=>$model->blogPostId)),
	array('label'=>'Manage BlogPost', 'url'=>array('admin')),
);
?>

<h1>Update BlogPost <?php echo $model->blogPostId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,	
	'tags_name'=>$tags_name,
	'categories'=>$categories)); ?>