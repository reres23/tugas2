<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Jabatan;
use app\models\SuratMasuk;
use app\models\Klasfikasi;


/**
 * This is the model class for table "surat_disposisi".
 *
 * @property integer $no_agenda_disposisi
 * @property integer $no_agenda_masuk
 * @property integer $id_jabatan
 * @property integer $id_pengguna
 * @property integer $instruksi
 */
class SuratDisposisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_disposisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_agenda_masuk','tanggal_surat_diterima'], 'required'],
            [['no_agenda_masuk','id_jabatan', 'tanggal_surat_diterima','id_klasifikasi','instruksi','catatan'], 'safe'],
            [['instruksi', 'catatan'], 'string'], 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'no_agenda_disposisi' => 'No Agenda Disposisi',
            // 'no_agenda_masuk' => 'No Agenda Masuk',
            'id_klasifikasi' => 'Perihal Surat',
            'tanggal_surat_diterima' => 'Tanggal Surat Diterima',
            'id_jabatan' => 'Diteruskan ke',
            'instruksi' => 'Instruksi',
            'catatan' => 'Keterangan',
        ];
    }

   
    public function getJabatan()
    {
        return $this->hasOne(Jabatan::className(), ['id_jabatan' => 'id_jabatan']);
    }

     public function getMasuk()
    {
        return $this->hasOne(SuratMasuk::className(), ['no_agenda_masuk' => 'no_agenda_masuk']);
    }

    public function getKlasifikasi()
    {
        return $this->hasOne(Klasifikasi::className(),['id_klasifikasi' => 'id_klasifikasi']);
    }


}
