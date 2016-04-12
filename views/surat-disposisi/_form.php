<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Jabatan;
use app\models\SuratMasuk;
use app\models\Klasifikasi;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\SuratDisposisi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-disposisi-form">

    <?php $form = ActiveForm::begin(
        [
            'options' =>['enctype' => 'multipart/form-data']
        ]

    ); ?>

     <div class="form-group">
        <label>Nomor Surat </label>
        <?= Html::activeDropDownList($model,'no_agenda_masuk', ArrayHelper::map(SuratMasuk::find()->all(),'no_agenda_masuk','no_surat_masuk'),
        ['class' =>'form-control']) ?>
    </div>

     <div class="form-group">
        <label>Asal Surat</label>
        <?= Html::activeDropDownList($model,'no_agenda_masuk', ArrayHelper::map(SuratMasuk::find()->all(),'no_agenda_masuk','asal_surat'),
        ['class' =>'form-control']) ?>
    </div>

  <?= $form->field($model,'tanggal_surat_diterima')->widget(DatePicker::classname(), [
        'options' =>['placeholder' => 'pilih tanggal surat diterima'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
        ]);?>

     <div class="form-group">
        <label>Perihal Surat </label>
        <?= Html::activeDropDownList($model,'id_klasifikasi', ArrayHelper::map(Klasifikasi::find()->all(),'id_klasifikasi','nama_klasifikasi'),
        ['class' =>'form-control']) ?>
    </div>

   
    <div class="form-group">
        <label> Jabatan</label>
        <?php foreach ($databaru as $row) { ?>
           <div>
                <input name="jabatan[]" type="checkbox" value="<?=$row->id_jabatan?>"> <?= $row->nama_jabatan ?>
           </div>
      <?php  } ?>
    </div>


    <?= $form->field($model, 'instruksi')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'catatan')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
