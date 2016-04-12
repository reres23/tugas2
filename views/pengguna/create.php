<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */

$this->title = 'Tambah Data Pengguna'; // untuk judul form tambah data
$this->params['breadcrumbs'][] = ['label' => 'Data Pengguna', 'url' => ['index']]; //menampilkan view form
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengguna-create">

    <h1><?= Html::encode($this->title) //menampilkan judul ?></h1> 

    <?= $this->render('_form', [ //menunjuk model lalu menjalankan function yang ada di form untuk ditampilkan
        'model' => $model
    ]) ?>

</div>
