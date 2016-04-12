<?php

namespace app\controllers;

use Yii;
use app\models\Pengguna;
use app\models\PenggunaSearch;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;


/**
 * PenggunaController implements the CRUD actions for Pengguna model.
 */
class PenggunaController extends Controller
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
                                        'changepassword',
                                        ],

                                        'allow' => true,
                                        'roles' =>['@']
                            ],
                        ] ,
                    ],
        
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [//pengaturan hapus
                    'delete' => ['post'], //maka digunakan method post
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
        // $model = Pengguna::find();
        // print_r($model);exit();
        
       
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
    public function actionView($id) //untuk menampilkan data
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
    public function actionCreate()
    {
        $model = new Pengguna();
        $data_post = Yii::$app->request->post();//berarti untuk menunjukkan bahwa data di form ada
        //kemudian di kirim
      // print_r($post); //lalu di cetak untuk di cek debug
        //print_r tidak bersama tipe datanya
       // exit();//menghentikan proses

        if ($model->load($data_post)) {

              $model->password_hash=md5($data_post['Pengguna']['password']);
            //$model->validate();
            //var_dump($model->getErrors());exit;
            //print data bersama tipe datanya

            $imageName = $model->nama_pengguna;
            $model->foto = UploadedFile::getInstance($model,'foto');
            $model->foto->saveAs('foto_pegawai/'.$imageName.'.'.$model->foto->extension);
            $model->foto = 'foto_pegawai/'.$imageName.'.'.$model->foto->extension;
                
            $model->save();

            Yii::$app->session->setFlash('success');

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
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

        $newImage = $model->foto;

        $data_post =Yii::$app->request->post();

       if ($model->load($data_post)) {

            $imageName = $model->nama_pengguna;
            $model->file = UploadedFile::getInstance($model,'foto');
            if (!empty($model->foto)) {
                $model->foto->saveAs ('foto_pegawai/'.$imageName.'.'.$model->foto->extension);
                $model->foto = 'foto_pegawai/'.$imageName.'.'.$model->foto->extension;
                } else {
                    $model->foto = $newImage;
                }
            
            $model->save();

            return $this->redirect(['view', 'id' => $model->id_pengguna]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
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

        return $this->redirect(['index']);
    }


    // public function actionChangePassword($id)
    // {
    //     $model = $this->findModel($id);
    //     print_r($model);
    // }

     public function actionChangepassword(){      
        $data = Yii::$app->user;
        $id = $data->id;
        $model = new Pengguna();
        $data_post = Yii::$app->request->post();
        if ($model->load($data_post)) {
            $user = Pengguna::findOne($id);
            $pass = $data_post['Pengguna']['password_lama'];
            if ($user->password_hash == md5($pass) && ($data_post['Pengguna']['password'] == $data_post['Pengguna']['password_ulang'])){

                $user->password_hash =  md5($data_post['Pengguna']['password']);
                Yii::$app->session->setFlash('oldPasswordSuccess');
                if ($user->load($data_post)) {         
                    $user->save();
                    return $this->refresh();
                }
            } else {
               return $this->render('changepassword',[
                'model'=>$model,
                'false_password'=>true
                ]);
           }
         } else {
          return $this->render('changepassword',[
            'model'=>$model,
            ]);
        }
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
