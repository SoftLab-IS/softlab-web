<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SLUserData */

$this->title = 'Create Sluser Data';
$this->params['breadcrumbs'][] = ['label' => 'Sluser Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sluser-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
