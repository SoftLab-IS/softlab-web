<?php

namespace app\controllers;

use Yii;
use app\models\SlBlogPostInCategory;
use app\models\SlBlogInCategoySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlogPostInCategoryController implements the CRUD actions for SlBlogPostInCategory model.
 */
class BlogPostInCategoryController extends Controller
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
     * Lists all SlBlogPostInCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlBlogInCategoySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SlBlogPostInCategory model.
     * @param integer $blogPostFid
     * @param integer $blogCategoryFid
     * @return mixed
     */
    public function actionView($blogPostFid, $blogCategoryFid)
    {
        return $this->render('view', [
            'model' => $this->findModel($blogPostFid, $blogCategoryFid),
        ]);
    }

    /**
     * Creates a new SlBlogPostInCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SlBlogPostInCategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'blogPostFid' => $model->blogPostFid, 'blogCategoryFid' => $model->blogCategoryFid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SlBlogPostInCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $blogPostFid
     * @param integer $blogCategoryFid
     * @return mixed
     */
    public function actionUpdate($blogPostFid, $blogCategoryFid)
    {
        $model = $this->findModel($blogPostFid, $blogCategoryFid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'blogPostFid' => $model->blogPostFid, 'blogCategoryFid' => $model->blogCategoryFid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SlBlogPostInCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $blogPostFid
     * @param integer $blogCategoryFid
     * @return mixed
     */
    public function actionDelete($blogPostFid, $blogCategoryFid)
    {
        $this->findModel($blogPostFid, $blogCategoryFid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SlBlogPostInCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $blogPostFid
     * @param integer $blogCategoryFid
     * @return SlBlogPostInCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($blogPostFid, $blogCategoryFid)
    {
        if (($model = SlBlogPostInCategory::findOne(['blogPostFid' => $blogPostFid, 'blogCategoryFid' => $blogCategoryFid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
