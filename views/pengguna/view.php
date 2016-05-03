<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */

$this->title ='Detail Data Pengguna';
$this->params['breadcrumbs'][] = ['label' => 'Data Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('penggunaUpdate')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil diubah!</h4>
  </div>

<?php } ?>
<div class="pengguna-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Data', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda yakin ingin menghapus data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',           
            [
                'attribute' => 'status',
                'value' => $model->status == 10 ? 'Aktif' : 'Non-aktif',
            ],

            [
                'attribute' => 'created_at',
                'label'     => 'Ditambahkan Pada',
                'format' => ['date', 'php:d-m-Y H:i:s' ],
            ],

            [

                'attribute' => 'updated_at',
                 'label'     => 'Diperbaharui Pada',
                'format' => ['date', 'php: d-m-Y H:i:s'],
            ],

            // 'role',

            [
                'attribute' => 'role',
                'value' => ($model->role == 10 ? 'admin': ($model->role == '20' ? 'petugas': 'kepala sekolah')),
                   
            ],

            // [
            //     'attribute' => 'role',
            //     'label' => 'Hak Akses',
            //     'format' =  'raw',
            //     'value' =>function($model, $key, $index) 
            //         {
            //             if($model->role == '10') {
            //                 return 'admin';

            //             } else if ($model->role == '20') {
            //                 return 'petugas';
            //              }

            //              return 'kepala sekolah';
            //         }

            // ],

            [

                 // the owner name of the model
                'label' => 'Nama Pegawai',
                'value' => $model->pegawai->nama_pegawai
             ],
        ],
    ]) ?>

</div>
