<?php
/* @var $this DefaultController */
/* @var $model UsersCvData */

$this->breadcrumbs=array(
	'Users Cv Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsersCvData', 'url'=>array('index')),
	array('label'=>'Manage UsersCvData', 'url'=>array('admin')),
);
?>

<h1>Create UsersCvData</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>