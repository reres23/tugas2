<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord; //untuk aktive record database
use yii\web\IdentityInterface;//untuk tampilan
use yii\helpers\Html;//menampilkan file dalam bentuk html
use yii\helpers\Url;
use app\models\AgendaKegiatan;
use app\models\Klasifikasi;




/**
 * This is the model class for table "surat_masuk".
 *
 * @property integer $no_agenda_masuk
 * @property string $no_surat_masuk
 * @property string $tanggal_surat_masuk
 * @property string $tanggal_surat_diterima
 * @property string $perihal_surat
 * @property string $jenis_surat
 * @property string $asal_surat
 * @property string $tujuan_surat
 * @property string $keterangan
 * @property string $file_surat
 */
class SuratMasuk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName() //fngsi name tabel yang digunakan
    {
        return 'surat_masuk'; //tabel yang digunakan
    }

    /**
     * @inheritdoc
     */
    public function rules() //yang dapat diisi dan ditampilkan datanya
    //required -->yang diminta ditampilkan ke dalam form
    {
        return [
            [['no_surat_masuk', 'tanggal_surat_masuk', 'tanggal_surat_diterima', 'id_klasifikasi', 'jenis_surat', 'asal_surat', 'tujuan_surat'], 'required'],
            [['id_klasifikasi','tanggal_surat_masuk', 'tanggal_surat_diterima','keterangan','file_surat'], 'safe'],
            [['jenis_surat', 'keterangan'], 'string'], 
            [['no_surat_masuk', 'asal_surat', 'tujuan_surat', 'file_surat'], 'string', 'max' => 50],
            [['file_surat'],'file'], //diminta dalam bentuk file
        ];  
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [ //penamaan atribut 
            'no_agenda_masuk' => 'No Agenda Masuk',
            'no_surat_masuk' => 'No Surat Masuk',
            'tanggal_surat_masuk' => 'Tanggal Surat Masuk',
            'tanggal_surat_diterima' => 'Tanggal Surat Diterima',
            'id_klasifikasi' => 'Klasifikasi Surat',
            'jenis_surat' => 'Jenis Surat',
            'asal_surat' => 'Asal Surat',
            'tujuan_surat' => 'Tujuan Surat',
            'keterangan' => 'Keterangan',
            'file_surat' => 'File',
        ];
    }

    public function getKegiatan()
    {
        return $this->hasMany(AgendaKegiatan::className(),['no_agenda_masuk' => 'no_agenda_masuk']);
    }

    public function getDisposisi()
    {
        return $this->hasOne(SuratMasuk::className(),['no_agenda_masuk' => 'no_agenda_masuk']);
    }

     public function getKlasifikasi()
    {
        return $this->hasOne(Klasifikasi::className(),['id_klasifikasi' => 'id_klasifikasi']);
    }



 
}
