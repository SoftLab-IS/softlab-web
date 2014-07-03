<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Blog Posts',
);

$this->menu=array(
	array('label'=>'Create BlogPost', 'url'=>array('create')),
	array('label'=>'Manage BlogPost', 'url'=>array('admin')),
);
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="row buttons">
		<input type="text" name="query" />
		<?php echo CHtml::submitButton('Pretrazi'); ?>
	</div>

<?php $this->endWidget(); ?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

