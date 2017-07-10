<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserMorda;

/**
 * UserMordaSearch represents the model behind the search form about `app\models\UserMorda`.
 */
class UserMordaSearch extends UserMorda
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'mordaid'], 'integer'],
            [['userName', 'spikerName'], 'safe']
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
        $query = UserMorda::find();

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
            'userid' => $this->userid,
            'mordaid' => $this->mordaid,
        ]);

        if ($this->userName != "")
            $query->joinWith(["user" => function($q) {
                $q->where('user.firstname like "%' . $this->userName . '%" OR '
                          .'user.lastname like "%' . $this->userName . '%" OR '
                          .'user.patronymic like "%' . $this->userName . '%"');
            }]);

        if ($this->spikerName != "")
            $query->joinWith(["morda" => function($q) {
                $q->where('morda.fio like "%' . $this->spikerName . '%"');
            }]);

        return $dataProvider;
    }
}
