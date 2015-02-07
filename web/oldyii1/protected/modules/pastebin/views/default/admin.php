<?php
/* @var $this DefaultController */
/* @var $model Pastebin */

$this->breadcrumbs=array(
	'Pastebins'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pastebin', 'url'=>array('index')),
	array('label'=>'Create Pastebin', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pastebin-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pastebins</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pastebin-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'pastebinId',
		'title',
		'pasteData',
		'canExpire',
		'expireTimestamp',
		'isPrivate',
		/*
		'usersFid',
		'langFid',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
