<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Jabatan;
use app\models\SuratMasuk;
use app\models\Klasifikasi;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratDisposisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Disposisi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-disposisi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Surat Disposisi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_agenda_disposisi',
            // 'tanggal_surat_diterima',
            // 'id_jabatan',
            // 'id_pengguna',


            [
                'attribute'=>'no_agenda_masuk',
                'label' => 'Nomor Surat',
                'format'=>'html',
                'value'=>function($data){
                        return $data->masuk->no_surat_masuk;
                }
            ],

            [
                'attribute'=>'no_agenda_masuk',
                'label' => 'Asal Surat',
                'format'=>'html',
                'value'=>function($data){
                        return $data->masuk->asal_surat;
                }
            ],

            [
                'attribute'=>'id_klasifikasi',
                'label' => 'Perihal Surat',
                'format'=>'html',
                'value'=>function($data){
                        return $data->klasifikasi->nama_klasifikasi;
                }
            ],

          
            [
                'attribute'=>'id_jabatan',
                'label' => 'Diteruskan kepada',
                'format'=>'html',
                'value'=>function($data){
                        return $data->jabatan->nama_jabatan;
                }
            ],

            'instruksi',
            'catatan',

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Aksi',
                'headerOptions' => ['width' => '100'],
                'template' => '{view} {update} {delete} {print}',
                'buttons' => [
                    'print' => function ($url,$model,$key) {
                            return Html::a('print', $url);
                    },
                 ],
            ],
        ],
    ]); ?>

</div>
