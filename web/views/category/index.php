<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SlBlogCategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sl Blog Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sl-blog-categories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sl Blog Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'blogCategoryId',
            'name',
            'urlLink:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
