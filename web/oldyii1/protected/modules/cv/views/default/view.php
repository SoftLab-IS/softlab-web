<?php
/* @var $this DefaultController */
/* @var $model UsersCvData */

$this->breadcrumbs=array(
	'Users Cv Datas'=>array('index'),
	$model->usersCvDataId,
);

$this->menu=array(
	array('label'=>'List UsersCvData', 'url'=>array('index')),
	array('label'=>'Create UsersCvData', 'url'=>array('create')),
	array('label'=>'Update UsersCvData', 'url'=>array('update', 'id'=>$model->usersCvDataId)),
	array('label'=>'Delete UsersCvData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usersCvDataId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsersCvData', 'url'=>array('admin')),
);
?>

<h1>View UsersCvData #<?php echo $model->usersCvDataId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usersCvDataId',
		'imageFid',
		'exportFormatFid',
		'data',
	),
)); ?>
