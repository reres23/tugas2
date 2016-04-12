<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Klasifikasi */

$this->title = 'Ubah Data Klasifikasi';
$this->params['breadcrumbs'][] = ['label' => 'Klasifikasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_klasifikasi, 'url' => ['view', 'id' => $model->id_klasifikasi]];
$this->params['breadcrumbs'][] = 'Ubah Data';
?>
<div class="klasifikasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'type' => 'update'
    ]) ?>

</div>
