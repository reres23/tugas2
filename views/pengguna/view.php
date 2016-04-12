<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\HakAkses;

/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */

$this->title = 'Detail Data Pengguna ';
$this->params['breadcrumbs'][] = ['label' => 'Data Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengguna-view">

    <h1><?= Html::encode($this->title) //memanggil judul dalam bentuk html ?></h1>

    <p>
        <?= Html::a('Ubah Data', ['update', 'id' => $model->id_pengguna], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id' => $model->id_pengguna], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => "Apakah Anda yakin ingin menghapus data ini ?",
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        //atribut yang ditampilkan dalam detail view
           // 'id_pengguna',
            'nama_pengguna',
            'username',
            'password',
            'password_hash',
            'auth_key',
            'email:email',
            
            [                      // the owner name of the model
                'label' => 'Hak Akses',
                'value' => $model->akses->nama_hak_akses
             ],
            'status',

            [
                'attribute'=>'Foto',
                'value'=>$model->foto,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],

           


        ],


    ])
     
    ?>



    

</div>
