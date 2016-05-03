<?php

namespace app\controllers;
//api yang digunakan
use Yii;
use app\models\SuratMasuk;
use app\models\SuratMasukSearch;
use app\models\FormLaporanMasuk; //untuk form laporan surat masuk
use yii\web\UploadedFile; //untuk upload file
use yii\web\Controller;
use yii\web\NotFoundHttpException; //untuk menampilkan exception
use yii\filters\VerbFilter;
use yii\filters\AccessControl;//untuk rules
use yii\data\ActiveDataProvider;
use mPDF;

use app\console\AccessRule;
use app\models\User;


// use app\models\LembarDisposisi;
// use app\models\Jabatan;
// use app\models\DetailDisposisi;
// use app\models\Klasifikasi;
/**
 * SuratMasukController implements the CRUD actions for SuratMasuk model.
 */
class SuratMasukController extends Controller
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

                'actions' => ['index', 'create','update','delete','view','download','laporan','print'],
                'allow' => true,
                    'roles' => [

                        User::ROLE_ADMIN,
                        User::ROLE_PETUGAS,
                   

                     ],
                ],



                [

                'actions' => ['index','view','download','laporan'],
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
        ];
    }

    /**
     * Lists all SuratMasuk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuratMasukSearch(); //membuat function pencariaan


        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // menampilkan fungsi pencarian

        return $this->render('index', [ //melakukan render data agar dapat tampil ke halaman index
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single SuratMasuk model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [//meminta model id yang di request, kemudian dirender untuk menampilkan haslinya
            'model' => $this->findModel($id),
            ]);
    }

    /**
     * Creates a new SuratMasuk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //model berisi request dan disimpan,
        //kemudian apabila berhasil, browser akan dialihkan ke action view dengan id model yang baru saja di buat.
        // jika tidak, view create akan ditampilkan dimana user dapat memasukkan data.s
        $model = new SuratMasuk();
        $data_post = Yii::$app->request->post();
        // print_r($data_post); exit;
        if ($model->load($data_post)) { 
            $imageName = str_replace('/', '_', $model->no_surat_masuk);            
            $model->file_surat= UploadedFile::getInstance($model,'file_surat');
            $model->file_surat->saveAs( 's_masuk/'.$imageName.'.'.$model->file_surat->extension);
            $model->file_surat= $imageName.'.'.$model->file_surat->extension;
            // $model->validate();
            // var_dump($model->getErrors());exit;

            if($model->save()) {

            Yii::$app->session->setFlash('suratmasukSuccess', "Data berhasil disimpan");
            //jika berhasil maka disimpan
            return $this->redirect(['index']);
             //maka akan dialihkan ke index

          
             } 
             //else {
                    
             //        Yii::$app->session->setFlash('error',"Data gagal disimpan");
             //    }

                return $this->refresh();

        } else {
            return $this->render('create', [
                //jika tidak berhasil maka akan kembali ke view create
                'model' => $model,
                ]);
        }
        
        
    }


    /**
     * Updates an existing SuratMasuk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //model meminta request id
        $newImage = $model->file_surat;

        $data_post =Yii::$app->request->post();

        if ($model->load($data_post)) {

            $imageName = str_replace('/', '_', $model->no_surat_masuk);  
            $model->file_surat = UploadedFile::getInstance($model,'file_surat'); //upload file 
            if (!empty($model->file_surat)) {//jika file sudah ada dan dilakukan update, maka file yang baru akan disimpan
                $model->file_surat->saveAs ( 's_masuk/'.$imageName.'.'.$model->file_surat->extension);
                $model->file_surat = $imageName.'.'.$model->file_surat->extension;
            } else {
                    $model->file_surat = $newImage; //jadi model file surat akan diisi dengan file yang baru saja diupload
                }

                $model->save();


                 Yii::$app->session->setFlash('suratmasukUpdate', "Data berhasil diubah");
                return $this->redirect(['index']);
            } else {
            return $this->render('update', [ //jika tidak berhasil maka akan dialihkan ke halaman view update untuk diisi data
                'model' => $model,
                ]);
        }
    }

    /**
     * Deletes an existing SuratMasuk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) //fungsi hapus dengan parameter id
    {
        $this->findModel($id)->delete(); //mencari id yang akan di hapus, kemudian dilakukan perintah hapus

        Yii::$app->session->setFlash('suratmasukDelete', "Data berhasil diubah");
        return $this->redirect(['index']); //setelah itu kembali ke index
    }

    public function actionLaporan() {
        $model = new FormLaporanMasuk();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model->jenisSurat == 0) {
                $model->jenisSurat = 'surat khusus';
            }
            else {
                $model->jenisSurat = 'surat umum';
            }

            $hasil = SuratMasuk::find()
                ->where(['jenis_surat' => $model->jenisSurat])
                ->andWhere(['>=', 'tanggal_surat_masuk',$model->tanggalAwal])
                ->andWhere(['<=', 'tanggal_surat_masuk', $model->tanggalAkhir])
                ->all();

            // cetak pdf
            $html = $this->renderPartial('laporanmasuk', ['hasil' => $hasil]);
            $mpdf = new \mPDF('c','A4','','',0,0,0,0,0,0);
                $mpdf->SetDisplayMode('fullpage');
                $mpdf->list_indent_first_level = 1;
                $mpdf->WriteHTML($html);
                $mpdf->Output('laporan_surat_masuk.pdf', 'D');
            exit;

        }

        $jenisSurat = [
            'surat khusus',
            'surat umum',
        ];

        return $this->render('_formLaporanMasuk',[
            'model' => $model,
            'jenisSurat' => $jenisSurat,
        ]);
    }

    /**
     * Finds the SuratMasuk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratMasuk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    
    protected function findModel($id) //fungsi penemuan
    {
        if (($model = SuratMasuk::findOne($id)) !== null) { //jika ditemukan 1 id surat masuk kosong
            //maka akan dilihkan ke model, jika tidak makan akan menampilkan halaman error
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionDownload($id) {
     $model = $this->findModel($id);
     $filename = $model->file_surat;
     $path_download = Yii::getAlias("@webroot").'/s_masuk/'.$filename;

     // print_r($path_download); exit;
        if (file_exists($path_download)) {
            Yii::$app->getResponse()->sendFile($path_download,$filename);
        } else {

            Yii::$app->session->setFlash('gagal');
            return $this->redirect(['index']);
        }
    }

    // public function actionPrint($id)
    // {   
        
    //     $model = $this->findModel($id);

    //     $disposisi = LembarDisposisi::find()->all();
    //     $detail = DetailDisposisi::find()->all();
    //     $jabatan = Jabatan::find()->all();
    //       $klasifikasi = Klasifikasi::find()->all();


    //     return $this->renderPartial('print', [
    //         'model' => $model,
    //         'jabatan' => $jabatan,
    //         'disposisi' => $disposisi,
    //         'detail' => $detail,
    //          'klasifikasi' => $klasifikasi,

    //     ]);
    // }
}
