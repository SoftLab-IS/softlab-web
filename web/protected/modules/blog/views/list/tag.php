<br></br>
<div class="row">
<div class="panel"> Rezlutati za tag: <?php echo $tagName; ?> </div>
<?php 
foreach ($data as $userData): ?>
<div class="panel">
	<h4><?php echo $userData->name; ?></h4>
<div >
<?php echo $userData->shortText; ?>
</div>
<div>
	<div></div>
	<div>Datum postavljanja: <?php echo date('H:m:i d.m.Y', $userData->entryDate); ?></div>
	<div>Tagovi:<?php $tagovi = explode(",", $userData->tags);
			foreach ($tagovi as $key) {
				echo CHtml::link($key,array('/blog/list/tag','name'=> $key)) . " ";
			}
			 ?>
	<div><?php echo CHtml::link('Vidi Citav post', array('/blog/default/view','id'=>$userData->blogPostId),array("class" => "button")); ?></div>
</div>

<?php endforeach;?>
</div>