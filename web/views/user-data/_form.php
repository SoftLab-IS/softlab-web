<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SLUserData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sluser-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'registrationDate')->textInput(['maxlength' => 21]) ?>

    <?= $form->field($model, 'lastLoginDate')->textInput(['maxlength' => 21]) ?>

    <?= $form->field($model, 'lastLoginIP')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'avatarUploadFid')->textInput() ?>

    <?= $form->field($model, 'facebookLink')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'twitterLink')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'linkedInLink')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'googlePlusLink')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'aboutMeLink')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
