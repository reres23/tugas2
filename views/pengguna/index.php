<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Pengguna;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PenggunaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('penggunaSuccess')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil disimpan!</h4>
  </div>

<?php } ?>

<?php if (Yii::$app->session->hasFlash('penggunaDelete')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil dihapus!</h4>
  </div>

<?php } ?>

<div class="pengguna-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <!--  <p>
        <?= Html::a('Tambah Data Pengguna', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'username',

            [
                'attribute' => 'status',
                'label' => 'Status',
                'format' => 'html',
                'value' => function($model, $key, $index //function $mode berarti menunjuk ke model
                    //$index menunjuk index yang di tampilan, $key menunjuk ke id tabel
                    )

                    {
                        if ($model->status == '10') {
                            return 'aktif';
                        }
                        return 'nonaktif';
                    }

                
            ],
       

            [
                'attribute' => 'role',
                'label' => 'Hak Akses',
                'format' => 'html',
                'value' =>function($model, $key, $index) 
                    {
                        if($model->role == '10') {
                            return 'admin';

                        } else if ($model->role == '20') {
                            return 'petugas';
                         }

                         return 'kepala sekolah';
                    }

            ],


             [
                'attribute'=>'nip',
                'label' => 'Nama Pegawai',
                'format'=>'html',
                'value'=>function($data){
                        return $data->pegawai->nama_pegawai;
                }
            ],


            // [
            //     'attribute' => 'created_at',
            //     'label'     => 'Ditambahkan Pada',
            //     'format'    => ['date', 'php:d-m-Y'],

            // ],

            // [

            //     'attribute' => 'updated_at',
            //     'label'     => 'Diperbaharui Pada',
            //     'format'    => ['date', 'php:d-m-Y'],
            // ],


            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Aksi',
                'headerOptions' => ['width' => '100']
            ],
        ],
    ]); ?>
</div>
