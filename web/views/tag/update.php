<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SlBlogTags */

$this->title = 'Update Sl Blog Tags: ' . ' ' . $model->blogTagId;
$this->params['breadcrumbs'][] = ['label' => 'Sl Blog Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->blogTagId, 'url' => ['view', 'id' => $model->blogTagId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sl-blog-tags-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
