<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SlTagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sl Blog Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sl-blog-tags-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sl Blog Tags', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'blogTagId',
            'tag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
