<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\SLUserData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sluser-data-form sl-panel">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']   // important, needed for file upload
    ]); ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($user, 'email')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($user, 'password')->textInput(['maxlength' => 30])->passwordInput() ?>

    Datum logovanja:     <?= date("d.m.y") ?>

    <?= $form->field($uploadModel, 'file')->fileInput() ?>

    <?= $form->field($model, 'facebookLink')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'twitterLink')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'linkedInLink')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'googlePlusLink')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'aboutMeLink')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'user_profile')->textInput(['maxlength' => 255]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
