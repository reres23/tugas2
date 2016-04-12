<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hak_akses".
 *
 * @property integer $id_hak_akses
 * @property string $nama_hak_akses
 */
class HakAkses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hak_akses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hak_akses', 'nama_hak_akses'], 'required'],
            [['id_hak_akses'], 'integer'],
            [['nama_hak_akses'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_hak_akses' => 'Id Hak Akses',
            'nama_hak_akses' => 'Nama Hak Akses',
        ];
    }

    public function getPengguna()
    {
    return $this->hasMany(Pengguna::className(), ['id_hak_akses' =>'id_hak_akses']);
    }
}
