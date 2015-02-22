<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SlBlogInCategoySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sl Blog Post In Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sl-blog-post-in-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sl Blog Post In Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'blogPostFid',
            'blogCategoryFid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
