<?php

namespace app\controllers;

use Yii;
use app\models\Jabatan;
use app\models\JabatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;


use app\console\AccessRule;
use app\models\User;


/**
 * JabatanController implements the CRUD actions for Jabatan model.
 */
class JabatanController extends Controller
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
     * Lists all Jabatan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JabatanSearch(); 
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jabatan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) //untuk menampilkan data
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new Jabatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jabatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('jabatanSuccess', 'Data berhasil disimpan!');

            return $this->redirect(['index']);
        } else {

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Jabatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             Yii::$app->session->setFlash('jabatanUpdate', 'Data berhasil diubah');
            return $this->redirect(['view', 'id' => $model->id_jabatan]);
        } else {

           

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Jabatan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('jabatanDelete', 'Data berhasil dihapus');
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Jabatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jabatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jabatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
