<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Klasifikasi;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */

$this->title ='Detail Data Surat Keluar';
$this->params['breadcrumbs'][] = ['label' => 'Surat Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-keluar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Data', ['update', 'id' => $model->no_agenda_keluar], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id' => $model->no_agenda_keluar], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda yakin ingin menghapus data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p><!--    <?php
function TanggalIndo($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;     
    return($result);
}
?>
<?php echo TanggalIndo($model->tanggal_dikirim)?> -->
 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_agenda_keluar',
            'no_surat_keluar',
            'tanggal_surat_keluar',
            'tanggal_dikirim',

             [                      
                'label' => 'Klasifikasi Surat',
                'value' => $model->perihal->nama_klasifikasi
             ],
             
            'tujuan_surat',
            'keterangan:ntext',
            'file_surat',

        ],


        
           
    ]) ?>

</div>
