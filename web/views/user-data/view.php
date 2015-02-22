<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SLUserData */

$this->title = $model->userDataId;
$this->params['breadcrumbs'][] = ['label' => 'Sluser Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sluser-data-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->userDataId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->userDataId], [
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
            'userDataId',
            'firstName',
            'lastName',
            'registrationDate',
            'lastLoginDate',
            'lastLoginIP',
            'avatarUploadFid',
            'facebookLink',
            'twitterLink',
            'linkedInLink',
            'googlePlusLink',
            'aboutMeLink',
        ],
    ]) ?>

</div>
