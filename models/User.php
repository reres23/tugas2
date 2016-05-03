<?php

namespace app\models;

use Yii;
use yii\base\NotSupportException; 
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "users".
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
* 
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    const ROLE_ADMIN = 10;
    const ROLE_PETUGAS = 20; 
    const ROLE_KEPALA_SEKOLAH = 30;
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }       

    public static function tableName()
    {
        return '{{%user}}'; //menggunakan tabel pengguna
    }

    public function rules()
    {
        return [
            [['username', 'role'], 'required'],
            [['password_hash'], 'safe'],
            [['username'], 'required', 'on' => 'userUpdateProfil'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    public function attributeLabels() //mengganti istilah lain pada atribut yang akan ditampilkan
    {
        return [
            'username' =>'Username',//untuk membuat label
            'password' =>'Password',
        ];
    }

   
    // private static $users = [
    //     '100' => [
    //         'id' => '100',
    //         'username' => 'admin',
    //         'password' => 'admin',
    //         'authKey' => 'test100key',
    //         'accessToken' => '100-token',
    //     ],
    //     '101' => [
    //         'id' => '101',
    //         'username' => 'demo',
    //         'password' => 'demo',
    //         'authKey' => 'test101key',
    //         'accessToken' => '101-token',
    //     ],
    // ];

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    //membuat function pencarian berdasarkan id pengguna
    {
       //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        // return static::findOne($id_pengguna);//hanya dapat melakukan pencarian berdasarkan id dengan sifat tidak
        //dapat diubah-ubah

        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {// membuat function pencariian berdasarkan username

        // foreach (self::$users as $user) {
        //     if (strcasecmp($user['username'], $username) === 0) {
        //         return new static($user);
        //     }
        // }

        // return null;

        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);

    }

    /**
     * @inheritdoc
     */
    public function getId()
    {//function pencarian berdasarkan id
        return $this->getPrimaryKey();
        //mengambil primary key
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;//untuk cookie, session
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($auth_key)
    {
        return $this->getAuthKey() === $auth_key;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);

        //kemudian di dalam model mengambil password has

    }

    public function setPassword($password)
    {
        // $this->password_hash = md5($password);//mengubah password untuk di md5-in
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

   

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    /**
    * @return \yii\db\ActiveQuery
    */

      public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');//untuk reset password
    }


      public function getPegawai()
    {
        return $this->hasOne(Pegawai::className(),['nip_pegawai' => 'nip']);
    }



}
