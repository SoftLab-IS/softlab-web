<?php

class ListController extends Controller
{
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('author','tag','data','index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	

	public function actionTag($name){
		$q= new CDbCriteria();
		$q->addSearchCondition('tags',$name);
		$data = BlogPost::model()->findAll($q);
		if($data === null){
			throw new CHttpException(404,'The requested page does not exist.');
		}else
		{
				$this->render('tag',array(
					'data'=> $data,
					));}
	}


	public function actionAuthor($id)
	{
		$autor = UserData::model()->findByPk($id);
		$avatar = Uploads::model()->findByPk($autor->avatarUploadFid);
		$q = new CDbCriteria();
		$q->addSearchCondition('authorId',$id);
		$data = BlogPost::model()->findAll($q);
		if($data === null){
			throw new CHttpException(404,'The requested page does not exist.');
		}else
		{
		$this->render('author',array(
				'data'=>  $data,
				'autor'=>$autor,
				'avatar'=> $avatar,
					));
		}
	}

	public function actionCategory($id){

		$critera = new CDbCriteria();
		$critera -> addSearchCondition("blogCategoryFid",$id);
		$blogInCategories = BlogPostInCategory::model()->findAll($critera);
		$i = 0;
		foreach ($blogInCategories as $key) {
			$IDs[$i] = $key->blogPostFid;
			$i++;
		}

		$postsInBlog = BlogPost::model()->findAllByPk($IDs);
		foreach ($postsInBlog as $key) {
			$authorID=UserData::model()->findByPk($key->authorId);
		}
		$this->render('category',array(
			'categories'=> $postsInBlog,
			'author' => $authorID,
			));
	}
}
