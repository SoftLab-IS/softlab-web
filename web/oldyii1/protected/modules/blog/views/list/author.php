<br></br>
<div class="row">
<div id="row">
	<div class="large-8 columns medium-8 columns panel">
		<div>Ime i Prezime: <?php echo $author->firstName. " ". $author->lastName;?></div>
	<div>Na mrezi bio: <?php echo date("d.m.y h:m",$author->lastLoginDate); ?></div>
	<div>Ukupno postova: <?php echo count($data); ?></div>
	</div>
	<div class="large-4 columns medium-4 columns panel">
		<img id="avatar" src="<?php echo $avatar->fullpath;?>" />
	</div>
	
</div>
<br>
<div class="panel"><a href="<?php echo $author->facebookLink; ?>" target="_blank">facebook</a> 
		<a href="<?php echo $author->twitterLink; ?>" target="_blank">twitter</a>
		<a href="<?php echo $author->linkedInLink; ?>" target="_blank">LinkedIn</a>
		<a href="<?php echo $author->googlePlusLink; ?>" target="_blank">Google Plus</a>
		<a href="<?php echo $author->aboutMeLink; ?>" target="_blank">About Me</a>
	</div>

<br>
<div class="large-7 columns medium-8 columns">
<?php foreach ($data as $userData): ?>
<div class="panel">
	<h4><?php echo $userData->name; ?></h4>
<div class="fullText">
<?php echo $userData->shortText; ?>
</div>
<div class="fullText">

	<div class="blogPostView">Datum postavljanja: <?php echo date('H:m:i d.m.Y', $userData->entryDate); ?></div>
	<div>Tagovi:<?php $tagovi = explode(",", $userData->tags);
			foreach ($tagovi as $key) {
				echo CHtml::link($key,array('/blog/list/tag','name'=> $key)) . " ";
			}
			 ?> </div>
	<?php echo CHtml::link('Vidi Citav post', array('/blog/default/view','id'=>$userData->blogPostId),array("class"=> "button")); ?>
</div>
</div>
<?php endforeach;?>

<div class="panel">
	 <?php 
  		$this->widget('CLinkPager', array(
  	    	'pages' => $pages,
  	    	'maxButtonCount' => 7,
  	        'firstPageLabel' => '1',
  	        'prevPageLabel'  => '<',
  	        'nextPageLabel'  => '>',
  	 		'header' => '',
  		));
 ?></div>
 
 </br>
</div>
</div>