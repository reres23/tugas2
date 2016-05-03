<?php

namespace app\models;

use Yii;
use app\models\Pegawai;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $role
 * @property string $foto
 * @property string $nip
 */
class Pengguna extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'status', 'created_at', 'updated_at', 'role', 'foto', 'nip'], 'required'],
            [['status','created_at', 'updated_at', 'role', 'nip'], 'integer'],
            [['password_hash', 'foto'], 'string', 'max' => 255],
            [['username','auth_key'], 'string', 'max' => 50],
            [['username'], 'unique'],
            [['nip'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['nip' => 'nip_pegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'role' => 'Role',
            'foto' => 'Foto',
            'nip' => 'Nip',
        ];
    }

    public function getPegawai() 
    {
         return $this->hasOne(Pegawai::className(), ['nip_pegawai' => 'nip']);
    }
}
