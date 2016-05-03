<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\SuratDisposisi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-disposisi-form">

    <?php $form = ActiveForm::begin(); ?>


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
        <?= Html::submitButton($model->isNewRecord ? 'Tambah Data' : 'Ubah Data', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
