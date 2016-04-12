<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pengguna;
use app\models\SuratMasuk;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\AgendaKegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agenda-kegiatan-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'tanggal_kegiatan')->widget(DatePicker::classname(),[
        'options'=> ['placeholder' => 'pilih tanggal kegiatan'],
            'pluginOptions' =>[
                'autoclose' =>true,
                'format' =>'yyyy-mm--dd'
            ]
        ]);
    ?>
    <?= $form->field($model, 'kegiatan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tempat_kegiatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <label>Pelaksana Kegiatan</label>
        <?= Html::activeDropDownList($model,'id_pengguna', ArrayHelper::map(Pengguna::find()->all(), 'id_pengguna','nama_pengguna'),
        ['class' => 'form-control']) ?>
    </div>


    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

       <div class="form-group">
        <label>Nomor Surat Masuk</label>
        <?= Html::activeDropDownList($model, 'no_agenda_masuk', ArrayHelper::map(SuratMasuk::find()->all(), 'no_agenda_masuk','no_surat_masuk'),
        ['class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
