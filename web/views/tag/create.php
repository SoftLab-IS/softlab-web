<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SlBlogTags */

$this->title = 'Create Sl Blog Tags';
$this->params['breadcrumbs'][] = ['label' => 'Sl Blog Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sl-blog-tags-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
