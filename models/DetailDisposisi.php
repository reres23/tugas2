<?php

namespace app\models;

use Yii;
use app\models\Jabatan;
use app\models\LembarDisposisi;


/**
 * This is the model class for table "detail_disposisi".
 *
 * @property integer $id_detail
 * @property integer $no_jabatan
 * @property integer $agenda_disposisi
 */
class DetailDisposisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_disposisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_jabatan', 'agenda_disposisi'], 'safe'],
            [['no_jabatan', 'agenda_disposisi'], 'integer'],
            [['no_jabatan'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['no_jabatan' => 'id_jabatan']],
            [['agenda_disposisi'], 'exist', 'skipOnError' => true, 'targetClass' => LembarDisposisi::className(), 'targetAttribute' => ['agenda_disposisi' => 'no_agenda_disposisi']],
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

        //Yii::t('app', '',)
    }

       public function getRelasi()
    {
        return $this->hasMany(LembarDisposisi::className(), ['no_agenda_disposisi' => 'agenda_disposisi']);
    }

    public function getJabatan()
    {
        return $this->hasMany(Jabatan::className(), ['id_jabatan' => 'no_jabatan']);
    }   
}
