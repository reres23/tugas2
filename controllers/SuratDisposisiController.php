<?php

namespace app\controllers;

use Yii;
use app\models\SuratDisposisi;
use app\models\Jabatan;
use app\models\SuratDisposisiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
/**
 * SuratDisposisiController implements the CRUD actions for SuratDisposisi model.
 */
class SuratDisposisiController extends Controller
{
    public function behaviors()
    {
        return [

        'access' => [
        'class' => AccessControl::className(),
        'rules'=>[
        [
        'actions'=>[
            'index',
            'view',
            'create',
            'update',
            'delete',
            'print',
        ],

        'allow'=> true,
        'roles' =>['@']
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
    public function actionCreate()
    {

       // print_r('expression');exit();
        $databaru = Jabatan::find()->all();
        $model = new SuratDisposisi();

        $data_post = Yii::$app->request->post();
         // print_r($data_post['jabatan']);exit();

        if (!empty($data_post)) {
            foreach ($data_post['jabatan'] as $key =>$value) {
            $model = new SuratDisposisi();
            $model->load($data_post);
            $model->id_jabatan = $value;
            // $model->validate();
            // var_dump($model->getErrors());exit;
            $model->save();
            }

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
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

    public function actionPrint($id) {
     $model = $this->findModel($id);
     $jabatan = Jabatan::find()->all();
    
        //print_r($instruksi);exit();

        return $this->renderPartial('print', [
                'model' => $model,
                'jabatan' =>$jabatan,
               
            ]);
    }
}



 