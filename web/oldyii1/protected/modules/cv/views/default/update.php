<?php
/* @var $this DefaultController */
/* @var $model UsersCvData */

$this->breadcrumbs=array(
	'Users Cv Datas'=>array('index'),
	$model->usersCvDataId=>array('view','id'=>$model->usersCvDataId),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsersCvData', 'url'=>array('index')),
	array('label'=>'Create UsersCvData', 'url'=>array('create')),
	array('label'=>'View UsersCvData', 'url'=>array('view', 'id'=>$model->usersCvDataId)),
	array('label'=>'Manage UsersCvData', 'url'=>array('admin')),
);
?>

<h1>Update UsersCvData <?php echo $model->usersCvDataId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>