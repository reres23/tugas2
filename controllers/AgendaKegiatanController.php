<?php

namespace app\controllers;

use Yii;
use app\models\AgendaKegiatan;
use app\models\AgendaKegiatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

use app\console\AccessRule; //memanggil akses rule
use app\models\User; //memanggil model user

/**
 * AgendaKegiatanController implements the CRUD actions for AgendaKegiatan model.
 */
class AgendaKegiatanController extends Controller
{
    public function behaviors()
    //  * Behaviors declared in this method will be attached to the component automatically (on demand).
    {
    return [
        'access' => [
            'class' => AccessControl::className(),
            // Access Control Filter (ACF) is a simple authorization method that is best used by applications that only need some simple access control. 
            'ruleConfig' => [
                'class' => AccessRule::className(),
            ],

            'rules' => [
                [

                'actions' => ['logout'],
                'allow' => true,
                'roles' => ['@'], //menu logout digunakan untuk semua user yang terdaftar resmi
                ],

                [

                'actions' => ['index', 'create','update','delete','view'],
                'allow' => true,
                    'roles' => [

                        User::ROLE_ADMIN,
                        User::ROLE_PETUGAS,
                   

                     ],
                ],

                [

                'actions' => ['index','view'],
                'allow' => true,
                    'roles' => [

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
                'actions' => [
                    'delete' => ['post'],
                ],
            ],

            // VerbFilter is an action filter that filters by HTTP request methods.
            //metode penyaringan berdasarkan permintaan HTTP

        ];
    }

    /**
     * Lists all AgendaKegiatan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AgendaKegiatanSearch(); //mewakili model untuk form pencarian
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams); 

        return $this->render('index', [
            'searchModel' => $searchModel, //hasil pencarian akan ditampilkan ke index
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AgendaKegiatan model.
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
     * Creates a new AgendaKegiatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AgendaKegiatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kegiatan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AgendaKegiatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kegiatan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AgendaKegiatan model.
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
     * Finds the AgendaKegiatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AgendaKegiatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AgendaKegiatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
