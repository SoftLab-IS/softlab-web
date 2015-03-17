<?php

namespace app\controllers;

use Yii;
use app\models\SlBlogPost;
use app\models\BlogPostSearch;
use yii\web\Controller;
use app\models\Models;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\SlBlogCategories;
use app\models\SlBlogTags;
use app\models\SlBlogPostInCategory;
use yii\data\Pagination;
use yii\web\Session;
use app\models\SlUsers;
use app\models\SlUserData;
use app\models\UsersSearch;
/**
 * BlogPostController implements the CRUD actions for SlBlogPost model.
 */
class BlogPostController extends Controller
{
    public function behaviors()
    {
        return [
        'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['create', 'update','delete'],
            'rules' => [
                // deny all POST requests
                [
                    'actions' => ['login', 'error'],
                    'allow' => false,
                    //'verbs' => ['POST']
                ],
                // allow authenticated users
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
                // everything else is denied
            ],
        ],
    ];
    }

    /**
     * Lists all SlBlogPost models.
     * @return mixed
     */
    public function actionIndex()
    {
        $data = new Models();
        $searchData = "";
        if ($data->load(Yii::$app->request->post())) {
          $searchData =  $data->search;
        }
        $categories = SlBlogCategories::find()->all();
        $tags = SlBlogTags::find()->all();
        $searchModel = new BlogPostSearch();
        $searchResult = $searchModel->search($searchData);
        $pages = new Pagination(['totalCount' => $searchResult->count()]);
        $models = $searchResult->offset($pages->offset)
        ->limit(10)
        ->all();
        $userData[] = "";
        $i = 0;
        foreach ($models as $model) {
            $user = new UsersSearch();
           $userData[$i] = $user->getFullName($model->authorId);
           $i++;
        }
        return $this->render('index', [
            'model'=>$data,
            'data' => $models,
            'pages' => $pages,
            'categories' => $categories,
            'tags' => $tags,
            'userData' => $userData,
        ]);
    }

    /**
     * Displays a single SlBlogPost model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $viewPost = new BlogPostSearch();
        $postData = $viewPost->view($id);
        $authorData = SlUserData::find()->where(['userDataId' => $postData[0]->author->userDataFid])->one();
        return $this->render('view', [
            'model' => $postData,
            'author' => $authorData,
        ]);
    }

    /**
     * Creates a new SlBlogPost model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new SlBlogPost();
            if ($model->load(Yii::$app->request->post())){
                 $model->entryDate=time();
                 $model->urlLink=mb_strtolower(preg_replace('@[\s!:;_\?=\\\+\*/%&#]+@', '-', $model->name));
                 $model->authorId = Yii::$app->getSession()->get('userId',0);
                if ($model->save()) {
                    if (isset($_POST['Categories'])) {
                        $selectedCategories = $_POST['Categories'];
                        foreach ($selectedCategories as $categories) {
                            $postInCategories = new SlBlogPostInCategory();
                            $postInCategories->blogPostFid = $model->blogPostId;
                            $postInCategories->blogCategoryFid = $categories;
                            $postInCategories->save();
                        }
                       return $this->redirect(['view', 'id' => $model->blogPostId]);
                    }
                   
                }
            }
             else {
                $categories = array();
                return $this->render('create', [
                    'model' => $model,
                    'categories' =>SlBlogCategories::find()->all(),
                    'tags' => SlBlogTags::find()->all(),
                    'selectedCategories' =>$categories,
            ]);
        }
    }

    /**
     * Updates an existing SlBlogPost model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
            
        if ($model->load(Yii::$app->request->post())){
            $model->entryDate=time();
            $model->urlLink=mb_strtolower(preg_replace('@[\s!:;_\?=\\\+\*/%&#]+@', '-', $model->name));
            $session = new Session;
            $session-> open();
            $model->authorId = $session['userId'];
            $session->close();
            if($model->save()) {
                $postInCategories = new SlBlogPostInCategory();
                $postInCategories->deleteAll('blogPostFid = :id',[':id' => $model->blogPostId]);
                 if (isset($_POST['Categories'])) {
                        $selectedCategories = $_POST['Categories'];
                        foreach ($selectedCategories as $categories) {
                            $postInCategories = new SlBlogPostInCategory();
                            $postInCategories->blogPostFid = $model->blogPostId;
                            $postInCategories->blogCategoryFid = $categories;
                            $postInCategories->save();
                        }
                       return $this->redirect(['view', 'id' => $model->blogPostId]);
                    }
            }
        } else {
            
            return $this->render('update', [
                'model' => $model,
                'categories' =>SlBlogCategories::find()->all(),
                'tags' => SlBlogTags::find()->all(),
                'selectedCategories' => SlBlogPostInCategory::find()->where('blogPostFid = :id',[':id'=> $id])->with('blogCategoryF')->all(),
            ]);
        }
    }

    /**
     * Deletes an existing SlBlogPost model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        
        $blogInCategores = SlBlogPostInCategory::deleteAll('blogPostFid = :id',[':id' => $id]);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the SlBlogPost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SlBlogPost the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SlBlogPost::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
