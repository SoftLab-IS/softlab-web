<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $model app\models\SlBlogTags */
?>
<div class="sl-blog-tags-view">
    <?php foreach ($model as $posts) : ?>
    <ul>
                      <li><?= Html::a($posts->name,['blog-post/view','id' => $posts->blogPostId]); ?></li>
                      <li><?= $posts->shortText; ?></li>
                      <li><?= $posts->fullArticle; ?></li>
                      <li><?= date("H:m d.m.y",$posts->entryDate); ?></li>
                      <li><?= $posts->author->email ?></li>
                  </ul>
                  <?php if (!Yii::$app->user->isGuest) {
                    ?>
                      <p>
                              <?= Html::a('Update', ['update', 'id' => $posts->blogPostId], ['class' => 'btn btn-primary']) ?>
                              <?= Html::a('Delete', ['delete', 'id' => $posts->blogPostId], [
                                  'class' => 'btn btn-danger',
                                  'data' => [
                                      'confirm' => 'Are you sure you want to delete this item?',
                                      'method' => 'post',
                                  ],
                          ]) ?>
                      </p>
                  <?php } ?>
                  <?= Html::a('Vidi Citav Post',['blog-post/view', 'id' => $posts->blogPostId], ['class' => 'btn']) ?>
    <?php  endforeach; ?>
     <div class="col-lg-9">
        <?php echo LinkPager::widget([
            'pagination' => $page,]); 
            ?>
      </div>
</div>
