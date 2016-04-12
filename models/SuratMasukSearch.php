<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratMasuk;
use app\models\Klasifikasi;

/**
 * SuratMasukSearch represents the model behind the search form about `app\models\SuratMasuk`.
 */
class SuratMasukSearch extends SuratMasuk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_agenda_masuk'], 'integer'],
            [['no_surat_masuk', 'id_klasifikasi','tanggal_surat_masuk', 'tanggal_surat_diterima', 'jenis_surat', 'asal_surat', 'tujuan_surat', 'keterangan', 'file_surat'], 'safe'],
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
        $query = SuratMasuk::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('klasifikasi');

        $query->andFilterWhere([
            'no_agenda_masuk' => $this->no_agenda_masuk,
            'tanggal_surat_masuk' => $this->tanggal_surat_masuk,
            'tanggal_surat_diterima' => $this->tanggal_surat_diterima,
            // 'id_klasifikasi' => $this->id_klasifikasi,
        ]);

        $query->andFilterWhere(['like', 'no_surat_masuk', $this->no_surat_masuk])
            ->andFilterWhere(['like', 'jenis_surat', $this->jenis_surat])
            ->andFilterWhere(['like', 'asal_surat', $this->asal_surat])
            ->andFilterWhere(['like', 'tujuan_surat', $this->tujuan_surat])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
             ->andFilterWhere(['like', 'klasifikasi.nama_klasifikasi', $this->id_klasifikasi])
            ->andFilterWhere(['like', 'file_surat', $this->file_surat]);

        return $dataProvider;
    }
}
