<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LembarDisposisi;
use app\models\DetailDisposisi;
use app\models\SuratMasuk;

/**
 * LembarDisposisiSearch represents the model behind the search form about `app\models\LembarDisposisi`.
 */
class LembarDisposisiSearch extends LembarDisposisi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_agenda_disposisi'], 'integer'],
            [['instruksi', 'catatan', 'agenda_masuk'], 'safe'],
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
        $query = LembarDisposisi::find();

        // add conditions that should always apply here

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

        $query->joinWith('detail');
        $query->joinWith('masuk');
        // $query->joinWith('jabatan');

        // grid filtering conditions
        $query->andFilterWhere([
            'no_agenda_disposisi' => $this->no_agenda_disposisi,
            'agenda_masuk' => $this->agenda_masuk,
        ]);

        $query->andFilterWhere(['like', 'instruksi', $this->instruksi])
            ->andFilterWhere(['like', 'catatan', $this->catatan]);
            // ->andFilterWhere(['like', 'detail.no_jabatan', $this->detail]);

        return $dataProvider;
    }
}
