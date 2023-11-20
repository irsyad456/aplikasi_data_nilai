<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PerjalananProyek;

/**
 * PerjalananProyekSearch represents the model behind the search form of `backend\models\PerjalananProyek`.
 */
class PerjalananProyekSearch extends PerjalananProyek
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pegawai_id'], 'integer'],
            [['proyek_id', 'nama_perjalanan', 'desk_perjalanan', 'status_perjalanan', 'created_at', 'updated_at'], 'safe'],
            [['modal', 'pengeluaran'], 'number'],
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
        $query = PerjalananProyek::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $query->joinWith('proyek');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'pengeluaran' => $this->pengeluaran,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status_perjalanan' => $this->status_perjalanan
        ]);

        $query->andFilterWhere(['like', 'nama_perjalanan', $this->nama_perjalanan])
            ->andFilterWhere(['like', 'proyeks.nama_proyek', $this->proyek_id])
            ->andFilterWhere(['like', 'modal', $this->modal])
            ->andFilterWhere(['like', 'desk_perjalanan', $this->desk_perjalanan]);

        return $dataProvider;
    }
}
