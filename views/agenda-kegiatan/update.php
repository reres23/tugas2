<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgendaKegiatan */

$this->title = 'Ubah Data Agenda Kegiatan';
$this->params['breadcrumbs'][] = ['label' => 'Agenda Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kegiatan, 'url' => ['view', 'id' => $model->id_kegiatan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agenda-kegiatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'type' => 'update',
    ]) ?>

</div>
