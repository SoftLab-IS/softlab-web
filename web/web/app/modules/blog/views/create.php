<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SlBlogPost */

$this->title = 'Create Sl Blog Post';
$this->params['breadcrumbs'][] = ['label' => 'Sl Blog Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sl-blog-post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
