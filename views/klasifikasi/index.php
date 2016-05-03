<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KlasifikasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Klasifikasi';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('klasifikasiDelete')) { ?>
    <div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
    <h4> <i class="icon fa fa-check"></i>Data berhasil dihapus!</h4>
    </div>
<?php } ?>

<div class="klasifikasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Klasifikasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
     echo LinkPager::widget([
        'pagination'=> $dataProvider->pagination,
            ]);
?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_klasifikasi',
            'kode_klasifikasi',
            'nama_klasifikasi',
            'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn',

                'header' => 'Aksi',
                'headerOptions' => ['width' => '100'],
            ],
        ],
    ]); ?>

</div>
