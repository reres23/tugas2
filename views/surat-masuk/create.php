<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */

$this->title = 'Tambah Surat Masuk';
$this->params['breadcrumbs'][] = ['label' => 'Surat Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-masuk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
