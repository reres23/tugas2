<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Pegawai; 



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
    { //untuk validasi
        return [
            [['kegiatan', 'tempat_kegiatan', 'id_pegawai','tanggal_kegiatan'], 'required'], 
            //atribut yang harud diisi
            //untuk memastikan user menginput file tertentu
            [['keterangan'], 'safe'],
            //atribut yang tidak harus di isi
            //untuk menskip validasi, artinya data inputan tidak divalidasi
            [['kegiatan', 'keterangan'], 'string'],
            //harus bentuk string
            //untuk mengecek apakah inputan user bertipe string atau tidak
            [['tempat_kegiatan'], 'string', 'max' => 100],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['id_pegawai' => 'nip_pegawai']],
        
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kegiatan'      => 'No.Agenda Kegiatan',
            'tanggal_kegiatan' => 'Tanggal Kegiatan',
            'kegiatan'         => 'Kegiatan',
            'tempat_kegiatan'  => 'Tempat Kegiatan',
            'id_pegawai'       => 'Pelaksana Kegiatan',
            'keterangan'       => 'Keterangan',
          
        ];
    }

    public function getPegawai() //relasi dengan tabel pegawai untuk memanggil naama pegawai
    {
        return $this->hasOne(Pegawai::className(), ['nip_pegawai' => 'id_pegawai']);
    }

    //nip pegawai yang ada di tabel pegawai
    //id pegawai yang ada di tabel agenda

  
    
    
}
