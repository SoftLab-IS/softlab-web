<?php foreach ($categories as $userData): ?>
<br></br>
<br></br>
	<h4><?php echo $userData->name; ?></h4>
<div class="fullText">
<?php echo $userData->shortText; ?>
</div>
<div class="fullText">
<?php echo $userData->fullTexts; ?>
</div>
<div class="fullText">
	<div class="blogPostDate">
		<?php echo CHtml::link('Vidi Citav post', array('/blog/default/view','id'=>$userData->blogPostId)); ?>
	</div>
	<div class="blogPostView">
		Autor Posta: <?php CHtml::link($author->firstName . " ". $author->lastName, array('/blog/list/category','id'=> $author->userDataId)); ?><br>
		Datum postavljanja: <?php echo date('H:m:i d.m.Y', $userData->entryDate); ?>
	</div>
</div>
<?php endforeach;?>
