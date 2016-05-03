<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-keluar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'no_agenda_keluar') ?>

    <?= $form->field($model, 'no_surat_keluar') ?>

    <?= $form->field($model, 'tanggal_surat_keluar') ?>

    <?= // $form->field($model, 'tanggal_dikirim') ?>

    <?= $form->field($model, 'klasifikasi') ?>

    <?php $form->field($model, 'tujuan_surat') ?>

    <?php $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'file_surat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
