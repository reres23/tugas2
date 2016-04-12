<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AgendaKegiatan */

$this->title = 'Tambah Agenda Kegiatan';
$this->params['breadcrumbs'][] = ['label' => 'Agenda Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-kegiatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
