<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */

$this->title = 'Ubah Data Pengguna';
$this->params['breadcrumbs'][] = ['label' => 'Data Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah Data';
?>
<div class="pengguna-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
        'hak_akses' => $hak_akses,        
    ]) ?>

</div>
