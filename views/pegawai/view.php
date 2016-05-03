<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = 'Detail Data Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Data Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Data', ['update', 'id' => $model->nip_pegawai], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id' => $model->nip_pegawai], [
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
            'nip_pegawai',
            'nama_pegawai',
            'email:email',
           
            // 'foto',
            // 'id_posisi',


             [                      // the owner name of the model
                'label' => 'Jabatan',
                'value' => $model->posisi->nama_jabatan
             ],

             'status_pegawai',

            [
              'attribute' => 'Foto',
              'value' => $model->foto,
               'format' => ['image',['width'=>'100','height'=>'100']],
            ],
        ],
    ]) ?>

</div>
