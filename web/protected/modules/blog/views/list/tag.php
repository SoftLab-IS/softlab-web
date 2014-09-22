<div>
<?php 
foreach ($data as $userData): ?>
<br></br>
<br></br>
	<h4><?php echo $userData->name; ?></h4>
<div class="fullText">
<?php echo $userData->shortText; ?>
</div>
<div class="fullText">
<?php echo $userData->fullArticle; ?>
</div>
<div class="fullText">
	<div class="blogPostDate"><?php echo CHtml::link('Vidi Citav post', array('/blog/default/view','id'=>$userData->blogPostId)); ?></div>
	<div class="blogPostView">Datum postavljanja: <?php echo date('H:m:i d.m.Y', $userData->entryDate); ?></div>
	<div>Tagovi:<?php $tagovi = explode(",", $userData->tags);
			foreach ($tagovi as $key) {
				echo CHtml::link($key,array('/blog/list/tag','name'=> $key)) . " ";
			}
			 ?>
<?php endforeach;?>
</div>