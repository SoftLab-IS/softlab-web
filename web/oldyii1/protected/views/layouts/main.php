<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/css/foundation.css" />
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'js/vendor/modernizr.js'); ?>
  </head>
  <body>
  <nav class="top-bar ">
    <section class="top-bar-section">
      <ul>
        <?php $this->widget('zii.widgets.CMenu',array(
      'items'=>array(
        array('label'=>'Home', 'url'=>array('/site/index')),
        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
        array('label'=>'Links', 'url'=>array('/links'), 'visible'=> !Yii::app()->user->isGuest),
        array('label'=>'Pastebin', 'url'=>array('/pastebin'), 'visible'=> !Yii::app()->user->isGuest),
        array('label'=>'Finances', 'url'=>array('/finances'), 'visible'=> !Yii::app()->user->isGuest),
        array('label'=>'Projects', 'url'=>array('/projects'), 'visible'=> !Yii::app()->user->isGuest),
        array('label'=>'Blog', 'url'=>array('/blog'),'visible'=> Yii::app()->user->isGuest),
        array('label'=>'Blog', 'url'=>array('/blog/admin'),'visible'=> !Yii::app()->user->isGuest),
        array('label'=>'Thinking Thursday', 'url'=>array('/thinkingthursday'), 'visible'=> !Yii::app()->user->isGuest),
        array('label'=>'CVs', 'url'=>array('/cv'), 'visible'=> !Yii::app()->user->isGuest),
        array('label'=>'Admin CP', 'url'=>array('/admincp'), 'visible'=> !Yii::app()->user->isGuest),
        array('label'=>'Contact', 'url'=>array('/site/contact')),
        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout', 'key' => Yii::app()->session["logoutKey"]), 'visible'=>!Yii::app()->user->isGuest)
      ),
    )); ?>
      </ul>

    </section>
    </nav>
<?php if (Yii::app()->params['debug']): ?>
<!-- Ostaviti ovo zajedno sa if-om! -->
<?php $this->renderPartial(Yii::app()->params['debugfile']); ?>
<?php endif; ?>
<div class="container" id="page">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
</div><!-- page -->

</body>
</html>
