<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SlBlogPostInCategory */

$this->title = 'Update Sl Blog Post In Category: ' . ' ' . $model->blogPostFid;
$this->params['breadcrumbs'][] = ['label' => 'Sl Blog Post In Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->blogPostFid, 'url' => ['view', 'blogPostFid' => $model->blogPostFid, 'blogCategoryFid' => $model->blogCategoryFid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sl-blog-post-in-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
