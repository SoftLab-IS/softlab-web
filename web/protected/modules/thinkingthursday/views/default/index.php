<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Thinking Thursdays',
);

$this->menu=array(
	array('label'=>'Create ThinkingThursday', 'url'=>array('create')),
	array('label'=>'Manage ThinkingThursday', 'url'=>array('admin')),
);
?>

<h1>Thinking Thursdays</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
