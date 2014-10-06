<div class="row">
<div class="panel">
	<h4>Pretraga za kategoriju <?php echo $category->name; ?></h4>
</div>

<?php foreach ($categories as $userData): ?>
<div class="panel">
	<h4><?php echo $userData->name; ?></h4>
<div >
<?php echo $userData->shortText; ?>
</div>
<div>
	<div>
		Autor Posta: <?php CHtml::link($author->firstName . " ". $author->lastName, array('/blog/list/author','id'=> $author->userDataId)); ?><br>
		Datum postavljanja: <?php echo date('H:m:i d.m.Y', $userData->entryDate); ?>
	</div>
	<div><?php echo CHtml::link('Vidi Citav post', array('/blog/default/view','id'=>$userData->blogPostId),array("class" => "button")); ?></div>
</div>
</div>
	
<?php endforeach;?>
</div>