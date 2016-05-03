<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LembarDisposisiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lembar-disposisi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'no_agenda_disposisi') ?>

    <?= $form->field($model, 'instruksi') ?>

    <?= $form->field($model, 'catatan') ?>

  <!--   <?= $form->field($model, 'agenda_masuk') ?> -->

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
