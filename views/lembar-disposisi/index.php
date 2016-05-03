<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\DetailDisposisi;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LembarDisposisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lembar Disposisi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lembar-disposisi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a('Create Lembar Disposisi', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_agenda_disposisi',
            'instruksi:ntext',
            'catatan:ntext',
            'agenda_masuk',

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


            ['class' => 'yii\grid\ActionColumn',

                'header' => 'Aksi',
                'headerOptions' => ['width' => '100'],

            ],
        ],
    ]); ?>
</div>
