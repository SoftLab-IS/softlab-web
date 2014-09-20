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
<div class="right">
	<div>
	    <p>Kategorije</p>
		<?php 
		$i = 0;
		foreach ($categories as $key) : ?>
		 <p class="abc"><?php echo CHtml::link($key->name,Yii::app()->createUrl('blog/list/category',array('id' => $key->blogCategoryId))); ?> </p>
	<?php endforeach; ?>
	</div>
	<div>
	    <p>Tagovi:</p>
		<?php foreach ($tags as $key) : ?>
		 <p class="abc"><?php echo CHtml::link($key->tag,Yii::app()->createUrl('blog/list/tag',array('name' => $key->tag))); ?> </p>
	<?php endforeach; ?>
	</div>
</div>
<div class="posts">
	<?php foreach($posts as $model) : ?>
<div class="donji_razmak">

<h3><?php echo CHtml::link($model->name, Yii::app()->createUrl("blog/default/view", array('id' => $model->blogPostId))); ?></h3>
 <br>
<?php echo $model->shortText; ?>
</br>
<br>
<?php echo $model->fullArticle; ?>
</br>
<h8>Post je u kategorijama:</h8>
<?php 
		$s = 0;
		while($real_categories[$s]->name != $model->name){
			$s++;
		}
		foreach ($real_categories[$s]->slBlogCategories as $cat) {
			 echo CHtml::link($cat->name,Yii::app()->createUrl('blog/list/category',array('id' => $cat->blogCategoryId))) . " ";
		}
	?>
	<br>
	Autor Posta: <?php echo CHtml::link($author[$i]->firstName . " ". $author[$i]->lastName, Yii::app
		()->createUrl('blog/list/author',array('id' => $model->authorId))); 
	$i++;
	?>
	Datum postavljanja: <?php echo date('d.m.Y', $model->entryDate); ?> 
	<?php echo Chtml::link("Vidi Čitav Post", Yii::app()->createUrl('blog/default/view', array('id' => $model->blogPostId))); ?>
<br>
</div>
    <?php endforeach;?>
    <?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>
</div>

