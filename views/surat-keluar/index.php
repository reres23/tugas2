<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use kartik\date\DatePicker;
use app\models\Klasifikasi;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratKeluarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Keluar';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('suratkeluarSuccess')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil disimpan!</h4>
  </div>

<?php } ?>

<?php if (Yii::$app->session->hasFlash('suratkeluarUpdate')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil diubah!</h4>
  </div>

<?php } ?>

<?php if (Yii::$app->session->hasFlash('suratkeluarDelete')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil dihapus!</h4>
  </div>

<?php } ?>

<?php if(Yii::$app->session->hasFlash('gagal')) { ?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
        <h4><i class="icon fa fa-check"></i>Unduh file gagal!</h4>
    </div>
<?php } ?>

<div class="surat-keluar-index">


    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Surat Keluar', ['create'], ['class' => 'btn btn-success']) ?>
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

            'no_agenda_keluar',
            'no_surat_keluar',
            
            // [
            // 'attribute' =>'tanggal_surat_keluar',
            // 'value' => 'tanggal_surat_keluar',
            // 'format' => 'raw',
            // 'filter' =>DatePicker::widget([
            //         'model' => $searchModel,
            //         'attribute' => 'tanggal_surat_keluar',
            //             'pluginOptions' =>[
            //              'autoclose' => true,
            //                 'format' => 'yyyy-mm-dd',
            //             ],
            // ]),

            // ],    

            //'tanggal_dikirim',
            'tujuan_surat',
            // 'file_surat',

            [
                'attribute'=>'klasifikasi',
                'label' => 'Perihal Surat',
                'format'=>'html',
                'value'=>function($data){
                        return $data->perihal->nama_klasifikasi;
                }
            ],

            'keterangan:ntext',            
            

            ['class' => 'yii\grid\ActionColumn',

            'header' => 'Aksi',
            'headerOptions' => ['width' => '100'],
            'template' => '{view} {update} {delete} {download}',
                'buttons' => [
                     'download'=> function ($url, $model, $key) {
                         return Html::a('<i class="fa fa-download"></i>', $url);
                    },
                  ],
            
            ],


        ],
    ]); ?>

</div>
