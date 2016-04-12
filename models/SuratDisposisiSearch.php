<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratDisposisi;
use app\models\Jabatan;
use app\models\SuratMasuk;
use app\models\Klasifikasi;

/**
 * SuratDisposisiSearch represents the model behind the search form about `app\models\SuratDisposisi`.
 */
class SuratDisposisiSearch extends SuratDisposisi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_agenda_disposisi'], 'integer'],
            [['no_agenda_masuk','tanggal_surat_diterima','id_jabatan','id_klasifikasi','catatan','instruksi'], 'safe'],
            [['instruksi', 'catatan'],'string'],
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
        $query = SuratDisposisi::find();

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

        $query->joinWith('klasifikasi');
        $query->joinWith('masuk');
        $query->joinWith('jabatan');

        $query->andFilterWhere([
            'no_agenda_disposisi' => $this->no_agenda_disposisi,
            'tanggal_surat_diterima' => $this->tanggal_surat_diterima,
            

           ]);

        // $query->andFilterWhere([
            // 'or',
            // ['like','surat_masuk.asal_surat', $this->no_agenda_masuk],
            // ['like','surat_masuk.no_surat_masuk', $this->no_agenda_masuk],
        $query->andFilterWhere(['like','jabatan.nama_jabatan', $this->id_jabatan])
             ->andFilterWhere(['like','klasifikasi.nama_klasifikasi', $this->id_klasifikasi])
             ->andFilterWhere(['like','instruksi', $this->instruksi])
             ->andFilterWhere(['like','catatan', $this->catatan]);
          
          
        return $dataProvider;
    }
}
