<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\blog\controllers\BlogPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sl Blog Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sl-blog-post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sl Blog Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'blogPostId',
            'urlLink:url',
            'name',
            'shortText:ntext',
            'fullText:ntext',
            // 'entryDate',
            // 'isVisible',
            // 'authorId',
            // 'tags:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
