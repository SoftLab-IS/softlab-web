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
		$author = UserData::model()->findByPk($id);
		
		$avatar = Uploads::model()->findByPk($author->avatarUploadFid);
		if (count($avatar->fullpath) < 0 ) {
			$avatar->fullpath = "https://scontent-a-fra.xx.fbcdn.net/hphotos-xpa1/v/t1.0-9/10300079_10203928303478898_1346836797229236029_n.jpg?oh=c20aa5ab1f04362296fa1085475c7a17&oe=54873599";
		}
		$q = new CDbCriteria();

		$pagination = new CDbCriteria;
		$count = BlogPost::model()->count($pagination);
		$pages = new CPagination($count);
    	$pages->pageSize = 10;
	    $pages->applyLimit($pagination);
	    $pages->getPageCount();

		$data = BlogPost::model()->userPosts($id)->findAll($pagination);
		if($data === null){
			throw new CHttpException(404,'The requested page does not exist.');
		}else
		{
		$this->render('author',array(
				'data'=>  $data,
				'author'=>$author,
				'avatar'=> $avatar,
				"pages" => $pages,
					));
		}
	}

	public function actionCategory($id){

		$critera = new CDbCriteria();
		$critera -> addSearchCondition("blogCategoryFid",$id);

		$pagination = new CDbCriteria;
		$count = BlogPost::model()->count($pagination);
		$pages = new CPagination($count);
    	$pages->pageSize = 10;
	    $pages->applyLimit($pagination);
	    $pages->getPageCount();

		$blogInCategories = BlogPostInCategory::model()->findAll($critera);
		$category = BlogCategories::model()->findByPk($id);
		$i = 0;
		foreach ($blogInCategories as $key) {
			$IDs[$i] = $key->blogPostFid;
			$i++;
		}
		$postsInBlog = BlogPost::model()->findAllByPk($IDs);
		foreach ($postsInBlog as $key) {
			$authorID=UserData::model()->findByPk($key->authorId);
		}
		if($blogInCategories === null){
			throw new CHttpException(404,'The requested page does not exist.');
		}else
		{
			$this->render('category',array(
					'categories'=> $postsInBlog,
					'author' => $authorID,
					'category' => $category,
					'pages' => $pages,
					));}
	}
}
