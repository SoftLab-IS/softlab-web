<?php
/* @var $this DefaultController */
/* @var $model BlogPost */

$this->breadcrumbs=array(
	'Blog Posts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BlogPost', 'url'=>array('index')),
	array('label'=>'Manage BlogPost', 'url'=>array('admin')),
);
?>

<h1>Create BlogPost</h1>

<?php $this->renderPartial('_form', array('model'=>$model,
	'tags_name'=>$tags_name,
	'categories'=>$categories)); ?>