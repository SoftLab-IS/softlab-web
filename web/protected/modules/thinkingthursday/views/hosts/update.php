<?php
/* @var $this HostsController */
/* @var $model ThinkingThursdayHosts */

$this->breadcrumbs=array(
	'Thinking Thursday Hosts'=>array('index'),
	$model->ttHostId=>array('view','id'=>$model->ttHostId),
	'Update',
);

$this->menu=array(
	array('label'=>'List ThinkingThursdayHosts', 'url'=>array('index')),
	array('label'=>'Create ThinkingThursdayHosts', 'url'=>array('create')),
	array('label'=>'View ThinkingThursdayHosts', 'url'=>array('view', 'id'=>$model->ttHostId)),
	array('label'=>'Manage ThinkingThursdayHosts', 'url'=>array('admin')),
);
?>

<h1>Update ThinkingThursdayHosts <?php echo $model->ttHostId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>