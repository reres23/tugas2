<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pegawai;
use app\models\Jabatan;

/**
 * PegawaiSearch represents the model behind the search form about `app\models\Pegawai`.
 */
class PegawaiSearch extends Pegawai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip_pegawai'], 'integer'],
            [['nama_pegawai', 'id_posisi','email','foto','status_pegawai'], 'safe'],
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
        $query = Pegawai::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' =>['pageSize' => 10]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('posisi');

        // grid filtering conditions
        $query->andFilterWhere([
            'nip_pegawai' => $this->nip_pegawai,
            
        ]);

        $query->andFilterWhere(['like', 'nama_pegawai', $this->nama_pegawai])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'jabatan.nama_jabatan', $this->id_posisi])
            ->andFilterWhere(['like', 'status_pegawai', $this->status_pegawai]);

        return $dataProvider;
    }
}
