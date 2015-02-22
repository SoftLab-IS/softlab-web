<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SlUsers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sl-users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'salt')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'logoutKey')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'isActivated')->textInput() ?>

    <?= $form->field($model, 'isLoggedIn')->textInput() ?>

    <?= $form->field($model, 'userDataFid')->textInput() ?>

    <?= $form->field($model, 'userGroupFid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
