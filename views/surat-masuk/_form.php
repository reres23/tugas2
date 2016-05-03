<?php

use yii\helpers\Html; //menampilkan dalam bentuk html
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\models\Klasifikasi;



/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-masuk-form">

     <?php $form = ActiveForm::begin(
         [
           'options' =>['enctype' => 'multipart/form-data'] //file yang diupload dalam bentuk multipart form
        ]

     ) ?>

    <?= $form->field($model, 'no_surat_masuk')->textInput(['maxlength' => true]) ?>
    <?php //mo ?>
    

    <?= $form->field($model, 'tanggal_surat_masuk')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'pilih tanggal surat masuk'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    
    <?= $form->field($model,'tanggal_surat_diterima')->widget(DatePicker::classname(), [
        'options' =>['placeholder' => 'pilih tanggal surat diterima'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
        ]);?>

    <div class="form-group">
        <label>Perihal Surat </label>
            <?= Html::activeDropDownList($model,'klasifikasi', ArrayHelper::map(Klasifikasi::find()->all(),'id_klasifikasi', 'nama_klasifikasi'),
                //berupa dropdown list, 
                ['class'=>'form-control'])?>
    </div>


    <?= $form->field($model, 'jenis_surat')->dropDownList(['surat khusus' => 'Surat khusus', 'surat umum' => 'Surat umum'], ['prompt' => '']) ?>

    <?= $form->field($model, 'asal_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file_surat')->FileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
