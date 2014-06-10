<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pastebins',
);

$this->menu=array(
	array('label'=>'Create Pastebin', 'url'=>array('create')),
	array('label'=>'Manage Pastebin', 'url'=>array('admin')),
);
?>

<h1>Pastebins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
