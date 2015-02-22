<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SlBlogCategories */

$this->title = 'Create Sl Blog Categories';
$this->params['breadcrumbs'][] = ['label' => 'Sl Blog Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sl-blog-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
