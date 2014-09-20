<?php
/* @var $this DefaultController */
/* @var $model BlogPost */

$this->breadcrumbs=array(
	'Blog Posts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List BlogPost', 'url'=>array('index')),
	array('label'=>'Create BlogPost', 'url'=>array('create')),
	array('label'=>'Update BlogPost', 'url'=>array('update', 'id'=>$model->blogPostId)),
	array('label'=>'Delete BlogPost', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->blogPostId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlogPost', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->name; ?></h1>
<div class="fullText">
<?php echo $model->shortText; ?>
</div>
<div class="fullText">
<?php echo $model->fullArticle; ?>
</div>
<div class="fullText">
	<div class="blogPostView">Autor Posta: <?php echo CHtml::link($autor->firstName . " ". $autor->lastName, 'index.radans.php?r=admincp/users/view&id='. $model->authorId); ?></div>
	<div class="blogPostDate">Datum postavljanja: <?php echo date('H:m:i d.m.Y', $model->entryDate); ?></div>
	<div>Tagovi:<?php $tagovi = explode(",", $model->tags);
			foreach ($tagovi as $key) {
				echo CHtml::link($key, Yii::app()->createUrl('blog/list/tag',array(
                                                         'name'=>$key,
                                                         ))) . " ";
			}
			 ?> </div>
</div>
