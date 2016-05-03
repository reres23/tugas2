<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Jabatan;
use app\models\AgendaKegiatan;
use yii\web\UploadedFile;
use app\models\Pengguna;
use app\models\User;
/**
 * This is the model class for table "pegawai".
 *
 * @property string $nip_pegawai
 * @property string $nama_pegawai
 * @property string $email
 * @property string $status
 * @property string $foto
 * @property integer $id_posisi
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * @inheritdoc
     */

    public $file;

    public function rules()
    {
        return [
            [['nip_pegawai', 'nama_pegawai', 'email', 'id_posisi', 'status_pegawai'], 'required'],
            [['nip_pegawai', 'id_posisi','foto'], 'safe'],
            [['status_pegawai'], 'string'],
            [['nama_pegawai'], 'string', 'max' => '100'],
            [['email', 'foto'], 'string', 'max' => 255],
            [['foto'], 'file','extensions' => ['png', 'jpg'], 'maxSize' => 1024 * 1024],
            [['id_posisi'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['id_posisi' => 'id_jabatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip_pegawai' => 'Nip Pegawai',
            'nama_pegawai' => 'Nama Pegawai',
            'email' => 'Email',
            'foto' => 'Foto',
            'id_posisi' => 'Jabatan',
            'status_pegawai' => 'Status Pegawai',
        ];
    }

     public function getPosisi()
    {
        return $this->hasOne(Jabatan::className(), ['id_jabatan' => 'id_posisi']);
    }

    public function getAgenda()
    {
        return $this->hasMany(AgendaKegiatan::className(), ['id_pegawai' => 'nip_pegawai']);
    }

     public function getPengguna()
    {
        return $this->hasOne(User::className(), ['nip' => 'nip_pegawai']);
    }

    public function getImagelogout()
    {
        return $this->hasOne(User::className(), ['nip' => 'nip_pegawai']);
    }



    public function getImageurl()
    {
        return Url::to('@web/' . $this->foto, true);
    }

}
