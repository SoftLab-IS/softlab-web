<?php

namespace app\controllers;

use Yii;
use app\models\SlUsers;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\BlogPostSearch;
use app\models\UploadsSearch;

/**
 * UserController implements the CRUD actions for SlUsers model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all SlUsers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SlUsers model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $userData = new UsersSearch();
        $user = $userData->user($id);
        $userImage = new UploadsSearch();
        $image = $userImage->avatar($user[0]->userDataF->avatarUploadFid);
        $postData = new BlogPostSearch();
        $searchResult = $postData->authorPosts($user[0]->usersId);
        $totalNumber = $searchResult->count();
        $pages = new Pagination(['totalCount' => $totalNumber]);
        $models = $searchResult->offset($pages->offset)
        ->limit(10)
        ->all(); 
        return $this->render('view', [
            'user' => $user[0],
            'model' => $models,
            'pages' => $pages,
            'totalPosts' => $totalNumber,
            'image' => $image,
            ]);
    }

    /**
     * Creates a new SlUsers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SlUsers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->usersId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SlUsers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->usersId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SlUsers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SlUsers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SlUsers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SlUsers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
