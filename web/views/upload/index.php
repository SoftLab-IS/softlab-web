<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UploadsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sl Uploads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sl-uploads-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sl Uploads', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'uploadsId',
            'fullpath',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
