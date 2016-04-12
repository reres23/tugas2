<?php

namespace app\controllers;

use Yii;
use app\models\SuratKeluar;
use app\models\SuratKeluarSearch;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * SuratKeluarController implements the CRUD actions for SuratKeluar model.
 */
class SuratKeluarController extends Controller
{
    public function behaviors()
    {
        return [
        'access' => [
                    'class'=> AccessControl::className(), //untuk pengaturan yang bisa di akses di sistem
                    'rules'=>[
                        [
                            'actions' =>[
                                        'index',
                                        'view',
                                        'create',
                                        'update',
                                        'delete',
                                        'download',
                                        ],

                                        'allow' => true,
                                        'roles' =>['@']
                            ],
                        ] ,
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
     * Lists all SuratKeluar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuratKeluarSearch();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratKeluar model.
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
     * Creates a new SuratKeluar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixedz
     */
    public function actionCreate()
    {
        $model = new SuratKeluar();
        $data_post = Yii::$app->request->post();

        if ($model->load($data_post)) {
        
            $imageName = str_replace('/', '_', $model->no_surat_keluar);
            $model->file_surat = UploadedFile::getInstance($model, 'file_surat');
            $model->file_surat->saveAs( 's_keluar/'.$imageName.'.'.$model->file_surat->extension);
            $model->file_surat = $imageName.'.'.$model->file_surat->extension;

            $model->save();

            Yii::$app->session->setFlash('success');
                return $this->redirect(['index']);
        

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->no_agenda_keluar]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SuratKeluar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $newImage = $model->file_surat;

        $data_post = Yii::$app->request->post();

        if ($model->load($data_post)) {

            $imageName = str_replace('/', '_', $model->no_surat_keluar);
            $model->file_surat = UploadedFile::getInstance($model,'file_surat');
            if(!empty($model->file_surat)) {
                $model->file_surat->saveAs ('s_keluar/'.$imageName.'.'.$model->file_surat->extension);
                $model->file_surat = $imageName.'.'.$model->file_surat->extension;         
            } else {
                $model->file_surat = $newImage;
            }

            $model->save();

            return $this->redirect(['index']);
        // }

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->no_agenda_keluar]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SuratKeluar model.
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
     * Finds the SuratKeluar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratKeluar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratKeluar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // public function actionDownload($id) {
    //     $model = $this->findModel($id);
    //     $filename = $model->file_surat;
    //     $path_download = Yii::getAlias("@webroot").'/s_keluar'.$filename;

    //     if(file_exists($path_download)) {
    //         Yii::$app->getResponse()->sendFile($path_download,$filename);
        
    //     } else {
                
    //          Yii::$app->session->setFlash('gagal');
    //             return $this->redirect(['index']);
    //     }
    // }

    public function actionDownload($id) {
     $model = $this->findModel($id);
     $filename = $model->file_surat;
     $path_download = Yii::getAlias("@webroot").'/s_keluar/'.$filename;

     // print_r($path_download); exit;
        if (file_exists($path_download)) {
            Yii::$app->getResponse()->sendFile($path_download,$filename);
        } else {

            Yii::$app->session->setFlash('gagal');
            return $this->redirect(['index']);
        }
    }
}
