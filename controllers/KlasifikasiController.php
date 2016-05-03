<?php

namespace app\controllers;

use Yii;
use app\models\Klasifikasi;
use app\models\KlasifikasiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

use app\console\AccessRule;
use app\models\User;

/**
 * KlasifikasiController implements the CRUD actions for Klasifikasi model.
 */
class KlasifikasiController extends Controller
{
    public function behaviors()
    {
        return [

        'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
    
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index', 'create','update','delete','view'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                           
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
        ];
    }

    /**
     * Lists all Klasifikasi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KlasifikasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Klasifikasi model.
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
     * Creates a new Klasifikasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Klasifikasi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('klasifikasiSuccess', 'Data berhasil disimpan');
            return $this->redirect(['view', 'id' => $model->id_klasifikasi]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Klasifikasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('klasifikasiUpdate', 'Data berhasil diubah');
            return $this->redirect(['view', 'id' => $model->id_klasifikasi]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Klasifikasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('klasifikasiDelete', 'Data berhasil di hapus');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Klasifikasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Klasifikasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Klasifikasi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
