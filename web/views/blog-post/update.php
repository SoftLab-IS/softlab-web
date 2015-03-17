<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SlBlogPost */

$this->title = 'SoftLab Istočno Sarajevo | Blog Update';
?>
<div class="sl-blog-post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
        'tags' => $tags,
        'selectedCategories' => $selectedCategories,
    ]) ?>

</div>
