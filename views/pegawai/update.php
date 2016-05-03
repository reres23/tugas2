<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = 'Ubah Data Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Data Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nip_pegawai, 'url' => ['view', 'id' => $model->nip_pegawai]];
$this->params['breadcrumbs'][] = 'Ubah Data';
?>
<div class="pegawai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'type' => 'update',
    ]) ?>

</div>
