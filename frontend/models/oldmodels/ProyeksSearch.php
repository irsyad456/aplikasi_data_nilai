<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Proyeks;

/**
 * ProyeksSearch represents the model behind the search form of `backend\models\Proyeks`.
 */
class ProyeksSearch extends Proyeks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id',], 'integer'],
            [['nama_proyek', 'client_id', 'desk_proyek', 'kategori_proyek', 'tanggal_mulai', 'tanggal_selesai', 'status', 'created_at', 'updated_at'], 'safe'],
            [['nilai_proyek'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Proyeks::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('client');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'kategori_proyek', $this->kategori_proyek])
            ->andFilterWhere(['like', 'nilai_proyek', $this->nilai_proyek])
            ->andFilterWhere(['like', 'nama_proyek', $this->nama_proyek])
            ->andFilterWhere(['like', 'nama_client', $this->client_id])
            ->andFilterWhere(['like', 'desk_proyek', $this->desk_proyek])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
