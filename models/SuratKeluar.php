<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Klasifikasi;

/**
 * This is the model class for table "surat_keluar".
 *
 * @property integer $no_agenda_keluar
 * @property integer $no_surat_keluar
 * @property string $tanggal_surat_keluar
 * @property string $tanggal_dikirim
 * @property string $perihal_surat
 * @property string $tujuan_surat
 * @property string $keterangan
 * @property string $file_surat
 */
class SuratKeluar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_keluar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_surat_keluar', 'tanggal_surat_keluar', 'klasifikasi', 'tujuan_surat'], 'required'],
    // 'message' => 'tidak boleh kosong'
            [['tanggal_dikirim','keterangan','file_surat'], 'safe'],
            [['keterangan'], 'string'],
            [['tanggal_dikirim','tanggal_surat_keluar'], 'date'],
            [['no_surat_keluar'], 'string', 'max' => '50'],
            [['tujuan_surat', 'file_surat'], 'string', 'max' =>'50'],
            [['file_surat'],'file', 'extensions' => ['zip', 'doc','jpg', 'png']],
         ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'no_agenda_keluar' => 'No.Agenda Keluar',
            'no_surat_keluar' => 'No.Surat Keluar',
            'tanggal_surat_keluar' => 'Tanggal Surat Keluar',
            'tanggal_dikirim' => 'Tanggal Dikirim',
            'klasifikasi' => 'Perihal Surat',
            'tujuan_surat' => 'Tujuan Surat',
            'keterangan' => 'Keterangan',
            'file_surat' => 'File Surat',
        ];
    }

     public function getPerihal()
    {
        return $this->hasOne(Klasifikasi::className(),['id_klasifikasi' => 'klasifikasi']);
    }

}
