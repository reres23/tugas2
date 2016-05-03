<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SuratDisposisi */

$this->title = 'Tambah Data Surat Disposisi';
$this->params['breadcrumbs'][] = ['label' => 'Surat Disposisi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-disposisi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'databaru'=>$databaru,
    ]) ?>

</div>
