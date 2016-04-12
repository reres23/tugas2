<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Jabatan;
use app\models\SuratMasuk;

/* @var $this yii\web\View */
/* @var $model app\models\SuratDisposisi */

$this->title = 'Detail Data Pengguna ';
$this->params['breadcrumbs'][] = ['label' => 'Surat Disposisi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-disposisi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->no_agenda_disposisi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->no_agenda_disposisi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_agenda_disposisi',
            'tanggal_surat_diterima',
            

            [                      // the owner name of the model
                'label' => 'Nomor Surat',
                'value' => $model->masuk->no_surat_masuk
             ],


            [                      // the owner name of the model
                'label' => 'Asal Surat',
                'value' => $model->masuk->asal_surat
             ],

             [                      // the owner name of the model
                'label' => 'Perihal Surat',
                'value' => $model->klasifikasi->nama_klasifikasi
             ],


            [                      // the owner name of the model
                'label' => 'Diteruskan Kepada',
                'value' => $model->jabatan->nama_jabatan
             ],

             'instruksi',
             'catatan',
        ],


    ]) ?>

</div>
