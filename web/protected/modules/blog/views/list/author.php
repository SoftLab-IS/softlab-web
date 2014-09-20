<div id="user">
	<div>Ime i Prezime: <?php echo $autor->firstName. " ". $autor->lastName;?></div>
	<div>Na mrezi bio: <?php echo date("d.m.y h:m",$autor->lastLoginDate); ?></div>
	<div>Ukupno postova: <?php echo count($data); ?></div>
	<div class="social"><a href="<?php echo $autor->facebookLink; ?>" target="_blank">facebook</a> 
		<a href="<?php echo $autor->twitterLink; ?>" target="_blank">twitter</a>
		<a href="<?php echo $autor->linkedInLink; ?>" target="_blank">LinkedIn</a>
		<a href="<?php echo $autor->googlePlusLink; ?>" target="_blank">Google Plus</a>
		<a href="<?php echo $autor->aboutMeLink; ?>" target="_blank">About Me</a>
	</div>
</div>
<img id="avatar" src="<?php echo $avatar->fullpath;?>" />
<br>
<br>
<div>
<?php foreach ($data as $userData): ?>
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
<?php echo CHtml::link('Vidi Citav post', array('/blog/default/view','id'=>$userData->blogPostId)); ?></div>
	<div class="blogPostView">Datum postavljanja: <?php echo date('H:m:i d.m.Y', $userData->entryDate); ?></div>
	<div>Tagovi:<?php $tagovi = explode(",", $userData->tags);
			foreach ($tagovi as $key) {
				echo CHtml::link($key,array('/blog/list/tag','name'=> $key)) . " ";
			}
			 ?> </div>
</div>
<?php endforeach;?>
</div>