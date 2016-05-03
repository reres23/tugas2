<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\RelasiDisposisi;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratDisposisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Disposisi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-disposisi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data Surat Disposisi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_agenda_disposisi',
            'instruksi:ntext',
            'catatan:ntext',

             [
                'attribute'=>'Jabatan',
                'label' => 'Jabatan',
                'format'=>'html',
                'value'=>function($data){
                        $stringJabatan = '';
                        foreach ($data->detail as $key => $detailSingle) {
                            $stringJabatan .= $detailSingle->jabatan[0]->nama_jabatan;
                            if ($key < count($data->detail) - 1) {
                                $stringJabatan .= ", ";
                            }
                        }

                        return $stringJabatan;
                }
            ],

        

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
