<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use app\models\Klasifikasi;
use yii\helpers\Url;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratMasukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Masuk';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('suratmasukSuccess')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil disimpan!</h4>
  </div>
<?php } ?>

<?php if (Yii::$app->session->hasFlash('suratmasukUpdate')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil diubah!</h4>
  </div>
<?php } ?>

<?php if (Yii::$app->session->hasFlash('suratmasukDelete')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil dihapus!</h4>
  </div>
<?php } ?>


<?php if (Yii::$app->session->hasFlash('gagal')){ ?>
  <div class="alert alert-danger alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Unduh file gagal!</h4>
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

             [
                'attribute'=>'klasifikasi',
                'label' => 'Perihal Surat',
                'format'=>'html',
                'value'=>function($data){
                        return $data->perihal->nama_klasifikasi;
                }
            ],

            [

            'attribute' =>'tanggal_surat_diterima',
            'value' => 'tanggal_surat_diterima',
            'format' => 'raw',
                'filter' =>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'tanggal_surat_diterima',
                        'pluginOptions' =>[
                         'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                        ],
                ]),                
            ],

          
            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Aksi',
                'headerOptions' => ['width' => '150'],
                'template' => '{view} {update} {delete} {download} {add_user} {print}',
                'buttons' => [
                    'download' => function ($url,$model,$key) {
                            return Html::a('<i class="fa fa-download"></i>', $url);
                    },
                   
                    'add_user' => function ($url,$model,$key) {
                            return Html::a('<i class="fa fa-user-plus custom"></i>', $url);
                    },

                    'print' => function ($url, $model, $key) {
                            return Html::a('<i class="fa fa-print"></i>', $url);
                    }
                ],

                'urlCreator' => function ($action, $model, $key, $index)
                {
                    if ($action === 'add_user') {
                        $url = Url::toRoute(['lembar-disposisi/create', 'no_agenda_masuk' => $model->no_agenda_masuk]);
                        return $url;
                    }

                    if ($action == 'print') {
                        $url = Url::toRoute(['lembar-disposisi/print', 'no_agenda_masuk' => $model->no_agenda_masuk]);
                        return $url;
                    }

                    if ($action === 'view') {
                        $url = Url::toRoute(['surat-masuk/view', 'id' => $model->no_agenda_masuk]);
                        return $url;
                    }
                    if ($action === 'update') {
                        $url = Url::toRoute(['surat-masuk/update', 'id' => $model->no_agenda_masuk]);
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = Url::toRoute(['surat-masuk/delete', 'id' => $model->no_agenda_masuk]);
                        return $url;
                    }
                    if ($action === 'download') {
                        $url = Url::toRoute(['surat-masuk/download', 'id' => $model->no_agenda_masuk]);
                        return $url;
                    }
                }
            ],
        ],
    ]); ?>

</div>