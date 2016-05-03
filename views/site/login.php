<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
        <!--    <?php echo Html::img('@web/gambar/smk.png', ['class' => 'img responsive', 'width' => '160px', 'height' => '175px','align' => 'center']); ?> <br> -->
     
   <!--    <h1><?= Html::encode($this->title) ?></h1>

    <p>Silakan login dengan username dan password Anda  </p> -->

   
    <?php $form = ActiveForm::begin([
         'id' => 'login-form',
        //  'options' => ['class' => 'vertical-horizontal'],
        // 'fieldConfig' => [
        //     'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        //     'labelOptions' => ['class' => 'col-lg-1 control-label'],
        // ],
    ]); ?>

    <!--memperbaiki tampilan login-->
    <!--dalam bentuk otomatis sesuai template-->

      <?= Yii::$app->session->getFlash('loginError')  //untuk memanggil error ?> 

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>


        <div class="form-group">
            <div class="col-lg-offset-0 col-lg-25">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

  
    
</div>
