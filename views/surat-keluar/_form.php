<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\models\Klasifikasi;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-keluar-form">

    <?php $form = ActiveForm::begin(
        [   'id' =>'useForm',
            'options' => ['enctype' => 'multipart/form-data']
        ]

    ) ?>

    <?= $form->field($model, 'no_surat_keluar')->textInput() ?>

    <?= $form->field($model,'tanggal_surat_keluar')->widget(DatePicker::classname(),[
        'options' => ['placeholder' => 'pilih tanggal surat keluar'],
            // 'convertFormat' => true,
            // 'value' => date('yyyy-mm-dd'),
            // 'type' => DatePicker::TYPE_COMPONENT_APPEND,
             'pluginOptions' =>[
                // 'language' => 'id',
                'autoclose' =>true,
                'format' => 'yyyy-mm-dd',
            ]
        ]);
    ?>
    

    <?= $form->field($model, 'tanggal_dikirim')->widget(DatePicker::classname(),[
        'options' => ['placeholder' => 'pilih tanggal surat dikirim'],
            'pluginOptions' =>[
                'autoclose'=> true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
        ?>

    <div class="form-group">
        <label>Perihal Surat </label>
            <?= Html::activeDropDownList($model,'klasifikasi', ArrayHelper::map(Klasifikasi::find()->all(),'id_klasifikasi', 'nama_klasifikasi'),
                //berupa dropdown list, 
                ['class'=>'form-control'])?>
    </div>
  
    <?= $form->field($model, 'tujuan_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file_surat')->FileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
