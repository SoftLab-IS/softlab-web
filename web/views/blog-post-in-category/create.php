<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SlBlogPostInCategory */

$this->title = 'Create Sl Blog Post In Category';
$this->params['breadcrumbs'][] = ['label' => 'Sl Blog Post In Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sl-blog-post-in-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
