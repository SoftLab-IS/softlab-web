<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SlBlogPostInCategory */

$this->title = $model->blogPostFid;
$this->params['breadcrumbs'][] = ['label' => 'Sl Blog Post In Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sl-blog-post-in-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'blogPostFid' => $model->blogPostFid, 'blogCategoryFid' => $model->blogCategoryFid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'blogPostFid' => $model->blogPostFid, 'blogCategoryFid' => $model->blogCategoryFid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'blogPostFid',
            'blogCategoryFid',
        ],
    ]) ?>

</div>
