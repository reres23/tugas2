<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use kartik\date\DatePicker;
use app\models\Klasifikasi;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratMasukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Masuk';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('gagal')){ ?>
  <div class="alert alert-danger alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Gagal!</h4>
  </div>
<?php } ?>

<div class="surat-masuk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Surat Masuk', ['create'], ['class' => 'btn btn-success']) ?>
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

            'no_agenda_masuk',
            'no_surat_masuk',
            'jenis_surat',
            'asal_surat',
            'tujuan_surat',

             [
                'attribute'=>'id_klasifikasi',
                'label' => 'Klasifikasi',
                'format'=>'html',
                'value'=>function($data){
                        return $data->klasifikasi->nama_klasifikasi;
                }
            ],

            // [

            // 'attribute' =>'tanggal_surat_diterima',
            // 'value' => 'tanggal_surat_diterima',
            // 'format' => 'raw',
            //     'filter' =>DatePicker::widget([
            //         'model' => $searchModel,
            //         'attribute' => 'tanggal_surat_diterima',
            //             'pluginOptions' =>[
            //              'autoclose' => true,
            //                 'format' => 'yyyy-mm-dd',
            //             ],
            //     ]),                
            // ],

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Aksi',
                'headerOptions' => ['width' => '100'],
                'template' => '{view} {update} {delete} {download}',
                'buttons' => [
                    'download' => function ($url,$model,$key) {
                            return Html::a('<i class="fa fa-download"></i>', $url);
                    },
                 ],
            ],
        ],
    ]); ?>

</div>
