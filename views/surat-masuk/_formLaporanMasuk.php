<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

$form = ActiveForm::begin();
?>

<?= $form->field($model, 'tanggalAwal')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'pilih tanggal awal'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
]); ?>

<?= $form->field($model, 'tanggalAkhir')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'pilih tanggal akhir'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
]); ?>

<?= $form->field($model, 'jenisSurat')->dropDownList($jenisSurat); ?>

<div class="form-group">
    <?= Html::submitButton('Cetak', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>