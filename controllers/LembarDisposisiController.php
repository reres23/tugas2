<?php

namespace app\controllers;

use Yii;
use app\models\LembarDisposisi;
use app\models\LembarDisposisiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Jabatan;
use app\models\DetailDisposisi;
use app\models\SuratMasuk;

/**
 * LembarDisposisiController implements the CRUD actions for LembarDisposisi model.
 */
class LembarDisposisiController extends Controller
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
     * Lists all LembarDisposisi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LembarDisposisiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LembarDisposisi model.
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
     * Creates a new LembarDisposisi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($no_agenda_masuk)
    { 
       
        $databaru = Jabatan::find()->all();
       
        $suratDisposisi = new LembarDisposisi();

        $data_post = Yii::$app->request->post();

        $cek = LembarDisposisi::find() 
                ->where(['agenda_masuk' => $no_agenda_masuk])
                ->count();

        if($cek > 0) {
            $cari = LembarDisposisi::find()
                ->where(['agenda_masuk' => $no_agenda_masuk])
                ->one();
      
            return $this->redirect(['lembar-disposisi/view', 'id' => $cari->no_agenda_disposisi]);
        }

        if ($suratDisposisi->load($data_post)) {
            $suratDisposisi->agenda_masuk = Yii::$app->request->get('no_agenda_masuk');    
                    
                if (!empty($data_post)) {
                    if ($suratDisposisi->load($data_post) && $suratDisposisi->save()) {
                
                            if (isset($data_post['jabatan'])) {
                                foreach ($data_post['jabatan'] as $id_jabatan) {
                                    $model = new DetailDisposisi();
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
     * Updates an existing LembarDisposisi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $suratDisposisi = LembarDisposisi::findOne($model->no_agenda_disposisi);

        // $data = new LembarDisposisi();
        // $data->no_agenda_disposisi = $model->no_agenda_disposisi;
        // $data->instruksi = $model->instruksi;
        // $data->catatan = $model->catatan;
        // $data->agenda_masuk = $model->agenda_masuk;
        // $model = DetailDisposisi::find()->all();

        $data_post = Yii::$app->request->post();
       
        $databaru = Jabatan::find()->all();

         

            if(!empty($data_post)) {

                     if(isset($data_post['jabatan'])) {
                    
                        foreach ($data_post['jabatan'] as $id_jabatan) {
                            $model = new DetailDisposisi();
                            $model->agenda_disposisi = $suratDisposisi->no_agenda_disposisi;
                            $model->no_jabatan = $id_jabatan;
                            $model->id_detail;
                            $model->update();

                         } 
                      
                     }
                     // if($model->load($data_post)) {
                     // return $model->update();
                      // print_r($data_post['jabatan']);exit;
                        // var_dump($model->getErrors());exit;

                if ($suratDisposisi->load($data_post) && $suratDisposisi->update()) {  
   
                    return $this->redirect(['view', 'id' => $suratDisposisi->no_agenda_disposisi]);

                } } else {

                    return $this->render('update', [
                        'model' => $suratDisposisi,
                        'databaru' => $databaru,
                     
                    ]);
                }
            }
         else {

            return $this->render('update', [
                'model' => $suratDisposisi,
                'databaru' => $databaru,
              
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
     * Finds the LembarDisposisi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LembarDisposisi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LembarDisposisi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPrint($no_agenda_masuk)
    {
        $model = $this->findModel($no_agenda_masuk);


        // $jabatan = Jabatan::find()->all();

        $disposisi = LembarDisposisi::find()->all();

        // $detail = DetailDisposisi::find()->all();


        return $this->renderPartial('print', [
            'model' => $model,
            // 'jabatan' => $jabatan,
            'disposisi' => $disposisi,
            // 'detail' => $detail,


        ]);
    }
}
