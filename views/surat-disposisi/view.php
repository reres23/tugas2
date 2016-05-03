<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\RelasiDisposisi;
use app\models\Jabatan;

/* @var $this yii\web\View */
/* @var $model app\models\SuratDisposisi */

$this->title = $model->no_agenda_disposisi;
$this->params['breadcrumbs'][] = ['label' => 'Surat Disposisi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-disposisi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Data', ['update', 'id' => $model->no_agenda_disposisi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id' => $model->no_agenda_disposisi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_agenda_disposisi',
            // 'agenda_masuk',

           
             //  [                   
             //    'label' => 'Diteruskan Kepada',
             //    // 'value' => $model->detail->jabatan->nama_jabatan
             // ],

            'instruksi:ntext',
            'catatan:ntext',
        ],
    ]) ?>

</div>
