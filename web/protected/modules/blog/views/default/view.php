<?php
/* @var $this DefaultController */
/* @var $model BlogPost */
$this->menu=array(
	array('label'=>'List BlogPost', 'url'=>array('index')),
	array('label'=>'Create BlogPost', 'url'=>array('create')),
	array('label'=>'Update BlogPost', 'url'=>array('update', 'id'=>$model->blogPostId)),
	array('label'=>'Delete BlogPost', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->blogPostId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlogPost', 'url'=>array('admin')),
);
?>

	<div class="row"><h1 class="panel"><?php echo $model->name; ?></h1></div>
	<div class="row">
		<div class="large-12 columns panel">
			<?php echo $model->fullArticle; ?>
		</div>
	</div>
	<div class="row">
		<div class="large-6 columns panel">Autor Posta: <?php echo CHtml::link($autor->firstName . " ". $autor->lastName,
		Yii::app()->createUrl('blog/list/author',array('id' => $model->authorId))); ?></div>
		<div class="large-6 columns panel">Datum postavljanja: <?php echo date('H:m:i d.m.Y', $model->entryDate); ?></div>
	</div>

	<div class="row">
		<div class="large-6 columns panel">
		Tagovi:<?php $tagovi = explode(",", $model->tags);
				foreach ($tagovi as $key) {
					echo CHtml::link($key, Yii::app()->createUrl('blog/list/tag',array(
        	                                                 'name'=>$key,
                	                                         ))) . " ";
				}
				 ?> </div>
		<div class="large-6 columns panel">
		Kategorije: <?php foreach ($categories->slBlogCategories as $blogInCategories) {
			 echo CHtml::link($blogInCategories->name,Yii::app()->createUrl('blog/list/category',
			 	array('id' => $blogInCategories->blogCategoryId))). " ";
		} ?></div>
	</div>

