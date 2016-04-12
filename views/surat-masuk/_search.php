
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasukSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-masuk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'no_agenda_masuk') ?>

    <?= $form->field($model, 'no_surat_masuk') ?>

    <?= $form->field($model, 'tanggal_surat_masuk') ?>

    <?= $form->field($model, 'tanggal_surat_diterima') ?>

    <?= $form->field($model, 'id_klasifikasi') ?>

    <?=$form->field($model, 'jenis_surat') ?>

    <?= $form->field($model, 'asal_surat') ?>

    <?=$form->field($model, 'tujuan_surat') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'file_surat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
