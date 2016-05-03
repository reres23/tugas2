<?php

namespace app\controllers;

use Yii;
use app\models\Pengguna;
use app\models\PenggunaSearch;
use app\models\DataUser;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

use app\console\AccessRule;
use app\models\User;


/**
 * PenggunaController implements the CRUD actions for Pengguna model.
 */


class PenggunaController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
        
    }

    /**
     * Lists all Pengguna models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenggunaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengguna model.
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
     * Creates a new Pengguna model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($nip_pegawai) {
        $model = new DataUser();

        $hak_akses = [
            10 => 'Admin',
            20 => 'Petugas',
            30 => 'Kepala Sekolah',
        ];

        $count = User::find()
            ->where(['nip' => $nip_pegawai])
            ->count();

        if ($count > 0) {
            $user = User::find()
                ->where(['nip' => $nip_pegawai])
                ->one();

            return $this->redirect(['pengguna/view', 'id' => $user->id]);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->nip_pegawai = Yii::$app->request->get('nip_pegawai');
            if ($model->create()) {

                Yii::$app->session->setFlash('penggunaSuccess', 'Data berhasil disimpan');
                return $this->redirect(['pengguna/index']);
            }
        }



        return $this->render('create', [
            'model' => $model,
            'hak_akses' => $hak_akses,
          
        ]);
    }

    /**
     * Updates an existing Pengguna model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = User::findOne($model->id);

        $dataUser = new DataUser;
        $dataUser->id = $model->id;
        $dataUser->username = $model->username;
        $dataUser->nip_pegawai = $model->nip;
        $dataUser->hak_akses = $model->role;


        $hak_akses = [
            10 => 'Admin',
            20 => 'Petugas',
            30 => 'Kepala Sekolah',
        ];

        
        if ($dataUser->load(Yii::$app->request->post())  && $dataUser->update()) {
             Yii::$app->session->setFlash('penggunaUpdate', 'Data berhasil diubah');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $dataUser,
                'user' => $user,
                'hak_akses' => $hak_akses,
              
            ]);
        }




        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // } else {
        //     return $this->render('update', [
        //         'model' => $model,
        //     ]);
        // }
    }


    /**
     * Deletes an existing Pengguna model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

         Yii::$app->session->setFlash('penggunaDelete', 'Data berhasil dihapus');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengguna model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pengguna the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pengguna::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
