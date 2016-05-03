<?php

namespace app\models;

use Yii;
use app\models\Jabatan;
use app\models\SuratDisposisi;

/**
 * This is the model class for table "relasi_disposisi".
 *
 * @property integer $no_jabatan
 * @property integer $agenda_disposisi
 */
class RelasiDisposisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relasi_disposisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_jabatan', 'agenda_disposisi'], 'required'],
            [['id_detail','no_jabatan', 'agenda_disposisi'], 'integer'],
            [['agenda_disposisi'], 'exist', 'skipOnError' => true, 'targetClass' => SuratDisposisi::className(), 'targetAttribute' => ['agenda_disposisi' => 'no_agenda_disposisi']],
            [['no_jabatan'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['no_jabatan' => 'id_jabatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_detail' => 'Id Detail',
            'no_jabatan' => 'No Jabatan',
            'agenda_disposisi' => 'Agenda Disposisi',
        ];
    }

      public function getRelasi()
    {
        return $this->hasMany(SuratDisposisi::className(), ['no_agenda_disposisi' => 'agenda_disposisi']);
    }

    public function getJabatan()
    {
        return $this->hasMany(Jabatan::className(), ['id_jabatan' => 'no_jabatan']);
    }    

}
