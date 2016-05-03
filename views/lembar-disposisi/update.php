<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LembarDisposisi */

$this->title = 'Ubah Data Lembar Disposisi: ' . $model->no_agenda_disposisi;
$this->params['breadcrumbs'][] = ['label' => 'Lembar Disposisi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_agenda_disposisi, 'url' => ['view', 'id' => $model->no_agenda_disposisi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lembar-disposisi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'databaru' => $databaru,
     
    ]) ?>

</div>
