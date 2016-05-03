<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JabatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Jabatan';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('jabatanSuccess')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil disimpan!</h4>
  </div>

<?php } ?>


<?php if (Yii::$app->session->hasFlash('jabatanDelete')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil hapus!</h4>
  </div>

<?php } ?>

<div class="jabatan-index">

    <h1><?= Html::encode($this->title) // menampilkan judul dalam bentuk html ?></h1> 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data Jabatan', ['create'], ['class' => 'btn btn-success']) ?>
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

            'id_jabatan',
            'nama_jabatan',

            ['class' => 'yii\grid\ActionColumn',

              'header' => 'Aksi',
            'headerOptions' => ['width' => '100'],
            ],

        ],
    ]);

    ?>

</div>
