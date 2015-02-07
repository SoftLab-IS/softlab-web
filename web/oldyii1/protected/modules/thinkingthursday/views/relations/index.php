<?php
/* @var $this RelationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tt Relation Types',
);

$this->menu=array(
	array('label'=>'Create TtRelationType', 'url'=>array('create')),
	array('label'=>'Manage TtRelationType', 'url'=>array('admin')),
);
?>

<h1>Tt Relation Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
