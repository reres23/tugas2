<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengguna;
use app\models\Jabatan;
use app\models\HakAkses;

/**
 * PenggunaSearch represents the model behind the search form about `app\models\Pengguna`.
 */
class PenggunaSearch extends Pengguna
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pengguna'], 'integer'],
            [['nama_pengguna','id_hak_akses','username', 'password', 'password_hash', 'auth_key', 'email', 'foto', 'status'], 'safe'],
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
        $query = Pengguna::find();

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
        $query->joinWith('akses');

        $query->andFilterWhere([
            'id_pengguna' => $this->id_pengguna,
            // 'id_hak_akses' => $this->id_hak_akses,
            // 'id_jabatan' => $this->id_jabatan,
        ]);

        $query->andFilterWhere(['like', 'nama_pengguna', $this->nama_pengguna])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'hak_akses.nama_hak_akses', $this->id_hak_akses]);

        return $dataProvider;
    }
}
