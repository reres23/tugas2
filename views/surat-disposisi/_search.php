<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratDisposisiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-disposisi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'no_agenda_disposisi') ?>

    <?= $form->field($model, 'no_agenda_masuk') ?>
    
    <?= $form->field($model, 'tanggal_surat_diterima') ?>

    <?= $form->field($model, 'id_jabatan') ?>

    <?= $form->field($model, 'id_klasifikasi') ?>

    <?= $form->field($model, 'instruksi') ?>

     <?= $form->field($model, 'catatan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
