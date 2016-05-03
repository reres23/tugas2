<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\console\AccessRule;
use app\models\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                    'ruleConfig' => [
                    'class' => AccessRule::className(),
                    ],
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_PETUGAS,
                            User::ROLE_KEPALA_SEKOLAH,
                        ],
                    ],

                     [
                        'actions' => ['profil'],
                        'allow' => true,
                        'roles' => [
                            '@',
                        ],
                    ],



                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                // 'actions' => [
                //     'logout' => ['post'],
                // ],
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
    { //tambahan
        //jika user sebagai tamu, maka akan memanggil halaman index
        //jika tidak akan memanggil halaman login
        if(!Yii::$app->user->isGuest) {
            return $this->render('index');
        } else {
            return $this->redirect(array('site/login'));
        }
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        $data_post =  Yii::$app->request->post();
        //print_r($data_post);exit();

        if ($model->load($data_post)) {
            $user = User::findByUsername($data_post['LoginForm']['username']);
            if (!$model->login()) { //untuk memunculkan pesan error
                Yii::$app->session->setFlash('loginError', 'Maaf password dan username yang Anda masukkan salah!');
            }
           return $this->goBack(); 
         }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
