<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title="Ubah Password";

?>
<?php if (Yii::$app->session->hasFlash('oldPasswordSuccess')){?>
<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Selamat password Anda telah berhasil dirubah!
                  </div>
<?php } else { ?>
<?php if(isset($false_password)){ ?>
<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>Maaf password yang Anda masukkan salah!</p>
                  </div>
<?php 
}
}
?>

<?php $form = ActiveForm::begin([
    'id' => 'change-password-form',
]); ?>
  
    <div class="form-group">
      	<?= $form->field($model, 'password_lama')
      	->label('Password Lama')
      	->passwordInput(['placeholder'=>'masukkan password lama Anda','class'=>'form-control placeholder-no-fix']) ?>
       	<?= $form->field($model, 'password')
       	->label('Password Baru')
       	->passwordInput(['placeholder'=>'masukkan password baru Anda','class'=>'form-control placeholder-no-fix']) ?>

        <?= $form->field($model, 'password_ulang')
        ->label('Ulangi Password')
        ->passwordInput(['placeholder'=>'silakan ulangi password baru Anda','class'=>'form-control placeholder-no-fix']) ?>

        <?= Html::submitButton('simpan', ['class' => 'btn btn-success', 'name' => 'save-button']) ?>
    </div>
                          
<?php ActiveForm::end(); ?>
