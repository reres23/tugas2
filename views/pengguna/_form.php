<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengguna-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'password_ulang')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hak_akses')->dropDownList($hak_akses) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->id ? 'Ubah Data' : 'Tambah Data' , ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
