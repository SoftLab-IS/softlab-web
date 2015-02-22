<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\UserDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sluser Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sluser-data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sluser Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'userDataId',
            'firstName',
            'lastName',
            'registrationDate',
            'lastLoginDate',
            // 'lastLoginIP',
            // 'avatarUploadFid',
            // 'facebookLink',
            // 'twitterLink',
            // 'linkedInLink',
            // 'googlePlusLink',
            // 'aboutMeLink',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
