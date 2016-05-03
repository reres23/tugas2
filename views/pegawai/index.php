<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use app\models\Jabatan;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('pegawaiSuccess')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil disimpan!</h4>
  </div>

<?php } ?>

<?php if (Yii::$app->session->hasFlash('pegawaiUpdate')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil diubah!</h4>
  </div>

<?php } ?>

<?php if (Yii::$app->session->hasFlash('pegawaiDelete')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil dihapus!</h4>
  </div>

<?php } ?>

<div class="pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <p>
        <?= Html::a('Tambah Data Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
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

            'nip_pegawai',
            'nama_pegawai',
            'email:email',
            'status_pegawai',
    
            // 'foto',
            // 'id_posisi',

             [
                'attribute' =>'id_posisi',
                'label' => 'Jabatan',
                'format' => 'html',
                'value' => function($data) {
                    return $data->posisi->nama_jabatan;
                }
            ],


            

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Aksi',
                'headerOptions' => ['width' => '100'],
                'template' => '{view} {update} {delete} {add_user}',
                'buttons' => [
                    'add_user' => function ($url,$model,$key) {
                            return Html::a('<i class="fa fa-user-plus custom"></i>', $url);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index)
                {
                    if ($action === 'add_user') {
                        $url = Url::toRoute(['pengguna/create', 'nip_pegawai' => $model->nip_pegawai]);
                        return $url;
                    }
                    if ($action === 'view') {
                        $url = Url::toRoute(['pegawai/view', 'id' => $model->nip_pegawai]);
                        return $url;
                    }
                    if ($action === 'update') {
                        $url = Url::toRoute(['pegawai/update', 'id' => $model->nip_pegawai]);
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = Url::toRoute(['pegawai/delete', 'id' => $model->nip_pegawai]);
                        return $url;
                    }
                }
            ],
        ],
    ]); ?>
</div>
