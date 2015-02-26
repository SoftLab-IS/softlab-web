<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SlBlogPost */
?>
<div class="sl-blog-post-view">

    
 <?php if (!Yii::$app->user->isGuest) { ?>
    
    <p>
        <?= Html::a('Update', ['update', 'id' => $model[0]->blogPostId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model[0]->blogPostId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
 <?php } ?>
<div class="row">
    <div class="col-lg-12">
        <h1><?= $model[0]->name ?></h1>
    </div>
    <div class="col-lg-12">
        <?= $model[0]->fullArticle ?>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-6">
            Autor Posta: <?= Html::a($author->firstName.' '.$author->lastName ,['user/view','id'=>$model[0]->author->usersId]) ?>
        </div>
        <div class="col-lg-6">
            Datum Postavljanja: <?= date("h:m d.m.y", $model[0]->entryDate) ?>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-6">
            Tagovi: <?php
                $tags = explode(',', $model[0]->tags);
                if (!empty($tags)) {
                    foreach ($tags as $tag) {
                    echo Html::a($tag,['tag/view','name' => $tag]);
                }
                }
                
             ?>
        </div>
        <div class="col-lg-6">
            Kategorije: <?php foreach ($model[0]->blogCategoryFs as $categories) : ?>
               <?= Html::a($categories->name,['category/view','id' => $categories->blogCategoryId]) ?>
          <?php endforeach; ?>
        </div>
    </div>
</div>
    

</div>
