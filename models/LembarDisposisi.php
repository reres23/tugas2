<?php

namespace app\models;

use Yii;
use app\models\DetailDisposisi;
use app\models\SuratMasuk;

/**
 * This is the model class for table "lembar_disposisi".
 *
 * @property integer $no_agenda_disposisi
 * @property string $instruksi
 * @property string $catatan
 * @property integer $agenda_masuk
 */
class LembarDisposisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lembar_disposisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['instruksi', 'catatan'], 'string'],
            [['instruksi','catatan'], 'safe'],
            [['agenda_masuk'], 'integer', 'on' => 'updateLembarDisposisi'],
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
        return $this->hasMany(DetailDisposisi::className(), ['agenda_disposisi' => 'no_agenda_disposisi']);
    }

     public function getMasuk()
    {
        return $this->hasOne(SuratMasuk::className(), ['no_agenda_masuk' => 'agenda_masuk']);
    }

   
}
