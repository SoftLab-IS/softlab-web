<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users Cv Datas',
);

$this->menu=array(
	array('label'=>'Create UsersCvData', 'url'=>array('create')),
	array('label'=>'Manage UsersCvData', 'url'=>array('admin')),
);
?>

<h1>Users Cv Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
