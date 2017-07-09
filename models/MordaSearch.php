<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Morda;

/**
 * MordaSearch represents the model behind the search form about `app\models\Morda`.
 */
class MordaSearch extends Morda
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'batchid', 'isdeleted', 'capacity'], 'integer'],
            [['fio', 'description', 'pic'], 'safe'],
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
        $query = Morda::find();

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
            'batchid' => $this->batchid,
            'isdeleted' => $this->isdeleted,
            'capacity' => $this->capacity,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'pic', $this->pic]);

        return $dataProvider;
    }
}
