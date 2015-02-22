<?php

namespace app\controllers;

use Yii;
use app\models\SlBlogTags;
use app\models\SlTagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\BlogPostSearch;
use yii\data\Pagination;
/**
 * TagController implements the CRUD actions for SlBlogTags model.
 */
class TagController extends Controller
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
     * Lists all SlBlogTags models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlTagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SlBlogTags model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($name)
    {
        $searchModel = new BlogPostSearch();
        $searchResult = $searchModel->tagName($name);
        $pages = new Pagination(['totalCount' => $searchResult->count()]);
        $models = $searchResult->offset($pages->offset)
        ->limit(10)
        ->all();
        return $this->render('view', [
            'model' => $models,
            'page' => $pages, 
        ]);
    }

    /**
     * Creates a new SlBlogTags model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SlBlogTags();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->blogTagId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SlBlogTags model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->blogTagId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SlBlogTags model.
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
     * Finds the SlBlogTags model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SlBlogTags the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SlBlogTags::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
