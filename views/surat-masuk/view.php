<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Klasifikasi;
// use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */

$this->title ='Detail Data Surat Masuk';
$this->params['breadcrumbs'][] = ['label' => 'Surat Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-masuk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Data', ['update', 'id' => $model->no_agenda_masuk], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id' => $model->no_agenda_masuk], [
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
            'no_agenda_masuk',
            'no_surat_masuk',
            'tanggal_surat_masuk',
            'tanggal_surat_diterima',
            'jenis_surat',
            'asal_surat',
            [                      // the owner name of the model
                'label' => 'Perihal Surat',
                'value' => $model->perihal->nama_klasifikasi
             ],

            'keterangan:ntext',
            'file_surat',

        ],
    ]) ?>

</div>
