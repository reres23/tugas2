<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AgendaKegiatan;
use app\models\Pegawai;


/**
 * AgendaKegiatanSearch represents the model behind the search form about `app\models\AgendaKegiatan`.
 */
class AgendaKegiatanSearch extends AgendaKegiatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kegiatan'], 'integer'],
            [['tanggal_kegiatan', 'kegiatan', 'id_pegawai','tempat_kegiatan', 'keterangan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AgendaKegiatan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10], //untuk pagination
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('pegawai'); //melakukan relasi dengan tabel pegawai
      
        $query->andFilterWhere([
            'id_kegiatan' => $this->id_kegiatan,
            'tanggal_kegiatan' => $this->tanggal_kegiatan,
            // 'no_agenda_masuk' => $this->no_agenda_masuk,
        ]);

        $query->andFilterWhere(['like', 'kegiatan', $this->kegiatan]) //query untuk filter search 
            ->andFilterWhere(['like', 'tempat_kegiatan', $this->tempat_kegiatan])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'pegawai.nama_pegawai',$this->id_pegawai]);
       

        return $dataProvider;
    }
}
