<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\SuratMasuk;
use app\models\SuratKeluar;
use app\models\Klasifikasi;

/**
 * This is the model class for table "klasifikasi".
 *
 * @property integer $id_klasifikasi
 * @property string $kode_klasifikasi
 * @property string $nama_klasifikasi
 * @property string $keterangan
 */
class Klasifikasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'klasifikasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_klasifikasi', 'nama_klasifikasi', 'keterangan'], 'required'],
            [['keterangan'], 'string'],
            [['kode_klasifikasi'], 'string', 'max' => 30],
            [['nama_klasifikasi'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_klasifikasi' => 'Id Klasifikasi',
            'kode_klasifikasi' => 'Kode Klasifikasi',
            'nama_klasifikasi' => 'Nama Klasifikasi',
            'keterangan' => 'Keterangan',
        ];
    }


     public function getMasuk()
    {
        return $this->hasMany(SuratMasuk::className(),['id_klasifikasi' => 'id_klasifikasi']);
    }

     public function getKeluar()
    {
        return $this->hasMany(SuratKeluar::className(),['id_klasifikasi' => 'id_klasifikasi']);
    }

    public function getDisposisi() 
    {
        return $this->hasMany(SuratDisposisi::className(), ['id_klasifikasi' => 'id_klasifikasi']);
    }


}
