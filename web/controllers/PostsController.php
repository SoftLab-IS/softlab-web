<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Models;
class PostsController extends Controller
{
	public function actionIndex()
	{
		$models = new Models();
        if ($models->load(Yii::$app->request->post())) {
            print_r($models);
            die();
        }
		return $this->renderPartial('index');
	}

}