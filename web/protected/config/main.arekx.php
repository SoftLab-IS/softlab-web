<?php
$conf = new CConfiguration(dirname(__FILE__) . '/main.php');
$conf->mergeWith( 
    array(
	'name'=>'Softlab [ArekX]',
	
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'yii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),
	
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=softlab',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
	),
	
	'params'=>array(
		'debugfile' => '//layouts/debug-arekx',
	),
	
	// Dodaj svoja podesavanja ovdje, ako su ista kao u main.php onda ta iz main.php ce biti prepisana ovim
	
    )
);
return $conf;
