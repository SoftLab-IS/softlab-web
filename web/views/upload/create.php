<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SlUploads */

$this->title = 'Create Sl Uploads';
$this->params['breadcrumbs'][] = ['label' => 'Sl Uploads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sl-uploads-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
