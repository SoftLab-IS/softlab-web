<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SlUsers */

$this->title = 'Update Sl Users: ' . ' ' . $model->usersId;
$this->params['breadcrumbs'][] = ['label' => 'Sl Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usersId, 'url' => ['view', 'id' => $model->usersId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sl-users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
