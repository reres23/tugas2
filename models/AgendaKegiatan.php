<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Pengguna;
use app\models\SuratMasuk;


/**
 * This is the model class for table "agenda_kegiatan".
 *
 * @property integer $id_kegiatan
 * @property string $tanggal_kegiatan
 * @property string $kegiatan
 * @property string $tempat_kegiatan
 * @property integer $id_pengguna
 * @property string $keterangan
 * @property integer $no_agenda_masuk
 */
class AgendaKegiatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agenda_kegiatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kegiatan', 'tempat_kegiatan', 'id_pengguna'], 'required'],
            [['tanggal_kegiatan','id_pengguna','no_agenda_masuk', 'keterangan'], 'safe'],
            [['kegiatan', 'keterangan'], 'string'],
            [['tempat_kegiatan'], 'string', 'max' => 100]
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kegiatan' => 'No.Agenda Kegiatan',
            'tanggal_kegiatan' => 'Tanggal Kegiatan',
            'kegiatan' => 'Kegiatan',
            'tempat_kegiatan' => 'Tempat Kegiatan',
            'id_pengguna' => 'Pelaksana Kegiatan',
            'keterangan' => 'Keterangan',
            'no_agenda_masuk' => 'No.Surat Masuk',
        ];
    }

    public function getPengguna()
    {
        return $this->hasOne(Pengguna::className(), ['id_pengguna' => 'id_pengguna']);
    }

    public function getMasuk()
    {
        return $this->hasOne(SuratMasuk::className(), ['no_agenda_masuk' => 'no_agenda_masuk']);
    }
    
}
