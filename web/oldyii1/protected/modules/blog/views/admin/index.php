<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */
$this->menu=array(
	array('label'=>'Create BlogPost', 'url'=>array('create')),
	array('label'=>'Manage BlogPost', 'url'=>array('admin')),
);
?>
<div class="row">
<div class="large-8 columns">
 <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="row">
		\<div class="large-8 columns"><input type="text" name="query" class="large-8 columns" /></div>
		<div class="large-4 columns"><?php echo CHtml::submitButton('Pretrazi',array("class" => " button")); ?></div>
	</div>
<?php $this->endWidget(); ?>
<?php 
$i = 0;
foreach($posts as $model) : ?>
<div class="panel">

	<h3><?php echo CHtml::link($model->name, Yii::app()->createUrl("blog/default/view", array('id' => $model->blogPostId))); ?></h3>
 	<br>
		<?php echo $model->shortText; ?>
	</br>
		<h8>Post je u kategorijama:</h8>
		<?php 
			$s = 0;
			while($blogInCategories[$s]->name != $model->name){
				$s++;
			}
			foreach ($blogInCategories[$s]->slBlogCategories as $cat) {
				echo CHtml::link($cat->name,Yii::app()->createUrl('blog/list/category',array('id' => $cat->blogCategoryId))) . " ";
			}
			echo "<br> Tagovi: ";
			$tagsExpolde = explode(",",$model->tags);
			foreach ($tagsExpolde as $tagLink) {
				 echo CHtml::link($tagLink,Yii::app()->createUrl('blog/list/tag',array('name' => $tagLink))); 
			}
		?>
		<br>
		Autor Posta: <?php echo CHtml::link($author[$i]->firstName . " ". $author[$i]->lastName, Yii::app()->createUrl('blog/list/author',array('id' => $model->authorId))); 
		$i++;
			?>

		Datum postavljanja: <?php echo date('d.m.Y', $model->entryDate); ?> 
		<?php echo Chtml::link("Vidi Čitav Post", Yii::app()->createUrl('blog/default/view', array('id' => $model->blogPostId)),array("class" => "button")); ?>
		<br>
	
</div>
    <?php endforeach;?>
</div>
<div class="large-4 columns">
<br>
	<div class="panel">
	    <p>Kategorije</p>
		<?php 
		$i = 0;
		foreach ($categories as $key) : ?>
		 <p class="abc"><?php echo CHtml::link($key->name,Yii::app()->createUrl('blog/list/category',array('id' => $key->blogCategoryId))); ?> </p>
	<?php endforeach; ?>
	</div>
	<div class="panel">
	    <p>Tagovi:</p>
		<?php foreach ($tags as $key) : ?>
		 <p class="abc"><?php echo CHtml::link($key->tag,Yii::app()->createUrl('blog/list/tag',array('name' => $key->tag))); ?> </p>
	<?php endforeach; ?>
	</div>
	<div><?php 
	$this->menu=array(
	array('label'=>'Create BlogPost', 'url'=>array('create')),
	array('label'=>'Manage BlogPost', 'url'=>array('admin')),
);?></div>

</div>

</div>
 <?php 
  		$this->widget('CLinkPager', array(
  	    	'pages' => $pages,
  	    	'maxButtonCount' => 7,
  	        'firstPageLabel' => '1',
  	        'prevPageLabel'  => '<',
  	        'nextPageLabel'  => '>',
  	 		'header' => '',
  		));
 ?>
