<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Klasifikasi */

$this->title = 'Tambah Klasifikasi';
$this->params['breadcrumbs'][] = ['label' => 'Klasifikasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klasifikasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
