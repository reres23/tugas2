<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Klasifikasi;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */

$this->title ='Detail Data Surat Keluar';
$this->params['breadcrumbs'][] = ['label' => 'Surat Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-keluar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Data', ['update', 'id' => $model->no_agenda_keluar], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id' => $model->no_agenda_keluar], [
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
            'no_agenda_keluar',
            'no_surat_keluar',
            'tanggal_surat_keluar',
            'tanggal_dikirim',
            // 'perihal_surat',

             [                      // the owner name of the model
                'label' => 'Klasifikasi Surat',
                'value' => $model->klasifikasi->nama_klasifikasi
             ],
             
            'tujuan_surat',
            'keterangan:ntext',
            'file_surat',

        ],


        
           
    ]) ?>

</div>
