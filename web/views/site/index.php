<?php
use app\components\HelloWidget;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="row">
        <div class="col-lg-8">
            
        </div>
        <div class="col-lg-4">
            <?= HelloWidget::widget(['message' => ' Yii2.0']) ?>
        </div>
    </div>



</div>
