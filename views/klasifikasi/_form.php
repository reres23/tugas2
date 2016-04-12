<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Klasifikasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="klasifikasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_klasifikasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_klasifikasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
