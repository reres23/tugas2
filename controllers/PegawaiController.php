<?php

namespace app\controllers;

use Yii;
use app\models\Pegawai;
use app\models\PegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

use app\console\AccessRule;
use app\models\User;

/**
 * PegawaiController implements the CRUD actions for Pegawai model.
 */
class PegawaiController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all Pegawai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pegawai model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pegawai();
        $data_post = Yii::$app->request->post();
           
        if ($model->load($data_post)) {
            $imageName = $model->nama_pegawai;
            $model->foto = UploadedFile::getInstance($model,'foto');
            $model->foto->saveAs('foto_pegawai/'.$imageName.'.'.$model->foto->extension);
            $model->foto = 'foto_pegawai/'.$imageName.'.'.$model->foto->extension;
                
            $model->save();

            Yii::$app->session->setFlash('pegawaiSuccess', 'Data berhasil disimpan');

            return $this->redirect(['index']);
        } else {

            Yii::$app->session->setFlash('pegawaiError', 'Data gagal disimpan');
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing Pegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
       
        $newImage = $model->foto;

        $data_post =Yii::$app->request->post();

        if ($model->load($data_post)) {

          $imageName = $model->nama_pegawai;
            $model->foto = UploadedFile::getInstance($model,'foto'); 
            if (!empty($model->foto)) {
                $model->foto->saveAs ( 'foto_pegawai/'.$imageName.'.'.$model->foto->extension);
                $model->foto = 'foto_pegawai/'.$imageName.'.'.$model->foto->extension;
            } else {
                    $model->foto = $newImage; 
                }

                $model->save();

                Yii::$app->session->setFlash('pegawaiUpdate', 'Data berhasil diubah');
                return $this->redirect(['index']);
            } else {
            return $this->render('update', [ 
                'model' => $model,
                ]);
        }
    }


    /**
     * Deletes an existing Pegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('pegawaiDelete', 'Data berhasil dihapus');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Pegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionProfil($id)
    {

        $data = Pegawai::findOne($id);
                return $this->render('profil', 
                    [ 
                    'data' => $data,
                    ]);
    }

    protected function findModel($id)
    {
        if (($model = Pegawai::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
