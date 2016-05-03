<?php

namespace app\controllers;

use Yii;
use app\models\SuratDisposisi;
use app\models\SuratDisposisiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Jabatan;
use app\models\RelasiDisposisi;
use app\models\SuratMasuk;

/**
 * SuratDisposisiController implements the CRUD actions for SuratDisposisi model.
 */
class SuratDisposisiController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SuratDisposisi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuratDisposisiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratDisposisi model.
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
     * Creates a new SuratDisposisi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($no_agenda_masuk)
    { 
       
        $databaru = Jabatan::find()->all();
       
        $suratDisposisi = new SuratDisposisi();

        $data_post = Yii::$app->request->post();

        $cek = SuratDisposisi::find() 
                ->where(['agenda_masuk' => $no_agenda_masuk])
                ->count();

        if($cek > 0) {
            $cari = SuratDisposisi::find()
                ->where(['agenda_masuk' => $no_agenda_masuk])
                ->one();
      
            return $this->redirect(['surat-disposisi/view', 'id' => $cari->no_agenda_disposisi]);
        }

        if ($suratDisposisi->load($data_post)) {
            $suratDisposisi->agenda_masuk = Yii::$app->request->get('no_agenda_masuk');    
                    
                if (!empty($data_post)) {
                    if ($suratDisposisi->load($data_post) && $suratDisposisi->save()) {
                
                            if (isset($data_post['jabatan'])) {
                                foreach ($data_post['jabatan'] as $id_jabatan) {
                                    $model = new RelasiDisposisi();
                                    $model->agenda_disposisi = $suratDisposisi->no_agenda_disposisi;
                                    $model->no_jabatan = $id_jabatan;
                                    $model->id_detail;
                                     $model->save();
                                     // print_r($data_post['jabatan']);exit();
                                }
                            }

                    return $this->redirect(['index']);
                    }     
             
                 } else {
                
                     return $this->render('create', [
                        'model' => $suratDisposisi,
                        'databaru' => $databaru,
                    ]);
                }
           
        } else {
            return $this->render('create', [
                'model' => $suratDisposisi,
                'databaru'=>$databaru,
            ]);
        }
        
    }

    /**
     * Updates an existing SuratDisposisi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->no_agenda_disposisi]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SuratDisposisi model.
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
     * Finds the SuratDisposisi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratDisposisi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratDisposisi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
