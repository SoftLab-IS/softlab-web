<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SlBlogPost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sl-blog-post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'urlLink')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'shortText')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fullText')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'entryDate')->textInput(['maxlength' => 21]) ?>

    <?= $form->field($model, 'isVisible')->textInput() ?>

    <?= $form->field($model, 'authorId')->textInput() ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
