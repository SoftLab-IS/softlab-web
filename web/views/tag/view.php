<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $model app\models\SlBlogTags */
?>
<div class="sl-blog-tags-view">
    <?php $i = 0; foreach ($model as $posts) : ?>
    <div class="row sl-panel">
                    <div class='col-lg-12'><?= Html::a($posts->name,['view','id' => $posts->blogPostId]); ?></div>
                    <div class='col-lg-12'><?= $posts->shortText; ?></div>
                    <div class='col-lg-6'>Datum Postavljanja: <?= date("d.m.y",$posts->entryDate); ?></div>
                    <div class='col-lg-6'>Autor: <?= Html::a($userData[$i],['user/view','id'=> $posts->authorId])?></div>
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
    <?php  endforeach; ?>
     <div class="col-lg-9">
        <?php echo LinkPager::widget([
            'pagination' => $page,]); 
            ?>
      </div>
</div>
