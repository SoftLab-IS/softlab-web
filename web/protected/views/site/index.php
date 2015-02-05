<?php
/* @var $this SiteController */
?>
<div class="row top-margin">
<div class="large-7 columns">
<div class="row">
<div class="large-6 columns"><?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/logo.png','',array('class'=>'logo')); ?></div>
<div class="large-6 columns panel ">
<div class="large-12 columns no-padding">	SoftLab je udruženje studenata sa velikom željom za konstantnim samounapređivanjem u
 granama softverskog inžinjerstva. Ovo udruženje je osnovano 2013. godine na Elektrotehničkom 
 fakultetu u Istočnom Sarajevu i počelo je kao ideja nekoliko studenata da se sastaju i rade neke
  jednostavne projekte.</div>
  	<div class="large-12 columns no-padding">
		<?php echo CHtml::link('Opširnije', Yii::app()->createUrl("site/page", array('view' => 'about')),array('class' => 'button')); ?>
 	</div>
 </div>
</div>
	<div class="row">
		<div class="panel">
			<h5>PRATITE NAŠE AKTIVNOSTI NA SOCIJALNIM MREŽAMA</h5>
			<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/fb.png'), "https://www.facebook.com/softlab.is",array("class" => "social-networks"));?>
			<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/gplus.png'), "https://plus.google.com/communities/104563510273658910802",array("class" => "social-networks"));?>
			<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/twitter.png'), "https://twitter.com/SoftLab_ISaraj",array("class" => "social-networks"));?>
		</div>
	</div>
</div>
	<div class="large-4 columns widget">
		<?php $this->widget('application.components.PostWidget', array('crumbs'=>$posts,
																		'number'=>$number,
																		'type'=> $type,
																		'value'=>$value,));?>
	</div>
</div>
