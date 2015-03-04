<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Softlab-ES';
?>
<div class="site-index content">
    <div class="row">
        <div class="col-lg-8 index-main">
				<div class="row">
				<div class="col-lg-6"><?= Html::img('../images/logo.png',['class'=>'img img-responsive']); ?></div>
				<div class="col-lg-6 sl-panel ">
				<div class="col-lg-12"><p>	SoftLab je udruženje studenata sa velikom željom za konstantnim samounapređivanjem u
				 granama softverskog inžinjerstva. Ovo udruženje je osnovano 2013. godine na Elektrotehničkom 
				 fakultetu u Istočnom Sarajevu i počelo je kao ideja nekoliko studenata da se sastaju i rade neke
				  jednostavne projekte.</p></div>
				  	<div class="col-lg-12">
						<?= Html::a('Opširnije', ['about'],['class'=>'btn sl-button']); ?>
				 	</div>
				 </div>
				</div>
					<div class="row sl-panel">
						<h3 class="no-margin">PRATITE NAŠE AKTIVNOSTI NA SOCIJALNIM MREŽAMA</h3>
                                <div class="col-lg-2 col-xs-6 col-sm-2">
                                    <?= Html::a(Html::img('../images/fb.png',
                                    ['alt'=>'user-avatar', 'class'=>'img img-responsive social-network']),'https://www.facebook.com/softlab.is'); ?>
                                </div>
                                <div class="col-lg-2 col-xs-6 col-sm-2">
                                    <?= Html::a(Html::img('../images/gplus.png',
                                    ['alt'=>'user-avatar', 'class'=>'img img-responsive social-network']),'https://plus.google.com/communities/104563510273658910802'); ?>
                                </div>
                                <div class="col-lg-2 col-xs-6 col-sm-2">
                                    <?= Html::a(Html::img('../images/twitter.png',
                                    ['alt'=>'user-avatar', 'class'=>'img img-responsive social-network']),'https://twitter.com/SoftLab_ISaraj'); ?>
                                </div>
                                <div class="col-lg-2 col-xs-6 col-sm-2">
                                    <?= Html::a(Html::img('../images/linkedin.png',
                                    ['alt'=>'user-avatar', 'class'=>'img img-responsive social-network']),'$user->linkedInLink'); ?>
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-2"></div>
					</div>
        </div>
		<div class="col-lg-4">
			<?= $this->render('//posts/index',['posts' => $posts,
			'userData' => $user,
			'model'=> $widget,
            'tag' => $tags,
            'user' => $user,
            'categores' => $categores,
			'number'=>$number]); ?>
		</div>
    </div>



</div>
