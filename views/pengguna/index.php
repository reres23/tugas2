<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenggunaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengguna-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data Pengguna', ['create'], ['class' => 'btn btn-success']) ?>
        <!-- menjalankan button tambah data -->
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

            //atribut yang ditampilkan dalam index view
            //'id_pengguna',
            'nama_pengguna',
            'username',
            // 'password',
            //'password_hash',
            // 'auth_key',
            'email:email',
            'status',
            //'foto',
           
            [
                'attribute'=>'id_hak_akses',
                'label' => 'Hak Akses',
                'format'=>'html',
                'value'=>function($data){
                        return $data->akses->nama_hak_akses;
                }
            ],



            //  [
            //     'attribute'=>'foto',
            //     'label' => 'Foto',
            //     'format'=>'html',
            //         'value'=>function($data){
            //             $imageurl = $data->getImageurl();//fungsi ambil dari model
            //             return Html::img($imageurl, ['alt'=>'foto pegawai','width'=>'50','height'=>'50']);
            //         }
            // ],


            //'id_hak_akses',

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'Aksi',
            'headerOptions' => ['width' => '100'],

            ],
        ],
    ]); 

  
    ?>

</div>
