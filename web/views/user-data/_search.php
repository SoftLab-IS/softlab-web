<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\UserDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sluser-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'userDataId') ?>

    <?= $form->field($model, 'firstName') ?>

    <?= $form->field($model, 'lastName') ?>

    <?= $form->field($model, 'registrationDate') ?>

    <?= $form->field($model, 'lastLoginDate') ?>

    <?php // echo $form->field($model, 'lastLoginIP') ?>

    <?php // echo $form->field($model, 'avatarUploadFid') ?>

    <?php // echo $form->field($model, 'facebookLink') ?>

    <?php // echo $form->field($model, 'twitterLink') ?>

    <?php // echo $form->field($model, 'linkedInLink') ?>

    <?php // echo $form->field($model, 'googlePlusLink') ?>

    <?php // echo $form->field($model, 'aboutMeLink') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
