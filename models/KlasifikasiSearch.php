<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Klasifikasi;
use app\models\SuratMasuk;
use app\models\SuratKeluar;

/**
 * KlasifikasiSearch represents the model behind the search form about `app\models\Klasifikasi`.
 */
class KlasifikasiSearch extends Klasifikasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_klasifikasi'], 'integer'],
            [['kode_klasifikasi', 'nama_klasifikasi', 'keterangan'], 'safe'],
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
        $query = Klasifikasi::find();

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

        $query->andFilterWhere([
            'id_klasifikasi' => $this->id_klasifikasi,
        ]);

        $query->andFilterWhere(['like', 'kode_klasifikasi', $this->kode_klasifikasi])
            ->andFilterWhere(['like', 'nama_klasifikasi', $this->nama_klasifikasi])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
