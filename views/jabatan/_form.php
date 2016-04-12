<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jabatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jabatan-form">

    <?php $form = ActiveForm::begin(); //form html yang interaktif untuk 1 atau lebih data model ?> 
    <? //fungsi begin() menunjukkan jika form tersebut dimulai ?>

    <?= $form->field($model, 'nama_jabatan')->textInput(['maxlength' => true]) ?>
    <? // form tersebut berisi filed nama jabatan yang diambil dari $model,dengan format inputan berupa text?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    
        <? //button ini berfungsi sebagai submit file yang berisi data darii model ke dalam bentuk html, meliputi button ubah dan tambah  ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
