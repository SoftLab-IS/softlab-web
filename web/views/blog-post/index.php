<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\BaseHtml;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BlogPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
 <div class='row'>
  <div class="col-lg-8">
    <div class="col-lg-12">
        <div class="row">
          <?php if (Yii::$app->user->isGuest) { ?>
             <div class="col-lg-9 col-sm-9 col-xs-12">
                <?php $form = ActiveForm::begin([
                'action'=>['blog-post/index'],
                ]); ?>
                   <?= $form->field($model, 'search')->textInput(['maxlength' => 255])->label(false); ?>
               </div>
               <div class="col-lg-3 col-sm-3 col-xs-12">
                <?= Html::submitButton('Pretrazi',['class' => 'btn sl-button-search']) ?>
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
        <div class="col-lg-12 ">
                 <?php 
                 $i = 0;
                 foreach ($data as $posts) : ?>
                  <div class="row sl-panel">
                    <div class='col-lg-12'><?= Html::a($posts->name,['view','id' => $posts->blogPostId]); ?></div>
                    <div class='col-lg-12'><?= $posts->shortText; ?></div>
                    <div class='col-lg-6'>Datum Postavljanja: <?= date("d.m.y",$posts->entryDate); ?></div>
                    <div class='col-lg-6'>Autor:<?= Html::a($userData[$i],['user/view','id'=> $posts->authorId])?></div>
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
                 
                  
                  <?php $i++; endforeach; ?>
      </div>
      <div class="col-lg-12">
        <?php echo LinkPager::widget([
            'pagination' => $pages,]); 
            ?>
      </div>
</div>
<div class="col-lg-4">
  <div class="row ">
    <div class="col-lg-12 sl-panel">
      <h3>Kategorije: </h3>
      <?php foreach ($categories as $category) : ?>
        <p>  <?= Html::a($category->name,['category/view','id' => $category->blogCategoryId]) ?> </p>
      <?php endforeach; ?>

    </div>
    <div class="col-lg-12  sl-panel">
      <h3>Tagovi: </h3>
      <?php foreach ($tags as $tag) : ?>
        <p>  <?= Html::a($tag->tag,['tag/view','name' => $tag->tag]) ?> </p>
      <?php endforeach; ?>

    </div>
  </div>
</div>
  </div>
  