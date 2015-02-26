<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $model app\models\SlUsers */
?>
<div class="sl-users-view">


<div class="row">
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-12"><?= $user->userDataF->firstName . " ". $user->userDataF->lastName ?></div>
            <div class="col-lg-12">Zadnji put na mrezi: <?= date("h:m d.m.y",$user->userDataF->lastLoginDate) ?></div>
            <div class="col-lg-12">Broj postova <?= $totalPosts ?></div>
            <div class="col-lg-12">Socijalne mreze: <a href="<?= $user->userDataF->facebookLink ?>">facebook</a> <a href="<?= $user->userDataF->twitterLink ?>">Twitter</a>
             <a href="<?= $user->userDataF->linkedInLink ?>">LinkedIn</a> <a href="<?= $user->userDataF->googlePlusLink ?>">G+</a>
             <a href="<?= $user->userDataF->aboutMeLink ?>">aboutMe</a>
                </div>
        </div>
    </div>
    <div class="col-lg-3">
        <?= Html::img($image[0]->fullpath, ['alt'=>'some', 'class'=>'img img-responsive']);?> 
    </div>
</div>
<?php foreach ($model as $posts) : ?>
                     <ul>
                      <li><?= Html::a($posts->name,['blog-post/view','id' => $posts->blogPostId]); ?></li>
                      <li><?= $posts->shortText; ?></li>
                      <li><?= $posts->fullArticle; ?></li>
                      <li><?= date("H:m d.m.y",$posts->entryDate); ?></li>
                  </ul>
                  <?php if (!Yii::$app->user->isGuest) {
                    ?>
                      <p>
                              <?= Html::a('Update', ['blog-post/update', 'id' => $posts->blogPostId], ['class' => 'btn btn-primary']) ?>
                              <?= Html::a('Delete', ['blog-post/delete', 'id' => $posts->blogPostId], [
                                  'class' => 'btn btn-danger',
                                  'data' => [
                                      'confirm' => 'Are you sure you want to delete this item?',
                                      'method' => 'post',
                                  ],
                          ]) ?>
                      </p>
                  <?php } ?>
                  <?= Html::a('Vidi Citav Post',['blog-post/view', 'id' => $posts->blogPostId], ['class' => 'btn']) ?>

        <?php endforeach; ?>
   <div class="col-lg-9">
       <?php   echo LinkPager::widget([
                'pagination' => $pages,]); 
        ?>
      </div>

</div>
