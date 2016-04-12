<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SuratDisposisi */

$this->title = 'Ubah Data Surat Disposisi';
$this->params['breadcrumbs'][] = ['label' => 'Surat Disposisi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_agenda_disposisi, 'url' => ['view', 'id' => $model->no_agenda_disposisi]];
$this->params['breadcrumbs'][] = 'Ubah Data';
?>
<div class="surat-disposisi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'type' => 'update'
    ]) ?>

</div>
