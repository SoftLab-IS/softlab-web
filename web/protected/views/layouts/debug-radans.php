<?php
 // Debug informacije
 
 // Ovdje dodajes linkove
 //
 // Opis:
 // link -> obican string
 // kontroler -> array("kontroler/akcija")
 // kontroler sa GET parametrom -> array("kontroler/akcija", "parametar1" => "1", "parametar2" => "vrednost", ...itd)
 
 $links = array(
	"home" => Yii::app()->baseUrl . "/index.arekx.php",
	"contact primjer kontrolera" => array("site/contact"),
	"contact primjer kontrolera sa parametrima" => array("site/contact", "parametar1" => "1"),
 );
 
 
?>
<style type="text/css">
#debug-info
{
	position: absolute;
	left: 0px;
	top: 0px;
	right: 0px;
	background: rgba(0, 0, 0, 0.7);
	color: #FFFFFF;
	text-align: center;
	padding: 10px 0px 10px 0px;
}

#debug-info p
{
	padding: 0px;
	margin: 0px 0px 5px 0px;
}

#debug-info a
{
	color: #DDDDDD;
	text-decoration: none;
}

#debug-info a:hover
{
	text-decoration: underline;
}
</style>
<div id="debug-info">
	
	<p><?php echo Yii::app()->name; ?> | 

	Vreme generisanja: <?php echo round(CLogger::getExecutionTime(),3); ?> s |
	Memorija: <?php echo round(CLogger::getMemoryUsage() / 1048576, 2);?> MB | <?php echo CHtml::link("gii", array("gii/default"), array("target" => "_blank")); ?></p>
	
	<?php if (count($links) > 0): ?>
	<p>
	<?php foreach($links as $key => $val): ?>
		<?php echo CHtml::link($key, $val); ?> | 
	<?php endforeach; ?>
	</p>
	<?php endif; ?>
</div>
