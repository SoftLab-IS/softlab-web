<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $model app\models\SlUsers */
?>
<div class="sl-users-view">


<div class="row sl-panel">
  <div class="visible-xs col-xs-12">
        <?= Html::img($image[0]->fullpath, ['alt'=>'some', 'class'=>'img img-responsive']);?> 
    </div>
    <div class="col-lg-9 col-sm-9 col-xs-12">
        <div class="row ">
            <div class="col-lg-12"><?= $user->userDataF->firstName . " ". $user->userDataF->lastName ?></div>
            <div class="col-lg-12">Zadnji put na mrezi: <?= date("h:m d.m.y",$user->userDataF->lastLoginDate) ?></div>
            <div class="col-lg-12">Broj postova <?= $totalPosts ?></div>
                <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-2 col-xs-6 col-sm-2">
                                    <?= Html::a(Html::img('../images/fb.png',
                                    ['alt'=>'user-avatar', 'class'=>'img img-responsive social-network']),
                                    $user->userDataF->facebookLink); ?>
                                </div>
                                <div class="col-lg-2 col-xs-6 col-sm-2">
                                    <?= Html::a(Html::img('../images/gplus.png',
                                    ['alt'=>'user-avatar', 'class'=>'img img-responsive social-network']),
                                    $user->userDataF->googlePlusLink); ?>
                                </div>
                                <div class="col-lg-2 col-xs-6 col-sm-2">
                                    <?= Html::a(Html::img('../images/twitter.png',
                                    ['alt'=>'user-avatar', 'class'=>'img img-responsive social-network']),
                                    $user->userDataF->twitterLink); ?>
                                </div>
                                <div class="col-lg-2 col-xs-6 col-sm-2">
                                    <?= Html::a(Html::img('../images/linkedin.png',
                                    ['alt'=>'user-avatar', 'class'=>'img img-responsive social-network']),
                                    $user->userDataF->linkedInLink); ?>
                                </div>
                                <div class="col-lg-2">
                                  <?php if (!Yii::$app->user->isGuest && $id == Yii::$app->getSession()->get('userId')) { ?>
                                    <?= Html::a('Update', ['user-data/update', 'id' => $user->userDataF->userDataId], ['class' => 'btn btn-primary']) ?>
                                  <?php } ?>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                            <div >
                                
                            </div>
                            
                            
                            
                            
             </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-3 hidden-xs">
        <?= Html::img($image[0]->fullpath, ['alt'=>'some', 'class'=>'img img-responsive']);?> 
    </div>
</div>
<?php foreach ($model as $posts) : ?>
                     <div class="row sl-panel">
                    <div class='col-lg-12'><?= Html::a($posts->name,['view','id' => $posts->blogPostId]); ?></div>
                    <div class='col-lg-12'><?= $posts->shortText; ?></div>
                    <div class='col-lg-6'>Datum Postavljanja: <?= date("d.m.y",$posts->entryDate); ?></div>
                    <div class='col-lg-12'>
                      <?= Html::a('Vidi Citav Post',['view', 'id' => $posts->blogPostId], ['class' => 'btn sl-button']) ?>
                       <?php if (!Yii::$app->user->isGuest) {
                    ?>
                     
                              <?= Html::a('Update', ['update', 'id' => $posts->blogPostId], ['class' => 'btn btn-primary']) ?>
                              <?= Html::a('Delete', ['delete', 'id' => $posts->blogPostId], [
                                  'class' => 'btn btn-danger',
                                  'data' => [
                                      'confirm' => 'Are you sure you want to delete this item?',
                                      'method' => 'post',
                                  ],
                          ]) ?>
                      
                  <?php } ?>
                    </div>
                  </div>
                 
        <?php endforeach; ?>
   <div class="col-lg-9">
       <?php   echo LinkPager::widget([
                'pagination' => $pages,]); 
        ?>
      </div>

</div>
