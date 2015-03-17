<?php

namespace app\controllers;

use Yii;
use app\models\SLUserData;
use app\models\UserDataSearch;
use app\models\SlBlogPost;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use app\models\SlUsers;
use app\models\SlUploads;
use yii\web\UploadedFile;
use app\models\Models;
/**
 * UserDataController implements the CRUD actions for SLUserData model.
 */
class UserDataController extends Controller
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
     * Lists all SLUserData models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = SLUserData::find()->with('avatarUploadF','slUsers')->all();
        $numOfPosts = SlBlogPost::find()->where(['authorId'=> $searchModel[0]->slUsers[0]->usersId])->count();
        return $this->render('index', [
            'model' => $searchModel,
            'numberOfPosts' => $numOfPosts,
        ]);
    }

    /**
     * Displays a single SLUserData model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SLUserData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SLUserData();
        $user1 = new SlUsers();
        $uploads = new SlUploads();
        $uploadModel = new Models();
        Yii::$app->params['uploadPath'] = '../images/';
        if ($model->load(Yii::$app->request->post()) && 
            $uploadModel->load(Yii::$app->request->post())) {
            $uploadModel->file = UploadedFile::getInstance($uploadModel, 'file');
            $path = Yii::$app->params['uploadPath'] . $uploadModel->file;
            
            if ($uploadModel->file->saveAs($path)) {
                $uploads->fullpath = $path;
                $uploads->save();
                    $model->registrationDate = time();
                    $model->lastLoginDate = time();
                    $model->avatarUploadFid = $uploads->uploadsId;
                    if ($user1->load(Yii::$app->request->post()) && $model->save()) {
                        $this->saveUser($user1,$model->userDataId);
                        if ($user->save()) {
                                return $this->redirect(['user/view', 'id' => $model->userDataId]);
                        }
                    } 
            } 
        } else {
            return $this->render('create', [
                'model' => $model,
                'user' => $user1,
                'uploadModel' =>$uploadModel,
            ]);
        }
    }

    /**
     * Updates an existing SLUserData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user1 = SlUsers::find()->where('userDataFid = :id',[ ':id'=> $id])->one();
        $uploads = SlUploads::find()->where('uploadsId = :id',[':id' =>$model->avatarUploadFid ])->one();
        $uploadModel = new Models();
        $uploadModel->file = $uploads;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($user1->load(Yii::$app->request->post()) && $this->userValidate($user1,$id)){
                if ($uploadModel->load(Yii::$app->request->post())) {
                    $uploadModel->file = UploadedFile::getInstance($uploadModel, 'file');
                   if ($this->uploadsValidate($model->avatarUploadFid,$uploadModel)) {
                       return $this->redirect(['user/view', 'id' => $user1->usersId]);
                   }
                }
                
                
            } 
        } else {
            return $this->render('update', [
                'model' => $model,
                'user' => $user1,
                'uploadModel' =>$uploadModel,
            ]);
        }
    }

    /**
     * Deletes an existing SLUserData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $uploads = SlUploads::find()->where('uploadsId = :id',[':id' =>$model->avatarUploadFid ])->delete();
        $model->delete();
        $user1 = SlUsers::find()->where('userDataFid = :id',[ ':id'=> $id])->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the SLUserData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SLUserData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SLUserData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function saveUser($user1,$id)
    {      
        $users = new SlUsers();             
        //$salt = mcrypt_create_ $this->generateRandomString();iv(10, MCRYPT_DEV_URANDOM);
        $salt =  $this->generateRandomString();
        $users->salt = $salt;
        $users->email = $user1->email;
        $users->password = md5($user1->password . $salt);
        $users->userDataFid = $id;
        $users->userGroupFid = 1;
        $users->isActivated = 0;
        $users->isLoggedIn = 0;
        if ($users->save()) {
            return $this->redirect(['view', 'id' => $id]);
        }else{
            echo "propalo sve";
        }
    }
    public function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
    public function uploadsValidate($id,$model)
    {
        $uploads = SlUploads::find()->where('uploadsId = :id',[':id' =>$id])->one();
        if (!empty($model->file)) {
            $path = '../images/' . $model->file;
            if ($model->file->saveAs($path)){
                $uploads->fullpath = $path;
                $uploads->save();
                return true;
            }
            
        }else{
            return true;
        }
        
    }
    public function userValidate($user,$id)
    {
        $user1 = SlUsers::find()->where('userDataFid = :id',[ ':id'=> $id])->one();
           if ($user->password != $user1->password) {
               $user1->password = md5($user->password.$user1->salt);
               $user1->email = $user->email;
           }else{
            $user1 = $user;
           }

        if ($user1->save()) {
            return true;
        }else{
            return false;
        }
    }
}
