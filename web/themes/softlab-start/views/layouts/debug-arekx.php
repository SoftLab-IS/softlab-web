<?php
 // Debug informacije
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
</style>
<div id="debug-info">
	
	<?php echo Yii::app()->name; ?> | 

	Vreme generisanja: <?php echo round(CLogger::getExecutionTime(),3); ?> s |
	Memorija: <?php echo round(CLogger::getMemoryUsage() / 1048576, 2);?> MB

</div>
