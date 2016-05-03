<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class DataUser extends Model {
    public $id;
    public $username;
    public $password;
    public $password_ulang;
    public $hak_akses;
    public $nip_pegawai;
   
    public function rules() {
        return [
            [['username','hak_akses','nip_pegawai'],'required'],
            [['username','password','password_ulang'], 'string', 'max' => 255],
            [['nip_pegawai','hak_akses'],'integer'],
            [['password_ulang'], 'compare', 'compareAttribute'=>'password'],
            [['id'], 'integer', 'on' => 'updateUser'],
        ];
    }

    public function create() {
        if (!$this->validate()) {
            return null;
        }

        $model = new User();

        $model->username = $this->username;
        $model->role = $this->hak_akses;
        $model->nip = $this->nip_pegawai;
        $model->setPassword($this->password);
        $model->generateAuthKey();

        return $model->save() ? $model : null;
    }

    public function update() {

        if (!$this->validate()) {
            return null;
        }

        $user = User::findOne($this->id);

        $user->username = $this->username;
        $user->role = $this->hak_akses;
        $user->nip = $this->nip_pegawai;

        if ($this->password != null) {
            $user->setPassword($this->password);
            $user->generateAuthKey();
        }

        return $user->save() ? $user : null;
    }

}
