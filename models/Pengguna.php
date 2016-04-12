<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\HakAkses;
use app\models\AgendaKegiatan;

/**
 * This is the model class for table "pengguna".
 *
 * @property integer $id_pengguna
 * @property string $nama_pengguna
 * @property string $username
 * @property string $password
 * @property string $password_hash
 * @property string $auth_key
 * @property string $email
 * @property string $foto
 * @property integer $id_hak_akses
 */
class Pengguna extends ActiveRecord 
{

    public static function tableName() //tabel yang digunakan
    {
        return 'pengguna';
    }

    /**
     * @inheritdoc
     */

    /**
   *to define variable
   **/

    public $file;
    public $id;
    public $password_lama;
    public $password_baru;
    public $password_ulang;
    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['nama_pengguna', 'username', 'password', 'password_hash', 'email', 'id_hak_akses','status'], 'required'], //yang diminta untuk harus diisi dalam formnya
           
            [['id_hak_akses'], 'safe'], //tipe data atribut
            [['nama_pengguna', 'username', 'password'], 'string', 'max' => 100],
            [['password_hash', 'auth_key'], 'string', 'max' => 255],
            [['email', 'foto', 'status'], 'string', 'max' => 30],
            [['foto'], 'file'],
            [['password'],'findPassword'],
            [['password_ulang'], 'compare', 'compareAttribute' =>'password'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [//atribut untuk nama label di form detail view
            'id_pengguna' => 'Id Pengguna',
            'nama_pengguna' => 'Nama Pengguna',
            'username' => 'Username',
            'password' => 'Password',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'email' => 'Email',
            'foto' => 'Foto',
            'id_hak_akses' => 'Hak Akses',
            'status' => 'Status',
        ];

    }

    public function getAkses() //sintak untuk membuat relasi
    //berarti pengguna mempunyai relasi ke hak akses -> many to one
    {
        return $this->hasOne(HakAkses::className(), ['id_hak_akses' =>'id_hak_akses']);
       
    }

    public function getKegiatan()
    {
        return $this->hasMany(AgendaKegiatan::className(), ['id_pengguna' => 'id_pengguna']);
    }

    public function getImageurl()
    {
        return Url::to('@web/' . $this->foto, true);
    }

     public function findPassword($id)
    {
        return true;
    }

    

    
}
