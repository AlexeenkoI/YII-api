<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'groupid', 'batchid', 'routeid', 'iscap', 'isdeleted'], 'integer'],
            [['firstname', 'lastname', 'patronymic', 'rfcid', 'sex', 'groupTotem', 'routeName'], 'safe'],
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
        $query = User::find();

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
            'routeid' => $this->routeid,
            'iscap' => $this->iscap,
            'isdeleted' => $this->isdeleted,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'rfcid', $this->rfcid])
            ->andFilterWhere(['like', 'sex', $this->sex]);

        if ($this->groupTotem != "")
            $query->joinWith(["group" => function($q) {
                $q->where('group.totemname like "%' . $this->groupTotem . '%"');
            }]);

        if ($this->routeName != "")
            $query->joinWith(["route" => function($q) {
                $q->where('route.name like "%' . $this->routeName . '%"');
            }]);            

        return $dataProvider;
    }
}
