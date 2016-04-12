<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */

$this->title = 'Ubah Data Pengguna'; //membuat judul untuk update
$this->params['breadcrumbs'][] = ['label' => 'Data Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pengguna, 'url' => ['view', 'id' => $model->id_pengguna]];
$this->params['breadcrumbs'][] = 'Ubah Data';
?>
<div class="pengguna-update">

    <h1><?= Html::encode($this->title) //memanggil judul dalam bentuk html?></h1> 

    <?= $this->render('_form', [ //menunjuk model agar menjalankan form
        'model' => $model,
        'type' =>'update',
    ]) ?>

</div>
