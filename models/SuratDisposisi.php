<?php

namespace app\models;

use Yii;
use app\models\RelasiDisposisi;
use app\models\SuratMasuk;

/**
 * This is the model class for table "surat_disposisi".
 *
 * @property integer $no_agenda_disposisi
 * @property integer $agenda_masuk
 * @property integer $id_jabatan
 * @property string $instruksi
 * @property string $catatan
 */
class SuratDisposisi extends \yii\db\ActiveRecord
{
    public $no_agenda_masuk;  
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_disposisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['instruksi','catatan'], 'required'],
            [['instruksi', 'catatan'], 'string'],
            [['agenda_masuk'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'no_agenda_disposisi' => 'No Agenda Disposisi',
            'instruksi' => 'Instruksi',
            'catatan' => 'Catatan',
            'agenda_masuk' => 'Agenda Masuk',
          
        ];
    }

     public function getDetail()
    {
        return $this->hasMany(RelasiDisposisi::className(), ['agenda_disposisi' => 'no_agenda_disposisi']);
    }

     public function getMasuk()
    {
        return $this->hasOne(SuratMasuk::className(), ['no_agenda_masuk' => 'agenda_masuk']);
    }

   
}
