<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
// use app\models\Klasifikasi;


$form = ActiveForm::begin();
?>
<?= $form->field($model,'tanggalAwal')->widget(DatePicker::className(),[
	'options' => ['placeholder' => 'pilih tanggal awal'],
	'pluginOptions'=>[
	'autoclose' =>true,
	'format' =>'yyyy-mm-dd']
	]);
	?>

<?= $form->field($model,'tanggalAkhir')->widget(DatePicker::className(),[
	'options' => ['placeholder' => 'pilih tanggal akhir'], 
	'pluginOptions' =>[
	'autoclose' => true,
	'format' => 'yyyy-mm-dd']
]);
?>
 

<!-- <div class="form-group"> -->
<!-- <label>Klasifikasi Surat </label>
 --><!-- Html::activeDropDownList($model, 'id_klasifikasi', ArrayHelper::map(Klasifikasi::find()->all(),'id_klasifikasi', 'nama_klasifikasi'), -->
<!-- ['class' => 'form-control']) ?> -->
<!-- </div> -->

<div class="form-group">

      <?= Html::submitButton('Cetak', ['class' => 'btn btn-primary']) ?>
     
</div>

<?php ActiveForm::end() ?>

