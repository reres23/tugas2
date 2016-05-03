<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Jabatan;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-form">

    <?php $form = ActiveForm::begin(
         [

        'id' => 'useForm',
        'options' => ['enctype' => 'multipart/form-data']
        ]

    ); ?>

    <?= $form->field($model, 'nip_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


     <div class="form-group">
        <label>Jabatan</label>
            <?= Html::activeDropDownList($model,'id_posisi', ArrayHelper::map(Jabatan::find()->all(),'id_jabatan', 'nama_jabatan'),
                //berupa dropdown list, 
                ['class'=>'form-control'])?>
    </div>

     <?= $form->field($model, 'status_pegawai')->dropDownList(['aktif' => 'Aktif', 'nonaktif' => 'Non-aktif'], ['prompt' => '']) ?>

     <?= $form->field($model, 'foto')->FileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah Data' : 'Ubah Data', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
