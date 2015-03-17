<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\BaseHtml;
use app\models\Models;
use yii\web\View;
use yii\helpers\ArrayHelper;

$tags = ArrayHelper::map($tag,'tag','tag');
$category = ArrayHelper::map($categores,'blogCategoryId','name');
?>
<div id="row sl-panel">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#br-tagova" data-toggle="tab">Broju</a></li>
        <li><a href="#tag" data-toggle="tab">Tagu</a></li>
        <li><a href="#autor" data-toggle="tab">Autoru</a></li>
        <li><a href="#category" data-toggle="tab">Kategorij</a></li>
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="br-tagova">
            <?php $form = ActiveForm::begin(['action' =>['site/index']]); ?>

 <?= $form->field($model, 'number')->dropDownList([$number],[

'prompt'=>'Izaberite Broj Postova',
'onchange'=>'this.form.submit()'

])->label(false) ?>
    <?php ActiveForm::end(); ?>
        </div>
        <div class="tab-pane" id="tag">
            <?php $form = ActiveForm::begin(['action' =>['site/index']]); ?>

 <?= $form->field($model, 'tag')->dropDownList([$tags],[

'prompt'=>'Izaberite Tag',
'onchange'=>'this.form.submit()'

])->label(false) ?>
    <?php ActiveForm::end(); ?>
        </div>
        <div class="tab-pane" id="autor">
            <?php $form = ActiveForm::begin(['action' =>['site/index']]); ?>

 <?= $form->field($model, 'author')->dropDownList([$user],[

'prompt'=>'Izaberite Autora',
'onchange'=>'this.form.submit()'

])->label(false) ?>
    <?php ActiveForm::end(); ?>
        </div>
        <div class="tab-pane" id="category">
            <?php $form = ActiveForm::begin(['action' =>['site/index']]); ?>

 <?= $form->field($model, 'category')->dropDownList([$category],[

'prompt'=>'Izaberite Kategoriju',
'onchange'=>'this.form.submit()'

])->label(false) ?>
    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<div class="row sl-panel">	
	<?php $i = 0; foreach ($posts as $post): ?>
	<div class="col-lg-12 sl-last-posts">
		<div class="row">
			<div class='col-lg-12'><?= Html::a($post->name,['view','id' => $post->blogPostId]); ?></div>
                    <div class='col-lg-12'><?= $post->shortText; ?></div>
                    <div class='col-lg-12'>
                      <?= Html::a('Vidi Citav Post',['view', 'id' => $post->blogPostId], ['class' => 'btn sl-button']) ?>
                    </div>
		</div>
	</div>
		
	<?php endforeach ?>
</div>