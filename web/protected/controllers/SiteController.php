<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout($key = '')
	{
		if (!Yii::app()->user->isGuest && !empty($key))
		{
			if ($key === Yii::app()->session['logoutKey'])
			{
				$user = Users::model()->findByPk(Yii::app()->session['userId']);
				
				if ($user != NULL)
				{
					$user->isLoggedIn = 0;
					$user->logoutKey = '';
					$user->save();
					
					$user->userDataF->lastLoginDate = time();
					$user->userDataF->lastLoginIP = $_SERVER['REMOTE_ADDR'];
					$user->userDataF->save();
				}
				
				Yii::app()->user->logout();
				$this->redirect(Yii::app()->homeUrl);
			}
		}
		else
			throw new CHttpException(403, 'Logout ključ nije postavljen.');

	}
	public function widgetSelection() {
    $number = CHttpRequest::getParam('number');
	$tags=CHttpRequest::getParam('tags');
	$author=CHttpRequest::getParam('author');
	$category=CHttpRequest::getParam('category');
    if ($number == NULL) {
    	$number = 5;
    }
    if ($category == NULL) {
    	$widgetPosts = new CDbCriteria;
    	$widgetPosts->limit = $number;
   		$widgetPosts->compare('isVisible',1,true,'AND');
    	$widgetPosts->compare('tags',$tags,true,'AND');
    	$widgetPosts->compare('authorID',$author,true);
    	$widgetPosts->order = 'entryDate DESC';
    	$posts = BlogPost::model()->findAll($widgetPosts);
    }else{
       	$widgetPostsWithCategory = BlogCategories::model();
       	$postsInCategory = $widgetPostsWithCategory->with (array(
       		'slBlogPosts'=>array(
       		'condition'=>'slBlogPosts.isVisible = 1',
       		//'select' => 'slBlogPosts.isVisible = 1',
       		'order'=>'slBlogPosts.entryDate DESC',
       		)))->findByPK($category, array('limit'=>$number,'together'=>true));
       	for ($i=0; $i < count($postsInCategory->slBlogPosts); $i++) { 
       		$posts[$i] =  $postsInCategory->slBlogPosts[$i];
       	}
    }
    return $posts;

	}
    
}
