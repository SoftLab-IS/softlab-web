<?php

class EditorController extends Controller
{
	public function actionCss()
	{
		$this->render('css');
	}

	public function actionJs()
	{
		$this->render('js');
	}

	public function actionPages()
	{
		$this->render('pages');
	}

	public function actionViews()
	{
		$this->render('views');
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