<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SlBlogPostInCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sl-blog-post-in-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'blogPostFid')->textInput() ?>

    <?= $form->field($model, 'blogCategoryFid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
