<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BlogPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
 <div class='row'>
  <div class="col-lg-8">
    <div class="col-lg-8">
        <div class="row">
          <?php if (Yii::$app->user->isGuest) { ?>
             <div class="col-lg-9">
                <?php $form = ActiveForm::begin([
                'action'=>['blog-post/index']]); ?>
                   <?= $form->field($model, 'search')->textInput(['maxlength' => 255])->label(false); ?>
               </div>
               <div class="col-lg-3">
                <?= Html::submitButton('Pretrazi',['class' => 'btn']) ?>
             </div>
             <?php }else
             { ?> 
              <div class="col-lg-6">
                <?php $form = ActiveForm::begin([
                'action'=>['blog-post/index']]); ?>
                   <?= $form->field($model, 'search')->textInput(['maxlength' => 255])->label(false); ?>
               </div>
               <div class="col-lg-3">
                <?= Html::submitButton('Pretrazi',['class' => 'btn']) ?>
             </div>
            <div class="col-lg-3">
              <?= Html::a('Create new Post', ['create'], ['class' => 'btn btn-primary']) ?>
            </div>
             <?php } ?>
         </div> 
          <div class="row">
          
        </div>
    </div>
        <div class="col-lg-9">
                 <?php foreach ($data as $posts) : ?>
                  <ul>
                      <li><?= Html::a($posts->name,['view','id' => $posts->blogPostId]); ?></li>
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
                  <?= Html::a('Vidi Citav Post',['view', 'id' => $posts->blogPostId], ['class' => 'btn']) ?>
                  <?php endforeach; ?>
      </div>
      <div class="col-lg-9">
        <?php echo LinkPager::widget([
            'pagination' => $pages,]); 
            ?>
      </div>
</div>
<div class="col-lg-4">
  <div class="row">
    <div class="col-lg-12">
      <h3>Kategorije: </h3>
      <?php foreach ($categories as $category) : ?>
        <p>  <?= Html::a($category->name,['category/view','id' => $category->blogCategoryId]) ?> </p>
      <?php endforeach; ?>

    </div>
    <div class="col-lg-12">
      <h3>Tagovi: </h3>
      <?php foreach ($tags as $tag) : ?>
        <p>  <?= Html::a($tag->tag,['tag/view','name' => $tag->tag]) ?> </p>
      <?php endforeach; ?>

    </div>
  </div>
</div>
  </div>
  