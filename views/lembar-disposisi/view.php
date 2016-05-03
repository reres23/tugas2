<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LembarDisposisi */

$this->title = $model->no_agenda_disposisi;
$this->params['breadcrumbs'][] = ['label' => 'Lembar Disposisi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lembar-disposisi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Data', ['update', 'id' => $model->no_agenda_disposisi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id' => $model->no_agenda_disposisi], [
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
            'no_agenda_disposisi',
            'instruksi:ntext',
            'catatan:ntext',
            // 'agenda_masuk',

            //  [
            //     'attribute'=>'Jabatan',
            //     'label' => 'Jabatan',
            //     'format'=>'html',
            //     'value'=>function($data){

            //             $stringJabatan = '';
            //             foreach ($data->detail as $key => $detailSingle) {
            //                 $stringJabatan .= $detailSingle->jabatan[0]->nama_jabatan;
            //                 if ($key < count($data->detail) - 1) {
            //                     $stringJabatan .= ", ";
            //                 }
            //             }

            //             return $stringJabatan;
            //     }
            // ],

        ],
    ]) ?>

</div>
