<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SLUserData */

$this->title = 'SoftLab Istočno Sarajevo | Članovi';
?>
<div class="sluser-data-create">
    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
        'uploadModel' => $uploadModel,
    ]) ?>

</div>
