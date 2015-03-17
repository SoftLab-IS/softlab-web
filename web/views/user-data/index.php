<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\UserDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = "SoftLab Istočno Sarajevo | Članovi";
?>
<div class="sluser-data-index">
    <?php if (!Yii::$app->user->isGuest) { ?>
       <p>
        <?= Html::a('Create Sluser Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   <?php } ?>
   <div class="row">
    <?php $i=-1; foreach ($model as $user): $i++?>
        <div class="<?= ($i%2) ? 'col-lg-5 sl-panel col-lg-push-2' : 'col-lg-5 sl-panel' ?>">
            <div class="row">
                <div class="col-lg-4 col-sm-3">
                    <?= Html::img($user->avatarUploadF->fullpath, 
                    ['alt'=>'user-avatar', 'class'=>'img img-responsive']) ?> 
                </div>
                <div class="col-lg-8 col-sm-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <?= Html::a($user->firstName.' '. $user->lastName,['user/view', 'id'=> $user->slUsers[0]->usersId]); ?>
                        </div>
                        <div class="col-lg-12 uppercase"><b><?= $user->user_profile ?></b></div>
                        <div class="col-lg-12">Online: <?= date('d.m.y',$user->lastLoginDate) ?></div>
                        <div class="col-lg-12">
                            Ukupno postova: <?= $numberOfPosts ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-2 col-xs-6 col-sm-2">
                                    <?= Html::a(Html::img('../images/fb.png',
                                    ['alt'=>'user-avatar', 'class'=>'img img-responsive social-network']),$user->facebookLink); ?>
                                </div>
                                <div class="col-lg-2 col-xs-6 col-sm-2">
                                    <?= Html::a(Html::img('../images/gplus.png',
                                    ['alt'=>'user-avatar', 'class'=>'img img-responsive social-network']),$user->googlePlusLink); ?>
                                </div>
                                <div class="col-lg-2 col-xs-6 col-sm-2">
                                    <?= Html::a(Html::img('../images/twitter.png',
                                    ['alt'=>'user-avatar', 'class'=>'img img-responsive social-network']),$user->twitterLink); ?>
                                </div>
                                <div class="col-lg-2 col-xs-6 col-sm-2">
                                    <?= Html::a(Html::img('../images/linkedin.png',
                                    ['alt'=>'user-avatar', 'class'=>'img img-responsive social-network']),$user->linkedInLink); ?>
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-2"></div>
                            </div>
                            <div >
                                
                            </div>
                            
                            
                            
                            
             </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>
