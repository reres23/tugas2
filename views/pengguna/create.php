<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */

$this->title = 'Tambah Data Pengguna';
$this->params['breadcrumbs'][] = ['label' => 'Data Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengguna-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'hak_akses' => $hak_akses,
    ]) ?>

</div>
