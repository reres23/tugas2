<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jabatan */

$this->title = 'Detail Data Jabatan ';
$this->params['breadcrumbs'][] = ['label' => 'Data Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('jabatanUpdate')){ ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Data berhasil diubah!</h4>
  </div>

<?php } ?>

<div class="jabatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Data', ['update', 'id' => $model->id_jabatan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id' => $model->id_jabatan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda yakin ingin menghapus data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_jabatan',
            'nama_jabatan',
        ],
    ]) ?>

</div>
