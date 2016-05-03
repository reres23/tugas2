<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Klasifikasi */

$this->title ='Detail Data Klasifikasi';
$this->params['breadcrumbs'][] = ['label' => 'Klasifikasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('klasifikasiSuccess')) { ?>
    <div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
    <h4><i class="icon fa fa-check"></i>Data berhasil disimpan!</h4>
    </div>
<?php } ?>

<?php if (Yii::$app->session->hasFlash('klasifikasiUpdate')) { ?>
    <div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
    <h4> <i class="icon fa fa-check"></i>Data berhasil diubah! </h4>
    </div>
    <?php } ?>

<div class="klasifikasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Data', ['update', 'id' => $model->id_klasifikasi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id' => $model->id_klasifikasi], [
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
            'id_klasifikasi',
            'kode_klasifikasi',
            'nama_klasifikasi',
            'keterangan:ntext',
        ],
    ]) ?>

</div>
