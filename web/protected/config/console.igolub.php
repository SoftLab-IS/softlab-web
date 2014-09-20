<?php
$conf = new CConfiguration(dirname(__FILE__) . '/console.php');
$conf->mergeWith( 
    array(
	'name'=>'Softlab [ArekX]',
	
	'components'=>array(
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=Softlab_db',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
	),
	
    )
);
return $conf;
