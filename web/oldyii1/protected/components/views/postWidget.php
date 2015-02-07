 <?php
    $increment = 0;
    for ($i=0; $i < $this->number ; $i++) { 
        $increment = $increment + 5;
        $numberOfEntries[$increment] = $increment;
    }
    $selected = 0;
    
    $posts = $this->posts();
    Yii::app()->clientScript->registerScriptFile('//code.jquery.com/jquery-1.10.2.js');
    Yii::app()->clientScript->registerScriptFile('//code.jquery.com/ui/1.11.1/jquery-ui.js');
    Yii::app()->clientScript->registerScript('tabs',"$(function() {
    $('#tabs').tabs();
  });");

 ?>
<div id="row">   
    <div id="tabs">
    <div class="row">
        <div class="large-14 columns panel">
        Sortiraj po:
            <ul class="large-block-grid-4 my-button">
                <li><a href="#tabs-1">broju</a></li>
                <li><a href="#tabs-2">tagu</a></li>
                <li><a href="#tabs-3">autoru</a></li>
                <li><a href="#tabs-4">kategorij</a></li>
            </ul>
        </div>
  </div>
  <div id="tabs-1">
     <div class='row panel'><div class='large-9 columns'>Broj Prikazanih Postova</div><div class='large-3 columns'>
    <?php 
        echo CHtml::dropDownlist('numberOfPosts', $selected, $numberOfEntries, array(
         'empty'=>'',
        'onchange' => 'document.location.href = "'.Yii::app()->createUrl("site/index", array('number' => '')).'" + this.value',

    ));?>
    </div></div>
    
  </div>
  <div id="tabs-2">
   <div class='row panel'><div class='large-5 columns'>Tagovi</div><div class='large-7 columns'>
    <?php
    echo CHtml::dropDownlist('numberOfPosts', $selected, CHtml::listData(BlogTags::model()->findAll(),'tag','tag'), array(
        'empty'=>'Select tag',
        'onchange' => 'document.location.href = "'.Yii::app()->createUrl("site/index", array('tags' => '')).'" + this.value',

    )); ?>
    </div></div>
  </div>
  <div id="tabs-3">
  <div class='row panel'><div class='large-5 columns'>Autori</div><div class='large-7 columns'>
    <?php  echo CHtml::dropDownlist('numberOfPosts', $selected, CHtml::listData(UserData::model()->findAll(),'userDataId','firstName'), array(
        'empty'=>'Select Autor',
        'onchange' => 'document.location.href = "'.Yii::app()->createUrl("site/index", array('author' => '')).'" + this.value',

    )); ?>
    </div></div>
  </div>
  <div id="tabs-4">
  <div class='row panel'><div class='large-5 columns'>Kategorije</div><div class='large-7 columns'>
    <?php  echo CHtml::dropDownlist('numberOfPosts', $selected, CHtml::listData(BlogCategories::model()->findAll(),'blogCategoryId','name'), array(
        'empty'=>'Select category',
        'onchange' => 'document.location.href = "'.Yii::app()->createUrl("site/index", array('category' => '')).'" + this.value',

    )); ?>
    </div></div>
  </div>
</div>
<?php
    $url = Yii::app()->createUrl("site/index", array('selected' => '')); ?>
  <br><div class='row panel'>
   <?php foreach($posts as $post) {
        echo "<p>".CHtml::link($post->name, 
          Yii::app()->createUrl("blog/default/view", array('id' => $post->blogPostId)));
        echo "<br>".$post->shortText. "</br>" ;
        echo Chtml::link("Vidi Čitav Post", 
          Yii::app()->createUrl('blog/default/view', array('id' => $post->blogPostId)),array("class" => "button"));
        echo "</p>";
    }
    ?>
    </div>
</div>