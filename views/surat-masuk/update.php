<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */

$this->title = 'Ubah Surat Masuk';
$this->params['breadcrumbs'][] = ['label' => 'Surat Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_agenda_masuk, 'url' => ['view', 'id' => $model->no_agenda_masuk]];
$this->params['breadcrumbs'][] = 'Ubah Data';
?>
<div class="surat-masuk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'type' =>'update'
    ]) ?>

</div>
