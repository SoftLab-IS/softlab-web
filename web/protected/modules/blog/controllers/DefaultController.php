<?php

class DefaultController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl' // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		$rules = $this->getSessionRules('backendAccess', 'blog');
		
		// Akcije za sve korisnike
		$rules[] = array('allow',
			'actions'=>array('index','view'),
			'users'=>array('*'));
		
		$rules[] = 	array('deny', 'users' => array('*'));
		
		return $rules;
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{

		$userID = $this->loadModel($id);
		$userData = Users::model()->findByPk($userID->authorId);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'autor'=>UserData::model()->findByPk($userData->userDataFid),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new BlogPost;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['BlogPost']))
		{
			$model->attributes=$_POST['BlogPost'];
			$model->authorId=Yii::app()->session["userId"];
			$model->entryDate=time();
			
			$model->urlLink=mb_strtolower(preg_replace('@[\s!:;_\?=\\\+\*/%&#]+@', '-', $model->name));
			if($model->save())
					{
						//$this->redirect(array('view','id'=>$model->blogPostId));
						if (isset($_POST['Categories'])) 
						{
							$jadi = $_POST['Categories'];
							foreach($jadi as $checkbox_id)
							{
								$postInCategory = new BlogPostInCategory;
    							$postInCategory->blogPostFid = $model->blogPostId;
    							$postInCategory->blogCategoryFid = $checkbox_id;
    							$postInCategory->save();
    						}
						}
						$userID = $this->loadModel($model->blogPostId);
					}
		}

		$this->render('create',array(
			'model'=>$model,
			'tags_name'=>BlogTags::model()->findAll(),
			'categories'=> BlogCategories::model()->findAll(),
		));
	}
	public function actionGetId(){
	        echo 10;
   }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BlogPost']))
		{
			$model->attributes=$_POST['BlogPost'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->blogPostId));
		}

		$this->render('update',array(
			'model'=>$model,
			'tags_name'=>BlogTags::model()->findAll(),
			'categories'=> BlogCategories::model()->findAll(),
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        BlogPostInCategory::model()->deleteAll('blogPostFid = ?',array($id));
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($query = '')
	{
		
		$postNumbers[] = null;
		$queries = explode(' ', $query);
		$pagination = new CDbCriteria;
		$count = BlogPost::model()->count($pagination);
		$pages= new CPagination($count);
    	$pages->pageSize = 10;
	    $pages->applyLimit($pagination);
		$model = BlogPost::model()->pretragaBloga($queries)->findAll($pagination);

		$authorID = array();

		foreach ($model as $key) {
			$authorID[]=Users::model()->findByPk($key->authorId);
		}

		$authorData = array();

		foreach ($authorID as $korisnik) {
			$authorData[] = UserData::model()->findByPk($korisnik->userDataFid);
		}

		

		$all_categories = BlogPost::model()->with('slBlogCategories')->findAll();
		if(isset($_GET['query'])){
			$this->render('blogSearch',array(
					"categories" => BlogCategories::model()->findAll(),
					"tags" => BlogTags::model()->findAll(),
					"models" => $model,
					"author" => $authorData,
					"real_categories" => $all_categories,
					"pages" => $pages,
					

				));

		}else{
			$this->render('index',array(
			"categories" => BlogCategories::model()->findAll(),
			"tags" => BlogTags::model()->findAll(),
			"posts" => $model,
			"author" => $authorData,
			"real_categories" => $all_categories,
			"pages" => $pages,
			));

		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BlogPost('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BlogPost']))
			$model->attributes=$_GET['BlogPost'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BlogPost the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BlogPost::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BlogPost $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='blog-post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
