<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Pegawai;
use app\models\DetailDisposisi;

/**
 * This is the model class for table "jabatan".
 *
 * @property integer $id_jabatan
 * @property string $nama_jabatan
 */
class Jabatan extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_jabatan'], 'required'],
            [['nama_jabatan'], 'string', 'max' => '30']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jabatan' => 'Id Jabatan',
            'nama_jabatan' => 'Nama Jabatan',
        ];
    }

    public function getPegawai()
    {
        return $this->hasMany(Pegawai::className(), ['id_posisi' => 'id_jabatan']);
    }

    public function getDisposisi()
    {
        return $this->hasMany(DetailDisposisi::className(), ['no_jabatan' => 'id_jabatan']);
    }



}


