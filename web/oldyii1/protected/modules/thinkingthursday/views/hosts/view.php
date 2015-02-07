<?php
/* @var $this HostsController */
/* @var $model ThinkingThursdayHosts */

$this->breadcrumbs=array(
	'Thinking Thursday Hosts'=>array('index'),
	$model->ttHostId,
);

$this->menu=array(
	array('label'=>'List ThinkingThursdayHosts', 'url'=>array('index')),
	array('label'=>'Create ThinkingThursdayHosts', 'url'=>array('create')),
	array('label'=>'Update ThinkingThursdayHosts', 'url'=>array('update', 'id'=>$model->ttHostId)),
	array('label'=>'Delete ThinkingThursdayHosts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ttHostId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ThinkingThursdayHosts', 'url'=>array('admin')),
);
?>

<h1>View ThinkingThursdayHosts #<?php echo $model->ttHostId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ttHostId',
		'fullName',
		'email',
		'facebookLink',
		'twitterLink',
		'linkedInLink',
		'googlePlusLink',
		'aboutMeLink',
		'hostMemberFid',
	),
)); ?>
