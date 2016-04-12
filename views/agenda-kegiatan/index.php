<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgendaKegiatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agenda Kegiatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-kegiatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Agenda Kegiatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
        <?php
            echo LinkPager::widget([
                'pagination' => $dataProvider->pagination,
            ]);
        ?>
        
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_kegiatan'
            [

            'attribute' =>'tanggal_kegiatan',
            'value' => 'tanggal_kegiatan',
            'format' => 'raw',

            'filter' =>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'tanggal_kegiatan',

                    'pluginOptions' =>[
                         ' autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                           
                        ],
            ]),                
            ],

            'kegiatan:ntext',
            'tempat_kegiatan',

            [
                'attribute' => 'id_pengguna',
                'label' => 'Pelaksana Kegiatan',
                'format' => 'html',
                'value' => function($data) {
                    return $data->pengguna->nama_pengguna;
                }
            ],

            //'keterangan:ntext',


            [
                'attribute' => 'no_agenda_masuk',
                'label' => 'Nomor Surat Masuk',
                'format' => 'html',
                'value' => function($data) {
                   return $data->masuk->no_surat_masuk;
               }
            ],



            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Aksi',
                'headerOptions' => ['width' => '100']
            ],
        ],
    ]); ?>

</div>
