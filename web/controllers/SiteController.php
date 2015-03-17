<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SlBlogPost;
use app\models\UsersSearch;
use app\models\Models;
use app\models\BlogPostSearch;
use app\models\SlBlogTags;
use app\models\SlUsers;
use app\models\SlBlogCategories;
use app\models\SlBlogCategoriesSearch;

class SiteController extends Controller
{
    public function actionCreatewidget(){
        return $this->render('hellowidget');
    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $models = new Models();
        $posts[] = null;
        if ($models->load(Yii::$app->request->post())) {
            if (!empty($models->number)) {
                $posts = SlBlogPost::find()->where('isVisible = 1')->limit($models->number * 5)->orderBy('entryDate DESC')->all();
            }elseif (!empty($models->tag)) {
               $posts = SlBlogPost::find()->where('(isVisible = 1) and (tags LIKE :tag)',[':tag' => '%'.$models->tag.'%'])->limit(5)->orderBy('entryDate DESC')->all();
            }elseif (!empty($models->author)) {
                $posts = SlBlogPost::find()->where('(isVisible = 1) and (authorId = :tag)',[':tag' => $models->author])->limit(5)->orderBy('entryDate DESC')->all();
            }elseif (!empty($models->category)) {
                $categores = new SlBlogCategoriesSearch();
                $categoresResult = $categores->viewCategory($models->category)->all();
                $posts = $categoresResult[0]->blogPostFs;
            }   
            
        }else{
            $posts = SlBlogPost::find()->where('isVisible = 1')->limit(5)->orderBy('entryDate DESC')->all();
        }
        $tags = SlBlogTags::find()->all();
        $author = SlUsers::find()->all();
        $categoes = SlBlogCategories::find()->all();
        $users[] = null;
        $i = 0;
        foreach ($author as $user) {
            $fullName = new UsersSearch();
            $users[$user->usersId] = $fullName->getFullName($user->usersId);
        }
        $numberOfPosts = new BlogPostSearch();
        $numberOfPosts = $numberOfPosts->search('')->count() / 5;
        for ($i=1; $i <= $numberOfPosts; $i++) { 
            $numer[$i] = $i*5;
        }
         $userData[] = "";
        
        return $this->render('index',['posts' => $posts,
            'user' => $userData,
            'widget' => $models,
            'tags' => $tags,
            'user' => $users,
            'categores' => $categoes,
            'number' => $numer]);
    }
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->getSession()->destroy("firstName");
        Yii::$app->getSession()->destroy("lastName");
        Yii::$app->getSession()->destroy("userId");
        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
