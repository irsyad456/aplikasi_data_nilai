<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Grades;
use Yii;

/**
 * GradesSearch represents the model behind the search form of `frontend\models\Grades`.
 */
class GradesSearch extends Grades
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['student_id', 'subject_id', 'jenis_nilai', 'created_at', 'updated_at'], 'safe'],
            [['nilai'], 'number'],
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
        $query = Grades::find();

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

        $query->joinWith('student');
        $query->joinWith('subject');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'nilai' => $this->nilai,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'jenis_nilai', $this->jenis_nilai])
            ->andFilterWhere(['like', 'subjects.nama', $this->subject_id])
            ->andFilterWhere(['like', 'students.nama', $this->student_id]);

        return $dataProvider;
    }

    public function searchProfile($params)
    {
        $query = Grades::find();

        // add conditions that should always apply here
        $query->andWhere(['user_id' => Yii::$app->user->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('student');
        $query->joinWith('subject');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'nilai' => $this->nilai,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'jenis_nilai', $this->jenis_nilai])
            ->andFilterWhere(['like', 'subjects.nama', $this->subject_id])
            ->andFilterWhere(['like', 'students.nama', $this->student_id]);

        return $dataProvider;
    }
}
