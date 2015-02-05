<?php
// change the following paths if necessary
$yii=dirname(__FILE__) . '/framework/yii.php';
$config=dirname(__FILE__) . '/protected/config/main.php';

require_once($yii);

$app = Yii::createWebApplication($config);

if ($app->params['debug'])
	die('<meta http-equiv="content-type" content="text/html; charset=utf-8" />Ovaj index je za production verziju. Koristi index.githubnadimak.php i nemoj postavljati urlManager komponentu.<br />Ovo vidiš zato što je debug=true u parametrima u main.php.');
else
	$app->run();
