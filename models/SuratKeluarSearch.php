<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratKeluar;
use app\models\Klasifikasi;

/**
 * SuratKeluarSearch represents the model behind the search form about `app\models\SuratKeluar`.
 */
class SuratKeluarSearch extends SuratKeluar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_agenda_keluar'], 'integer'],
            [['tanggal_surat_keluar','no_surat_keluar', 'tanggal_dikirim', 'klasifikasi','tujuan_surat', 'keterangan', 'file_surat'], 'safe'],
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
        $query = SuratKeluar::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('perihal');

        $query->andFilterWhere([
            'no_agenda_keluar' => $this->no_agenda_keluar,
            'tanggal_surat_keluar' => $this->tanggal_surat_keluar,
            'tanggal_dikirim' => $this->tanggal_dikirim,
        ]);

        // $query->andFilterWhere(['like', 'perihal_surat', $this->perihal_surat])
        $query->andFilterWhere(['like', 'tujuan_surat', $this->tujuan_surat])
                ->andFilterWhere(['like', 'keterangan', $this->keterangan])
                ->andFilterWhere(['like', 'no_surat_keluar', $this->no_surat_keluar])
                ->andFilterWhere(['like', 'file_surat', $this->file_surat])
                ->andFilterWhere(['like', 'klasifikasi.nama_klasifikasi', $this->klasifikasi]);

        return $dataProvider;
    }
}
