<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jabatan;

/**
 * JabatanSearch represents the model behind the search form about `app\models\Jabatan`.
 */
class JabatanSearch extends Jabatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jabatan'], 'integer'],
            [['nama_jabatan'], 'string'],
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
        $query = Jabatan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize'=> 10],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_jabatan' => $this->id_jabatan,
        ]);

        $query->andFilterWhere(['like', 'nama_jabatan', $this->nama_jabatan]);

        return $dataProvider;
    }
}
