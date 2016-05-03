<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Pegawai;
use app\models\SuratMasuk;

/* @var $this yii\web\View */
/* @var $model app\models\AgendaKegiatan */

$this->title = 'Detail Data Agenda Kegiatan';
$this->params['breadcrumbs'][] = ['label' => 'Agenda Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-kegiatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Data', ['update', 'id' => $model->id_kegiatan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id' => $model->id_kegiatan], [
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
            'id_kegiatan',
            'tanggal_kegiatan',
            'kegiatan:ntext',
            'tempat_kegiatan',
            // 'id_pengguna',
            // 'no_agenda_masuk',

            [
                'label' => 'Pelaksana Kegiatan',
                'value' => $model->pegawai->nama_pegawai
            ],


             'keterangan:ntext',
        ],
    ]) ?>

</div>
