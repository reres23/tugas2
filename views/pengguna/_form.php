<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\HakAkses;
// use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengguna-form">

    <?php $form = ActiveForm::begin(
        [
        'id' =>'useForm',
        'options' => ['enctype' => 'multipart/form-data']
        ]
    )?>

    <?= $form->field($model, 'nama_pengguna')->textInput([ //berupa inputan teks
        'placeholder' => $model->getAttributeLabel('nama_pengguna'), //membuat place holder untuk atribut
        'maxlength' => true]) ?>


    <?= $form->field($model, 'username')->textInput([
        'placeholder' => $model->getAttributeLabel('username'),
        'maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput([
        'placeholder' => $model->getAttributeLabel('password'),
        'maxlength' => true]) ?>

    
    <?= $form->field($model, 'email')->textInput([
        'placeholder' => $model->getAttributeLabel('email'),
        'maxlength' => true]) ?>

    <div class="form-group">
        <label>Hak Akses </label>
            <?= Html::activeDropDownList($model,'id_hak_akses', ArrayHelper::map(HakAkses::find()->all(),'id_hak_akses', 'nama_hak_akses'),
                //berupa dropdown list, 
                ['class'=>'form-control'])?>
    </div>


    <?= $form->field($model, 'status')->dropDownList(['aktif' => ' Aktif', 'nonaktif' => 'Non Aktif'], ['prompt' => '']) ?>

     <?= $form->field($model, 'foto')->FileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
