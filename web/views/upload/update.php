<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SlUploads */

$this->title = 'Update Sl Uploads: ' . ' ' . $model->uploadsId;
$this->params['breadcrumbs'][] = ['label' => 'Sl Uploads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->uploadsId, 'url' => ['view', 'id' => $model->uploadsId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sl-uploads-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
