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
use app\models\LembarDisposisi;




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
    public static function tableName() //fungsi name tabel yang digunakan
    {
        return 'surat_masuk'; //tabel yang digunakan
    }

    /**
     * @inheritdoc
     */
    public function rules() //yang dapat diisi dan ditampilkan datanya
    //required -->yang diminta ditampilkan ke dalam form
    //validasi data
    {
        return [
            [['no_surat_masuk', 'tanggal_surat_masuk', 'tanggal_surat_diterima', 'klasifikasi', 'jenis_surat', 'asal_surat'], 'required'],
            [['klasifikasi','tanggal_surat_masuk', 'tanggal_surat_diterima','keterangan','file_surat'], 'safe'],
            [['jenis_surat', 'keterangan'], 'string', 'message' => 'tidak boleh kosong'], 
            [['no_surat_masuk', 'asal_surat', 'file_surat'], 'string', 'max' => '50'],
            [['file_surat'],'file','extensions' => ['zip', 'doc', 'png', 'jpg']],
            [['klasifikasi'], 'exist', 'skipOnError' => true, 'targetClass' => Klasifikasi::className(), 'targetAttribute' => ['klasifikasi' => 'id_klasifikasi']],
        ];  
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [ //penamaan atribut untuk index,view,form,update
            'no_agenda_masuk' => 'No Agenda Masuk',
            'no_surat_masuk' => 'No Surat Masuk',
            'tanggal_surat_masuk' => 'Tanggal Surat Masuk',
            'tanggal_surat_diterima' => 'Tanggal Surat Diterima',
            'klasifikasi' => 'Klasifikasi Surat',
            'jenis_surat' => 'Jenis Surat',
            'asal_surat' => 'Asal Surat',
            'keterangan' => 'Keterangan',
            'file_surat' => 'File',
        ];
    }

    // public function behaviors() 
    // {
    //     return [
    //              [
    //                 'class' => 'mdm\converter\DateConverter',
    //                 'type' => 'date', // 'date', 'time', 'datetime'
    //                 'logicalFormat' => 'php:dd-mm-yyyy', // default to locale format
    //                 'physicalFormat' => 'php:yyyy-mm-dd', // database level format, default to 'Y-m-d'
    //                 'attributes' => [
    //                     'local_date' => 'date', 
    //                 ],
    //              ],
    //     ];
    // }


   
    public function getDisposisi()
    {
        return $this->hasOne(LembarDisposisi::className(),['agenda_masuk' => 'no_agenda_masuk']);
    }

     public function getPerihal()
    {
        return $this->hasOne(Klasifikasi::className(),['id_klasifikasi' => 'klasifikasi']);
    }



 
}
