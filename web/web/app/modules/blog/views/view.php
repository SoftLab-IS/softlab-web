<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SlBlogPost */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sl Blog Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sl-blog-post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->blogPostId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->blogPostId], [
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
            'blogPostId',
            'urlLink:url',
            'name',
            'shortText:ntext',
            'fullText:ntext',
            'entryDate',
            'isVisible',
            'authorId',
            'tags:ntext',
        ],
    ]) ?>

</div>
