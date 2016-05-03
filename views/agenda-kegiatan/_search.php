<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgendaKegiatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agenda-kegiatan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_kegiatan') ?>

    <?= $form->field($model, 'tanggal_kegiatan') ?>

    <?= $form->field($model, 'kegiatan') ?>

    <?= $form->field($model, 'tempat_kegiatan') ?>

    <?php // $form->field($model, 'id_pegawai') ?>

    <?php $form->field($model, 'keterangan') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
