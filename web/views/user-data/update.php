<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SLUserData */

$this->title = 'Update Sluser Data: ' . ' ' . $model->userDataId;
$this->params['breadcrumbs'][] = ['label' => 'Sluser Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->userDataId, 'url' => ['view', 'id' => $model->userDataId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sluser-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
