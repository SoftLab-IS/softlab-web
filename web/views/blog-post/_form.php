<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use mihaildev\ckeditor\CKEditor;
use yii\web\Session;
/* @var $this yii\web\View */
/* @var $model app\models\SlBlogPost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sl-blog-post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'shortText')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'fullArticle')->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ],
]); ?>

    <?= date('H:m d.m.Y') ?>

    <?= $form->field($model, 'isVisible')->checkbox() ?>

    <b>User: </b> <?php $session = new Session;
    $session->open();
    echo $session['firstName'] . " ". $session['lastName'];
    $session->close(); ?>
    <?php 
     $j = 1;
     if (!empty($selectedCategories)) {
         foreach ($selectedCategories as $selCategories ) {
         $selected[$j] = $selCategories->blogCategoryF->blogCategoryId; 
         $j++;
     }
     }else{
        $selected = array();
     }
      
   // $selected = ArrayHelper::map($selectedCategories[0]->blogCategoryF,'blogCategoryId','name');
    $list = ArrayHelper::map($categories,'blogCategoryId','name');
    echo Html::checkBoxList('Categories',$selected,$list); ?>
        <p>Tagovi</p>
        <?php 
        $i = 0;
        foreach ($tags as $tag) {
            $tagList[$i] = $tag->tag;
            $i++;
        }
        echo AutoComplete::widget([
            'name' => 'tags',
            'clientOptions' => [
            'source' => $tagList,
            'autoFill' => true,
            'select' => new JsExpression("function(){
                    $('#slblogpost-tags').append($('#w1').val());
                    $('#slblogpost-tags').append(',');
                    this.value = '';
                }")
                ],

        ]); ?>
    <br>
        <?= $form->field($model, 'tags')->textarea(['rows' => 6])->label(false) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>