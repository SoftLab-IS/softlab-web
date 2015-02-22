<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sl Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sl-users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sl Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usersId',
            'email:email',
            'password',
            'salt',
            'logoutKey',
            // 'isActivated',
            // 'isLoggedIn',
            // 'userDataFid',
            // 'userGroupFid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
