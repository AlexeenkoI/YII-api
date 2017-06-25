<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Grouppriority;

/**
 * GroupprioritySearch represents the model behind the search form about `app\models\Grouppriority`.
 */
class GroupprioritySearch extends Grouppriority
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'groupid', 'batchid', 'p1', 'p2', 'p3', 'p4'], 'integer'],
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
        $query = Grouppriority::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'groupid' => $this->groupid,
            'batchid' => $this->batchid,
            'p1' => $this->p1,
            'p2' => $this->p2,
            'p3' => $this->p3,
            'p4' => $this->p4,
        ]);

        return $dataProvider;
    }
}
