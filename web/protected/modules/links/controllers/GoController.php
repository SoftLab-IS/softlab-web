<?php

class GoController extends Controller
{
	
	public function action404()
	{
		$this->render('404');
	}
	
	public function actionIndex($user = '', $to = '')
	{
		
		// Koristenje -> index.korisnicko.php?r=links/go/index/user/username/to/url-search-name
		// Ovdje ce $user biti 'username' a $to ce biti 'url-search-name';
		
		if (empty($to))
		{
			$this->action404();
		}
		else
		{
			echo $user . ' -> ' . $to; // Za test, obrisati ovo.
			// 1. Validni linkovi su (ako link nije validan odmah voditi na 404): abc-def-123-efg
			// 2. Vrati redirekt link iz modela.
			// 3. Ako je vracen NULL iz modela prebacit na 404.
			// 4. Redirektuj na stranicu ako je sve uredu.
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
